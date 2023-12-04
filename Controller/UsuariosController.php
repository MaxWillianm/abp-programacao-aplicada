<?php 
App::uses('AppController', 'Controller');

class UsuariosController extends AppController
{
    public $name = 'Usuarios';
    public $uses = array('Usuario');
    
    public function index()
    {
        $usuarios = $this->Usuario->find('all');
        $this->set(compact('usuarios'));
    }

    public function delete_user($id)
    {
        if($this->Usuario->delete($id))
        {
            $this->flash('Usuário deletado com sucesso!', '/usuarios', 'success');
        }
        else
        {
            $this->flash('Erro ao deletar usuário!', '/usuarios', 'error');
        }   
    }


    public function create_user()
    {
        if(!empty($this->request->data))
        {
            $form = $this->request->data;
            
            $this->Usuario->create();
            if($this->Usuario->save($form))
            {
                $this->flash('Usuário cadastrado com sucesso!', '/usuarios', 'success');
            }
            else
            {
                $this->flash('Erro ao cadastrar usuário!', '/usuarios', 'error');
            }
        }
        $this->set('add', true);
    }

    public function edit_user($id)
    {
        if(!empty($this->request->data))
        {
            $form = $this->request->data;
            
            $this->Usuario->id = $id;
            if($this->Usuario->save($form))
            {
                $this->flash('Usuário editado com sucesso!', '/usuarios', 'success');
            }
            else
            {
                $this->flash('Erro ao editar usuário!', '/usuarios', 'error');
            }
        }
        else
        {
            $usuario = $this->Usuario->findById($id);
            $this->set('add', false);
            $this->request->data = $usuario;
            $this->render('create_user');
        }
    }

}
?>
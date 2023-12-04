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

    public function login()
    {

        if(!empty($this->request->data))
        {
            $usuarioLogado = $this->request->data['UsuarioLogado'];

            $usuarios = $this->Usuario->find('first', array(
                'conditions' => array('Usuario.email' => $usuarioLogado['email']
            )));

            if(empty($usuarios))
            {
                $this->flash('Nenhum usuario encontrado!', '/usuarios/login', 'success');
                return;
            }

            if($usuarioLogado['email'] == $usuarios['Usuario']['email'] && $usuarioLogado['senha'] == $usuarios['Usuario']['senha'])
            {
                $this->Session->write('UsuarioLogado', $usuarios['Usuario']);
                $this->flash('Login efetuado com sucesso!', '/usuarios', 'success');
            }
            else
            {
                $this->flash('Usuário ou senha incorretos!', '/usuarios/login', 'success');
            }
            
            $this->set(compact('usuarios'));
        }



    }

    public function logout()
    {
        $this->Session->destroy();
        $this->flash('Logout efetuado com sucesso!', '/usuarios/login', 'success');
    }

}
?>
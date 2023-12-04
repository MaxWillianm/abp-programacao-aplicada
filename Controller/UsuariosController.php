<?php 
App::uses('AppController', 'Controller');

class UsuariosController extends AppController
{
    public $name = 'Usuarios';
    public $uses = array('Usuario');
    
    public function index()
    {
        //
    }

    public function admin_index()
    {
        $usuarios = $this->Usuario->find('all');
        $this->set(compact('usuarios'));
    }

    public function admin_delete($id)
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


    public function admin_add()
    {
        if(!empty($this->request->data))
        {
            $form = $this->request->data;
            
            $this->Usuario->create();
            if($this->Usuario->save($form))
            {
                $this->flash('Usuário cadastrado com sucesso!', '/admin/usuarios', 'success');
            }
            else
            {
                $this->flash('Erro ao cadastrar usuário!', '/admin/usuarios', 'error');
            }
        }

        $this->set('add', true);
        $this->render('admin_edit');
    }

    public function admin_edit($id)
    {
        if(!empty($this->request->data))
        {
            $form = $this->request->data;
            
            $this->Usuario->id = $id;
            if($this->Usuario->save($form))
            {
                $this->flash('Usuário editado com sucesso!', '/admin/usuarios', 'success');
            }
            else
            {
                $this->flash('Erro ao editar usuário!', '/admin/usuarios', 'error');
            }
        }
        else
        {
            $usuario = $this->Usuario->findById($id);
            $this->set('add', false);
            $this->request->data = $usuario;
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
                $this->flash('Login efetuado com sucesso!', '/produtos', 'success');
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
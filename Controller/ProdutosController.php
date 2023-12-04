<?php 
App::uses('AppController', 'Controller');

class ProdutosController extends AppController
{
    public $name = 'Produtos';
    public $uses = array('Produto');
    
    public function index()
    {
        $produtos = $this->Produto->find('all');
        $this->set(compact('produtos'));
    }

    public function view_produto($id)
    {
        $produto = $this->Produto->findById($id);
        $this->set(compact('produto'));
    }

    public function delete_produto($id)
    {
        if($this->Produto->delete($id))
        {
            $this->flash('Produto deletado com sucesso!', '/produtos', 'success');
        }
        else
        {
            $this->flash('Erro ao deletar produto!', '/produtos', 'error');
        }   
    }

    public function create_produto()
    {
        if(!empty($this->request->data))
        {
            $form = $this->request->data;
            
            $this->Produto->create();
            if($this->Produto->save($form))
            {
                $this->flash('Produto cadastrado com sucesso!', '/produtos', 'success');
            }
            else
            {
                $this->flash('Erro ao cadastrar produto!', '/produtos', 'error');
            }
        }
        $this->set('add', true);
    }

    public function edit_produto($id)
    {
        if(!empty($this->request->data))
        {
            $form = $this->request->data;
            
            $this->Produto->id = $id;
            if($this->Produto->save($form))
            {
                $this->flash('Produto editado com sucesso!', '/produtos', 'success');
            }
            else
            {
                $this->flash('Erro ao editar produto!', '/produtos', 'error');
            }
        }
        else
        {
            $this->request->data = $this->Produto->findById($id);
        }
        $this->set('add', true);
    }   

}
?>
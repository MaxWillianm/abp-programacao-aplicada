<?php 
App::uses('AppController', 'Controller');

class ProdutosController extends AppController
{
    public $name = 'Produtos';
    public $uses = array('Produto');

//     public function beforeFilter()
//   {
//     parent::beforeFilter();
//     $usuario = $this->Session->read('UsuarioLogado');
//     if(empty($usuario))
//     {
//       $this->flash('Você precisa estar logado para acessar essa página!', '/usuarios/login', 'success');
//       return;
//     }
//   }
    
    public function index()
    {
        $produtos = $this->Produto->find('all');
        $this->set(compact('produtos'));
    }

    public function view($id)
    {
        $produto = $this->Produto->findById($id);
        $this->set(compact('produto'));
    }

    public function admin_index()
    {
        $produtos = $this->Produto->find('all');
        $this->set(compact('produtos'));
    }

    public function admin_delete($id)
    {
        if($this->Produto->delete($id))
        {
            $this->flash('Produto deletado com sucesso!', '/admin/produtos', 'success');
        }
        else
        {
            $this->flash('Erro ao deletar produto!', '/admin/produtos', 'error');
        }   
    }

    public function admin_add()
    {
        if(!empty($this->request->data))
        {
            $form = $this->request->data['Produto'];
            
            $this->Produto->create();
            if($this->Produto->save($form))
            {
                $this->flash('Produto cadastrado com sucesso!', '/admin/produtos/index', 'success');
            }
            else
            {
                $this->flash('Erro ao cadastrar produto!', '/admin/produtos/index', 'error');
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
            
            $this->Produto->id = $id;
            if($this->Produto->save($form))
            {
                $this->flash('Produto editado com sucesso!', '/admin/produtos/index', 'success');
                return;
            }
            else
            {
                $this->flash('Erro ao editar produto!', '/admin/produtos/index', 'error');
                return;
            }
        }
        else
        {
            $this->request->data = $this->Produto->findById($id);
        }
        $this->set('add', true);
    }   

    public function carrinho()
    {
        $saldoTotal = $this->Session->read('saldoTotal');

        $carrinho = $this->Session->read('carrinho');
        $this->set(compact('carrinho', 'saldoTotal'));
    }

    public function add_carrinho($id)
    {
        $produto = $this->Produto->findById($id);
        $carrinho = $this->Session->read('carrinho');
        $carrinho[] = $produto;

        // Calcula o saldo total
        $saldoTotal = 0;
        foreach ($carrinho as $item) {
            $saldoTotal += $item['Produto']['valor'];
        }

        $this->Session->write('carrinho', $carrinho);
        $this->Session->write('saldoTotal', $saldoTotal);

        $this->flash('Produto adicionado ao carrinho!', '/produtos/carrinho', 'success');
    }

    public function finalizar()
    {
        $this->Session->delete('carrinho');
        $this->Session->delete('saldoTotal');

        $this->flash('Compra finalizada com sucesso!', '/produtos/index', 'success');
    }

}
?>
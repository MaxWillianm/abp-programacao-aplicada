<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController
{
  public $uses = array('Produtos');

  public function beforeFilter()
  {
    parent::beforeFilter();
    $usuario = $this->Session->read('UsuarioLogado');
    if(empty($usuario))
    {
      $this->flash('Você precisa estar logado para acessar essa página!', '/usuarios/login', 'success');
      return;
    }
  }

  public function index()
  {
    
  }
}

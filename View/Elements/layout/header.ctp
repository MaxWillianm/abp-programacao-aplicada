<?php 
$usuarioLogado = $this->Session->read('UsuarioLogado');
if(!empty($usuarioLogado))
{
    $nome = $usuarioLogado['nome'];
}
else
{
    $nome = null;
    return;
}

$carrinho = $this->Session->read('carrinho');
if(!empty($carrinho))
{
  $qtdProdutos = count($carrinho);
}
else
{
  $qtdProdutos = 0;
}
?>
<div class="bg-gray-200">
  <div class="bg-white shadow-md">
    <div class="container mx-auto py-2 flex justify-between items-center">
      <h1 class="text-lg font-semibold">Market Place</h1>
      <div class="flex">
        <div class="mr-8 flex items-center">
          <a href="<?php echo $this->Html->url('/produtos/carrinho') ?>" class="text-blue-500 font-semibold">
            <?php echo $this->Image->svg('img/layout/svg/carrinho.svg', array('class' => 'w-5 h-auto')) ?>
          </a>
          <span class="text-gray-600 mx-2">|</span>
          <span class="text-blue-500 font-semibold"><?php echo $qtdProdutos ?></span>
        </div>
        <span class="text-gray-600 mr-2">Usuário:</span>
        <span class="text-blue-500 font-semibold"><?php echo $nome ?></span>
        <span class="text-gray-600 mx-2">|</span>
        <a href="<?php echo $this->Html->url('/usuarios/logout') ?>" class="text-blue-500 font-semibold">Sair</a>
      </div>
    </div>
  </div>
</div>
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
?>
<div class="bg-gray-200">
  <div class="bg-white shadow-md">
    <div class="container mx-auto py-2 flex justify-between items-center">
      <h1 class="text-lg font-semibold">Nome do Projeto</h1>
      <div>
        <span class="text-gray-600 mr-2">Usuário:</span>
        <span class="text-blue-500 font-semibold"><?php echo $nome ?></span>
        <span class="text-gray-600 mx-2">|</span>
        <a href="/usuarios/logout" class="text-blue-500 font-semibold">Sair</a>
      </div>
    </div>
  </div>
</div>
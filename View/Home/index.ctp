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
<div class="bg-gray-200 flex justify-center items-center mt-44">
  <div class="bg-white p-8 rounded shadow-md text-center">
    <h1 class="text-4xl font-semibold mb-4">Bem-Vindo!</h1>
    <p class="text-gray-700 mb-4">Olá <?php echo $nome ?>, confira nossos produtos.</p>
    <a href="<?php echo $this->Html->url('/produtos') ?>" class="bg-blue-500 border border-black font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Ver produtos</a>
  </div>
</div>
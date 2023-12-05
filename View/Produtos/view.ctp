<div class="bg-gray-200">
  <div class="container mx-auto py-8">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://via.placeholder.com/500" alt="Placeholder" class="w-full h-96 object-cover object-center">
      <div class="p-6">
        <h1 class="text-3xl font-semibold mb-4"><?php echo $produto['Produto']['nome'] ?></h1>
        <p class="text-gray-700 text-lg mb-4"><?php echo $produto['Produto']['descricao'] ?></p>
        <p class="text-blue-500 text-2xl font-semibold mb-4">R$ <?php echo $produto['Produto']['valor'] ?></p>
        <div class="flex justify-between">
          <a href="<?php echo $this->Html->url('/produtos/adicionar_carrinho/' . $produto['Produto']['id']) ?>" class="bg-blue-500 border border-black font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Adicionar ao Carrinho</a>
        </div>
      </div>
    </div>
  </div>
</div>
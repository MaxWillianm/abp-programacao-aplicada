<body class="bg-gray-100">
  <div class="container mx-auto py-8">
    <h1 class="text-2xl font-semibold mb-6">Lista de Produtos</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <?php foreach($produtos as $produto) { ?>
      <a href="<?php echo $this->Html->url('/produtos/view/' . $produto['Produto']['id']) ?>" class="bg-white rounded-lg shadow-md transition-all overflow-hidden hover:bg-gray/30">
        <img src="https://via.placeholder.com/300" alt="Placeholder" class="w-full h-48 object-cover object-center">
        <div class="p-4">
          <h2 class="text-lg font-semibold mb-2"><?php echo $produto['Produto']['nome'] ?></h2>
          <p class="text-gray-700 mb-2">Descrição do Produto</p>
          <p class="text-blue-500 font-semibold">R$ <?php echo $produto['Produto']['valor'] ?></p>
        </div>
      </a>
      <?php } ?>
      
    </div>
  </div>
</body>
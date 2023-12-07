<body class="bg-gray-200">
  <div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-8">Seu Carrinho</h1>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      
    <?php foreach($carrinho as $car) { ?>
    <div class="flex justify-between border-b border-gray-300 p-4">
        <h2 class="text-lg font-semibold"><?php echo $car['Produto']['nome'] ?></h2>
        <span class="text-gray-700 font-semibold">R$ <?php echo $car['Produto']['valor'] ?></span>
    </div>
    <?php } ?>
      
      <div class="flex justify-between p-4">
        <h2 class="text-lg font-semibold">Total:</h2>
        <span class="text-blue-500 font-semibold">R$ <?php echo $saldoTotal ?></span>
      </div>
      <div class="flex justify-between p-4">
        <a href="<?php echo $this->Html->url('/produtos') ?>" class="bg-gray-300 border border-black font-semibold py-2 px-4 rounded-md hover:bg-gray-400 transition duration-300">Continuar Comprando</a>
        <a href="<?php echo $this->Html->url('/produtos/finalizar') ?>" class="bg-blue-500 border border-black font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Finalizar Compra</a>
      </div>
    </div>
  </div>
</body>
<body class="bg-gray-200">
  <div class="container mx-auto py-8">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-md mx-auto">
      <h1 class="text-3xl font-semibold mb-6">Cadastro</h1>
      <?php echo $this->xForm->Create('Usuario', array('url' => '/usuarios/cadastrar')) ?>
        <div class="mb-4 font-semibold">
            <?php echo $this->xForm->input('nome', array('placeholder' => 'Digite seu nome', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500')) ?>
        </div>
        <div class="mb-4 font-semibold">
            <?php echo $this->xForm->input('email', array('placeholder' => 'Digite seu email', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500')) ?>
        </div>
        <div class="mb-4 font-semibold">
            <?php echo $this->xForm->input('celular', array('placeholder' => 'Digite o seu numero de celular', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500')) ?>
        </div>
        <div class="mb-4 font-semibold">
            <?php echo $this->xForm->input('nascimento', array('placeholder' => 'Digite sua data de nascimento', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500')) ?>
        </div>
        <div class="mb-4 font-semibold">
            <?php echo $this->xForm->input('sexo', array('placeholder' => 'Digite sua data de nascimento', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500', 'options' => array(
                'Masculino' => 'Masculino',
                'Feminino' => 'Feminino',
                'Outro' => 'Outro'
            ))) ?>
        </div>
        <div class="mb-4 font-semibold">
            <?php echo $this->xForm->input('senha', array('type' => 'password', 'placeholder' => 'Digite uma Senha', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500')) ?>
        </div>
        <div class="mb-4 font-semibold">
            <?php echo $this->xForm->input('confirm_senha', array('type' => 'password', 'placeholder' => 'Repita a senha', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500')) ?>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-black border font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Cadastrar</button>
      <?php echo $this->xForm->end() ?>
    </div>
  </div>
</body>
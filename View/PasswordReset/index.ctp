<div class="bg-gray-200">
  <div class="container mx-auto py-8">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-md mx-auto">
      <h1 class="text-3xl font-semibold mb-6">Recuperação de Senha</h1>
      <p class="mb-5">Informe seu e-mail para receber um link de recuperação de senha.</p>
      <?php echo $this->xForm->create('UsuarioVerificationReset', array('id' => 'formReset', '/password_reset')) ?>
        <div class="mb-6 font-semibold">
            <?php echo $this->xForm->input('data_verify', array('label' => 'Email', 'placeholder' => 'Digite seu e-mail', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500')) ?>
        </div>
        <button type="submit" class="w-full bg-blue-500 border font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Recuperar Senha</button>
      <?php echo $this->xForm->end('') ?>
    </div>
  </div>
</div>
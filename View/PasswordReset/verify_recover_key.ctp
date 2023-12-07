<div class="bg-gray-200">
  <div class="container mx-auto py-8">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-md mx-auto">
      <h1 class="text-3xl font-semibold mb-6">Definir Nova Senha</h1>
      <?php echo $this->xForm->create('Usuario', array('url' => '/password_reset/verify_recover_key/' . $recover_key)) ?>
        <div class="mb-6 font-semibold">
          <?php echo $this->xForm->input('senha', array('type' => 'password', 'placeholder' => 'Digite uma senha', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500')) ?>
        </div>
        <div class="mb-6 font-semibold">
          <?php echo $this->xForm->input('confirma_senha', array('type' => 'password', 'placeholder' => 'Repita a senha', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500')) ?>
        </div>
        <button type="submit" class="w-full bg-blue-500 border font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Salvar Nova Senha</button>
      </form>
    </div>
  </div>
</div>
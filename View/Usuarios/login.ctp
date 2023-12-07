<div class="container flex justify-center mt-44">
    <div class="bg-white p-8 rounded shadow-md w-80">
        <h2 class="text-2xl font-semibold mb-4">Login</h2>
        <?php echo $this->xForm->create('UsuarioLogado', array('url' => '/usuarios/login')) ?>
        <div class="mb-6">
            <?php echo $this->xForm->input('email', array('placeholder' => 'Digite seu usuario', 'label' => 'Usuario', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500')); ?>
        </div>
        <div class="mb-6">
            <?php echo $this->xForm->input('senha', array('placeholder' => 'Digite sua senha', 'class' => 'w-full border-gray-300 border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500')); ?>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-black shadow-2xl bg-success font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Entrar</button>
        <?php echo $this->xForm->end() ?>
        <p class="mt-4 text-center">Não tem uma conta? <a href="<?php echo $this->Html->url('/usuarios/cadastrar') ?>" class="text-blue-500 hover:text-green hover:underline transition duration-300">Cadastre-se</a></p>
        <a href="<?php echo $this->Html->url('/password_reset') ?>" class="mt-4 text-center text-blue-500 hover:text-green hover:underline transition duration-300">Esqueci minha senha</a>
    </div>
</div>
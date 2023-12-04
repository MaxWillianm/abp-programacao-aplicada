<div class="container p-2 rounded-lg border border-black my-8 bg-[#dadbe3]" >
    <?php echo $this->xForm->create('Usuario', array('url' => '/usuarios/create_user')) ?>
    <?php if(!$add) echo $this->xForm->input('id', array('type' => 'hidden')); ?>
    <div class="font-bold">
        <?php echo $this->xForm->input('nome', array('type' => 'text', 'placeholder' => 'Digite seu nome', 'class' => 'font-mono m-2 border rounded-lg mx-4 font-normal')) ?>
    </div>
    <div class="font-bold">
        <?php echo $this->xForm->input('email',  array('type' => 'text', 'placeholder' => 'Digite sua email', 'class' => 'font-mono m-2 border rounded-lg mx-4 font-normal')) ?>
    </div>    
    <div class="font-bold">
        <?php echo $this->xForm->input('senha', array('type' => 'text', 'placeholder' => 'Digite sua senha', 'class' => 'font-mono m-2 border rounded-lg mx-4 font-normal')) ?>
    </div>
    <div class="font-bold">
        <?php echo $this->xForm->input('celular', array('type' => 'text', 'placeholder' => 'Digite seu nº de celular', 'class' => 'font-mono m-2 border rounded-lg mx-4 font-normal'))?> 
    </div>
    <div class="font-bold">
        <?php echo $this->xForm->input('nascimento', array('type' => 'text', 'placeholder' => 'Data de nascimento', 'class' => 'font-mono m-2 border rounded-lg mx-4 font-normal')) ?>
    </div>
    <div class="font-bold"> 
        <?php echo $this->xForm->input('sexo', array('type' => 'text', 'placeholder' => 'Digite seu sexo', 'class' => 'font-mono m-2 border rounded-lg mx-4 font-normal')) ?>
    </div> 
    <div class="flex w-full justify-center space-x-4 mb-2">
        <button class="p-1 border rounded-lg font-black bg-[#fc0f03]"type="submit">Enviar</button>
        <a class="p-1 border rounded-lg font-black bg-[#1cfc03]" href="<?php echo $this->Html->url('/usuarios') ?>">Voltar</a>
    </div>
    <?php echo $this->xForm->end() ?>
</div>
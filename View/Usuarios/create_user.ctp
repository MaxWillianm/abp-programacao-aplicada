<div class="border-black border-2">
    <?php echo $this->xForm->create('Usuario', array('url' => '/usuarios/create_user')) ?>
    <?php if(!$add) echo $this->xForm->input('id', array('type' => 'hidden')); ?>
    <?php echo $this->xForm->input('nome') ?>
    <?php echo $this->xForm->input('email') ?>
    <?php echo $this->xForm->input('senha', array('type' => 'senha', 'placeholder' => 'Senha', 'class' => 'mx-4')) ?>
    <?php echo $this->xForm->input('celular') ?>
    <?php echo $this->xForm->input('nascimento') ?>
    <?php echo $this->xForm->input('sexo') ?>
    <button type="submit">Enviar</button>
    <?php echo $this->xForm->end() ?>
</div>
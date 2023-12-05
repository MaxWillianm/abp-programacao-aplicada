<div class="page-header">
  <div class="pull-right btn-group">
    <a href="<?php echo $this->xHtml->url(array('action' => '/index')); ?>" class="btn btn-info">Listar Produtos</a>
  </div>
  <h2>Usuarios > <?php echo !$add ? "Editando" : "Adicionando"; ?></h2>
</div>

<?php echo $this->xForm->create('Usuario', array('type' => 'file')); ?>
  <fieldset>
    <?php
      if(!$add) {
        echo $this->xForm->input('id');
      }
      echo $this->xForm->input('nome', array('label' => 'Nome', 'class' => 'col-md-2', 'size' => 60));
      echo $this->xForm->input('email', array('type' => 'text', 'label' => 'E-mail', 'class' => 'col-md-2', 'size' => 60));
      echo $this->xForm->input('senha', array('type' => 'text', 'label' => 'Senha', 'class' => 'col-md-2', 'size' => 60));
      echo $this->xForm->input('celular', array('type' => 'text', 'label' => 'Celular', 'class' => 'col-md-2', 'size' => 60));
      echo $this->xForm->input('nascimento', array('type' => 'text', 'label' => 'Nascimento', 'class' => 'col-md-2', 'size' => 60));
      echo $this->xForm->input('sexo', array('type' => 'text', 'label' => 'Sexo', 'class' => 'col-md-2', 'size' => 60));
    ?>
    <div class="form-actions col-md-12 text-center">
      <?php echo $this->xForm->submit('Salvar Produto', array('class' => 'btn btn-lg btn-primary', 'id' => 'btnSave')); ?>
    </div>
  </fieldset>
<?php echo $this->xForm->end();?>
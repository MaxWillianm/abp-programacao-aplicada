<div class="page-header">
  <div class="pull-right btn-group"><a href="<?php echo $this->xHtml->url(array('action' => 'add')); ?>" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Novo Usuario</a></div>
  <h2>Usuarios</h2>
</div>
<div>
  <table class="table table-condensed table-bordered table-striped table-hover" cellpadding="0" cellspacing="0">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Celular</th>
        <th>nascimento</th>
        <th>Sexo</th>
        <th class="actions">Ações</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['Usuario']['nome']; ?></td>
            <td><?php echo $usuario['Usuario']['email']; ?></td>
            <td><?php echo $usuario['Usuario']['celular']; ?></td>
            <td><?php echo $usuario['Usuario']['nascimento']; ?></td>
            <td><?php echo $usuario['Usuario']['sexo']; ?></td>
            <td class="actions">
            <?php echo $this->xHtml->link(__('Edit'), array('action' => 'edit', $usuario['Usuario']['id'])); ?>
            <?php echo $this->xHtml->link(__('Delete'), array('action' => 'delete', $usuario['Usuario']['id'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
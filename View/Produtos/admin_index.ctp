<div class="page-header">
  <div class="pull-right btn-group"><a href="<?php echo $this->xHtml->url(array('action' => 'add')); ?>" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i>Novo Produto</a></div>
  <h2>Produto</h2>
</div>
<div>
  <table class="table table-condensed table-bordered table-striped table-hover" cellpadding="0" cellspacing="0">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Valor</th>
        <th>Descrição</th>
        <th class="actions">Ações</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?php echo $produto['Produto']['nome']; ?></td>
            <td><?php echo $produto['Produto']['valor']; ?></td>
            <td><?php echo $produto['Produto']['descricao']; ?></td>
            <td class="actions">
            <?php echo $this->xHtml->link(__('Edit'), array('action' => 'edit', $produto['Produto']['id'])); ?>
            <?php echo $this->xHtml->link(__('Delete'), array('action' => 'delete', $produto['Produto']['id'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php echo $this->element('pagination'); ?>
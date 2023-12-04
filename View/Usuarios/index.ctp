<div>
    <?php foreach($usuarios as $usuario) { ?>
        <div class="border border-black my-8">
            <p>Nome: <?php echo $usuario['Usuario']['nome'] ?></p>
            <p>Email: <?php echo $usuario['Usuario']['email'] ?></p>
            <p>Celular: <?php echo $usuario['Usuario']['celular'] ?></p>
            <p>Nascimento: <?php echo $usuario['Usuario']['nascimento'] ?></p>
            <p>Sexo: <?php echo $usuario['Usuario']['sexo'] ?></p>
            <a href="<?php echo $this->Html->url('/usuarios/delete_user/' . $usuario['Usuario']['id']) ?>">Deletar</a>
            <a href="<?php echo $this->Html->url('/usuarios/edit_user/' . $usuario['Usuario']['id']) ?>">Editar</a>
        </div>
    <?php } ?>
</div>
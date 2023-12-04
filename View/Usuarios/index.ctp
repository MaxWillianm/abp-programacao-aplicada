<div>
    <?php foreach($usuarios as $usuario) { ?>
<<<<<<< HEAD
        <div class="container p-2 rounded-lg border border-black my-8 bg-[#dadbe3]">
            <p> <span class=" font-bold"> Nome: </span> <?php echo $usuario['Usuario']['nome'] ?></p>
            <p> <span class=" font-bold"> Email: </span> <?php echo $usuario['Usuario']['email'] ?></p>
            <p> <span class=" font-bold">Celular: </span> <?php echo $usuario['Usuario']['celular'] ?></p>
            <p> <span class=" font-bold">Nascimento: </span> <?php echo $usuario['Usuario']['nascimento'] ?></p>
            <p> <span class=" font-bold">Sexo: </span> <?php echo $usuario['Usuario']['sexo'] ?></p>
            <div class="flex w-full justify-center space-x-4 mb-2 ">
                <a class="p-1 border rounded-lg font-extrabold bg-[#fc0f03]" href="<?php echo $this->Html->url('/usuarios/delete_user/' . $usuario['Usuario']['id']) ?>">Deletar</a>
                <a class="p-1 border rounded-lg font-extrabold bg-[#0314fc]" href="<?php echo $this->Html->url('/usuarios/edit_user/' . $usuario['Usuario']['id']) ?>">Editar</a>
                <a class="p-1 border rounded-lg font-extrabold bg-[#1cfc03]" href="<?php echo $this->Html->url('/usuarios/create_user/') ?>">Adicionar</a>
            </div>
=======
        <div class="border container border-black my-8">
            <p>Nome: <?php echo $usuario['Usuario']['nome'] ?></p>
            <p>Email: <?php echo $usuario['Usuario']['email'] ?></p>
            <p>Celular: <?php echo $usuario['Usuario']['celular'] ?></p>
            <p>Nascimento: <?php echo $usuario['Usuario']['nascimento'] ?></p>
            <p>Sexo: <?php echo $usuario['Usuario']['sexo'] ?></p>
            <a href="<?php echo $this->Html->url('/usuarios/delete_user/' . $usuario['Usuario']['id']) ?>">Deletar</a>
            <a href="<?php echo $this->Html->url('/usuarios/edit_user/' . $usuario['Usuario']['id']) ?>">Editar</a>
>>>>>>> 5ef38173baac4cdc74979bba481b30bc561084e8
        </div>
    <?php } ?>
</div>
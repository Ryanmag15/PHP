<?php

require_once '../ProjetoGalaxy/actions.php';

if (isset($_POST["id"], $_POST["name"]))

    updateUserAction($_POST["id"], $_POST["name"]);

?>

<div class="container">
    <div class="row">
        <a href="../ProjetoGalaxy/index.php">
            <h1>Users - Edit</h1>
        </a>
        <a class="btn btn-success text-white" href="../ProjetoGalaxy/index.php">Voltar para Listagem</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="" method="POST">
                <label>Quer trocar o nome do ID <?= $_GET['id'] ?></label>
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>" required />
                <label>Novo Nome</label>
                <input type="text" name="name" value="nome" required />
                <button class="btn btn-success text-white" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
<?php

require_once '../ProjetoGalaxy/actions.php';


if(isset($_POST['id']))
    deleteUserAction($_POST['id']);
?>

<div class="container">
    <div class="row">
        <a href="../ProjetoGalaxy/index.php"><h1>Users - Delete</h1></a>
        <a class="btn btn-success text-white" href="../ProjetoGalaxy/index.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="" method="POST">
                <label>Quer deletar o ID  <?=$_GET['id']?></label>
                <input type="hidden" name="id" value="<?=$_GET['id']?>" required/>
                <button class="btn btn-success text-white" type="submit">Yes</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once '../ProjetoGalaxy/actions.php';

if (isset($_POST["name"]))
    createUserAction($_POST["name"]);
?>
<div class="container">
    <div class="row">
        <a href="./"><h1>Users - Create</h1></a>
        <a class="btn btn-success text-white" href="../ProjetoGalaxy/">Voltar Listagem</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="" method="POST">
                <label>Name</label>
                <input type="text" name="name" required/>
                <button class="btn btn-success text-white" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>

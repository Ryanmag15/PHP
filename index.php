<?php
require_once '../ProjetoGalaxy/actions.php';

?>
<div class="container">
    <div class="row">
        <a>
            <h1>Clientes</h1>
        </a>
        <a class="btn btn-success text-white" href="./create.php">New</a>
    </div>
    <div class="row flex-center">
        <?php if (isset($_GET['message'])) echo (($_GET['message'])); ?>
    </div>

    <table class="table-users">
        <tr>
            <th>#</th>
            <th>NAME</th>
        </tr>
        <?php $users    =  getClientes(); ?>
        <?php foreach ($users as $row) : ?>
            <tr>
                <td class="user-id"><?= htmlspecialchars($row['galaxPayId']) ?></td>
                <td class="user-name"><?= htmlspecialchars($row['name']) ?></td>
                <td>
                    <a class="btn btn-primary text-white" href="./edit.php?id=<?= $row['galaxPayId'] ?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger text-white" href="./delete.php?id=<?= $row['galaxPayId'] ?>">Remover</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
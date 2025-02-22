<?php
session_start();
require("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check</title>
</head>

<body>

 <?php

    if (isset($_GET['id'])) {
        $check_id = mysqli_real_escape_string($mysqli, $_GET['id']);
        $query = "SELECT * from tbl_checkbox WHERE id='$check_id'";
        $results = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($results) > 0) {
            $usuario = mysqli_fetch_array($results);
    ?>

    <form action="create.php" method="post">
        <fieldset>
            <legend>Edit</legend>
            <p>ID: <?= $usuario['id'] ?></p>

            <input type="hidden" name="check_id" id="check_id" value="<?= $usuario['id'] ?>">

            <div>
                <p>Programmer: <?= $usuario['check1'] ?></p>
                <input type="checkbox" name="programmer" value="s" <?= $usuario['check1'] == 's' ? 'checked' : '' ?> class="btn">
                <label>Are you a Programmer?</label>
            </div><br />

            <div>
                <p>Doctor: <?= $usuario['check2'] ?></p>
                <input type="checkbox" name="doctor" value="s" <?= $usuario['check2'] == 's' ? 'checked' : '' ?> class="btn">
                <label>Are you a Doctor?</label>
            </div><br />

            <div>
                <p>Nurse: <?= $usuario['check3'] ?></p>
                <input type="checkbox" name="nurse" value="s" <?= $usuario['check3'] == 's' ? 'checked' : '' ?> class="btn">
                <label>Are you a Nurse?</label>
            </div><br />

            <input type="submit" name="edit" value="Editar">
            <a href="read.php">View</a>
        </fieldset>
    </form><br />

    <?php
        } else {
            echo 'Cadastro não encontrado';
        }
    }
    ?>
</body>

</html>

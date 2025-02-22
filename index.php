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

    <form action="create.php" method="post">
        <fieldset>
            <legend>Create</legend>

            <div>
                <input type="checkbox" name="programmer" value="s">
                <label>Are you a Programmer?</label>
            </div><br />

            <div>
                <input type="checkbox" name="doctor" value="s">
                <label>Are you a Doctor?</label>
            </div><br />

            <div>
                <input type="checkbox" name="nurse" value="s">
                <label>Are you a Nurse?</label>
            </div><br />

            <input type="submit" name="create_cadastro" value="Create">
            <a href="read.php">view</a>
        </fieldset>
    </form><br />




    <div>
        <div>
            <table border='1'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Checkbox 1</th>
                        <th>Checkbox 2</th>
                        <th>Checkbox 3</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- Mostrando cadastros - SELECT -->
                    <?php
                    $query = "SELECT * from tbl_checkbox";
                    $results = mysqli_query($mysqli, $query);
                    if (mysqli_num_rows($results) > 0) {
                        foreach ($results as $results) {

                    ?>
                            <div>
                                <tr>
                                    <td><?= $results['id'] ?></td>
                                    <td><?= $results['check1'] ?></td>
                                    <td><?= $results['check2'] ?></td>
                                    <td><?= $results['check3'] ?></td>
                                    <td style="display: flex;">
                                        <a href="edit.php?id=<?= $results['id'] ?>" class="btn">
                                            <p>Editar</p>
                                        </a>
                                        <form action="create.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_check" value="<?= $results['id'] ?>" class="btn">
                                                <p>DEletar</p>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            </div>
                    <?php
                        }
                    } else {
                        echo "Nenhum cadastro encontrado.";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
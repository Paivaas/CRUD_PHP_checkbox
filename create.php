<?php
session_start();
require("conexao.php");

// Inserindo
if (isset($_POST['create_cadastro'])) {
    
    $programmer = isset($_POST['programmer']) ? "s" : "n";
    $doctor = isset($_POST['doctor']) ? "s" : "n";
    $nurse = isset($_POST['nurse']) ? "s" : "n";

    echo "Programmer: $programmer <br>";
    echo "Doctor: $doctor <br>";
    echo "Nurse: $nurse <br>";

    $query = "INSERT INTO tbl_checkbox (check1, check2, check3) VALUES (?, ?, ?)";
    $statement = $mysqli->prepare($query);
    if ($statement === false) {
        die('Error preparing statement: ' . $mysqli->error);
    }

    $statement->bind_param("sss", $programmer, $doctor, $nurse);
    if ($statement->execute()) {
        echo "Cadastro feito";
    } else {
        echo "Erro: " . $statement->error;
    }
    $statement->close();

    // Redirecionamento só ocorre se não houver saída antes
    header('Location: index.php');
    exit();
}

// Alterando informações do cadastro escolhido - UPDATE
if (isset($_POST['edit'])) {

    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['usuario_id']);
    if (empty($usuario_id)) {
        die('ID não encontrado');
    }

    $programmer = isset($_POST['programmer']) ? "s" : "n";
    $doctor = isset($_POST['doctor']) ? "s" : "n";
    $nurse = isset($_POST['nurse']) ? "s" : "n";

    echo "Programmer: $programmer <br>";
    echo "Doctor: $doctor <br>";
    echo "Nurse: $nurse <br>";
    
    $query = "UPDATE tbl_checkbox SET check1 = ?, check2 = ?, check3 = ? WHERE id = ?";
    $statement = $mysqli->prepare($query);

    $statement->bind_param("sssi", $programmer, $doctor, $nurse, $usuario_id);
    if ($statement->execute()) {
        echo "Cadastro alterado";
    } else {
        echo "Erro: " . $statement->error;
    }
    $statement->close();

    header('Location: index.php');
    exit();
}

// Deletando
if (isset($_POST['delete_check'])) {

    $usuario_id = mysqli_real_escape_string($mysqli, $_POST['delete_check']);
    if (empty($usuario_id)) {
        die('ID não encontrado');
    }

    $query = "DELETE FROM tbl_checkbox WHERE id = ?";
    $statement = $mysqli->prepare($query);
    if ($statement === false) {
        die('Error preparing statement: ' . $mysqli->error);
    }

    $statement->bind_param("i", $usuario_id);
    if ($statement->execute()) {
        echo "Cadastro excluído";
    } else {
        echo "Erro: " . $statement->error;
    }
    $statement->close();

    header('Location: index.php');
    exit();
}
?>

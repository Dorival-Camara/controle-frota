<?php

session_start();
include("../database/conexao.php");

if (!isset($_POST['email'])) {
    header("Location: ../view/index.php");
    exit;
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE email_usuario = '$email'";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 1) {

    $usuario = mysqli_fetch_assoc($resultado);

    if (password_verify($senha, $usuario['senha_usuario'])) {

        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
        $_SESSION['perfil'] = $usuario['perfil'];

        if ($usuario['perfil'] == "Administrador") {
            header("Location: ../view/admin/dashboard.php");
        } else {
            header("Location: ../view/cliente/voos.php");
        }
        exit;
    }
}

$_SESSION['erro_login'] = "E-mail ou senha incorretos.";
header("Location: ../view/index.php");
exit;
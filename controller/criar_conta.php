<?php

session_start();
include("../database/conexao.php");

if (!isset($_POST['email'])) {
    header("Location: ../view/criar_conta.php");
    exit;
}

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];

if ($senha != $confirmar_senha) {
    $_SESSION['erro_cadastro'] = "As senhas não são iguais.";
    header("Location: ../view/criar_conta.php");
    exit;
}

$sql = "SELECT id_usuario FROM usuario WHERE email_usuario = '$email'";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $_SESSION['erro_cadastro'] = "Este e-mail já está cadastrado.";
    header("Location: ../view/criar_conta.php");
    exit;
}

$senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario, perfil)
        VALUES ('$nome', '$email', '$senha_criptografada', 'Cliente')";
mysqli_query($conexao, $sql);

$_SESSION['id_usuario'] = mysqli_insert_id($conexao);
$_SESSION['nome_usuario'] = $nome;
$_SESSION['perfil'] = "Cliente";

header("Location: ../view/cliente/voos.php");
exit;
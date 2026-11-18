<?php

session_start();
include("../database/conexao.php");

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] != "Administrador") {
    header("Location: ../view/index.php");
    exit;
}

if (isset($_GET['excluir'])) {

    $id = intval($_GET['excluir']);

    $sql = "SELECT id_avioes FROM avioes WHERE id_categoria = $id";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['erro'] = "Não dá para excluir: existem aviões nesta categoria.";
    } else {
        $sql = "DELETE FROM categoria WHERE id_categoria = $id";
        mysqli_query($conexao, $sql);
        $_SESSION['mensagem'] = "Categoria excluída.";
    }

    header("Location: ../view/admin/categorias.php");
    exit;
}

$id = $_POST['id'];
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

if ($id == "") {

    $sql = "INSERT INTO categoria (nome_categoria, descricao_categoria)
            VALUES ('$nome', '$descricao')";
    mysqli_query($conexao, $sql);
    $_SESSION['mensagem'] = "Categoria cadastrada.";

} else {

    $id = intval($id);
    $sql = "UPDATE categoria
            SET nome_categoria = '$nome', descricao_categoria = '$descricao'
            WHERE id_categoria = $id";
    mysqli_query($conexao, $sql);
    $_SESSION['mensagem'] = "Categoria atualizada.";

}

header("Location: ../view/admin/categorias.php");
exit;
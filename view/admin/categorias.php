<?php

$perfil_pagina = "Administrador";
$titulo_pagina = "Categorias";
include("../../includes/verificar_login.php");
include("../../database/conexao.php");

$mensagem = "";
if (isset($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}

$erro = "";
if (isset($_SESSION['erro'])) {
    $erro = $_SESSION['erro'];
    unset($_SESSION['erro']);
}

$sql = "SELECT * FROM categoria ORDER BY nome_categoria";
$resultado = mysqli_query($conexao, $sql);

include("../../includes/header.php");

?>

<div class="cabecalho_lista">
    <h1 class="titulo_pagina">Categorias</h1>
    <a href="categoria_form.php" class="botao_novo">Nova categoria</a>
</div>

<?php if ($mensagem != "") { ?>
    <div class="aviso_sucesso"><?php echo $mensagem; ?></div>
<?php } ?>

<?php if ($erro != "") { ?>
    <div class="aviso_erro"><?php echo $erro; ?></div>
<?php } ?>

<table class="tabela">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>

    <?php if (mysqli_num_rows($resultado) == 0) { ?>
        <tr>
            <td colspan="3">Nenhuma categoria cadastrada.</td>
        </tr>
    <?php } ?>

    <?php while ($categoria = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo htmlspecialchars($categoria['nome_categoria']); ?></td>
            <td><?php echo htmlspecialchars($categoria['descricao_categoria'] ?? ""); ?></td>
            <td class="acoes">
                <a href="categoria_form.php?id=<?php echo $categoria['id_categoria']; ?>" class="link_editar">Editar</a>
                <a href="../../controller/categoria.php?excluir=<?php echo $categoria['id_categoria']; ?>" class="link_excluir" onclick="return confirm('Excluir esta categoria?')">Excluir</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php include("../../includes/footer.php"); ?>
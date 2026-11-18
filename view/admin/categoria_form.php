<?php

$perfil_pagina = "Administrador";
$titulo_pagina = "Categoria";
include("../../includes/verificar_login.php");
include("../../database/conexao.php");

$id = "";
$nome = "";
$descricao = "";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM categoria WHERE id_categoria = $id";
    $resultado = mysqli_query($conexao, $sql);
    $categoria = mysqli_fetch_assoc($resultado);

    $nome = $categoria['nome_categoria'];
    $descricao = $categoria['descricao_categoria'] ?? "";
}

include("../../includes/header.php");

?>

<?php if ($id == "") { ?>
    <h1 class="titulo_pagina">Nova categoria</h1>
<?php } else { ?>
    <h1 class="titulo_pagina">Editar categoria</h1>
<?php } ?>

<form action="../../controller/categoria.php" method="POST" class="formulario">

    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="grupo_campo">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="campo" maxlength="100" value="<?php echo htmlspecialchars($nome); ?>" required>
    </div>

    <div class="grupo_campo">
        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" class="campo" maxlength="255" value="<?php echo htmlspecialchars($descricao); ?>">
    </div>

    <div class="botoes_formulario">
        <button type="submit" class="botao_salvar">Salvar</button>
        <a href="categorias.php" class="link_voltar">Voltar</a>
    </div>

</form>

<?php include("../../includes/footer.php"); ?>
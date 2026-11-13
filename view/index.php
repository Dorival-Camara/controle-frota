<?php

session_start();

$erro = "";
if(isset($_SESSION['erro_login'])) {
    $erro = $_SESSION['erro_login'];
    unset($_SESSION['erro_login']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login  Jaci Celeste</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="fundo_login">

        <div class="caixa_login">

            <h1 class="titulo_login">Jaci Celeste</h1>

            <?php if ($erro != "") { ?>
                <div class="aviso_erro">
                    <?php echo htmlspecialchars($erro); ?>
                </div>
            <?php } ?>

            <form action="../controller/auth.php" method="POST">

                <div class="grupo_campo">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="campo" required>
                </div>

                <div class="grupo_campo">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" class="campo" required>
                </div>

                <button type="submit" class="botao_entrar">Entrar</button>

            </form>

        </div>

    </div>

</body>
</html>

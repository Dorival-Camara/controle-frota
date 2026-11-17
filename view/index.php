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
<body style="background-image: url('../img/entrar.png'); 
  background-repeat: no-repeat;
  background-position: left center;
  background-size: contain;
  min-height: 100vh;
  margin: 0;">


    <h1 class="titulo_entrar">Sua próxima história começa a bordo.</h1>
    <h3 class="subtitulo_entrar">Viaje pelo Brasil com mais conforto, leveza e liberdade para escolher o seu destino.</h3>


    <div class="fundo_login">

        <div class="caixa_login">

            <h1 class="titulo_login">Entre na sua conta</h1>
            <h3 class="subtitulo_login">Acesse sua conta e prepare-se para o próximo destino.</h3>

            <?php if ($erro != "") { ?>
                <div class="aviso_erro">
                    <?php echo htmlspecialchars($erro); ?>
                </div>
            <?php } ?>

            <form action="../controller/auth.php" method="POST">

                <div class="grupo_campo">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="campo" placeholder="voce@gmail.com" required>
                </div>

                <div class="grupo_campo">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" class="campo" placeholder="Digite sua senha" required>
                </div>

                <button type="submit" class="botao_entrar">Entrar</button>


                <h3 class="titulo_criar">Ainda não tem conta?</h3>

                <div type="submit" class="criar_conta"> Criar conta </div>

            </form>

        </div>

    </div>

</body>
</html>

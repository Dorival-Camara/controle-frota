<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo_pagina; ?>  Jaci Celeste</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body class="pagina_sistema">

<header class="topo">

    <div class="logo_sistema">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 7a5 5 0 1 0 5 5 4 4 0 0 1-5-5z"/>
        </svg>
        <span>Jaci Celeste</span>
    </div>

    <nav class="menu">
        <?php if ($_SESSION['perfil'] == "Administrador") { ?>
            <a href="dashboard.php">Início</a>
            <a href="categorias.php">Categorias</a>
            <a href="aeroportos.php">Aeroportos</a>
            <a href="avioes.php">Aviões</a>
            <a href="manutencoes.php">Manutenções</a>
            <a href="voos.php">Voos</a>
        <?php } else { ?>
            <a href="voos.php">Voos</a>
            <a href="minhas_passagens.php">Minhas passagens</a>
        <?php } ?>
    </nav>

    <div class="usuario_topo">
        <span>Olá, <?php echo htmlspecialchars($_SESSION['nome_usuario']); ?></span>
        <a href="../../controller/logout.php">Sair</a>
    </div>

</header>

<main class="conteudo">
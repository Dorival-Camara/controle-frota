<?php

$perfil_pagina = "Cliente";
include("../../includes/verificar_login.php");

echo "Cliente logado: " . $_SESSION['nome_usuario'];
?>
<br><a href="../../controller/logout.php">Sair</a>
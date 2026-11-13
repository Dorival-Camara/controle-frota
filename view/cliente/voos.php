<?php

session_start();
echo "Cliente logado: " . $_SESSION['nome_usuario'];
?>
<br><a href="../../controller/logout.php">Sair</a>
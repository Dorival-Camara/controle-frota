<?php

session_start();

if(!isset($_SESSION['id_usuario'])){

    header("Location: ../index.php");
    exit;

}

if($_SESSION['perfil'] != $perfil_pagina){
    if($_SESSION['perfil'] == "Administrador"){
        header("Location: ../admin/dashboard.php");

    }
    else{
        header("Location: ../cliente/voos.php");
    }
    exit;

}

?>
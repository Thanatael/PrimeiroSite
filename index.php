<?php

    if($_GET && isset($_GET["pagina"])){
        $paginaUrl = $_GET["pagina"];
    }else{
        $paginaUrl = null;
    }

    include_once("header.php");
        if($paginaUrl === "principal"){
            include_once("principal.php");
        }
        elseif($paginaUrl === "contato"){
            include_once("contato.php");
        }
        elseif($paginaUrl === "login"){
            include_once("login.php");
        }
        elseif($paginaUrl === "cadastro"){
            include_once("cadastro.php");
        }
        else{
            include_once("404.php");
        }
?>
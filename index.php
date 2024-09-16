<?php

include_once("configuracao.php");
include_once("funcoes.php");
timeZone();
$data = dataAtual();

if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
  }else{
    $paginaUrl = null;
  }
  
  include_once("header.php");
    if($paginaUrl === "contato"){
      include_once("contato.php");
    }elseif($paginaUrl === "login"){
      include_once("login.php");
    }elseif($paginaUrl === "cadastro"){
      include_once("cadastro.php");
    }else{
      include_once("principal.php");
    }
  
  include_once("footer.php");
  ?>
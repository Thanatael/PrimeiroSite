<?php

$nome = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['nome'])) ? $_POST['nome'] : null;

$sobrenome = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['sobrenome'])) ? $_POST['sobrenome'] : null;

$email = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['email'])) ? $_POST['email'] : null;

$peso = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['peso'])) ? $_POST['peso'] : null;

$altura = ($_SERVER["REQUEST_METHOD"] == "POST"
 && !empty($_POST['altura'])) ? $_POST['altura'] : null;

$telefone = ($_SERVER["REQUEST_METHOD"] == "POST"
 && !empty($_POST['telefone'])) ? $_POST['telefone'] : null;

$msg = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['msg'])) ? $_POST['msg'] : null;

$titulo = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['titulo'])) ? $_POST['titulo'] : null;

$descricaocurta = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['descricaocurta'])) ? $_POST['descricaocurta'] : null;

$imagem = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['imagem'])) ? $_POST['imagem'] : null;

$href = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['href'])) ? $_POST['href'] : null;

$descricao = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['descricao'])) ? $_POST['descricao'] : null;

 $resposta = 0;

 include_once("configuracao.php");
 include_once("configuracao/conexao.php");
 include_once("funcoes.php");

 $resposta = round(calcularImc($peso, $altura));
 $classificacao = classificarImc($resposta);
 
 timeZone();
 $data = dataAtual();
 $tituloDoSite = "BEM VINDO A INFOSPORTS!";
 $subTituloDoSite = "Aqui é onde você encontra todos os itens mais novos e modernos do seu esporte
 preferido. <br>".$data;
 
 if($_GET && isset($_GET['pagina'])){
   $paginaUrl = $_GET['pagina'];
 }else{
   $paginaUrl = null;
 }
 
 
if($paginaUrl === "principal"){
  if($peso !== null && $altura !== null){
  cadastrar($nome, $email, $peso, $altura, $resposta, $classificacao);
  }
}elseif($paginaUrl === "cadastro"){
  if($telefone !== null){
  registro($nome, $email, $telefone);
  }
}elseif($paginaUrl === "contato"){
  if($msg !== null){
  contato($nome,$sobrenome,$email,$telefone,$msg);
  }
}elseif($paginaUrl === "noticia"){
  if($descricao !== null){
  noticia($titulo,$descricaocurta,$imagem,$href,$descricao);
  }
}

include_once("header.php");
  if($paginaUrl === "principal"){
    include_once("principal.php");
  }elseif($paginaUrl === "contato"){
    include_once("contato.php");
  }elseif($paginaUrl === "login"){
    include_once("login.php");
  }elseif($paginaUrl === "cadastro"){
    include_once("cadastro.php");
  }elseif($paginaUrl === "noticia"){
    include_once("noticia.php");
  }elseif($paginaUrl === "paginas"){
    include_once("paginas.php");
  }else{
    echo "404 Página não existe!";
  }

include_once("footer.php");
?>
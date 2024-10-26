<?php
 include_once("configuracao.php");
 include_once("configuracao/conexao.php");
 include_once("funcoes.php");

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

$login = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['login'])) ? $_POST['login'] : null;

$senha = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty(criptografia($_POST['senha']))) ? criptografia($_POST['senha']) : null;

 $resposta = 0;

 $resposta = round(calcularImc($peso, $altura));
 $classificacao = classificarImc($resposta);
 
 $noticia = null;

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
  resetPost();
  cadastrar($nome, $email, $peso, $altura, $resposta, $classificacao);
  }
}elseif($paginaUrl === "cadastro"){
  if($telefone !== null && $senha !== null){
    resetPost();
    $usuarioCriado = verificarEmail($email,$senha);
    if($usuarioCriado){
      menssagem("exist");
    }else{
      registro($nome, $email, $telefone, $login, $senha);
      header('Location:'.constant("URL_LOCAL_SITE_PAGINA_SUCE"));
    }
  }
}elseif($paginaUrl === "contato"){
  if($msg !== null){
  contato($nome,$sobrenome,$email,$telefone,$msg);
  }
}elseif($paginaUrl === "noticia"){
  if($descricao !== null){
  resetPost();
  noticia($titulo,$descricaocurta,$imagem,$href,$descricao);
  }
}elseif($paginaUrl === "login") {
  if ($email !== null && $senha !== null) {
      $usuarioCadastrado = verificarLogin($email, $senha);
        if ($usuarioCadastrado && validaSenha($senha, $usuarioCadastrado['senha'])) {
          registrarDadosUsuario($usuarioCadastrado);
          butaosair();
      }
  }
}elseif($paginaUrl === "detalhe"){
  if($_GET && isset($_GET['id'])){
    $idNoticia = $_GET['id'];
  }else{
    $idNoticia = 0;
  }
  $noticia = buscarNoticiaPorId($idNoticia);
}elseif ($paginaUrl === "sair") {
  limparSessao();
}

include_once("header.php");
if($paginaUrl === "principal"){
  include_once("principal.php");
}elseif($paginaUrl === "contato"){
    protegerTela();
    include_once("contato.php");
  }elseif($paginaUrl === "login"){
    protegerLogin();
    include_once("login.php");
  }elseif($paginaUrl === "cadastro"){
    include_once("cadastro.php");
  }elseif($paginaUrl === "noticia"){
    protegerTela();
    include_once("noticia.php");
  }elseif($paginaUrl === "sucesso"){
    include_once("sucesso.php");
  }elseif($paginaUrl === "detalhe"){
    include_once("detalhe.php");
  }elseif($paginaUrl === "perfil"){
    include_once("perfil.php");
  }else{
    $paginaUrl = "404";
    include_once("404.php");
  }
  
  include_once("footer.php");
  ?>
 
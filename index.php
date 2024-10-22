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
  resetPost();
  registro($nome, $email, $telefone, $login, $senha);
  }
}elseif($paginaUrl === "contato"){
  if($msg !== null){
  contato($nome,$sobrenome,$email,$telefone,$msg);
  }
}elseif($paginaUrl === "noticia"){
  if($descricao !== null){
  noticia($titulo,$descricaocurta,$imagem,$href,$descricao);
  }
}elseif($paginaUrl === "login") {
  if ($login !== null && $senha !== null) {
      $usuarioCadastrado = verificarLogin($login);
      if ($usuarioCadastrado && validaSenha($senha, $usuarioCadastrado['senha'])) {
          registrarAcessoValido($usuarioCadastrado);
          butaosair();
      }
  }
} elseif ($paginaUrl === "sair") {
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
  }else{
    echo "404 Página não existe!";
  }
  
  include_once("footer.php");
  ?>
 
 // if($paginaUrl === "principal"){
  //   cadastrar($nome,$email,$peso,$altura,$resposta,$classificacao);
  // }elseif($paginaUrl === "registro"){
  //   cadastrarRegistro($nome, $email, $telefone,$login,$senha);
  // }elseif($paginaUrl === "contato"){
  //   cadastrarContato($nome,$sobrenome,$email,$telefone,$mensagem);
  // }elseif($paginaUrl === "noticia"){
  //   cadastrarNoticia($titulo,$imagem,$descricao);
  // }elseif($paginaUrl === "login"){
  //   $usuarioCadastrado = verificarLogin($login);
  //   if(
  //     $usuarioCadastrado &&
  //     validaSenha($senha, $usuarioCadastrado['senha'])
  //   ){
  //       $_SESSION["usuario"]["nome"] = $usuarioCadastrado['nome'];
  //       $_SESSION["usuario"]["id"] = $usuarioCadastrado['id'];
  //       $_SESSION["usuario"]["status"] = 'logado';
  //       registrarAcessoValido($usuarioCadastrado);
  //   }
  // // var_dump($_SESSION["usuario"]["status"]);die;
  // }
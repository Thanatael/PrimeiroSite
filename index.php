<?php
 include_once("./system/configuracao.php");
 include_once("./configuracao/conexao.php");
 include_once("funcoes.php");
 include_once("model/acesso_model.php");

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

$mensagem = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['mensagem'])) ? $_POST['mensagem'] : null;

$titulo = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['titulo'])) ? $_POST['titulo'] : null;

$imagem = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['fileToUpload'])) ? $_POST['fileToUpload'] : null;

$categoria = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['categoria'])) ? $_POST['categoria'] : null;

$descricao = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['descricao'])) ? $_POST['descricao'] : null;

$login = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['login'])) ? $_POST['login'] : null;

@$senha = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty(criptografia($_POST['senha']))) ? criptografia($_POST['senha']) : null;

$nomeCategoria = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['nomeCategoria'])) ? $_POST['nomeCategoria'] : null;

$pesquisa = ($_SERVER["REQUEST_METHOD"] == "POST"
&& !empty($_POST['pesquisa'])) ? $_POST['pesquisa'] : null;

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
}elseif($paginaUrl === "contato"){
  if($mensagem !== null){
  contato($nome,$sobrenome,$email,$telefone,$mensagem);
  header('Location:'.constant("URL_LOCAL_SITE_PAGINA_PRIN"));
  }
}elseif($paginaUrl === "noticia"){
  if($descricao !== null){
  $nomedaImagem = upload($imagem);

  noticia($titulo,$nomedaImagem,$categoria,$descricao);
  header('Location:'.constant("URL_LOCAL_SITE_PAGINA_PRIN"));
  }
}elseif($paginaUrl === "login") {
  if ($email !== null && $senha !== null) {
        $usuarioCadastrado = acesso::verificarLogin($email);
        if ($usuarioCadastrado && acesso::validaSenha($senha, $usuarioCadastrado['senha'])) {
          acesso::registrarAcessoValido($usuarioCadastrado);
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
}elseif($paginaUrl === "cadastrar-categoria"){
    if(!verificarCategoriaDuplicada($nomeCategoria)){
      cadastrarCategoria($nomeCategoria);
    }
}elseif($paginaUrl === "pesquisa"){
  if($pesquisa !== null){
  pesquisar($pesquisa);
  }
}
elseif ($paginaUrl === "sair") {
  acesso::limparSessao();
}


include_once("./system/header.php");
if($paginaUrl === "principal"){
  include_once("view/principal.php");

}elseif($paginaUrl === "contato"){
  acesso::protegerTela();
  include_once("view/contato.php");

}elseif($paginaUrl === "login"){
  protegerLogin();
  include_once("view/login.php");

}elseif($paginaUrl === "cadastro"){
  include_once("model/registro_model.php");
  include_once("controller/registro_controller.php");

}elseif($paginaUrl === "noticia"){
  acesso::protegerTela();
  include_once("view/noticia.php");

}elseif($paginaUrl === "sucesso"){
  include_once("view/sucesso.php");

}elseif($paginaUrl === "detalhe"){
  include_once("view/detalhe.php");

}elseif($paginaUrl === "perfil"){
  include_once("view/perfil.php");

}elseif($paginaUrl === "cadastrar-categoria"){
  acesso::protegerTela();
  include_once("view/categoria.php");

}elseif($paginaUrl === "pesquisa"){
  include_once("view/pesquisa.php");

}else{
  $paginaUrl = "404";
  include_once("./system/404.php");
}

  include_once("./system/footer.php");
  ?>
 
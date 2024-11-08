<?php

/**
 * TimeZone
 * Retorna o fuso horario local
 * que definira a hora e a data
 */
function timeZone(){
    date_default_timezone_set("America/Recife");
}
/**
 * DataAtual
 * Retorna a data atualizada
 */
function dataAtual(){
    return date("d/m/Y"); 
}
/**
 * horaAtual
 * Retorna a hora atualizada
 */
function horaAtual(){
    return date("h:i:sa");
}

/**
 * @param $texto
 * É o texto que será manupulado
 * Retorna Texto maiúsculo
 */
function textoMaiusculo($texto){
    if($texto){
        return strtoupper($texto);
    }
}
/**
 * @param $texto
 * É o texto que será manupulado
 * @param  $tipo
 * É o Número que indica o tipo de 
 * manipulação da string
 * Tipos:
 * 1 - Quantidade de caracters de um texto
 * 2 - Quantidade de palavras de um texto
 * 3 - Busca Posição da palavra na string
 */
function contar($texto, $tipo){
    if($texto && $tipo === 1){
        return strlen($texto);
    }
    if($texto && $tipo === 2){
        return str_word_count($texto);
    }
    if($texto && $tipo === 3){
        return strpos($texto, "Diogo");
    }
    return false;
}

/**
 * ReduzirStr
 * Reduzir o tamanho de um texto
 * @param $str que representa o texto a ser reduzido
 * @param $quantidade que reprenta quantos caracters vão ser exibidos
 */
function reduzirStr($str,$quantidade){
    $tamanho = strlen($str);
    if($str && $tamanho >= $quantidade){
      return substr($str,0,$quantidade)." [...]";
    }else{
        return $str;
    }
  }

  /**
   * CriarLista
   * Popula as informações exibidas na tela principal
   */

function criarLista() {
    $noticias = buscarNoticias();
    $listaNoticia = [];

    foreach ($noticias as $noticia) {
        $listaNoticia[] = [
            "id" => $noticia['id'],
            "titulo" => $noticia['titulo'],
            "descricao" => $noticia['descricaocurta'],
            "imagem" => $noticia['imagem'],
            "categoria" => $noticia['categoria']
        ];
    }

    return $listaNoticia;
}

  function buscarNoticias() {
    $sql = "SELECT  id, titulo, descricaocurta, imagem, categoria, descricao FROM noticias";
    
    $pdo = Database::conexao();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

  function calcularImc($peso, $altura){
    $resposta = 0;
    if($peso && $altura){
        $resposta = $peso / ($altura * $altura);  
    }
    return round($resposta,2);
  }

  function imcBuscarPorId($id)
  {
      $pdo = Database::conexao();
      $sql = "SELECT * FROM imc WHERE id = $id";
      $stmt = $pdo->prepare($sql);
      $list = $stmt->execute();
      $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $list;
  }

  function classificarImc($imc){
      if($imc <= 16){
          return "magreza grave;";
        }elseif($imc > 16 && $imc <= 17){
            return "magreza moderada";
        }elseif($imc > 17 && $imc <= 18.5){
            return "magreza leve";
        }elseif($imc >= 18.6 && $imc<= 24.9){
            return "Peso Ideal";
        }elseif($imc >= 25 && $imc <= 29.9 ){
            return "Sobrepeso";
        }elseif($imc >= 30 && $imc <= 34.9){
            return "Obesidade grau 1";
        }elseif($imc >= 35 && $imc <= 39.9){
            return "Obesidade grau 2 ou severa";
        }elseif($imc >= 40){
            return "Obesidade grau 3 ou morbida";
        }
    }
        
        function cadastrar($nome,$senha,$peso,$altura,$imc,$classificacao)
        {
            $sql = "INSERT INTO `imc` (`nome`,`email`,`peso`,`altura`,`imc`,`classificacao`)
            VALUES(:nome,:email,:peso,:altura,:imc,:classificacao)";
    
            $pdo = Database::conexao();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':peso', $peso);
            $stmt->bindParam(':altura', $altura);
            $stmt->bindParam(':imc', $imc);
            $stmt->bindParam(':classificacao', $classificacao);
            $result = $stmt->execute();
            return ($result)?true:false;
        }

        function registro($nome,$email,$telefone,$login,$senha)
        {
            if(!$nome || !$email || !$telefone || !$login || !$senha){return;}
            $sql = "INSERT INTO `registro` (`nome`,`email`,`telefone`,`login`,`senha`)
            VALUES(:nome,:email,:telefone,:login,:senha)";
    
            $pdo = Database::conexao();
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':senha', $senha);
            $result = $stmt->execute();
            return ($result)?true:false;
        }

    function contato($nome,$sobrenome,$email,$telefone,$msg)
    {
        $sql = "INSERT INTO `contato` (`nome`,`sobrenome`,`email`,`telefone`,`msg`)
        VALUES(:nome,:sobrenome,:email,:telefone,:msg)";

        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':msg', $msg);
        $result = $stmt->execute();
        return ($result)?true:false;
    }

    function noticia($titulo,$descricaocurta,$imagem,$categoria,$descricao)
    {
        $sql = "INSERT INTO `noticias` (`titulo`,`descricaocurta`,`imagem`,`categoria`,`descricao`)
        VALUES(:titulo,:descricaocurta,:imagem,:categoria,:descricao)";

        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricaocurta', $descricaocurta);
        $stmt->bindParam(':imagem', $imagem);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':descricao', $descricao);
        $result = $stmt->execute();
        return ($result)?true:false;
    }

    function verificarEmail($email){
        $pdo = Database::conexao();
        $sql = "SELECT `id`,`nome`,`login`,`senha`,`email`,`telefone` FROM registro WHERE `email` = '$email'";
        // var_dump($sql);die;
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list[0];
    }

    function verificarLogin($email, $senha) {
        $pdo = Database::conexao();
    
        $sql = "SELECT `id`, `nome`, `login`, `senha`, `email`, `telefone` FROM registro WHERE `email` = :email";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && validaSenha($senha, $user['senha'])) {
            return $user;
        }
    
        return null;
    }

    function validaSenha($senhaDigitada, $senhaBd){
        if(!$senhaDigitada || !$senhaBd){return false;}
        if($senhaDigitada == $senhaBd){return true;}
        return false;
    }

    function registrarDadosUsuario($dadosUsuario) {
        if (is_array($dadosUsuario)) {
            $_SESSION["usuario"] = [
                "nome" => $dadosUsuario['nome'] ?? null,
                "login" => $dadosUsuario['login'] ?? null,
                "email" => $dadosUsuario['email'] ?? null,
                "telefone" => $dadosUsuario['telefone'] ?? null,
                "status" => 'logado',
            ];
        } else {
            throw new InvalidArgumentException('Os dados do usuário devem ser um array associativo.');
        }
    }

    // function registrarAcessoValido($usuarioCadastrado){
    //     $_SESSION["usuario"]["nome"] = $usuarioCadastrado['nome'];
    //     $_SESSION["usuario"]["login"] = $usuarioCadastrado['login'];
    //     $_SESSION["usuario"]["status"] = 'logado';
    // }

    function protegerTela(){
        if(
            !$_SESSION || 
            $_SESSION["usuario"]["status"] !== 'logado'
        ){
            header('Location:'.constant("URL_LOCAL_SITE_PAGINA_LOGIN"));
        }
    }

    function protegerLogin(){
        if(
            $_SESSION
        ){
            header('Location:'.constant("URL_LOCAL_SITE_PAGINA_PRIN"));
        }
    }

    function criptografia($senha){
        if(!$senha)return false;
        // return hash('sha512',$senha);
        return hash('sha1',$senha);
    }

    
    function limparSessao(){
        unset($_SESSION["usuario"]);
        header('Location:'.constant("URL_LOCAL_SITE_PAGINA_LOGIN"));
    }

    function butaosair() {
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]["status"] === 'logado') {
            return true;
        }else{
            header('Location: ' . constant("URL_LOCAL_SITE_PAGINA_LOGIN"));
        }
    }

    function resetPost() {
        $_POST = array();
    }

    function menssagem($msg) {
        if ($msg === "cadas") {
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        }
        elseif ($msg === "exist") {
            echo "<script>alert('Esse email já existe.');</script>";
        }
    }

    function buscarNoticiaPorId($id)
    {
         if(!$id){return;}
         $sql = "SELECT * FROM noticias WHERE `id` = :id";
         $pdo = Database::conexao();
         $stmt = $pdo->prepare($sql);
         $stmt->bindParam(':id', $id);
         $result = $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $result[0];
    }

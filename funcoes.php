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
            "descricao" => $noticia['descricao'],
            "img" => $noticia['img'],
            "categoria_id" => $noticia['categoria_id']
        ];
    }

    return $listaNoticia;
}

  function buscarNoticias() {
    $sql = "SELECT  id, titulo, img, categoria_id, descricao FROM noticia_tb";
    
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
      $sql = "SELECT * FROM imc_tb WHERE id = $id";
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
            $sql = "INSERT INTO `imc_tb` (`nome`,`email`,`peso`,`altura`,`imc`,`classificacao`)
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

    function contato($nome,$sobrenome,$email,$telefone,$msg)
    {
        $sql = "INSERT INTO `contato_tb` (`nome`,`sobrenome`,`email`,`telefone`,`msg`)
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

    function noticia($titulo,$img,$categoria,$descricao)
    {
        $sql = "INSERT INTO `noticia_tb` (`titulo`,`img`,`categoria_id`,`descricao`)
        VALUES(:titulo,:img,:categoria,:descricao)";

        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':descricao', $descricao);
        $result = $stmt->execute();
        return ($result)?true:false;
    }

    // function registrarDadosUsuario($dadosUsuario) {
    //     if (is_array($dadosUsuario)) {
    //         $_SESSION["usuario"] = [
    //             "nome" => $dadosUsuario['nome'] ?? null,
    //             "login" => $dadosUsuario['login'] ?? null,
    //             "email" => $dadosUsuario['email'] ?? null,
    //             "telefone" => $dadosUsuario['telefone'] ?? null,
    //             "status" => 'logado',
    //         ];
    //     } else {
    //         throw new InvalidArgumentException('Os dados do usuário devem ser um array associativo.');
    //     }
    // }

    // function registrarAcessoValido($usuarioCadastrado){
    //     $_SESSION["usuario"]["nome"] = $usuarioCadastrado['nome'];
    //     $_SESSION["usuario"]["login"] = $usuarioCadastrado['login'];
    //     $_SESSION["usuario"]["status"] = 'logado';
    // }

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
         $sql = "SELECT * FROM noticia_tb WHERE `id` = :id";
         $pdo = Database::conexao();
         $stmt = $pdo->prepare($sql);
         $stmt->bindParam(':id', $id);
         $result = $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $result[0];
    }

    function getIdAtual() {
        return isset($_GET['id']) ? $_GET['id'] : null;
    }

    
    function cadastrarCategoria($nomeCategoria)
    {
        if(!$nomeCategoria){return;}
        $sql = "INSERT INTO `categoria_tb` (`nome`)
        VALUES(:nome)";

        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nomeCategoria);
        $result = $stmt->execute();
        return ($result)?true:false;
    }

    function verificarCategoriaDuplicada($termo)
  {
      $pdo = Database::conexao();
      $sql = "SELECT * FROM `categoria_tb` WHERE `nome` = '$termo'";
      $stmt = $pdo->prepare($sql);
      $list = $stmt->execute();
      $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return ($list)?true:false;
  }

  function pesquisar($psq) {
    $pdo = Database::conexao();
    $sql = "SELECT * FROM `noticia_tb` WHERE `titulo` LIKE '%$psq%' OR `descricao` LIKE
    '%$psq%'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  
  function gerarNumerosRandomicos(){
    return date('Y').date('m').date('d').date("h").date(':i').'-'.date('sa').rand();
  }

  function upload($img){
    if(!isset($_FILES["fileToUpload"])){return;}

    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 900000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "jfif") {
        echo "Sorry, only JPG, JPEG, JFIF, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            return $_FILES["fileToUpload"]["name"];
        } else {
            // echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
  }



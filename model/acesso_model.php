<?php
class Acesso
{


    //Construtor
    public function __construct()
    {

    }

    public static function verificarLogin($email){
        $pdo = Database::conexao();
        $sql = "SELECT `id`,`nome`,`login`,`senha`,`email`, `telefone` FROM registro_tb WHERE `email` = '$email'";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list[0];
    } 

    public static function validaSenha($senhaDigitada, $senhaBd){
        if(!$senhaDigitada || !$senhaBd){return false;}
        if($senhaDigitada == $senhaBd){return true;}
        return false;
    }

    public static function registrarAcessoValido($usuarioCadastrado){
        $_SESSION["usuario"]["nome"] = $usuarioCadastrado['nome'];
        $_SESSION["usuario"]["email"] = $usuarioCadastrado['email'];
        $_SESSION["usuario"]["login"] = $usuarioCadastrado['login'];
        $_SESSION["usuario"]["telefone"] = $usuarioCadastrado['telefone'];
        $_SESSION["usuario"]["id"] = $usuarioCadastrado['id'];
        $_SESSION["usuario"]["status"] = 'logado';
    }

    public static function limparSessao(){
        unset($_SESSION["usuario"]);
        header('Location:'.constant("URL_LOCAL_SITE_PAGINA_LOGIN"));
    }

    public static function protegerTela(){
        if(
            !$_SESSION || 
            !$_SESSION["usuario"]["status"] === 'logado'
        ){
            header('Location:'.constant("URL_LOCAL_SITE_PAGINA_LOGIN"));
        }
    }
}
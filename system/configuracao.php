<?php

session_start();
// $_SERVER["SERVER_NAME"]
switch ('localhost') {
    case 'localhost':
    }

// $_SERVER["SERVER_NAME"]
switch ('localhost') {
    case 'localhost':
        $enviroment['local'] = "http://localhost/";
        break;
    case 'homol':
        $enviroment['homol'] = "http://meusite.com.br";
        break;
    case 'prod':
        $enviroment['prod'] = "";
        break;
}

/**
 * Definindo constante URL_LOCAL
 * Caminho absoluto
 */
define("URL_LOCAL_BASE",$enviroment['local']);
define("URL_LOCAL_SITE",constant("URL_LOCAL_BASE")."ThiagoS/");
define("URL_LOCAL_SITE_PAGINA",constant("URL_LOCAL_SITE")."?pagina=");
define("URL_LOCAL_SITE_PAGINA_LOGIN",constant("URL_LOCAL_SITE")."?pagina=login");
define("URL_LOCAL_SITE_PAGINA_PERFIL",constant("URL_LOCAL_SITE")."?pagina=perfil");
define("URL_LOCAL_SITE_PAGINA_PRIN",constant("URL_LOCAL_SITE")."?pagina=principal");
define("URL_LOCAL_SITE_PAGINA_SUCE",constant("URL_LOCAL_SITE")."?pagina=sucesso");
define("URL_LOCAL_SITE_DETALHE",constant("URL_LOCAL_SITE")."?pagina=detalhe&id=");
define("URL_LOCAL_IMG",constant("URL_LOCAL_BASE")."./imagens/");
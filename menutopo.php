<?php if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]["status"] === 'logado'): ?>
    <button class="navBtn"><a href=''>Perfil</a></button>
<?php endif;?>

<button class="navBtn"><a href="<?='http://localhost/ThiagoS/?pagina=contato'?>">Contato</a></button>
<button class="navBtn"><a href="<?='http://localhost/ThiagoS/?pagina=noticia'?>">Noticias</a></button>

<?php if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]["status"] === 'logado'): ?>
    <button class="navBtn"><a href="<?= constant('URL_LOCAL_SITE_PAGINA').'sair' ?>">Sair</a></button>
<?php else:?>
    <button class="navBtn"><a href="<?='http://localhost/ThiagoS/?pagina=login'?>">Login</a></button>
    <button class="navBtn"><a href="<?='http://localhost/ThiagoS/?pagina=cadastro'?>">Registro</a></button>
<?php endif; ?>
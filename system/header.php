<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/temaescuro.css">

  <?php
  $pagina = array("principal", "contato", "noticia", "cadastro", "login", "sucesso", "detalhe", "perfil","cadastrar-categoria","pesquisa");
  ?>

  <?php if($paginaUrl === $pagina[0]):?>
      <link rel="stylesheet" href="css/index.css">
    <?php endif; ?>
    <?php if($paginaUrl === $pagina[1]):?>
        <link rel="stylesheet" href="css/contato.css">
        <link rel="stylesheet" href="css/validacao-contato.css">
    <?php endif; ?>
    <?php if($paginaUrl === $pagina[2]):?>
        <link rel="stylesheet" href="css/noticia.css">
    <?php endif; ?>
    <?php if($paginaUrl === $pagina[3]):?>
        <link rel="stylesheet" href="css/registro.css">
    <?php endif; ?>
    <?php if($paginaUrl === $pagina[4]):?>
        <link rel="stylesheet" href="css/login.css">
    <?php endif; ?>
    <?php if($paginaUrl === $pagina[5]):?>
        <link rel="stylesheet" href="css/login.css">
    <?php endif; ?>
    <?php if($paginaUrl === $pagina[6]):?>
      <link rel="stylesheet" href="css/paginas.css">
    <?php endif; ?>
    <?php if($paginaUrl === $pagina[7]):?>
      <link rel="stylesheet" href="css/perfil.css">
    <?php endif; ?>
    <?php if($paginaUrl === $pagina[8]):?>
        <link rel="stylesheet" href="css/contato.css">
        <link rel="stylesheet" href="css/validacao-contato.css">
    <?php endif; ?>
    <?php if($paginaUrl === $pagina[9]):?>
      <link rel="stylesheet" href="css/login.css">
    <?php endif; ?>

    <?php if (!in_array($paginaUrl, $pagina)): ?> <!-- PAGINA DE ERRO -->
      <link rel="stylesheet" href="css/404.css">
    <?php endif; ?>

  <script src="scripts/header.js" defer></script>
  <script src="scripts/validacao.js" defer></script>
  <title>InfoSports</title>
</head>

<!-- <body>

<header class="header">
      <a class='logo' href='index.php'>InfoSports</a>
      <div class="headerBtnGroup">
        <form method="get" action="">
          <button type="submit" name="pagina" value="login" class="navBtn">Login</button>
          <button type="submit" name="pagina" value="cadastro" class="navBtn">Registro</button>
          <button type="submit" name="pagina" value="contato" class="navBtn">Contato</button>
        </form>
        <div>
          <input type="checkbox" class="check" id="chk"/>

          <label class="label" for="chk">
      
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
            <div class="bola"></div>
          </label>
        </div>
      </div>
      <div class="hamburguer-menu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </header>

</body> -->
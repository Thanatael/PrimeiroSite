<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/temaescuro.css">
  <link rel="stylesheet" href="css/index.css">
  
    <?php if($paginaUrl === "contato"):?>
        <link rel="stylesheet" href="css/contato.css">
        <link rel="stylesheet" href="css/validacao-contato.css">
    <?php endif; ?>
    <?php if($paginaUrl === "cadastro"):?>
        <link rel="stylesheet" href="css/cadastro.css">
    <?php endif; ?>
    <?php if($paginaUrl === "login"):?>
        <link rel="stylesheet" href="css/login.css">
    <?php endif; ?>

  <script src="scripts/header.js" defer></script>
  <script src="scripts/validacao.js" defer></script>
  <title>InfoSports</title>
</head>

<body>

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

</body>
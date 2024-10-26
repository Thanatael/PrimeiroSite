<div class="container">
<header class="header">
      <a class="logo" href="<?='http://localhost/ThiagoS/?pagina=principal'?>">InfoSports</a>
      <div class="headerBtnGroup">
        <?php include_once("menuTopo.php");?>
        <div>
          <input type="checkbox" class="check" id="chk" />
        
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
    <section>
      <div class="box-content">
        <form action="" method="">
          <?php $nomeUsuario = $_SESSION["usuario"]["nome"]; ?>
          <?php $emailUsuario = $_SESSION["usuario"]["email"]; ?>
          <?php $loginUsuario = $_SESSION["usuario"]["login"]; ?>
          <?php $teleUsuario = $_SESSION["usuario"]["telefone"]; ?>
          <h1>Seja bem-vindo(a) <?=$nomeUsuario?></h1>
          <div class="login">
            <label for="login">Login</label>
            <input type="text" value="<?=$loginUsuario?>" id="login" name="login">
            <p id="tel-ajuda" class="msg-ajuda" style="display:none;">Insira um login válido. (11 números)</p>
          </div>
          <div class="nome">
            <label for="nome">Nome</label>
            <input type="text" value="<?=$nomeUsuario?>" id="nome" name="nome">
            <p id="tel-ajuda" class="msg-ajuda" style="display:none;">Insira um nome válido. (11 números)</p>
          </div>
          <div class="email">
            <label for="email">Email</label>
            <input type="text" value="<?=$emailUsuario?>" id="email" name="email">
            <p id="email-ajuda" class="msg-ajuda" style="display:none;">Insira um email válido.</p>
          </div>
          <div class="telefone">
            <label for="telefone">Telefone</label>
            <input type="text" value="<?=$teleUsuario?>" id="telefone" name="telefone">
            <p id="tel-ajuda" class="msg-ajuda" style="display:none;">Insira um telefone válido. (11 números)</p>
          </div>

          <button class="btn-concluir">Salvar</button>

        </form>
      </div>
    </section>
    <footer class="footer">
      <span>Info Sports</span>
      <a href="#backToTop" class="footerAnchor">VOLTAR PARA O TOPO</a>
    </footer>
  </div>
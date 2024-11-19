<div class="container">
<header class="header">
      <a class="logo" href="<?='http://localhost/ThiagoS/?pagina=principal'?>">InfoSports</a>
      <div class="headerBtnGroup">
      <?php include_once("./system/menutopo.php");?>
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
    <section class="gridContainer">

        <div class="mainContent">

          <div class="search">
            <div class="searchBox">
              <form method="POST" action="#">
                <input class="searchInt" name="pesquisa"  type="text" id="searchInput" placeholder="Pesquise por um tema..." value="<?=$pesquisa?>" />
                <button class="searchBtn" type="submit">
                  <a href="<?=constant('URL_LOCAL_SITE_PAGINA').'pesquisa'?>">🔍</a>
                </button>
              </form>
            </div>
          </div>

          </div>
            <?php 
              $resultado = pesquisar($pesquisa);
              foreach ($resultado as $res):

            ?> 
              <div class="categoryCard">
                <a class="pag-link" href="<?=constant('URL_LOCAL_SITE_DETALHE').$res['id']?>">
                    <img src="<?=$res['imagem']?>" alt="mainCardImg" class="mainCardImg" width=320px height=180px>
                    <p class="mainCategoryCardTitle"><?=$res['titulo']?></p>
                    <p class="mainCategoryCardDescription"><?=$res['descricaocurta']?></p>
                </a>
              </div>
              
            <?php endforeach?>
          </div>

        </div>
      </section>
    <footer class="footer">
      <span>Info Sports</span>
      <a href="#backToTop" class="footerAnchor">VOLTAR PARA O TOPO</a>
    </footer>
  </div>
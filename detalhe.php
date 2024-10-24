<body>
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
        <p class="sectionTitle" id="backToTop"><?=$tituloDoSite?></p>
        <p class="sectionDescription"><strong><?=$subTituloDoSite?></strong></p>
        
        <section class="gridContainer">
            <div class="mainContent">
                <div class="categoryCard">
                    <img src="<?=$noticia['imagem']?>" alt="mainCardImg" class="mainCardImg">
                    <h1 class="mainCategoryCardTitle"><?=$noticia['titulo']?></h1>
                    <p class="mainCategoryCardDescription" Align="justify"><?=$noticia['descricao']?></p>
                </div>
            </div>
        </section>

        <footer class="footer">
            <span>Info Sports</span>
            <a href="#backToTop" class="footerAnchor">VOLTAR PARA O TOPO</a>
        </footer>
</body>
</html>
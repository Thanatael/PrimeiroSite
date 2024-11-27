<body>
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
        <p class="sectionTitle" id="backToTop"><?=$tituloDoSite?></p>
        <p class="sectionDescription"><strong><?=$subTituloDoSite?></strong></p>
        
        <section class="gridContainer">
            <div class="mainContent">
                <div class="categoryCard">
                    <img src="assets/uploads/<?=$noticia['imagem']?>" alt="mainCardImg" class="mainCardImg">
                    <h1 class="mainCategoryCardTitle"><?=$noticia['titulo']?></h1>
                    <p class="mainCategoryCardDescription" Align="justify"><?=$noticia['descricao']?></p>
                </div>
            </div>

            <div class="caixa">
                <?php
                    $listaNoticia = criarLista();
                    $idAtual = getIdAtual();
                    $contador = 0;

                    if ($idAtual !== null) {
                        foreach ($listaNoticia as $key => $noticia) {
                            if ($noticia['id'] == $idAtual) {
                                unset($listaNoticia[$key]);
                                break; // Para evitar remover mais de uma vez
                            }
                        }
                    }

                    $aleatorias = array_rand($listaNoticia, 4); 
                    

                    if(count($aleatorias) < 4) {
                        $aleatorias = array_pad($aleatorias, 4, null);
                    }
                
                    foreach($aleatorias as $chave):
                        if ($chave === null) continue;

                        $noticia = $listaNoticia[$chave];
                ?>
                
                <div class="sugestao">
                        <a class="pag-link" href="<?=constant('URL_LOCAL_SITE_DETALHE').$noticia['id']?>" >
                            <img src="assets/uploads/<?=$noticia['imagem']?>" alt="secCardImg" class="secCardImg" widht=320px height=180px>
                            <p class="secCategoryCardTitle"><?=$noticia['titulo']?></p>
                            <p class="secCategoryCardDescription"><?=$noticia['descricao']?></p>
                        </a>
                </div>

                <?php 
                        $contador++;
                    endforeach;
                ?>

            </div>

        </section>

        <footer class="footer">
            <span>Info Sports</span>
            <a href="#backToTop" class="footerAnchor">VOLTAR PARA O TOPO</a>
        </footer>
</body>
</html>
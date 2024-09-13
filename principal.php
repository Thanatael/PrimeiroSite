<body>
  <?php $lista = array("link"=>"1", "imagem"=>"2", "titulo"=>"3", "descricao"=>"4"); 
  ?> 

  <div class="container">
    <header class="header">
      <a class='logo' href='principal.php'>InfoSports</a>
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
    <p class="sectionTitle" id="backToTop">BEM VINDO A INFOSPORTS!</p>
    <p class="sectionDescription">Aqui é onde você encontra todos os itens mais novos e modernos do seu esporte
      preferido.</p>
    <section class="gridContainer">
      <div class="mainContent">
        <a class='pag-link' href='html/esportes/boxe.html'>
          <div class="categoryCard">
            <img src="imagens/boxe.jpg" alt="mainCardImg" class="mainCardImg" width=320px height=180px>
            <p class="mainCategoryCardTitle">BOXE</p>
            <p class="mainCategoryCardDescription">Descubra a força interior e a técnica impecável necessáriaspara se
              destacar no ringue. Desafie-se a superar seus
              limites físicos e mentais enquanto aprende os segredos deste esporte de combate emocionante.</p>
          </div>
        </a>
        <a class='pag-link' href='html/esportes/crossfit.html'>
          <div class="categoryCard">
            <img src="imagens/crossfit.jpg" alt="mainCardImg" class="mainCardImg" width=320px height=180px>
            <p class="mainCategoryCardTitle">CROSSFIT</p>
            <p class="mainCategoryCardDescription">Entre na arena do crossfit e desafie seu corpo em um treinamento
              intenso e variado que irá transformar sua força,
              resistência e condicionamento físico. Supere seus limites e alcance novos patamares de desempenho.</p>
          </div>
        </a>


        <a class='pag-link' href='html/esportes/esportesnaneve.html'>
          <div class="categoryCard">
            <img src="imagens/esportesNaNeve.jpg" alt="mainCardImg" class="mainCardImg" width=320px height=180px>
            <p class="mainCategoryCardTitle">ESPORTES NA NEVE</p>
            <p class="mainCategoryCardDescription">Sinta a adrenalina das montanhas cobertas de neve enquanto desliza
              pelas encostas em esportes como esqui e snowboard.
              Prepare-se para a emoção de voar sobre a neve e dominar as pistas.</p>
          </div>
        </a>

        <a class='pag-link' href='html/esportes/basquete.html'>
          <div class="categoryCard">
            <img src="imagens/basquete.jpg" alt="mainCardImg" class="mainCardImg" width=320px height=180px>
            <p class="mainCategoryCardTitle">BASQUETE</p>
            <p class="mainCategoryCardDescription">Drible, passe, arremesse! Junte-se ao emocionante mundo do basquete e
              experimente a empolgação de jogar em equipe,
              competir em partidas acirradas e fazer cestas incríveis.</p>
          </div>
        </a>

        <a class='pag-link' href='html/esportes/corrida.html'>
          <div class="categoryCard">
            <img src="imagens/corrida.jpg" alt="mainCardImg" class="mainCardImg" width=320px height=180px>
            <p class="mainCategoryCardTitle">CORRIDA</p>
            <p class="mainCategoryCardDescription">Calce seus tênis e sinta a energia pulsante das corridas. Desafie-se
              em diferentes distâncias, supere obstáculos e
              descubra os benefícios incríveis para a saúde e o bem-estar que a corrida proporciona.</p>
          </div>
        </a>

        <a class='pag-link' href='html/esportes/surf.html'>
          <div class="categoryCard">
            <img src="imagens/surf.jpg" alt="mainCardImg" class="mainCardImg" width=320px height=180px>
            <p class="mainCategoryCardTitle">SURF</p>
            <p class="mainCategoryCardDescription">Sinta a liberdade e a conexão com o mar enquanto desliza pelas ondas
              no surf. Experimente a emoção de pegar a onda
              perfeita, domine as técnicas e mergulhe no estilo de vida descontraído e vibrante do surf.</p>
          </div>
        </a>

        <a class='pag-link' href='html/esportes/trilha.html'>
          <div class="categoryCard">
            <img src="imagens/trilha.jpg" alt="mainCardImg" class="mainCardImg" width=320px height=180px>
            <p class="mainCategoryCardTitle">TRILHA</p>
            <p class="mainCategoryCardDescription">Aventure-se pelos caminhos menos percorridos e descubra a beleza da
              natureza enquanto se desafia em trilhas
              emocionantes. Deixe a rotina para trás e explore novos horizontes ao ar livre.</p>
          </div>
        </a>

        <a class='pag-link' href='html/esportes/tenis.html'>
          <div class="categoryCard">
            <img src="imagens/tenis.jpg" alt="mainCardImg" class="mainCardImg" width=320px height=180px>
            <p class="mainCategoryCardTitle">TÊNIS</p>
            <p class="mainCategoryCardDescription">Experimente a elegância e a velocidade do tênis, um esporte que
              combina habilidade, estratégia e agilidade. Jogue com
              paixão, vença com classe e desfrute da competição saudável em quadra.</p>
          </div>
        </a>

      </div>
      <aside class="sidebar">
        <div class="sidebarContent">
          <div class="IMC">
            <p>INDICE DE MASSA CORPORAL (IMC)</p>
            <label for="#peso">Peso (KG)</label>
            <input id="peso" type="text" placeholder="Digite o peso...">
            <label for="#altura">Altura (M)</label>
            <input id="altura" type="text" placeholder="Digite a altura...">
            <button class="btnCalcular">Calcular</button>
      </aside>

    </section>

    <footer class="footer">
      <span>Info Sports</span>
      <a href="#backToTop" class="footerAnchor">VOLTAR PARA O TOPO</a>
    </footer>
  </div>
  <script src="javascript/imc.js"></script>
  <script src="javascript/temaescuro.js"></script>
  <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
</body>
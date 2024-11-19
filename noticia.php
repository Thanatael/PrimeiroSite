<div class="body-bg">
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
        <div class="container-body">
            <div class="container">
                <div class="title">
                    <h2>Cadastre noiticias</h2>
                </div>

                <form method="POST" action="#" enctype="multipart/form-data">

                    <div class="campos">
                        <div class="input-box">
                            <div class="name">
                            <label for="titulo"></label>
                            <input type="text" placeholder="Titulo" id="titulo" name="titulo" >
                            <p id="nome-ajuda" class="msg-ajuda" style="display:none;">Mín. 3 caracteres</p>
                        </div>
                        </div>

                        <div class="input-box">
                            <input type="text" id="descricaocurta" placeholder="DescricaoCurta" name="descricaocurta">
                        </div>

                        <div class="input-box">
                            <div class="email">
                            <label for="imagem"></label>
                            <!-- <input type="text" id="imagem" name="imagem" placeholder="Imagem"> -->
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        </div>

                        <div class="input-box">
                            <div class="telefone">
                            <label for="categoria"></label>
                            <input type="text" placeholder="Categoria" id="categoria" name="categoria">
                            <p id="tel-ajuda" class="msg-ajuda" style="display:none;">Insira um telefone válido. (11 números)</p>
                        </div>
                        </div>

                        <div class="input-box">
                            <textarea id="descricao" placeholder="Digite aqui sua descricao" name="descricao" ></textarea>
                        </div>

                    </div>

                    <div class="button">
                        <button value="Enviar" class="btn-concluir" id="btnEnviar" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
            <section class="contacts">
                <h2>Cadastros</h2>
            </section>
        </div>

        <footer class="footer">
            <span>Info Sports</span>
            <a href="#backToTop" class="footerAnchor">VOLTAR PARA O TOPO</a>
        </footer>
    </div>
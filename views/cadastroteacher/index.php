<!DOCTYPE html>
<html  >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="../../assets/images/3-176x176.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>CadastroTeacher</title>
  <?php include '../comun/header.php'; ?>
  </head>
  <body>
<section data-bs-version="5.1" class="form01 ridem5 cid-uu6rZsw8jv" id="form01-3h">
    

    
    

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-wrapper">
                    <h2 class="mbr-section-title mbr-fonts-style display-1"><strong>Teacher</strong></h2>
                    <div class="text-wrapper">
                        <p class="mbr-text mbr-fonts-style display-7">
                            Seja bem-vindo(a) ao time. Solicitamos que, por gentileza, realize o seu cadastro com atenção, garantindo a precisão das informações fornecidas.<br>Welcome to the team. We kindly ask that you complete your registration carefully, ensuring the accuracy of the provided information.<br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="mbr-form form-wrapper" data-form-type="formoid">
                        <!--Formbuilder Form-->
                        <form action="salvar_professor.php" method="POST" class="formulario-professor">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" id="nome" name="nome" class="form-control" required>
                                </div>
                                <div class="form-group">
                                <label for="senha">Senha para sistema:</label>
                                <input type="password" name="senha" id="senha" class="form-control"required><br>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" id="telefone" name="telefone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="empresa">Tipo de Contrato:</label>
                                    <input type="text" id="empresa" name="empresa" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="data_nascimento">Data de Nascimento:</label>
                                    <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="mensagem">Escreva uma pequena apresentação sua:</label>
                                    <textarea id="mensagem" name="mensagem" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Cadastrar Professor</button>
                            </form>
                        </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="content-wrapper">
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="footer1 cid-uu6rZtIbKv" once="footers" id="footer1-3i">

    

    
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <h3 class="mbr-section-title mbr-fonts-style display-5">
                    ResultM5
                </h3>
                <div class="soc-wrapper">
                    <div class="social-row">
                        <div class="soc-item">
                            <a href="https://twitter.com/mobirise" target="_blank">
                                <span class="mbr-iconfont socicon socicon-facebook"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://twitter.com/mobirise" target="_blank">
                                <span class="mbr-iconfont socicon socicon-twitter"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://twitter.com/mobirise" target="_blank">
                                <span class="mbr-iconfont socicon socicon-instagram"></span>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <ul class="list mbr-fonts-style display-4">
                    <li class="mbr-text item-wrap"><strong>Description</strong></li>
                    <li class="mbr-text item-wrap"><a href="page9.html" class="text-primary">Teachers</a></li>
                    <li class="mbr-text item-wrap">Students</li>
                    <li class="mbr-text item-wrap"><br></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <ul class="list mbr-fonts-style display-4">
                    <li class="mbr-text item-wrap"><strong>Products</strong></li>
                    <li class="mbr-text item-wrap">English</li>
                    <li class="mbr-text item-wrap">Spanish</li>
                    <li class="mbr-text item-wrap">English for tannery</li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <ul class="list mbr-fonts-style display-4">
                    <li class="mbr-text item-wrap"><strong>About us</strong></li>
                    <li class="mbr-text item-wrap">Onde&nbsp; estamos?</li>
                    <li class="mbr-text item-wrap">Tradição</li>
                    <li class="mbr-text item-wrap">Compromisso</li>
                    <li class="mbr-text item-wrap">Qualidade</li>
                </ul>
            </div>
            
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="footer2 cid-uu6rZvldWx" id="footer02-3j">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    © Copyright 2022 SEIDMANNINSTITUTE - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>


<script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/parallax/jarallax.js"></script>
  <script src="../../assets/smoothscroll/smooth-scroll.js"></script>
  <script src="../../assets/ytplayer/index.js"></script>
  <script src="../../assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="../../assets/theme/js/script.js"></script>
  <script src="../../assets/formoid.min.js"></script>
  
  
  
</body>
</html>
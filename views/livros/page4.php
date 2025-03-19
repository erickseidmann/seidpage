<?php
// Iniciar a sessão
session_start();

// Verificar se o professor está logado
if (!isset($_SESSION['professor_id'])) {
    header("Location: index.php"); // Redirecionar para o login se não estiver logado
    exit;
}

// Recuperar o nome do professor da sessão
$professor_nome = $_SESSION['professor_nome'];
?>
<!DOCTYPE html>
<html  >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="../../assets/images/3-176x176.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Book</title>
  <?php include '../comun/headerteachers.php'; ?>
</head>
<body>

<section data-bs-version="5.1" class="header1 supplym5 cid-uw7xzwgebJ" id="header1-4p">
    

    
    

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title-wrapper">
                    <h1 class="mbr-section-title mbr-fonts-style display-1">
                        Seidmann Books and<br> EPBL</h1>
                    
                    
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="image-wrapper">
                    <img class="image_1" src="../../assets/images/whatsapp-image-2023-12-01-at-17.14.00-1280x960.jpg" alt="">
                    <img class="image_2" src="../../assets/images/couro-leather-780x1245.jpeg" alt="">
                    <img class="image_3" src="../../assets/images/bussines-book-620x989.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="gallery2 cid-uw7FIKc0Wd" id="gallery2-4r">
    
    
    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-subtitle mbr-fonts-style display-4">TEAM EPBL &amp; Seidmann</h4>
            <h2 class="mbr-section-title mbr-fonts-style display-2">
            <?php echo htmlspecialchars($professor_nome); ?>, ENJOY OUR BOOKS</h2>
        </div>
        <div class="item-container">
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/whatsapp-image-2023-12-01-at-17.14.00-352x264.jpg" alt="" data-slide-to="0" data-bs-slide-to="0">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">Kids</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5"><strong>Friends 1</strong></h3>
                        </div>
                    </div>
                </div>
            </div><div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/whatsapp-image-2023-12-01-at-17.14.00-1280x960.jpg" alt="" data-slide-to="1" data-bs-slide-to="1">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">Kids</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5"><strong>Friends 2</strong></h3>
                        </div>
                    </div>
                </div>
            </div><div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/whatsapp-image-2023-12-01-at-17.14.00-352x264.jpg" alt="" data-slide-to="2" data-bs-slide-to="2">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">Book 1 – Nível A1</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5"><strong>EPBL 1</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/whatsapp-image-2023-12-01-at-17.14.00-352x264.jpg" alt="" data-slide-to="3" data-bs-slide-to="3">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">Book 2 – Nível A2</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5"><strong>EPBL 2</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/whatsapp-image-2023-12-01-at-17.14.00-352x264.jpg" alt="" data-slide-to="4" data-bs-slide-to="4">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">Book 3 – Nível B1 – Fase 1</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5"><p>
                                <strong>EPBL 3</strong>&nbsp;</p></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/whatsapp-image-2023-12-01-at-17.14.00-352x264.jpg" alt="" data-slide-to="5" data-bs-slide-to="5">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">Book 4 – Nível B1 – Fase 2</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5"><strong>EPBL 4</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/whatsapp-image-2023-12-01-at-17.14.00-352x264.jpg" alt="" data-slide-to="6" data-bs-slide-to="6">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">Book 5 – Nível B2 – Fase 1</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5">
                                <strong>EPBL 5</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/whatsapp-image-2023-12-01-at-17.14.00-352x264.jpg" alt="" data-slide-to="7" data-bs-slide-to="7">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">Book 6 – Nível B2 – Fase 2</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5">
                                <strong>EPBL 6</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/whatsapp-image-2023-12-01-at-17.14.00-352x264.jpg" alt="" data-slide-to="8" data-bs-slide-to="8">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">Book 7 – Nível C1 – Fase 1</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5">
                                <strong>EPBL 7</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/whatsapp-image-2023-12-01-at-17.14.00-352x264.jpg" alt="" data-slide-to="9" data-bs-slide-to="9">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">Book 8 – Nível C1 – Fase 2</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5">
                                <strong>EPBL 8</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/bussines-book-352x562.png" alt="" data-slide-to="10" data-bs-slide-to="10">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">&nbsp;Nível C1</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5"><strong>BUSINESS</strong><br></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/couro-leather-352x562.jpeg" alt="" data-slide-to="11" data-bs-slide-to="11">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">&nbsp;Nível C1</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5"><strong>LEATER&nbsp;</strong><strong>1</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/couro-leather-352x562.jpeg" alt="" data-slide-to="12" data-bs-slide-to="12">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">&nbsp;Nível C1</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5">
                                <strong>LEATER</strong><strong>&nbsp;2</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="../../assets/images/couro-leather-352x562.jpeg" alt="" data-slide-to="13" data-bs-slide-to="13">
                    </div>
                    <div class="item-caption">
                        <div class="mbr-card-subtitle">
                            <h5 class="mbr-fonts-style display-4">&nbsp;Nível C1</h5>
                        </div>
                        <div class="mbr-card-title">
                            <h3 class="mbr-fonts-style display-5"><strong>LEATHER&nbsp;</strong><strong>3</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="footer2 cid-uu6moTO7mG" id="footer02-1n">

    

    

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

<section data-bs-version="5.1" class="footer1 cid-uu6n1hlzhV" once="footers" id="footer1-2x">

    

    
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <h3 class="mbr-section-title mbr-fonts-style display-5">
                    Seidman Institute</h3>
                <div class="soc-wrapper">
                    <div class="social-row">
                        <div class="soc-item">
                            <a href="https://www.facebook.com/Seidmanninstitute" target="_blank">
                                <span class="mbr-iconfont socicon-facebook socicon"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://x.com/?lang=pt-br" target="_blank">
                                <span class="mbr-iconfont socicon-twitter socicon"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.instagram.com/seidmann_institute/" target="_blank">
                                <span class="mbr-iconfont socicon-instagram socicon"></span>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <ul class="list mbr-fonts-style display-4">
                    <li class="mbr-text item-wrap"><strong>Teachers</strong></li>
                    <li class="mbr-text item-wrap"><a href="page9.html" class="text-primary">Teachers&nbsp;Cadastro</a></li>
                    <li class="mbr-text item-wrap"><a href="page2.html" class="text-primary">Teachers Login</a></li>
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


<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/ytplayer/index.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  
</body>
</html>
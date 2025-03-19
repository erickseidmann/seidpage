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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

    <style>
        #pdfViewerWrapper {
            height: 80vh; /* Usa 80% da altura da tela */
            overflow-y: auto; /* Permite rolagem */
        }
        #pdfViewer canvas {
            display: block;
            margin: auto;
            margin-bottom: 10px;
            border: 1px solid black;
            max-width: 100%;
        }
    </style>

    <?php include '../comun/headerteachers.php'; ?>
</head>
<body>



<section data-bs-version="5.1" class="gallery2 cid-uw7FIKc0Wd" id="gallery2-4r">
    
   <br>
   <br><br>
   <br> 
<div class="container-fluid p-3">
    <div class="text-center">
        <h1><?php echo htmlspecialchars($professor_nome); ?>, EPBL Book 1</h1>
    </div>

    <div class="d-flex justify-content-center gap-2 mb-3">
        <button id="fullscreenButton" class="btn btn-primary">Tela Cheia</button>
        <input type="number" id="pageNumber" class="form-control w-auto" placeholder="Página" min="1">
        <button id="goToPageButton" class="btn btn-secondary">Ir para Página</button>
    </div>

    <div id="pdfViewerWrapper" class="container-fluid bg-light rounded shadow p-3">
        <div id="pdfViewer"></div>
    </div>
</div>

<!-- Scripts -->
<script>
    var pdfUrl = 'book1/visualizar_pdf.php';
    var pdfDoc = null;
    var viewerConfig = { scale: 1.5 };
    var pdfViewerElement = document.getElementById('pdfViewer');

    function renderPage(pageNum) {
        pdfDoc.getPage(pageNum).then(function(page) {
            var viewport = page.getViewport({ scale: viewerConfig.scale });
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            pdfViewerElement.appendChild(canvas);
            
            page.render({ canvasContext: context, viewport: viewport });
        });
    }

    pdfjsLib.getDocument(pdfUrl).promise.then(function(pdfDoc_) {
        pdfDoc = pdfDoc_;
        for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
            renderPage(pageNum);
        }
    });

    document.getElementById('fullscreenButton').addEventListener('click', function() {
        var elem = document.getElementById('pdfViewerWrapper');
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    });

    document.getElementById('goToPageButton').addEventListener('click', function() {
        var pageNumber = parseInt(document.getElementById('pageNumber').value);
        if (pageNumber > 0 && pageNumber <= pdfDoc.numPages) {
            document.getElementById('page-' + pageNumber)?.scrollIntoView();
        } else {
            alert('Número de página inválido');
        }
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
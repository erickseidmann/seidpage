<?php
// Configuração do banco de dados
include '../comun/conexao.php'; 
try {
    // Conexão com o banco de dados
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Inicialização de variáveis
    $login_error = "";

    // Processar o formulário quando enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Verificar se o email existe
        $sql = "SELECT id, nome, senha FROM professores WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verificar se a senha está correta
            if (password_verify($senha, $user['senha'])) {
                // Login bem-sucedido
                session_start();
                $_SESSION['professor_id'] = $user['id'];
                $_SESSION['professor_nome'] = $user['nome'];
                header("Location: ../dashbordteachers/"); // Redirecionar para a página inicial
                exit;
            } else {
                $login_error = "Senha incorreta.";
            }
        } else {
            $login_error = "Email não encontrado.";
        }
    }
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html  >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="../../assets/images/3-176x176.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Login teacher</title>
  
  <?php include '../comun/header.php'; ?>
  </head>
  <body>

<section data-bs-version="5.1" class="article1 cid-uu6meUkzIO mbr-parallax-background" id="article01-h">

    

    
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6">
                
            </div>
        </div>
    </div>
</section>

<section class="form cid-uuWwVOHA4W" id="formbuilder-3m">
    
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
<!--Formbuilder Form-->
<?php if ($login_error): ?>
            <p class="error"><?php echo $login_error; ?></p>
        <?php endif; ?>
<form  method="POST" class="mbr-form form-with-styler" >

<div class="dragArea row">
<div class="col-lg-12 col-md-12 col-sm-12">
<h4 class="mbr-fonts-style display-5">Welcome</h4>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div data-for="email" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="email" name="email" placeholder="email" data-form-field="email" class="form-control display-7" value="" id="email" required>
</div>
<div data-for="password" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="password" name="senha" placeholder="Password" data-form-field="password" class="form-control display-7" value="" id="senha" required>
</div>
<div class="col-auto">
<button type="submit" class="w-100 btn btn-primary display-7">Login</button>
</div>
</div>
</form><!--Formbuilder Form-->
</div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="footer2 cid-uu6mf8cpXx" id="footer02-t">

    

    

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


<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/parallax/jarallax.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/ytplayer/index.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid.min.js"></script>
  
  
  
</body>
</html>
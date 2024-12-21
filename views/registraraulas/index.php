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

// Conexão com o banco de dados
include '../comun/conexao.php'; // Certifique-se de que este arquivo contém a conexão correta com o banco de dados

// Buscar alunos no banco de dados
$query = "SELECT id, name, email FROM dadosalunos";
$result = $conn->query($query);

$alunos = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $alunos[] = $row;
    }
}




?>


<!DOCTYPE html>
<html  >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/3-176x176.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Registrar Aulas</title>
  
  <?php include '../comun/headerteachers.php'; ?>
  </head>
  <body>

<section data-bs-version="5.1" class="image2 cid-uvpLxu1y39" id="image2-4l">
    
    


    

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg">
                <div class="text-wrapper">
                    <h3 class="mbr-section-title mbr-fonts-style mb-3 display-2"> <?php echo htmlspecialchars($professor_nome); ?>, o registro de aulas é OBRIGATÓRIO</h3>
                    <p class="mbr-text mbr-fonts-style display-7">
                        Caso não registre a aula corretamente, pode acontecer de não somar e não receber essa aula. Por favor, registre as aulas com responsabilidade.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="image-wrapper">
                    <img src="assets/images/whatsapp-image-2022-09-13-at-20.46.09-1200x1200.jpeg" alt="">
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section class="form cid-uvpMy6Dt9N" id="formbuilder-4m">
    
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
<!--Formbuilder Form-->
<form action="salvar_registro.php" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="0/DChA3PuAWM/y4wxt5n1vZFzawhA8aIz7fIhNltLJNowqvY1+Dab4RE3qA9GcXkTrnu2L8Y61QS1YS838X8INUwhanzyJRNbm03MzFxYxBxp52WH20nnynvBNDKhrz8.Z/s8QM9Jbgdx2UO8RBVThKNN2eYhYAAyEwsV53rHwpy7zPTo+Mdw4yb2nOL92GeQWPArCiKD5Ki/rG/WaUOPl8dPn3HFTtUm1Tr0z01MGoqvQ2qPYMYDqP6KIrVnk2wI">
<div class="form-row">
<div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
<div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
</div>
<div class="dragArea row">
<div class="col-lg-12 col-md-12 col-sm-12">
<h4 class="mbr-fonts-style display-5">Formulário de registro de aula</h4>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Informações do aluno</p>
</div>
<div data-for="nome" class="col-lg-12 col-md-12 col-sm-12 form-group">

<!--nome do aluno-->
<div data-for="nome" class="col-lg-12 col-md-12 col-sm-12 form-group">
    <label for="nome-formbuilder-4m" class="form-label">Selecione ou digite o Aluno:</label>
    <input list="alunos-list" name="nome" class="form-control display-7" required="required" id="nome-formbuilder-4m" oninput="preencherEmail()">
    <datalist id="alunos-list">
        <?php foreach ($alunos as $aluno): ?>
            <option value="<?php echo htmlspecialchars($aluno['name']); ?>" data-email="<?php echo htmlspecialchars($aluno['email']); ?>">
        <?php endforeach; ?>
    </datalist>
    <small id="aluno-nao-encontrado" style="color: red; display: none;">Aluno não encontrado!</small>
</div>

<div data-for="email" class="col-lg-12 col-md-12 col-sm-12 form-group">
    <input type="email" name="email" placeholder="Email" data-form-field="email" class="form-control display-7" required="required" value="" id="email-formbuilder-4m">
</div>

<div data-for="professor" class="col-lg-12 col-md-12 col-sm-12 form-group">
    <label for="professor-formbuilder-4m" class="form-label">Professor:</label>
    <input type="text" name="professor" class="form-control display-7" readonly="readonly" id="professor-formbuilder-4m" value="<?php echo htmlspecialchars($professor_nome); ?>">
</div>

<div data-for="status" class="col-lg-12 col-md-12 col-sm-12 form-group">
<select name="status" data-form-field="status" class="form-control form-select display-7" required="required" id="status-formbuilder-4m">
<option value="" disabled selected>Status</option>
<option value="Compareceu">Compareceu</option>
<option value="Não compareceu">Não compareceu</option>
<option value="Cancelou">Cancelou</option>
<option value="Reposição">Reposição</option>
<option value="Demonstrativa">Demonstrativa</option>
<option value="Extra">Extra</option>
</select>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="date">
<input type="date" name="date" data-form-field="date" class="form-control display-7" required="required" value="2018-07-22" id="date-formbuilder-4m">
</div>
<div data-for="time" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="time" name="time" max="86400" min="0" step="1800" data-form-field="time" class="form-control display-7" required="required" value="10:00" id="time-formbuilder-4m">
</div>
<div data-for="select" class="col-lg-12 col-md-12 col-sm-12 form-group">
<select name="select" data-form-field="select" class="form-control form-select display-7" required="required" id="select-formbuilder-4m">
<option value="" disabled selected>Tempo de aula</option>
<option value="30 min">30 min</option>
<option value="45 min">45 min</option>
<option value="60 min (1hora)">60 min (1hora)</option>
<option value="90 min (1:30)">90 min (1:30)</option>
<option value="120 min (2:00)">120 min (2:00)</option>
</select>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<h5 class="mbr-fonts-style display-5">Informações da aula</h5>
</div>
<div data-for="book" class="col-lg-12 col-md-12 col-sm-12 form-group">
<select name="book" data-form-field="book" class="form-control form-select display-7" required="required" id="book-formbuilder-4m">
<option value="" disabled selected>Book</option>
<option value="Book 1">Book 1</option>
<option value="Book 2">Book 2</option>
<option value="Book 3">Book 3</option>
<option value="Book 4">Book 4</option>
<option value="Book 5">Book 5</option>
<option value="Book 6">Book 6</option>
<option value="Book 7">Book 7</option>
<option value="Book 8">Book 8</option>
<option value="BUSINESS">BUSINESS</option>
<option value="LEATHER 1">LEATHER 1</option>
 <option value="LEATHER 2">LEATHER 2</option>
<option value="LEATHER 3">LEATHER 3</option>
</select>
</div>
<div data-for="number" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="number" name="number" placeholder="Pagina" max="100" min="0" step="1" data-form-field="number" class="form-control display-7" required="required" value="" id="number-formbuilder-4m">
</div>
<div data-for="text" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="text" name="text" placeholder="Ultima atividade" data-form-field="text" class="form-control display-7" required="required" value="" id="text-formbuilder-4m">
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<h5 class="mbr-fonts-style display-5">Free Talk</h5>
</div>
<div data-for="text1" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="text" name="text1" placeholder="Descreva o tema principal" data-form-field="text1" class="form-control display-7" required="required" value="" id="text1-formbuilder-4m">
</div>
<div data-for="textarea" class="col-lg-12 col-md-12 col-sm-12 form-group">
<textarea name="textarea" placeholder="Adicione o conteúdo trabalhado no free talk" data-form-field="textarea" class="form-control display-7" required="required" id="textarea-formbuilder-4m"></textarea>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<h5 class="mbr-fonts-style display-5">Homework</h5>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="oldhomework">
<div class="form-control-label">
<label for="oldhomework-formbuilder-4m" class="mbr-fonts-style display-7">Ultimo Homework Feito?</label>
</div>
<div class="form-check form-check-inline ms-2">
<input type="radio" name="oldhomework" data-form-field="oldhomework" class="form-check-input display-7" value="Sim" checked="checked" id="oldhomework-formbuilder-4m">
<label class="form-check-label display-7">Sim</label>
</div>
<div class="form-check form-check-inline ms-2">
<input type="radio" name="oldhomework" data-form-field="oldhomework" class="form-check-input display-7" value="Não" id="oldhomework-formbuilder-4m">
<label class="form-check-label display-7">Não</label>
</div>
<div class="form-check form-check-inline ms-2">
<input type="radio" name="oldhomework" data-form-field="oldhomework" class="form-check-input display-7" value="Incompleto" id="oldhomework-formbuilder-4m">
<label class="form-check-label display-7">Incompleto</label>
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="newhomework">
<div class="form-control-label">
<label for="newhomework-formbuilder-4m" class="mbr-fonts-style display-7">Tem homework designado?</label>
</div>
<div class="form-check form-check-inline ms-2">
<input type="radio" name="newhomework" data-form-field="newhomework" class="form-check-input display-7" value="Sim" checked="checked" id="newhomework-formbuilder-4m">
<label class="form-check-label display-7">Sim</label>
</div>
<div class="form-check form-check-inline ms-2">
<input type="radio" name="newhomework" data-form-field="newhomework" class="form-check-input display-7" value="Não" id="newhomework-formbuilder-4m">
<label class="form-check-label display-7">Não</label>
</div>
<div class="form-check form-check-inline ms-2">
<input type="radio" name="newhomework" data-form-field="newhomework" class="form-check-input display-7" value="não se aplica" id="newhomework-formbuilder-4m">
<label class="form-check-label display-7">não se aplica</label>
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Descreva o homework</p>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="textarea">
<textarea name="textarea" placeholder="Textarea" data-form-field="textarea" class="form-control display-7" required="required" id="textarea-formbuilder-4m"></textarea>
</div>

<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<h5 class="mbr-fonts-style display-5">Mensagem para pais e alunos</h5>
</div>
<div data-for="message" class="col-lg-12 col-md-12 col-sm-12 form-group">
<textarea name="message" placeholder="Somente para o aluno ou os pais" data-form-field="message" class="form-control display-7" required="required" id="message-formbuilder-4m"></textarea>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<h5 class="mbr-fonts-style display-5">Mensagem para os professores</h5>
</div>
<div data-for="textarea1" class="col-lg-12 col-md-12 col-sm-12 form-group">
<textarea name="textarea1" placeholder="Somente para os professores" data-form-field="textarea1" class="form-control display-7" required="required" id="textarea1-formbuilder-4m"></textarea>
</div>
<div class="col-auto">
<button type="submit" class="w-100 w-100 w-100 btn btn-primary display-7">Submit</button>
</div>
</div>
</form><!--Formbuilder Form-->
</div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="footer2 cid-uvmsVHhveQ" id="footer02-4j">

    

    

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

<section data-bs-version="5.1" class="footer1 cid-uvmsVIm860" once="footers" id="footer1-4k">

    

    
    
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
  <script src="assets/formoid.min.js"></script>
 
<!-- logica para o nome do aluno-->
<script>
    function preencherEmail() {
        // Obtenha o valor do campo nome
        const nomeInput = document.getElementById('nome-formbuilder-4m');
        const emailInput = document.getElementById('email-formbuilder-4m');
        const alunoNaoEncontrado = document.getElementById('aluno-nao-encontrado');
        const datalistOptions = document.getElementById('alunos-list').options;

        // Limpe o aviso e o campo de e-mail
        alunoNaoEncontrado.style.display = 'none';
        emailInput.value = '';

        // Procure o aluno correspondente no datalist
        let encontrado = false;
        for (let i = 0; i < datalistOptions.length; i++) {
            const option = datalistOptions[i];
            if (option.value === nomeInput.value) {
                emailInput.value = option.getAttribute('data-email');
                encontrado = true;
                break;
            }
        }

        // Mostrar aviso se o aluno não for encontrado
        if (!encontrado && nomeInput.value.trim() !== '') {
            alunoNaoEncontrado.style.display = 'block';
        }
    }
</script>

  
  
</body>
</html>
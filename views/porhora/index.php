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
  <link rel="shortcut icon" href="assets/images/3-176x176.png" type="image/x-icon">
  <meta name="description" content="">
  
  <title>Por Hora</title>
  <script>
        function calcularValores() {
    // Obter valores dos campos
    const valorHora = parseFloat(document.getElementById("valor").value) || 0;
    const valorDemoMatri = parseFloat(document.getElementById("valordemonstrativamatri").value) || 0;
    const valorDemoNaoMatri = parseFloat(document.getElementById("valornaomatriculada").value) || 0;
    
    const horasCompareceu = parseFloat(document.getElementById("Compareceu").value) || 0;
    const horasNaoCompareceu = parseFloat(document.getElementById("naocompareceu").value) || 0;
    const horasReposicao = parseFloat(document.getElementById("reposicao").value) || 0;
    const horasDemoMatriculada = parseFloat(document.getElementById("demonstrativamatriculada").value) || 0;
    const horasDemoNaoMatriculada = parseFloat(document.getElementById("demonaomatri").value) || 0;

    // Cálculos
    const totalCompareceu = horasCompareceu * valorHora;
    const totalNaoCompareceu = horasNaoCompareceu * valorHora;
    const totalReposicao = horasReposicao * valorHora;
    const totalDemoMatriculada = horasDemoMatriculada * valorDemoMatri;
    const totalDemoNaoMatriculada = horasDemoNaoMatriculada * valorDemoNaoMatri;

    // Exibir resultados individuais
    document.getElementById("resultadoCompareceu").textContent = `R$ ${totalCompareceu.toFixed(2)}`;
    document.getElementById("resultadoNaoCompareceu").textContent = `R$ ${totalNaoCompareceu.toFixed(2)}`;
    document.getElementById("resultadoReposicao").textContent = `R$ ${totalReposicao.toFixed(2)}`;
    document.getElementById("resultadoDemoMatriculada").textContent = `R$ ${totalDemoMatriculada.toFixed(2)}`;
    document.getElementById("resultadoDemoNaoMatriculada").textContent = `R$ ${totalDemoNaoMatriculada.toFixed(2)}`;

    // Calcular total geral
    const totalGeral = totalCompareceu + totalNaoCompareceu + totalReposicao + totalDemoMatriculada + totalDemoNaoMatriculada;

    // Exibir o total geral
    document.getElementById("valorTotal").textContent = `R$ ${totalGeral.toFixed(2)}`;
}
        
    </script>
  
  <?php include '../comun/headerteachers.php'; ?>
</head>
<body>
<section data-bs-version="5.1" class="image2 cid-ux9CENKqph" id="image2-5a">
    
    


    

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg">
                <div class="text-wrapper">
                    <h3 class="mbr-section-title mbr-fonts-style mb-3 display-2"><?php echo htmlspecialchars($professor_nome); ?> a quantidade de horas<br>deve ser feito até 1 dia antes.<br></h3>
                    <p class="mbr-text mbr-fonts-style display-7">
                        Caso a quantidade de horas não esteja correto os pagamentos não serão feitos.</p>
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

<section class="form cid-ux9MIOqTby" id="formbuilder-5j">
    
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
<!--Formbuilder Form-->
<form action="salvar_registro.php" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
<div class="form-row">
<div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
<div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
</div>
<div class="dragArea row">
<div class="col-lg-12 col-md-12 col-sm-12">
<h4 class="mbr-fonts-style display-5">Preencha as informações com cuidado</h4>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div data-for="professor" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="text" name="professor" class="form-control display-7" readonly="readonly" id="professor-formbuilder-4m" value="<?php echo htmlspecialchars($professor_nome); ?>">
</div>
<div data-for="email" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="email" name="email" placeholder="Email" data-form-field="email" class="form-control display-7" value="" id="email-formbuilder-5j">
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Data de Preenchimento</p>
</div>
<div data-for="date" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="date" name="date" data-form-field="date" class="form-control display-7" value="2018-07-22" id="date-formbuilder-5j">
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<h5 class="mbr-fonts-style display-5">Informações para pagamento</h5>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Método de recebimento</p>
</div>
<div data-for="select4" class="col-lg-12 col-md-12 col-sm-12 form-group">
<select name="select4" data-form-field="select1" class="form-control form-select display-7" id="select4-formbuilder-5j">
<option value="Select">Select</option>
<option value="Pix">Pix</option>
<option value="Western union (contem taxa)">Western union (contem taxa)</option>
<option value="Binance">Binance</option>
</select>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Abaixo digite o numero de ID do binance ou seu nome completo para western Union ou o PIX</p>
</div>
<div data-for="infobank" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="text" name="infobank" placeholder="Informaçoes pagamento" data-form-field="infobank" required="required" class="form-control display-7" value="" id="infobank-formbuilder-5j">
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7" >Valor por hora</p>
</div>
<div data-for="valor" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input class="form-control display-7" name="valor"  type="number" id="valor" oninput="calcularValores()" step="0.01"><br>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Valor por demonstrativa **Matriculada**</p>
</div>
<div data-for="valordemonstrativamatri" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input class="form-control display-7" name="valordemonstrativamatri"  type="number" id="valordemonstrativamatri" oninput="calcularValores()" step="0.01"><br>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p  class="mbr-fonts-style display-7">Valor por demonstrativa **NÃO matriculada**</p>
</div>
<div data-for="valornaomatriculada" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input class="form-control display-7" name="valornaomatriculada"  type="number" id="valornaomatriculada" oninput="calcularValores()" step="0.01"><br>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<h5 class="mbr-fonts-style display-5">Registros de Horas</h5>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Compareceu</p>
</div>
<div data-for="Compareceu" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input class="form-control display-7" name="Compareceu" type="number" id="Compareceu" oninput="calcularValores()" step="0.01"><br>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Não Compareceu</p>
</div>
<div data-for="naocompareceu" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input class="form-control display-7" name="naocompareceu" type="number" id="naocompareceu" oninput="calcularValores()" step="0.01"><br>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Cancelou</p>
</div>
<div data-for="cancelou" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input class="form-control display-7"  type="text" name="cancelou" placeholder="Cancelou" data-form-field="cancelou" class="form-control display-7" value="" id="cancelou-formbuilder-5j">
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Reposição</p>
</div>
<div data-for="reposicao" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input class="form-control display-7" name="reposicao"  type="number" id="reposicao" oninput="calcularValores()" step="0.01"><br>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Demonstrativa Matriculada</p>
</div>
<div data-for="demonstrativamatriculada" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input class="form-control display-7" name="demonstrativamatriculada" type="number" id="demonstrativamatriculada" oninput="calcularValores()" step="0.01"><br>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Demonstrativas *NÃO* matriculado</p>
</div>
<div data-for="demonaomatri" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input class="form-control display-7" name="demonaomatri" type="number" id="demonaomatri" oninput="calcularValores()" step="0.01"><br>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<h5 class="mbr-fonts-style display-5">Infor para calcular bonus (consultar Tabela atualizada)</h5>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Teve alunos que avançou para próximo livro?&nbsp;</p>
</div>
<div data-for="select" class="col-lg-12 col-md-12 col-sm-12 form-group">
<select name="alunoavanco" data-form-field="select" class="form-control form-select display-7" id="alunoavanco">
<option value="Select">Select</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Escreva abaixo o nome dos alunos o livro onde estava e o livro para o avanço.</p>
</div>
<div data-for="nomealunos" class="col-lg-12 col-md-12 col-sm-12 form-group">
<textarea name="nomealunosavanco" placeholder="Nome dos alunos" data-form-field="nomealunos" class="form-control display-7" id="nomealunosavanco"></textarea>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Se voce faltou algum dia escreva os dias.</p>
</div>
<div data-for="dias" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="text" name="diasfalta" placeholder="Datas" data-form-field="dias" class="form-control display-7" value="" id="diasfalta">
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Preencheu 100% dos registros?</p>
</div>
<div data-for="select1" class="col-lg-12 col-md-12 col-sm-12 form-group">
<select name="registroscompleto" data-form-field="select1" class="form-control form-select display-7" id="registroscompleto">
<option value="Select">Select</option>
<option value="Sim ">Sim </option>
<option value="Não">Não</option>
</select>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Teve 100% das tarefas corrigidas e enviadas no grupo?</p>
</div>
<div data-for="select3" class="col-lg-12 col-md-12 col-sm-12 form-group">
<select name="hwcorrigidos" data-form-field="select3" class="form-control form-select display-7" id="hwcorrigidos">
<option value="Select">Select</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Teve a media de 3 trabalhos mensais?</p>
</div>
<div data-for="select2" class="col-lg-12 col-md-12 col-sm-12 form-group">
<select name="trabalhomensal" data-form-field="select2" class="form-control form-select display-7" id="trabalhomensal">
<option value="Select">Select</option>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Digite o nome dos alunos que fizeram os trabalhos</p>
</div>
<div data-for="nomealunostrabalho" class="col-lg-12 col-md-12 col-sm-12 form-group">
<textarea name="nomealunostrabalho" placeholder="Nome dos Alunos" data-form-field="nomealunostrabalho" class="form-control display-7" id="nomealunostrabalho"></textarea>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Teve Dois alunos ou mais que tiraram print e marcaram a escola no instagram ou Linkedin?</p>
</div>
<div data-for="numeroinsta" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="text" name="numeroinsta" placeholder="Numero de postagens" data-form-field="numeroinsta" class="form-control display-7" value="" id="numeroinsta">
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Nome dos alunos</p>
</div>
<div data-for="alunosinsta" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="text" name="alunosinsta" placeholder="Nome dos alunos" data-form-field="alunosinsta" class="form-control display-7" value="" id="alunosinsta">
</div>

<section data-bs-version="5.1" class="list1 stackm5 cid-uxv56ewDmg" id="list01-5q">
  

    

    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-5 my-auto">

                <h2 class="mbr-section-subtitle align-left mbr-fonts-style mb-3 display-2">Compareceu</h2>
            </div>
            <div class="col-12 col-lg-4">

            <p class="mbr-text align-left mbr-fonts-style display-5" name="resultadoCompareceu" id="resultadoCompareceu"> <span name="resultadoCompareceu" id="resultadoCompareceu">R$ 0.00</span></p>
            <p>Total Compareceu: <span name="resultadoCompareceu" id="resultadoCompareceu">R$ 0.00</span></p>
            
           
            </div>
            <div class="col-12">
                <div class="line"></div>
            </div>


        </div>

        <div class="row">

            <div class="col-12 col-lg-5 my-auto">

                <h2 class="mbr-section-subtitle align-left mbr-fonts-style mb-3 display-2">*NÃO* Compareceu</h2>
            </div>
            <div class="col-12 col-lg-4">

                <p class="mbr-text align-left mbr-fonts-style display-5" name="resultadoNaoCompareceu" id="resultadoNaoCompareceu">R$00,00</p>
                <input type="hidden" name="resultadoNaoCompareceu" id="hiddenResultadoCompareceu" />
            </div>
            <div class="col-12">
                <div class="line"></div>
            </div>


        </div>

        <div class="row">

            <div class="col-12 col-lg-5 my-auto">

                <h2 class="mbr-section-subtitle align-left mbr-fonts-style mb-3 display-2">Reposição</h2>
            </div>
            <div class="col-12 col-lg-4">

                <p class="mbr-text align-left mbr-fonts-style display-5" name="resultadoReposicao" id="resultadoReposicao">R$00,00</p>
                <input type="hidden" name="resultadoReposicao" id="hiddenresultadoReposicao" />
            </div>
            <div class="col-12">
                <div class="line"></div>
            </div>


        </div>
        <div class="row">

            <div class="col-12 col-lg-5 my-auto">

                <h2 class="mbr-section-subtitle align-left mbr-fonts-style mb-3 display-2">Demonstrativas Matri.</h2>
            </div>
            <div class="col-12 col-lg-4">

                <p class="mbr-text align-left mbr-fonts-style display-5" name="resultadoDemoMatriculada" id="resultadoDemoMatriculada">R$00,00 </p>
                <input type="hidden" name="resultadoDemoMatriculada" id="hiddenresultadoDemoMatriculada" />
            </div>
            <div class="col-12">
                <div class="line"></div>
            </div>


        </div>
        <div class="row">

            <div class="col-12 col-lg-5 my-auto">

                <h2 class="mbr-section-subtitle align-left mbr-fonts-style mb-3 display-2" >Demonstra **NÃo** Matri.</h2>
            </div>
            <div class="col-12 col-lg-4">

                <p class="mbr-text align-left mbr-fonts-style display-5" id="resultadoDemoNaoMatriculada">R$00,00
                </p>
                <input type="hidden" name="resultadoDemoNaoMatriculada" id="hiddenresultadoDemoNaoMatriculada" />
            </div>
            <div class="col-12">
                <div class="line"></div>
            </div>


        </div>

        <div class="row">

            <div class="col-12 col-lg-5 my-auto">

                <h2 class="mbr-section-subtitle align-left mbr-fonts-style mb-3 display-2">Valor total a receber:</h2>
            </div>
            <div class="col-12 col-lg-4">

                <p class="mbr-text align-left mbr-fonts-style display-5" id="valorTotal">R$00,00 </p>
                <input type="hidden" name="valorTotal" id="hiddenvalorTotal" />
            </div>
            <div class="col-12">
                <div class="line"></div>
            </div>
            

        </div>
    </div>
</section>


<div class="col-auto">

<br>
<br>

<button type="submit" class="w-100 w-100 w-100 w-100 w-100 w-100 w-100 btn btn-primary display-7">Registrar</button>
</div>
</div>
</form><!--Formbuilder Form-->
</div>
        </div>
    </div>
</section>



<section data-bs-version="5.1" class="content02 politicsm4_content02 cid-uxv7orDKW4" id="content02-5s">

	
    


	

	<div class="container">
		<div class="row justify-content-center align-left">
			<div class="col-lg-12 md-pb">
				<h3 class="mbr-section-subtitle pb-2 mbr-fonts-style display-7">
					registrados pelo(a) teacher</h3>
				<h2 class="mbr-section-title mbr-bold pb-1 mbr-fonts-style display-1">Últimos Valores Registrados</h2>
				<div class="line-wrap">
					<div class="line"></div>
				</div>
				<p class="mbr-text py-2 mbr-fonts-style display-7">
					
				<img src="assets/images/signature.png" alt="">
			</div>
		</div>
	</div>
</section>

<section data-bs-version="5.1" class="footer2 cid-ux9CEPQhTh" id="footer02-5e">

    

    

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

<section data-bs-version="5.1" class="footer1 cid-ux9CEQjHKQ" once="footers" id="footer1-5f">

    

    
    
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
  
  
  
</body>
</html>
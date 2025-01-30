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
  
  
  <title>Dashbord Teachers</title>
  <?php include '../comun/headerteachers.php'; ?>
  </head>
  <body>

<section data-bs-version="5.1" class="header1 cid-uuYAWK3frm" id="header01-3o">

    

    
    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <div class="d-flex pb-5">
                    <div class="dot"></div>
                    <div class="dot dot-right "></div>
                </div>
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-1"><strong>Welcome teacher, <?php echo htmlspecialchars($professor_nome); ?>!<br><br></h1>
                
                
                
                <div class="d-flex pt-5">
                    <div class="dot"></div>
                    <div class="dot dot-right "></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="talkm5 list1 cid-uuYCT8STu2" id="list1-42">
	
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-12 col-lg-10 m-auto">
				<div class="content">
					<div class="row justify-content-center mb-5">
						<div class="col-12 col-md align">
							<h5 class="mbr-section-title mbr-fonts-style mt-0 mb-2 display-7">Attention</h5><br>
							<h6 class="mbr-section-subtitle mbr-fonts-style mt-0 display-2">
								Our<br>Announcements and Rules<br></h6>
						</div>
					</div>
					<div id="bootstrap-accordion_16" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse1_16" aria-expanded="false" aria-controls="collapse1">
									<div class="title-wrapper">
										<span class="panel-number-edit mbr-semibold mbr-fonts-style mb-0 display-7">
											01<br></span>
										<h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5">Announcements<br></h6>
									</div>
									<span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
								</a>
							</div>
							<div id="collapse1_16" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_16">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-7">
									It is with great enthusiasm that we welcome you to the Seidmann Institute! We are thrilled to have you with us and hope your experience here will be enriching and transformative. Our commitment is to provide a dynamic, innovative, and professional learning environment where you will have access to high-quality materials and ongoing support for your development. We believe in the power of education to foster meaningful and lasting change, and we are confident that, together, we can achieve great results. Welcome, and count on us every step of the way!<br>
									</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse2_16" aria-expanded="false" aria-controls="collapse2">
									<div class="title-wrapper">
										<span class="panel-number-edit mbr-semibold mbr-fonts-style mb-0 display-7">
											02<br></span>
										<h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5"> Rules / English </h6>
									</div>
									<span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
								</a>
							</div>
							<div id="collapse2_16" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_16">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-7">
										1.	Document all activities performed in a detailed and accurate manner.
										<br>
										2.	Participate in all training sessions with the Class Management team to ensure continuous updates.
										<br>
										3.	Immediately report any issues or concerns to the Class Management team for effective resolution.
										<br>
										4.	Ensure a stable internet connection, sending a screenshot if necessary, with a connection test performed at: https://www.minhaconexao.com.br/.
										<br>
										5.	Always use appropriate cameras and headphones (or ensure the use of quality speakers).
										<br>
										6.	Class environments must be clean, organized, and quiet, providing a conducive space for learning.
										<br>
										7.	Attire: Adopt formal clothing to convey professionalism and commitment to students.
										<br>
										8.	Be punctual, regardless of occasional delays from students. Report frequent delays to the Class Management team for monitoring.
										<br>
										9.	Do not promote unrelated services or activities during classes.
										<br>
										10.	Immediately report any issues to the Class Management team. Failure to do so may result in a deduction from the agreed payment.
										<br>
										11.	Class cancellations: Students may cancel classes up to one hour before the scheduled time. The Class Management team will reschedule and confirm the new time.
										<br>
										12.	For class cancellations, the provider must notify 30 days in advance. Classes not canceled within the stipulated timeframe will be deducted from the final payment.
										<br>
										13.	Attention: Schedules are not fixed and may change weekly. Providers must review schedules daily to ensure accuracy.
										<br>
										14.	Payment will always be made by the 5th business day of the month upon delivery of records.
									</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse3_16" aria-expanded="false" aria-controls="collapse3">
									<div class="title-wrapper">
										<span class="panel-number-edit mbr-semibold mbr-fonts-style mb-0 display-7">
											03<br></span>
										<h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5"> Rules / Português </h6>
									</div>
									<span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
								</a>
							</div>
							<div id="collapse3_16" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_16">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-7">
									1.	Registrar todas as atividades realizadas de maneira detalhada e precisa.
									<br>
									2.	Participar de todas as sessões de treinamento com a Gestão de Aulas, garantindo a atualização contínua.
									<br>
									3.	Relatar imediatamente quaisquer problemas ou dúvidas à Gestão de Aulas para resolução eficaz.
									<br>
									4.	Garantir uma conexão de internet estável, enviando uma captura de tela, se necessário, com um teste de conexão realizado no site: https://www.minhaconexao.com.br/
									<br>
									5.	Utilizar sempre câmera e fones de ouvido adequados (ou garantir o uso de alto-falantes de qualidade).
									<br>
									6.	Os ambientes de aula devem ser limpos, organizados e silenciosos, proporcionando um espaço propício ao aprendizado.
									<br>
									7.	Vestimenta: Adotar vestuário formal para transmitir profissionalismo e compromisso com os alunos.
									<br>
									8.	Ser pontual, independentemente de eventuais atrasos dos alunos. Relatar atrasos frequentes à Gestão de Aulas para acompanhamento.
									<br>
									9.	Não promover serviços ou atividades não relacionadas durante as aulas.
									<br>
									10.	Reportar imediatamente quaisquer problemas à Gestão de Aulas. Caso contrário, poderá haver desconto no valor acordado.
									<br>
									11.	Cancelamento de aulas: Os alunos podem cancelar aulas até uma hora antes do horário agendado. A Direção de Aulas reagendará e confirmará o novo horário.
									<br>
									12.	Para o cancelamento de aulas, o prestador deve avisar com ***30 dias de antecedência****. Aulas não canceladas dentro do prazo estipulado serão descontadas do valor final.
									<br>
									13.	Atenção: Os horários não são fixos e podem ser alterados semanalmente. prestadores devem revisar os horários diariamente para garantir precisão.
									<br>
									14.	O pagamento será efetuado sempre até o 5º dia útil do mês mediante a entrega dos registros.
							
									</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse4_16" aria-expanded="false" aria-controls="collapse4">
									<div class="title-wrapper">
										<span class="panel-number-edit mbr-semibold mbr-fonts-style mb-0 display-7">
											04<br></span>
										<h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5">Rules / Español</h6>
									</div>
									<span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
								</a>
							</div>
							<div id="collapse4_16" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_16">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-7">
									1.	Registrar todas las actividades realizadas de manera detallada y precisa.
									<br>
									2.	Participar en todas las sesiones de capacitación con la Gestión de Aulas, garantizando la actualización continua.
									<br>
									3.	Reportar inmediatamente cualquier problema o duda a la Gestión de Aulas para una resolución efectiva.
									<br>
									4.	Asegurar una conexión a Internet estable, enviando una captura de pantalla, si es necesario, con una prueba de conexión realizada en el sitio: https://www.minhaconexao.com.br/
									<br>
									5.	Utilizar siempre cámara y auriculares adecuados (o garantizar el uso de altavoces de calidad).
									<br>
									6.	Los ambientes de clase deben estar limpios, organizados y silenciosos, proporcionando un espacio propicio para el aprendizaje.
									<br>
									7.	Vestimenta: Adoptar vestimenta formal para transmitir profesionalismo y compromiso con los alumnos.
									<br>
									8.	Ser puntual, independientemente de los posibles retrasos de los alumnos. Reportar retrasos frecuentes a la Gestión de Aulas para seguimiento.
									<br>
									9.	No promover otros servicios o actividades no relacionadas durante las clases.
									<br>
									10.	Reportar inmediatamente cualquier problema a la Gestión de Aulas. De lo contrario, se podrá aplicar un descuento sobre el valor acordado.
									<br>
									11.	Cancelación de clases: Los alumnos pueden cancelar clases hasta una hora antes del horario programado. La Dirección de Aulas reagendará y confirmará el nuevo horario.
									<br>
									12.	Para cancelar una clase, el proveedor debe avisar con 30 días de antelación. Las clases no canceladas dentro del plazo estipulado serán descontadas del valor final.
									<br>
									13.	Atención: Los horarios no son fijos y pueden cambiar semanalmente. Los proveedores deben revisar los horarios diariamente para garantizar su precisión.
									<br>
									14.	El pago se efectuará siempre hasta el 5º día hábil del mes, mediante la entrega de los registros.

									</p>
								</div>
							</div>
						</div>

						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section data-bs-version="5.1" class="footer2 cid-uuYAWWeeoR" id="footer02-40">

    

    

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

<section data-bs-version="5.1" class="footer1 cid-uuYAWXcoO3" once="footers" id="footer1-41">

    

    
    
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
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/ytplayer/index.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  
</body>
</html>
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
										Sem anúncios / no&nbsp;Announcements<br>
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
										<h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5">What
											services do you offer?</h6>
									</div>
									<span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
								</a>
							</div>
							<div id="collapse2_16" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_16">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-7">- Development of the event
										concept<br>-&nbsp;&nbsp;Invitation of speakers and guests<br>-&nbsp;Development
										of a unique design<br>-&nbsp;Full support</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse3_16" aria-expanded="false" aria-controls="collapse3">
									<div class="title-wrapper">
										<span class="panel-number-edit mbr-semibold mbr-fonts-style mb-0 display-7">
											03<br></span>
										<h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5">What
											events has your company held?</h6>
									</div>
									<span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
								</a>
							</div>
							<div id="collapse3_16" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_16">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-7">Our company organizes events in the fields of
										IT, engineering, construction, medicine.</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse4_16" aria-expanded="false" aria-controls="collapse4">
									<div class="title-wrapper">
										<span class="panel-number-edit mbr-semibold mbr-fonts-style mb-0 display-7">
											04<br></span>
										<h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5">Can you
											organize a small event for 10-20 people?</h6>
									</div>
									<span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
								</a>
							</div>
							<div id="collapse4_16" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_16">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-7">
										Yes, our company can organize corporate events for a small company.
									</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse5_16" aria-expanded="false" aria-controls="collapse5">
									<div class="title-wrapper">
										<span class="panel-number-edit mbr-semibold mbr-fonts-style mb-0 display-7">
											05<br></span>
										<h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5">How
											quickly will the event be organized?<br></h6>
									</div>
									<span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
								</a>
							</div>
							<div id="collapse5_16" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_16">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-7">Organization time depends on many factors:<br>
										<br>- venues
										<br>- design requirements
										<br>- number of people<br>
										<br>We recommend planning your event in advance, several months before the
										desired date.
									</p>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse6_16" aria-expanded="false" aria-controls="collapse6">
									<div class="title-wrapper">
										<span class="panel-number-edit mbr-semibold mbr-fonts-style mb-0 display-7">
											06<br></span>
										<h6 class="panel-title-edit mbr-semibold mbr-fonts-style mb-0 display-5">How much
											do your services cost?<br></h6>
									</div>
									<span class="sign mbr-iconfont mobi-mbri-arrow-down"></span>
								</a>
							</div>
							<div id="collapse6_16" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_16">
								<div class="panel-body">
									<p class="mbr-fonts-style panel-text display-7">The cost of our company’s services depends on
										the complexity of the project. <br>In order to make preliminary calculations,
										you need to contact our managers and discuss all the details.</p>
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
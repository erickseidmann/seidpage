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
// Conectar ao banco de dados
include '../comun/conexao.php';

// Definir o número de registros por página
$registros_por_pagina = 30;

// Obter o número da página atual
$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina_atual < 1) {
    $pagina_atual = 1;
}

// Calcular o offset
$offset = ($pagina_atual - 1) * $registros_por_pagina;

// Contar o número total de registros
$sql_total = "SELECT COUNT(*) as total FROM registro_aulas";
$result_total = $conn->query($sql_total);
$total_registros = $result_total->fetch_assoc()['total'];

// Calcular o número total de páginas
$total_paginas = ceil($total_registros / $registros_por_pagina);

// Consultar os registros da página atual
$sql = "SELECT * FROM registro_aulas ORDER BY data_aula DESC LIMIT $offset, $registros_por_pagina";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html  >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/3-176x176.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <meta name="description" content="">
  
  
  <title>Registros de Aulas</title>
  <style>
    /* Definir tamanho fixo e esconder o texto excedente */
td.limitar-texto {
    max-width: 200px; /* Defina o tamanho desejado */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer; /* Para mostrar que é clicável */
}

/* Exibir texto completo quando a célula é clicada */
td.limitar-texto.expandido {
    white-space: normal;
    overflow: visible;
    max-height: none;
    cursor: auto; /* Desabilitar o cursor de clique quando expandido */
}

  </style>
  
  <?php include '../comun/headerteachers.php'; ?>
  </head>
  <body>



<section data-bs-version="5.1" class="image2 cid-uwathCn99j" id="image2-4t">
    
    


    

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg">
                <div class="text-wrapper">
                    <h3 class="mbr-section-title mbr-fonts-style mb-3 display-2"><?php echo htmlspecialchars($professor_nome); ?>,Todos os registros devem constar aqui</h3>
                    <p class="mbr-text mbr-fonts-style display-7">
                        Caso não encontre os registros por favor entrar em contato&nbsp;<br>com o time de gestão de aulas.</p>
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

<section data-bs-version="5.1" class="tutorm5 list2 cid-uwau4JE7Nw" id="list2-4y">

	

	
	

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="title-wrapper">
                <h3 class="mbr-section-title mbr-fonts-style display-2">Pesquise e prepare</h3>
            </div>

           

            <div id="bootstrap-accordion_27" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse1_27" aria-expanded="false" aria-controls="collapse1">
                            <h4 class="panel-title-edit mbr-fonts-style display-5">ver os registros</h4>
                            <span class="sign mbr-iconfont mobi-mbri-plus mobi-mbri"></span>
                        </a>
                    </div>
                    <div id="collapse1_27" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_27">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="studentTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th><input type="text" placeholder="Nome do Aluno"></th>
                                            <th><input type="text" placeholder="Professor"></th>
                                            <th><input type="text" placeholder="Status"></th>
                                            <th><input type="text" placeholder="Data"></th>
                                            <th><input type="text" placeholder="Hora"></th>
                                            <th><input type="text" placeholder="Duração"></th>
                                            <th><input type="text" placeholder="Livro"></th>
                                            <th><input type="text" placeholder="Página"></th>
                                            <th>Última Atividade</th>
                                            <th>Free Talk</th>
                                            <th><input type="text" placeholder="Hw Feito"></th>
                                            <th><input type="text" placeholder="Hw Designado"></th>
                                            <th>Descrição Hw</th>
                                            <th>Mensagem do Professor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($result->num_rows > 0): ?>
                                            <?php while ($row = $result->fetch_assoc()): ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo htmlspecialchars($row['aluno_nome']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['professor_nome']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['status_aula']); ?></td>
                                                    <td>
                                                        <?php 
                                                            $data_aula = DateTime::createFromFormat('Y-m-d', $row['data_aula']);
                                                            echo $data_aula ? $data_aula->format('d/m/Y') : '-';
                                                        ?>
                                                    </td>
                                                    <td><?php echo htmlspecialchars($row['hora_aula']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['duracao_aula']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['livro_utilizado']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['numero_pagina']); ?></td>
                                                    <td class="limitar-texto"><?php echo htmlspecialchars($row['ultima_atividade']); ?></td>
                                                    <td class="limitar-texto"><?php echo htmlspecialchars($row['free_talk']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['old_homework']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['new_homework']); ?></td>
                                                    <td class="limitar-texto"><?php echo htmlspecialchars($row['descricao_homework']); ?></td>
                                                    <td class="limitar-texto"><?php echo htmlspecialchars($row['mensagem_professor']); ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="12" class="text-center">Nenhum registro encontrado.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>

<section data-bs-version="5.1" class="footer2 cid-uwathDadMU" id="footer02-4v">

    

    

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

<section data-bs-version="5.1" class="footer1 cid-uwathDqSUZ" once="footers" id="footer1-4w">

    

    
    
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
  <script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  
  
 <script>
function filterTable() {
    const input = document.getElementById("searchInput");
    const filter = input.value.toUpperCase();
    const table = document.getElementById("studentTable");
    const tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) { // Começa do índice 1 para ignorar o cabeçalho
        const td = tr[i].getElementsByTagName("td")[1]; // Coluna Nome do Aluno
        if (td) {
            const txtValue = td.textContent || td.innerText;
            tr[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
        }
    }
}


    document.addEventListener('DOMContentLoaded', function() {
    // Selecionar todas as células com a classe 'limitar-texto'
    const cells = document.querySelectorAll('td.limitar-texto');
    
    // Adicionar um evento de clique para alternar o estado da célula
    cells.forEach(cell => {
        cell.addEventListener('click', function() {
            this.classList.toggle('expandido');
        });
    });
});

$(document).ready(function() {
        // Inicializa a tabela
        var table = $('#studentTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/Portuguese-Brasil.json"
            }
        });



        table.columns().every(function() {
            var column = this;
            $('input', this.header()).on('keyup change clear', function() {
                if (column.search() !== this.value) {
                    column.search(this.value).draw();
                }
            });
        });
    });



 </script> 
  
</body>
</html>
<?php
session_start();

if (!isset($_SESSION['professor_id'])) {
    header("Location: index.php");
    exit;
}

include '../comun/conexao.php';

$professor_nome = $_SESSION['professor_nome'];
$total_aulas = 0;
$resultados = [];
$mensagem = "Nenhuma hora encontrada";

// Array para armazenar horas por status
$horas_por_status = [
    'Compareceu' => 0,
    'Não Compareceu' => 0,
    'Cancelou' => 0,
    'Reposição' => 0,
    'Demonstrativa' => 0,
    'Extra' => 0
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mes = $_POST['select1'] ?? '';
    $ano = $_POST['select'] ?? '';

    $meses = ['Jan' => '01', 'Fev' => '02', 'Mar' => '03', 'Abr' => '04', 'Mai' => '05', 'Jun' => '06',
              'Jul' => '07', 'Ago' => '08', 'Set' => '09', 'Out' => '10', 'Nov' => '11', 'Dez' => '12'];
    $mes_numero = $meses[$mes] ?? '';

    if ($mes_numero && $ano != "Select") {
        // Query tabela registro_aulas
        $query1 = "SELECT aluno_nome, status_aula, data_aula, hora_aula, duracao_aula 
                    FROM registro_aulas 
                    WHERE professor_nome = ? AND MONTH(data_aula) = ? AND YEAR(data_aula) = ?";
        $stmt1 = $conn->prepare($query1);
        $stmt1->bind_param("sss", $professor_nome, $mes_numero, $ano);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        // Query tabela registro_aulas_grupo
        $query2 = "SELECT aluno_nome, status_aluno, data_aula, hora_aula, tempo_aula 
                    FROM registro_aulas_grupo 
                    WHERE professor_nome = ? AND MONTH(data_aula) = ? AND YEAR(data_aula) = ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("sss", $professor_nome, $mes_numero, $ano);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        // Processar resultados
        while ($row = $result1->fetch_assoc()) {
            $status = $row['status_aula'];
            $duracao = (int)$row['duracao_aula'];

            $resultados[] = $row;
            $total_aulas += $duracao;

            // Somar por status
            if (isset($horas_por_status[$status])) {
                $horas_por_status[$status] += $duracao;
            }
        }

        while ($row = $result2->fetch_assoc()) {
            $status = $row['status_aluno'];
            $duracao = (int)$row['tempo_aula'];

            $resultados[] = [
                'aluno_nome' => $row['aluno_nome'],
                'status_aula' => $status,
                'data_aula' => $row['data_aula'],
                'hora_aula' => $row['hora_aula'],
                'duracao_aula' => $duracao
            ];
            $total_aulas += $duracao;

            // Somar por status
            if (isset($horas_por_status[$status])) {
                $horas_por_status[$status] += $duracao;
            }
        }

        if (!empty($resultados)) {
            $mensagem = "";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Ver horas registradas</title>
    <?php include '../comun/headerteachers.php'; ?>
</head>
<body>
    <section>
        <div class="container mt-5">
            <h3><?php echo htmlspecialchars($professor_nome); ?>, o valor a receber está relacionado ao seu registro</h3>
            <p>Caso não registre a aula isso pode afetar diretamente o valor a receber</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="mb-3">
                    <label for="select1">Selecione um mês</label>
                    <select name="select1" class="form-control" id="select1">
                        <option value="Select">Select</option>
                        <?php
                        $meses_array = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
                        foreach ($meses_array as $mes) {
                            echo "<option value=\"$mes\">$mes</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="select">Selecione um ano</label>
                    <select name="select" class="form-control" id="select">
                        <option value="Select">Select</option>
                        <?php
                        $currentYear = date('Y');
                        for ($year = 2018; $year <= 2034; $year++) {
                            echo "<option value=\"$year\">$year</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Buscar Horas</button>
            </form>
        </div>
    </section>

    <section>
    <div class="table-responsive">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Total de Aulas Trabalhadas</h2>
            <?php if ($mensagem): ?>
                <div class="alert alert-warning text-center"><?php echo $mensagem; ?></div>
            <?php else: ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th>Status</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Duração (minutos)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultados as $aula): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($aula['aluno_nome']); ?></td>
                                <td><?php echo htmlspecialchars($aula['status_aula']); ?></td>
                                <td><?php echo htmlspecialchars($aula['data_aula']); ?></td>
                                <td><?php echo htmlspecialchars($aula['hora_aula']); ?></td>
                                <td><?php echo htmlspecialchars($aula['duracao_aula']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-end mt-3">
                <div class="text-end mt-3">
    <?php $horas = floor($total_aulas / 60);  $minutos = $total_aulas % 60;?>
    <h5><strong>Total de horas registradas:</strong> 
        <?php echo sprintf('%02d:%02d', $horas, $minutos); ?> horas
    </h5>

    <h5 class="mt-4"><strong>Detalhes por Status:</strong></h5>
    <ul>
        <?php foreach ($horas_por_status as $status => $duracao): ?>
            <li>
                <?php 
                    $h = floor($duracao / 60);
                    $m = $duracao % 60;
                ?>
                <strong><?php echo htmlspecialchars($status); ?>:</strong> 
                <?php echo sprintf('%02d:%02d', $h, $m); ?> horas
            </li>
        <?php endforeach; ?>
    </ul>
</div>



                </div>
            <?php endif; ?>
        </div>
        </div>
    </section>

<section data-bs-version="5.1" class="article3 cid-ux7wIcfELr" id="content03-58">

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


<script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/smoothscroll/smooth-scroll.js"></script>
  <script src="../../assets/ytplayer/index.js"></script>
  <script src="../../assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="../../assets/theme/js/script.js"></script>
  <script src="../../assets/formoid.min.js"></script>
  
  
  
</body>
</html>
<?php
// Fechar a conexão
$conn->close();
?>
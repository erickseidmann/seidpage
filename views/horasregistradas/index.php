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
    'Nao compareceu' => 0,
    'Cancelou' => 0,
    'Reposicao' => 0,
    'Demonstrativa' => 0,
    'Extra' => 0
];

// Verificar se o usuário é "gestao"
$is_gestao = isset($_SESSION['professor_nome']) && $_SESSION['professor_nome'] === 'gestao';

// Buscar lista de professores (apenas para gestao)
$professores = [];
if ($is_gestao) {
    $query_professores = "SELECT id, nome FROM professores";
    $stmt_professores = $conn->prepare($query_professores);
    if ($stmt_professores) {
        $stmt_professores->execute();
        $result = $stmt_professores->get_result();
        $professores = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        // Log de erro para depuração
        error_log("Erro ao preparar a query: " . $conn->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mes = $_POST['select1'] ?? '';
    $ano = $_POST['select'] ?? '';
    $professor_selecionado = $is_gestao ? ($_POST['professor'] ?? $professor_nome) : $professor_nome;

    $meses = ['Jan' => '01', 'Fev' => '02', 'Mar' => '03', 'Abr' => '04', 'Mai' => '05', 'Jun' => '06',
              'Jul' => '07', 'Ago' => '08', 'Set' => '09', 'Out' => '10', 'Nov' => '11', 'Dez' => '12'];
    $mes_numero = $meses[$mes] ?? '';

    if ($mes_numero && $ano != "Select") {
        // Query tabela registro_aulas
        $query1 = "SELECT aluno_nome, status_aula, data_aula, hora_aula, duracao_aula 
                    FROM registro_aulas 
                    WHERE professor_nome = ? AND MONTH(data_aula) = ? AND YEAR(data_aula) = ?";
        $stmt1 = $conn->prepare($query1);
        $stmt1->bind_param("sss", $professor_selecionado, $mes_numero, $ano);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        // Query tabela registro_aulas_grupo
        $query2 = "SELECT aluno_nome, status_aluno, data_aula, hora_aula, tempo_aula 
                    FROM registro_aulas_grupo 
                    WHERE professor_nome = ? AND MONTH(data_aula) = ? AND YEAR(data_aula) = ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("sss", $professor_selecionado, $mes_numero, $ano);
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
                <?php if (isset($_SESSION['professor_nome']) && $_SESSION['professor_nome'] === 'gestao'):?>
                    <div class="mb-3">
                        <label for="professor">Selecione o Professor</label>
                        <select name="professor" class="form-control" id="professor" required>
                            <?php foreach ($professores as $professor): ?>
                                <option value="<?php echo htmlspecialchars($professor['nome']); ?>">
                                    <?php echo htmlspecialchars($professor['nome']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif; ?>
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
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Restante do código HTML... -->
</body>
</html>
<?php
// Fechar a conexão
$conn->close();
?>
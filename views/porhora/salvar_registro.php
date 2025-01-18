<?php
// Incluir a conexão com o banco de dados
include '../comun/conexao.php'; // Substitua pelo arquivo que contém a conexão com o banco

$professor = $_POST['professor'] ?? null;
$email = $_POST['email'] ?? null;
$data_preenchimento = $_POST['date'] ?? null;
$metodo_recebimento = $_POST['select4'] ?? null;
$informacao_pagamento = $_POST['infobank'] ?? null;
$valor_por_hora = $_POST['valor'] ?? null;
$valor_demo_matriculada = $_POST['valordemonstrativamatri'] ?? null;
$valor_demo_nao_matriculada = $_POST['valornaomatriculada'] ?? null;
$horas_compareceu = $_POST['Compareceu'] ?? null;
$total_compareceu = $_POST['resultadoCompareceu'] ?? null;
$horas_nao_compareceu = $_POST['naocompareceu'] ?? null;
$total_nao_compareceu = $_POST['resultadoNaoCompareceu'] ?? null;
$horas_reposicao = $_POST['reposicao'] ?? null;
$total_reposicao = $_POST['resultadoReposicao'] ?? null;
$horas_demo_matriculada = $_POST['demonstrativamatriculada'] ?? null;
$total_demo_matriculada = $_POST['resultadoDemoMatriculada'] ?? null;
$horas_demo_nao_matriculada = $_POST['demonaomatri'] ?? null;
$total_demo_nao_matriculada = $_POST['resultadoDemoNaoMatriculada'] ?? null;
$total_geral = $_POST['valorTotal'] ?? null;

// Comando SQL corrigido
$sql = "INSERT INTO porhora (
    professor, email, data_preenchimento, metodo_recebimento, informacao_pagamento,
    valor_hora, valor_demonstrativa_matriculada, valor_demonstrativa_nao_matriculada,
    horas_compareceu, total_compareceu, horas_nao_compareceu, total_nao_compareceu,
    horas_reposicao, total_reposicao, horas_demo_matriculada, total_demo_matriculada,
    horas_demo_nao_matriculada, total_demo_nao_matriculada, total_geral
) VALUES (
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
)";

// Preparar a consulta
$stmt = $conn->prepare($sql);

// Verificar se a consulta foi preparada corretamente
if (!$stmt) {
    die("Erro ao preparar a consulta: " . $conn->error);
}

// Associar os parâmetros
$stmt->bind_param(
    "sssssssssssssssssss",
    $professor, $email, $data_preenchimento, $metodo_recebimento, $informacao_pagamento,
    $valor_por_hora, $valor_demo_matriculada, $valor_demo_nao_matriculada,
    $horas_compareceu, $total_compareceu, $horas_nao_compareceu, $total_nao_compareceu,
    $horas_reposicao, $total_reposicao, $horas_demo_matriculada, $total_demo_matriculada,
    $horas_demo_nao_matriculada, $total_demo_nao_matriculada, $total_geral
);

// Executar a consulta e verificar o resultado
if ($stmt->execute()) {
    echo "Registro salvo com sucesso!";
} else {
    echo "Erro ao salvar o registro: " . $stmt->error;
}

// Fechar a conexão
$stmt->close();
$conn->close();
?>
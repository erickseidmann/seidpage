<?php
session_start();

if (!isset($_SESSION['professor_id'])) {
    header("Location: index.php");
    exit;
}

include '../comun/conexao.php';

$professor_nome = $_SESSION['professor_nome'];
$data_aula = $_POST['date'];
$hora_aula = $_POST['time'];
$tempo_aula = $_POST['select'];
$livro = $_POST['book'];
$pagina = $_POST['number'];
$temafree = $_POST['temafree'];
$free_talk = $_POST['free_talk'];
$ultima_atividade = $_POST['text'];

$homework = $_POST['homework'] ?? null;
$old_homework = $_POST['oldhomework'];
$new_homework = $_POST['newhomework'];
$descricao_homework = $_POST['textarea'];
$mensagem_pais_alunos = $_POST['message'];
$mensagem_professores = $_POST['textarea1'];

// Concatenar nomes e status dos alunos
$nomes_alunos = '';
$status_alunos = '';

for ($i = 1; $i <= 5; $i++) {
    $nome_aluno = $_POST["nome_aluno$i"] ?? '';
    $status_aluno = $_POST["status_aluno$i"] ?? '';

    if (!empty($nome_aluno)) {
        $nomes_alunos .= $nome_aluno . ', ';
        $status_alunos .= $status_aluno . ', ';
    }
}

// Remover a vírgula e espaço finais
$nomes_alunos = rtrim($nomes_alunos, ', ');
$status_alunos = rtrim($status_alunos, ', ');

// Preparar a query
$stmt = $conn->prepare("INSERT INTO registro_aulas_grupo 
(professor_nome, aluno_nome, data_aula, hora_aula, tempo_aula, livro, pagina, temafree, free_talk, ultima_atividade, homework, old_homework, new_homework, descricao_homework, mensagem_pais_alunos, mensagem_professores, status_aluno, created_at) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

$stmt->bind_param("sssssssssssssssss", 
    $professor_nome, 
    $nomes_alunos, 
    $data_aula, 
    $hora_aula, 
    $tempo_aula, 
    $livro, 
    $pagina, 
    $temafree, 
    $free_talk, 
    $ultima_atividade, 
    $homework, 
    $old_homework, 
    $new_homework, 
    $descricao_homework, 
    $mensagem_pais_alunos, 
    $mensagem_professores,
    $status_alunos
);

if ($stmt->execute()) {
    echo "<script>
        alert('Registro salvo com sucesso!');
        window.location.href = 'index.php';
      </script>";
} else {
    echo "Erro ao salvar registro: " . $stmt->error . "<br>";
}

$stmt->close();
$conn->close();
?>

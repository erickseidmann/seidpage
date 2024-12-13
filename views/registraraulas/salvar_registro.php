<?php
// Iniciar a sessão
session_start();

// Verificar se o professor está logado
if (!isset($_SESSION['professor_id'])) {
    header("Location: index.php");
    exit;
}

// Conectar ao banco de dados
include '../comun/conexao.php';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aluno_nome = $_POST['nome'];
    $aluno_email = $_POST['email'];
    $professor_nome = $_SESSION['professor_nome'];
    $status_aula = $_POST['status'];
    $data_aula = $_POST['date'];
    $hora_aula = $_POST['time'];
    $duracao_aula = $_POST['select'];
    $livro_utilizado = $_POST['book'];
    $numero_pagina = $_POST['number'];
    $ultima_atividade = $_POST['text'];
    $free_talk = $_POST['text1'];

    // Inserir os dados na tabela
    $sql = "INSERT INTO registro_aulas (aluno_nome, aluno_email, professor_nome, status_aula, data_aula, hora_aula, duracao_aula, livro_utilizado, numero_pagina, ultima_atividade, free_talk)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssiss', $aluno_nome, $aluno_email, $professor_nome, $status_aula, $data_aula, $hora_aula, $duracao_aula, $livro_utilizado, $numero_pagina, $ultima_atividade, $free_talk);

    if ($stmt->execute()) {
        echo "<script>
                alert('Registro salvo com sucesso!');
                window.location.href = 'index';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao salvar o registro: " . addslashes($stmt->error) . "');
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>

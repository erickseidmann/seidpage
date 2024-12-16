<?php
session_start();

// Verificar se o professor está logado
if (!isset($_SESSION['professor_id'])) {
    header("Location: index.php");
    exit;
}

// Conexão com o banco de dados
include '../comun/conexao.php';

// Dados do formulário
$professor_nome = $_SESSION['professor_nome'];
$data_aula = $_POST['date'];
$hora_aula = $_POST['time'];
$tempo_aula = $_POST['select'];
$livro = $_POST['book'];
$pagina = $_POST['number'];
$temafree = $_POST['temafree'];
$free_talk = $_POST['free_talk'];
$ultima_atividade = $_POST['text'];

// Dados do homework
$homework = $_POST['homework'] ?? null; // Garantir valor nullável
$old_homework = $_POST['oldhomework']; // "Sim", "Não", "Incompleto"
$new_homework = $_POST['newhomework']; // "Sim", "Não", "não se aplica"
$descricao_homework = $_POST['textarea']; // Descrição do homework
$mensagem_pais_alunos = $_POST['message']; // Mensagem para pais/alunos
$mensagem_professores = $_POST['textarea1']; // Mensagem para professores

// Loop para capturar dados de cada aluno
for ($i = 1; $i <= 5; $i++) {
    $nome_aluno = $_POST["nome_aluno$i"] ?? null;
    $status_aluno = $_POST["status_aluno$i"] ?? null;

    // Verifica se o aluno tem nome e status preenchidos
    if (!empty($nome_aluno) && !empty($status_aluno)) {
        // Query de inserção
        $stmt = $conn->prepare("INSERT INTO registro_aulas_grupo 
        (professor_nome, aluno_nome, status_aluno, data_aula, hora_aula, tempo_aula, livro, pagina, temafree, free_talk, ultima_atividade, homework, old_homework, new_homework, descricao_homework, mensagem_pais_alunos, mensagem_professores, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

        // Vinculação dos parâmetros
        $stmt->bind_param("sssssssssssssssss", 
            $professor_nome, 
            $nome_aluno, 
            $status_aluno, 
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
            $mensagem_professores
        );

        // Executar e verificar sucesso
        if ($stmt->execute()) {
            echo "<script>
                alert('Registro salvo com sucesso!');
                window.location.href = 'index';
              </script>";
        } else {
            echo "Erro ao salvar registro: " . $stmt->error . "<br>";
        }
    }
}

// Fechar conexão
$stmt->close();
$conn->close();
?>

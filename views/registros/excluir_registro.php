<?php
session_start();
include '../comun/conexao.php';

if (!isset($_SESSION['professor_id'])) {
    echo "Erro: Acesso negado.";
    exit;
}

$professor_nome = $_SESSION['professor_nome'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Buscar os dados antes de excluir
    $sql_select = "SELECT * FROM registro_aulas WHERE id = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("i", $id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Inserir os dados excluídos na tabela de registros de exclusão
        $sql_insert = "INSERT INTO registros_excluidos (id_aula, aluno_nome, professor_nome, data_aula, excluido_por)
                       VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("issss", $row['id'], $row['aluno_nome'], $row['professor_nome'], $row['data_aula'], $professor_nome);
        $stmt_insert->execute();

        // Excluir o registro original
        $sql_delete = "DELETE FROM registro_aulas WHERE id = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("i", $id);
        if ($stmt_delete->execute()) {
            echo "Registro excluído com sucesso!";
        } else {
            echo "Erro ao excluir.";
        }
    } else {
        echo "Registro não encontrado.";
    }
} else {
    echo "Requisição inválida.";
}
?>

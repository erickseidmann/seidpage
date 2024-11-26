<?php
include '../../config/config/db.php';

if ($conn->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
}

// Receber os dados do formulário
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$number = $_POST['number'] ?? null;
$date = $_POST['date'] ?? null;
$select = $_POST['select'] ?? null;
$password = $_POST['password'] ?? null;
$textarea = $_POST['textarea'] ?? null;

// Validação básica
if (!$name || !$email || !$password) {
    die('Por favor, preencha os campos obrigatórios.');
}

// Preparar e executar a query
$stmt = $conn->prepare("INSERT INTO teachers (name, email, phone, date_of_birth, contract_type, password, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $email, $number, $date, $select, $password, $textarea);

if ($stmt->execute()) {
    echo 'Cadastro realizado com sucesso!';
} else {
    echo 'Erro ao cadastrar: ' . $stmt->error;
}

// Fechar conexão
$stmt->close();
$conn->close();
?>

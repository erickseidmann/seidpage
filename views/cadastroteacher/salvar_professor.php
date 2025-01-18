<?php
// Configuração do banco de dados
include '../comun/conexao.php';

try {
    // Criando a conexão com o banco de dados
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Capturar os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $empresa = $_POST['empresa'];
    $data_nascimento = $_POST['data_nascimento'];
    $mensagem = $_POST['mensagem'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha

    // Inserir os dados no banco
    $sql = "INSERT INTO professores (nome, email, telefone, empresa, data_nascimento, mensagem, senha)
            VALUES (:nome, :email, :telefone, :empresa, :data_nascimento, :mensagem, :senha)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':empresa', $empresa);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':mensagem', $mensagem);
    $stmt->bindParam(':senha', $senha); // Vincular a senha
    $stmt->execute();

    echo "Professor cadastrado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao salvar o professor: " . $e->getMessage();
}
?>

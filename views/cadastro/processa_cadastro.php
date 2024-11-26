<?php
// Configurações do banco de dados
$servername = "localhost"; // ou 127.0.0.1
$username = "root"; // Nome de usuário do MySQL
$password = ""; // Senha do MySQL (deixe vazio se não houver senha)
$dbname = "seidmann_institute"; // Nome do banco de dados

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recebendo os dados do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha
    $phone = $_POST['phone'];
    $cpf = $_POST['text'];
    $date_of_birth = $_POST['date'];
    $cep = $_POST['number'];
    $street = $_POST['text1'];
    $number = $_POST['number1'];
    $neighborhood = $_POST['text2'];
    $city = $_POST['text3'];
    $state = $_POST['Estado'];
    $value = $_POST['number2'];
    $payment_method = $_POST['select1'];
    $start_date = $_POST['date1'];
    $receive_reminder = $_POST['select'];

    // Inserindo os dados no banco de dados
    $sql = "INSERT INTO dadosalunos (
        name, email, password, phone, cpf, date_of_birth, cep, street, number, 
        neighborhood, city, state, value, payment_method, start_date, receive_reminder
    ) VALUES (
        :name, :email, :password, :phone, :cpf, :date_of_birth, :cep, :street, :number,
        :neighborhood, :city, :state, :value, :payment_method, :start_date, :receive_reminder
    )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':phone' => $phone,
        ':cpf' => $cpf,
        ':date_of_birth' => $date_of_birth,
        ':cep' => $cep,
        ':street' => $street,
        ':number' => $number,
        ':neighborhood' => $neighborhood,
        ':city' => $city,
        ':state' => $state,
        ':value' => $value,
        ':payment_method' => $payment_method,
        ':start_date' => $start_date,
        ':receive_reminder' => $receive_reminder,
    ]);

    // Redirecionando com mensagem de sucesso
    header("Location: sucesso.php"); // Crie uma página para exibir mensagens de sucesso
    exit();
} catch (PDOException $e) {
    echo "Erro ao salvar os dados: " . $e->getMessage();
}
?>

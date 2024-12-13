<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';// Inclua o autoloader do Composer ou o arquivo PHPMailer manualmente

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seidmann_institute";

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recebendo os dados do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
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

    // Enviando e-mail com PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.seidmanninstitute.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'atendimento@seidmanninstitute.com';
        $mail->Password = '37216744*CaCo';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuração do e-mail
        $mail->setFrom('atendimento@seidmanninstitute.com', 'Seidmann Institute');
        $mail->addAddress($email, $name); // Para o aluno
        $mail->addCC('atendimento@seidmanninstitute.com'); // Cópia para o atendimento
        $mail->CharSet = 'UTF-8'; // Defina o charset UTF-8 aqui
        $mail->isHTML(true);
        $mail->Subject = "Cadastro realizado com sucesso";
        $mail->Body = "
    <p>Olá <strong>$name</strong>,</p>
    <p>Seu cadastro foi realizado com sucesso! Seguem suas informações:</p>
    <ul>
        <li>Nome: $name</li>
        <li>E-mail: $email</li>
        <li>Telefone: $phone</li>
        <li>CPF: $cpf</li>
        <li>Data de nascimento: $date_of_birth</li>
        <li>Endereço: $street, $number, $neighborhood, $city - $state</li>
        <li>Valor: R$ $value</li>
        <li>Método de pagamento: $payment_method</li>
        <li>Data de início: $start_date</li>
    </ul>
    <hr>
    <h3>Termos e Condições da Escola</h3>
    <h4>Data de pagamento</h4>
    <p>Dia do pagamento: Todos os pagamentos devem ser realizados até o dia acordado pelo aluno e o professor, caso caia em fim de semana ou feriado, deverá ser feito no próximo dia. Valores para cursos individuais: Valor hora/aula R$ 65,00; <strong>VALORES DE COMBOS DEVEM SER ESPECIFICADOS</strong>. Caso o aluno(a) não notifique a escola do atraso do pagamento, o aluno(a) fica sujeito a perda de descontos na mensalidade, ou seja, é cobrado a mensalidade sem descontos.</p>

    <h4>Cancelamento de aulas</h4>
    <p>A fim de garantir a qualidade de nossos serviços educacionais, solicitamos que qualquer cancelamento de aula seja feito com, no mínimo, 6 horas de antecedência. Caso não seja possível efetuar o cancelamento dentro desse prazo, a aula será considerada como realizada. Além disso, todos os alunos têm direito a uma aula emergencial por mês, que pode ser cancelada com até 30 minutos de antecedência. Valorizamos o compromisso e o respeito com nossos horários de aulas para proporcionar uma experiência de aprendizado satisfatória para todos os nossos alunos.</p>
    <p>Quanto à troca de horário e reposição de aulas, solicitamos que os alunos entrem em contato com nossa equipe de gestão de aulas para efetuar qualquer alteração. As reposições devem ser realizadas dentro do prazo de até 1 (um) mês, pois, caso não sejam agendadas nesse período, a aula será considerada como perdida, não sendo possível acumulá-la para o mês seguinte. No entanto, fazemos exceções para cancelamentos de longa duração notificados com, pelo menos, 1 mês de antecedência. Além disso, ressaltamos que o cancelamento do curso deve ser comunicado com pelo menos uma semana de antecedência em relação à data de pagamento mensal. Caso o cancelamento ocorra fora desse prazo, será aplicada uma taxa referente a uma semana de aulas.</p>

    <h4>Férias / Feriados</h4>
    <p>A escola não faz ajustes nos valores para os meses de 5 semanas, mas para ajustar o banco de horas, a escola tem duas férias no ano, sendo a última semana do mês de julho e a última semana de dezembro e a primeira de janeiro. Totalizando 3 semanas e dois dias de férias por ano. Qualquer dúvida favor comunicar-se com o professor responsável. A escola não trabalha nos feriados nacionais, as únicas aulas que podem ser remanejadas são as aulas de 1 vez por semana.</p>

    <h4>Material</h4>
    <p>O valor do material não está incluso no valor das mensalidades, o material é adquirido com a parceria da EPBL, sendo o preço estabelecido pela EPBL. O valor atual é de R$ 100,00 cada livro físico (1 ao 8) e R$85,00 digital é possível compras em combo. O material é vendido em forma digital, mas o fornecedor nos dá a opção de enviar o material impresso também. O aluno pode optar. A partir do ano de 2020 todos os materiais só serão entregues depois do envio do valor do mesmo.</p>
";

        // Envio do e-mail
        $mail->send();
        echo "E-mail enviado com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }

    // Redirecionando com mensagem de sucesso
    header("Location: sucesso.php");
    exit();
} catch (PDOException $e) {
    echo "Erro ao salvar os dados: " . $e->getMessage();
}
?>

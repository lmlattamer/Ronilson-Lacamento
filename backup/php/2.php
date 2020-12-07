<?php
// Adiciona o arquivo class.phpmailer.php - você deve especificar corretamente o caminho da pasta com o este arquivo.
require_once("phpmailer/PHPMailerAutoload.php");
// Inicia a classe PHPMailer
$mail = new PHPMailer();
$mail->CharSet = 'Utf-8'; // Encode da mensagem
// Funcção responsavel por debugar a aplicação (dando todos os resultados de acerto e erro)
$mail->SMTPDebug = 0;

$host = 'mail.umbler.com'; // Hospedagem do SMTP
$email_remetente = 'contato@institutoeucorretor.com.br'; // Quem irá enviar a mensagem
$senha = '5MW6rER#c/,m7'; // Senha do email que irá enviar a mensagem
$nome_remetente = "Construtiva Brasil"; // Nome de quem irá enviar a mensagem

// DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Mailer = "smtp"; // Define que a mensagem será SMTP
$mail->Host = $host; // Seu endereço de host SMTP
$mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
$mail->SMTPAutoTLS = false; // TLS Automatico -  Mantenha o valor "flase"
$mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
$mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
$mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
$mail->Username = $email_remetente; // Conta de email existente e ativa em seu domínio
$mail->Password = $senha; // Senha da sua conta de email
 
// DADOS DO REMETENTE
$mail->Sender = $email_remetente; // Conta de email existente e ativa em seu domínio
$mail->From = $email_remetente; // Sua conta de email que será remetente da mensagem
$mail->FromName = $nome_remetente; // Nome da conta de email
 
// DADOS DO DESTINATÁRIO
$email_envio = $_POST['email'];
$mail->AddAddress($email_envio); // Define qual conta de email receberá a mensagem
//$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
//$mail->AddCC('copia@dominio.net'); // Define qual conta de email receberá uma cópia
//$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta
 
// Definição de HTML/codificação
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
 
// DEFINIÇÃO DA MENSAGEM
$mail->Subject  = "Pegue Seu Ebook Agora"; // Assunto da mensagem
//$mail->msgHTML(file_get_contents('email.html'), __DIR__);//Arquivo externo do corpo do email
$mail->Body = utf8_decode("



  <body style='color: #f7f7f7 !important; font-family: sans-serif; padding: 10px 15px 55px 15px;'>
    
    <form action='' method='POST'>
      
      <input name='email' type='email' placeholder='Digite seu E-mail'>
    </form>

  <body>



  ");
// ENVIO DO EMAIL
if(!$mail->send()) {
  echo '<script>erro: ' . $mail->ErrorInfo .'</script>';
} else {
  // Limpa os destinatários e os anexos
  $mail->ClearAllRecipients();
  header('Location: ../obrigado/');
}

?>
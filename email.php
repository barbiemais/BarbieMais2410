<?php
//Import PHPMailer classes into the global namespace
//Sempre no topo do Script
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//No futuro, quando o gerenciador composer for usado, basta chamar o autoload. 
require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

//Cria instância da Classe PHPMailer
$mail = new PHPMailer(true);

try {
    //Ative esta linha para usar o Debug e descobrir erros.
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
    //Vamos usar o protocolo SMTP para o envio.
    $mail->isSMTP();
    
    //Este é o servidor do Gmail através do qual o email será enviado
    $mail->Host       = 'smtp.gmail.com';
    
    //Ativa autenticação. Sem isso o Gmail não realizará o envio.
    $mail->SMTPAuth   = true; 
    
    //Username. No caso do Gmail, é o endereço de email completo.
    $mail->Username   = 'barbiemais1305@gmail.com';
    
    //O Gmail exige uma Senha de aplicativo. A sua senha normal não vai funcionar.
    $mail->Password   = 'aoljumjfnvqswwvo';
    
    //Ativa a encriptação.
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    
    //Protocolo SMTP usa a porta 465 por padrão. Está sendo substituída pela 587.
    $mail->Port       = 465;

    //Remetente
    $mail->setFrom('barbiemais1305@gmail.com', 'Barbie Mais');
    
    //Destinatário
	 $mail->addAddress($campoemail, $camponome);
  //$mail->addAddress('isabeladacosta17@hotmail.com', 'Nome do Destinatário');

    //Conteúdo do Email
    
    //Vamos usar HTML.
    $mail->isHTML(true);
    
    //Assunto
    $mail->Subject = 'Teste PHPMailer';
    
    //Corpo do Email
    $mail->Body= 'teste';

    //Envio
    $mail->send();
    
    echo 'Mensagem enviada';
} catch (Exception $e) {
    echo "Mensagem não foi enviada. Mailer Error: {$mail->ErrorInfo}";
}
?>
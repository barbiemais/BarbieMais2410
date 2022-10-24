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
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
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
    //$mail->addAddress($emaildestinatario, $nomedestinatario);

    //Destinatário
    $mail->addAddress($campoemail, $camponome);

    //Conteúdo do Email
    
    //Vamos usar HTML.
    $mail->isHTML(true);
    
    //Assunto
    $mail->Subject = 'Confirmacao de conta';
    
    //Corpo do Email
    $texto = "<!DOCTYPE html>
<html>
     <head>
      <meta charset= UTF-8>
	  <link href='https://fonts.googleapis.com/css?family=Inconsolata&display=swap' rel='stylesheet'>
	
    <style>
    html, body{
  width:100%;
  overflow-x: hidden;
  background-color: #00c1d1;
  font-family: 'Inconsolata', monospace;
}

/* Agora definimos as característica do título */
h1 {
  padding-top:100px;
  font-size: 60px;
  color:#fff;
}

/* Agora definimos as característica do parágrafo. */
p {
  font-size: 27px;
  color:#fff;
  white-space: nowrap;
  border-right: solid 3px #fff;
  overflow: hidden; 
}

/* Animação, sua velocidade... */
p {
  /*animation: animated-text 4s steps(20) 1s 1 normal both, animated-cursor 600ms steps(20) infinite; 
}

/* Animação do Parágrafo */

@keyframes animated-text{
  from{width: 0;}
  to{width: 340px;}
}

/* cursor animations */

@keyframes animated-cursor{
  from{border-right-color: #fff;}
  to{border-right-color: transparent;}
}    
        
    </style>
	 </head> 
	 
	 
	<body>
    
<div class='container'>
  <div class='row'>
  <center>
    <h1>Bem-vinda, Barbie!</h1>
    <p>Essa é sua confirmação de email ❤ </p>
    
      <img src='https://imagensemoldes.com.br/wp-content/uploads/2020/03/Barbie-PNG-04.png' height='500' width='330'>
  
        
        </center>
  </div>
</div>
</body>
</html>
	
	Clique <a href='localhost/Barbie1508/usuariovalidaremail.php?id=" . $campoemail . "&validador=" . $validador . "'>aqui</a>.";
    $mail->Body    = $texto;

    //Envio
    $mail->send();
    
    echo 'Mensagem enviada';
} catch (Exception $e) {
    echo "Mensagem não foi enviada. Mailer Error: {$mail->ErrorInfo}";
}
?>
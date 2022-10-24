<?php
session_start();
$campopergunta = $_POST['pergunta'];

//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores dos campos
$sql = "INSERT INTO profile(pergunta) VALUES('$campopergunta')";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:3;url=controlarperguntas.php" );	
  echo "Gravado com sucesso.";
  
  //Abre o arquivo log.txt, a opção "a" é para adicionar 
  $log = fopen("log.txt", "a") or die("Não abriu");
  
  //Como será a String gravada no log
  $txt = $campopergunta . " - $sql - " . 
  date("d/m/Y") . " - " . date("H:i:s") . "\n";

  //Escreve a String no objeto que representa o arquivo
  fwrite($log, $txt);
  
  //Fecha o objeto
  fclose($log);

} else {
  header( "refresh:8;url=pagerro.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();
 


?>
<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:index.html');
  exit;
}

// Dados do Formulário
$campoopcoes = $_POST["opcoes"];
$campoprofile_id = $_POST["profile_id"];    
	
//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores dos campos
$sql = "INSERT INTO opcoes(opcoes, profile_id) VALUES('$campoopcoes', $campoprofile_id)";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:3;url=controlarperguntas.php?pag=1" );	
  echo "Gravado com sucesso.";
  
include 'log.php';

} else {
 header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;


//Fecha a conexão.
$conn->close();
 
}

?>
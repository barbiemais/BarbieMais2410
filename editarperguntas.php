<?php
session_start();

//Dados do formulário
$campoid = $_POST["id"];
$campopergunta = $_POST["pergunta"];

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE profile SET id='" . $campoid . "' , pergunta='" . $campopergunta . "' WHERE id=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo //"Registro atualizado.";
  header('Location: pagregistro.php');
  exit;
  
} else {
  echo "Erro: " . $conn->error;
}
    header('Location: controlarperguntas.php'); //Redireciona para o form	

//Fecha a conexão.
	$conn->close();
	

?> 
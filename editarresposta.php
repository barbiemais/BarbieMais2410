<?php
session_start();

//Dados do formulário
$campoid = $_POST["id"];
$campoopcoes = $_POST["opcoes"];
$campovalor = $_POST["valor"];

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE opcoes SET id='" . $campoid . "' , opcoes='" . $campoopcoes . "', valor='" . $campovalor . "' WHERE id=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo //"Registro atualizado.";
  header('Location: pagregistro.php');
  exit;
  
} else {
  echo "Erro: " . $conn->error;
}
    header('Location: controlarrespostas.php'); //Redireciona para o form	

//Fecha a conexão.
	$conn->close();
	

?> 
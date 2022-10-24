<?php
session_start();


// Dados do Formulário
$camponome = filter_input(INPUT_POST, 'nome');
$campoemail = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);
$campoacesso = filter_input(INPUT_POST, 'acesso');
//$camposenha = $_POST["senha"];
//$camponome = $_POST["nome"];
//$campoemail = $_POST["email"];

$camposenha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
 
 
 //Verifica campos vazios. 
//Se o filtro encontrar caracter proibido, a variável estará em branco.
/*if(!$camponome || !$campoemail || !$campoacesso || !$camposenha){
	//header("Location: usuariocadastrartela.php?erro=1");
    exit;
}*/
 
//Faz a conexão com o BD.
require 'conexao.php';


//Verifica email duplicado e retorna erro.
$sql = "select * from usuarios where Email='$campoemail'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	//header("Location: usuariocadastrartela.php?erro=2");
	exit;	
}

//Cria um número inteiro aleatório dentro do intervalo
$validador = rand(10000000,99999999);

//Insere na tabela os valores dos campos
$sql = "INSERT INTO usuarios(nome, email, senha, acesso, data, status, validador) VALUES('$camponome', '$campoemail', '$camposenha', 'Comum', NOW(), 'aguardando', '$validador')";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {

 // echo "Gravado com sucesso. Bem vindo ao Barbie Mais ";
//include 'log.php';
  
  //Envie email para validar a conta.
require 'enviaremail.php';  

//Conteúdo do email de validação
$texto = "Clique <a href='localhost/Barbie1508/usuariovalidaremail.php?id=" . $campoemail . "&validador=" . $validador . "'>aqui</a>.";

//enviaremail($camponome, $campoemail, 'Validar conta', $texto);

$last_id = $conn->insert_id;
$_SESSION["id"] = $last_id;
include 'novoavisoquiz.php';

//header("Location: novoavisoquiz.php");  
  
} else {
  //header( "refresh:8;url=pagerro.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();
 
//data
$date=date_create("2013-03-15");
//echo date_format($date,"Y/m/d H:i:s");

?>
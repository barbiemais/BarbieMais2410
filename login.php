<?php
session_start();
//Se o usuário não usou o formulário
if (!isset($_POST['senha'])){
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}// Interrompe o Script

// Dados do Formulário
$campoemail = filter_input(INPUT_POST, 'email');
$camposenha = filter_input(INPUT_POST, 'senha');

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "SELECT * FROM usuarios where email='$campoemail' and Status = 'ativo'";

//Executa o SQL
$result = $conn->query($sql);

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
 
	//Se a consulta tiver resultados
	if ($result->num_rows > 0) {
	    
//$verificado = password_verify($camposenha, $row["Senha"]);
			//if($verificado){
		
			if($camposenha == $row["Senha"]){
				$_SESSION['nome'] = $row["Nome"];
				$_SESSION['acesso'] = $row["acesso"];
				$_SESSION['id'] = $row["Id"];
				header('Location:principal.php');
				exit;
			}else{
			header( "refresh:20;url=index.html" );
			echo "<br>" . 'Senha Errada';  
			//Senha errada	
			header( "refresh:5;url=login.html" ); 
			exit;  
			}
	//Se a consulta não tiver resultados
	//Email não existe na base. 			
	} else {
		header('Location: pagerro.php'); //Redireciona para o form
		exit; // Interrompe o Script
	}

//Fecha a conexão.
$conn->close();
?> 
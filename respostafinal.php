<?php
session_start();

//Dados do Formulário
$campousuario_id = $_SESSION["id"];
$campopergunta_1 = $_POST["q1"];
$campopergunta_2 = $_POST["q2"];
$campopergunta_3 = $_POST["q3"];
$campopergunta_4 = $_POST["q4"];
$campopergunta_5 = $_POST["q5"];
$campopergunta_6 = $_POST["q6"];
$campopergunta_7 = $_POST["q7"];
$campopergunta_8 = $_POST["q8"];
$campopergunta_9 = $_POST["q9"];
$campopergunta_10 = $_POST["q10"];
$campotipo = [""];

//Faz a conexão com o BD.
require 'conexao.php';

	$resultado = $campopergunta_1 + $campopergunta_2 + $campopergunta_3 + $campopergunta_4 + $campopergunta_5 + 
$campopergunta_6 + $campopergunta_7 + $campopergunta_8 + $campopergunta_9 + $campopergunta_10;
	//echo $resultado;
	
	if ($resultado <= 10 ){
	    $campotipo= "butterfly";
	    
	}elseif($resultado <= 20){
	    $campotipo= "fashionista";

	    
	}elseif($resultado <= 30){
	    $campotipo= "mosqueteira";
        
	}elseif($resultado <= 40){
	    $campotipo= "popstar";
	    
	}elseif($resultado <= 50){
	    $campotipo= "princesa";
	}


//Insere na tabela os valores dos campos
$sql = "INSERT INTO `resposta`(`usuario_id`,`pergunta_1`, `pergunta_2`, `pergunta_3`, `pergunta_4`, `pergunta_5`, `pergunta_6`, `pergunta_7`, `pergunta_8`, `pergunta_9`, `pergunta_10`, `tipo`)
 VALUES ($campousuario_id, $campopergunta_1, $campopergunta_2, $campopergunta_3, $campopergunta_4, $campopergunta_5, $campopergunta_6, $campopergunta_7, $campopergunta_8, $campopergunta_9, $campopergunta_10, '$campotipo')";

if ($campotipo == 'butterfly'){
	    header("Location: butterfly.html");
	    
	}elseif($campotipo == 'fashionista'){
	    header("Location: fashionista.html");

	    
	}elseif($campotipo == 'mosqueteira'){
	    header("Location: mosqueteira.html");
        
	}elseif($campotipo == 'popstar'){
	    header("Location: popstar.html");
	    
	}elseif($campotipo == 'princesa'){
	    header("Location: princesa.html");
	}


//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {

	} else {	
  echo "Error: " . $sql . "<br>" . $conn->error;
}
    exit; // Interrompe o Script	
//Fecha a conexão.
$conn->close();


?>
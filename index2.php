<!DOCTYPE html>
<html>
<head>
	<title>Quiz da Barbie</title>
	<meta charset="utf-8">
	<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">-->
	<link rel="stylesheet"  href="./quiz.css">
	<link rel="shortcut icon" href="img/logoreal.png" type="image/ico" />
</head>

<body>

<div class="body">
<div class="container">
<div class="form">	

<img src="https://www.pngplay.com/wp-content/uploads/13/Barbie-Logo-PNG-Free-File-Download.gif" alt="GIF">
	<h1>Qual barbie você é?</h1>
	
<div class="question">

	<form action="respostafinal.php" method="post">

<?php
//session_start();

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT profile.id as numero, profile.pergunta, opcoes.id, opcoes.opcoes, opcoes.valor, opcoes.profile_id
FROM profile
JOIN opcoes ON profile.id = opcoes.profile_id order by profile.id";

//Faz a conexão com o BD.
require 'conexao.php';

//Executa o SQL
$result = $conn->query($sql);
 	
		$linha="";
	  while($row = $result->fetch_assoc()) {
		if ($linha != $row["numero"]) { 
			$linha=$row["numero"];
			echo "<p>" . $row["numero"] . " - " . $row["pergunta"] . "</p>";
		}
			echo "<br><input type='radio' name='q" .  $row["numero"] . "' value='" . $row["valor"] . "'>" . $row["opcoes"] . "</br>";
	  }	  


	?>
	<br></br>
	<button class="button" type="submit" value="Responder">Pode ir!</button>
	
	</div><!--question-->
	</div><!--container-->
		</div><!--form-->
	</div><!--body-->
	

	</form>	


</body>
</html>

<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM profile ORDER BY id";

//Executa o SQL
$result = $conn->query($sql);


	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Cadastro de Perguntas</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="img" a href="./img/logoreal.png">
<link rel="stylesheet" href="./css/tabela.css">

</head>
<body>

<div class="topnav">
<?php
//Coloca o menu que está no arquivo
//include 'menu.php';
?>
</div>

<div class="content">
    
			<h1>Lista de Perguntas</h1>
			<table>
<tr><th>Id</th><th>Pergunta</th><th colspan="2"> Ações</td></tr>
				
	<?php


	    while($row = $result->fetch_assoc()) {

					echo "<tr><td>" . $row["id"] . "</td><td><a href='controlaropcoes.php?pergunta=" . $row["id"] . "'>" . $row["pergunta"] . "</td>";
					
					echo "<td><a href='perguntaseditarform.php?id=" . $row["id"] . "'><img src='./img/editar.png' alt='Editar Pergunta' height=30 width=35 ></a></td><td><a href='perguntaexcluir.php?id=" . $row["id"] . "'><img src='./img/excluir.png' alt='Excluir Pergunta' height=30 width=30 ></a></td></tr>";

 	
	}
 }   

		
	?>
				
			</table>
			<br></br>
			<a href="perguntacadastrartela.php"><img src='./img/incluir.png' height="40" width="50"alt='Cadastrar'></a>
</div>

<div class="footer">
 <!--<p>Projeto Final</p>-->
</div>


<?php
//Fecha a conexão.	
	$conn->close();

//}   else {//Se a consulta não tiver resultados
//	    header('Location: pagerro.php');
//		echo "<h1>Nenhum resultado foi encontrado.</h1>";
//	}
?>

</body>
</html>



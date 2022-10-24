<?php
session_start();

//Verifica o acesso.
//if($_SESSION['acesso']=="Admin"){

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela repostas)
//$sql = "SELECT * FROM respostas";

//Lê a página que será exibida
$pergunta_id = $_GET["pergunta"];

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM respostas where pergunta_id = $pergunta_id";


//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Cadastro de Respostas</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/tabela.css">
<style>
* {
  box-sizing: border-box;
  font-family: Arial, Helvetica, sans-serif;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #000;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

/* Style the content */
.content {
  background-color: #fff;
  padding: 10px;
}

/* Style the footer */
.footer {
  background-color: #fff;
  padding: 10px;
}
</style>
</head>
<body>

<div class="topnav">
<?php
//Coloca o menu que está no arquivo
//include 'menu.php';
?>
</div>

<div class="content">
    
			<h1>Lista de Repostas</h1>
			<table>
<tr><th>Id</th><th>Resposta</th></tr>
				
	<?php
	  while($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["id"] . "</td><td>" . $row["opcoes"] . "</td>";
	    echo "<td><a href='respostaseditarform.php?id=" . $row["id"] . "'><img src='./img/editar.png' height=30 width=45 alt='Editar Resposta'></a></td><td><a href='respostaexcluir.php?id=" . $row["id"] . "'><img src='./img/excluir.png'height=30 width=45 alt='Excluir Resposta'></a></td></tr>";
	  }
	?>
				
			</table>
			<br></br>
			<a href="respostacadastrartela.php"><img src='./img/incluir.png' height="40" width="50"alt='Cadastrar'></a>
</div>

<div class="footer">
 <!--<p>Projeto Final</p>-->
</div>

</body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
	    header('Location: pagerro.php');
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}
	
//Fecha a conexão.	
	$conn->close();
	
//Se o usuário não usou o formulário
//} else {
//    header('Location: index.html'); //Redireciona para o form
//    exit; // Interrompe o Script
//}
?> 
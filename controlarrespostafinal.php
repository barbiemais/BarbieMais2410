<?php
session_start();

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Verifica o acesso.
//if($_SESSION['acesso']=="Admin"){

//Faz a conexão com o BD.
require 'conexao.php';

//Lê a página que será exibida
$usuario_id = $_GET["nome"];

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM resposta where usuario_id = $usuario_id";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Tela de Respostas</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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


			<h1>Lista de Respostas</h1>
			<table>
<tr><th>Usuário_id</th><th>Resposta Final</th></td></tr>
				
	<?php
	
	  while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["usuario_id"] . "</td><td>" . $row["profile_id"] . " </td>";
					
                    echo "<td><a href='respostaseditarform.php?id=" . $row["id"] . "'><img src='./img/editar.png' height=25 width=35 alt='Editar Resposta'></a></td><td><a href='respostaexcluir.php?id=" . $row["profile_id"] . "'><img src='./img/excluir.png' height=25 width=30 alt='Excluir Resposta'></a></td></tr>";
			}
		
	?>
				
			</table>
</div>
            <br></br>
            <a href="respostacadastrartela.php?pergunta=<?php echo $profile_id; ?>"><img src="./img/incluir.png" height=40 width=50 alt="Incluir Opção"></a>
    </div>
<div class="footer">

</div>

</body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}
	
//Fecha a conexão.	
	$conn->close();
	
//Se o usuário não usou o formulário
//} else {
 //   header('Location: index.html'); //Redireciona para o form
 //   exit; // Interrompe o Script
//}
?> 
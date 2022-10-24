<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM resposta ORDER BY usuario_id";

//Conta a quantidade total de registros por acesso
$sql1 = "SELECT count(*) as princesa FROM resposta WHERE tipo='princesa'";
$sql2 = "SELECT count(*) as fashionista FROM resposta WHERE tipo='fashionista'";
$sql3 = "SELECT count(*) as popstar FROM resposta WHERE tipo='popstar'";
$sql4 = "SELECT count(*) as mosqueteira FROM resposta WHERE tipo='mosqueteira'";
$sql5 = "SELECT count(*) as butterfly FROM resposta WHERE tipo='butterfly'";

//Executa o SQL
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
$result5 = $conn->query($sql5);

//Prepara as contagens
$row1 = $result1->fetch_assoc();
$row2 = $result2->fetch_assoc();
$row3 = $result3->fetch_assoc();
$row4 = $result4->fetch_assoc();
$row5 = $result5->fetch_assoc();

//Se a consulta tiver resultados
if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Relatório de Barbies</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/tabela.css">


<script src="./js/filtrar.js"></script>

<!-- PDF I - Bibliotecas para gerar PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script>

<!-- PDF II - Arquivo com o código para gerar PDF -->
<script src="pdf.js"></script>



<style>

#input{
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  
}


input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type="text"]:focus{
outline: none;
box-shadow: 0px 0px 5px #ffccfd;
border:1px solid #bc00b5;
}

input[type="text"]:hover{
border: 1px solid #999;
border-radius: 5px;
}

input[type="text"]:focus:hover{
outline: none;
box-shadow: 0px 0px 5px #ffccfd;
border:1px solid #bc00b5;
border-radius:0;

} 

    .wrapper {
    max-width: 800px;
    margin: 0 auto;
}
</style>
</head>
<body>

<div class="topnav">

</div>

<div class="content">
     <form><input type="button" value="Gerar PDF" onclick="getPDF()"></form>

			<h1>Relatório de Barbies</h1>
			
            <input type="text" id="filtrarnomes" onkeyup="filtrar('filtrarnomes', 1)" placeholder="Busca por tipos">
	<!--<input type="text" id="filtraremails" onkeyup="filtrar('filtraremails', 2)" placeholder="Busca de emails">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
			<table id="myTable">
<tr><th>Id</th><th onclick="sortTable(1)">Tipo de Barbie</th></tr>
				
	<?php
	  while($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["usuario_id"] . "</td><td>" . $row["tipo"] . "</td>";
	  }
	?>
				
			</table>
</div>

<div class="wrapper">
    <canvas id="myChart" width="1000" height="450"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <script type="text/javascript">
    
        var ctx = document.getElementById("myChart");
        var valores = [<?php echo $row1["princesa"] ?>, <?php echo $row2["fashionista"] ?>, <?php echo $row3["popstar"] ?>, <?php echo $row4["mosqueteira"] ?>, <?php echo $row5["butterfly"] ?>];
        var tipos = ["princesa", "fashionista", "popstar", "mosqueteira","butterfly" ];

        var myChart = new Chart(ctx, {
          type: "bar",
         data: {
            labels: tipos,
            datasets: [
              {
        
                label: "Barbie",
                data: valores,
                backgroundColor: [
                  "rgba(255,0,255,0.6)",
                  "rgba(255,255,0,0.5)",
                  "rgba(151,187,205,1)",
                  "rgba(68, 164, 0, 0.5)",
                  "rgba(240, 80, 133, 0.5)"
                ]

             }
            ]
          }
          
        });
    </script>           

  
           
    </div>

<div class="footer">
<?php //require 'rodape.php'; ?>
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
	
?> 
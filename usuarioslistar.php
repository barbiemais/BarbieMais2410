<?php

//Faz a conexão com o BD.
require 'conexao.php';

//Une as duas tabelas com INNER JOIN
$sql = "SELECT
	resposta.pergunta_1 pergunta_2 pergunta_3 pergunta_4 pergunta_5 pergunta_6 pergunta_7 pergunta_8 pergunta_9 pergunta_10,
	usuarios.id,
    resposta.pergunta_1 pergunta_2 pergunta_3 pergunta_4 pergunta_5 pergunta_6 pergunta_7 pergunta_8 pergunta_9 pergunta_10,
    usuarios.id as usuario_id,
    usuarios.acesso
FROM
    usuarios
INNER JOIN
  resposta
ON usuarios.pergunta_1 pergunta_2 pergunta_3 pergunta_4 pergunta_5 pergunta_6 pergunta_7 pergunta_8 pergunta_9 pergunta_10 = pergunta_1 pergunta_2 pergunta_3 pergunta_4 pergunta_5 pergunta_6 pergunta_7 pergunta_8 pergunta_9 pergunta_10";

//Executa o SQL
$result = $conn->query($sql);
$dados = "<tr><th>Id</th><th>Nome</th><th>Email</th><th>Senha</th><th>Data</th><th>Acesso</th><th>Ações</td></tr>";
	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {

//Monta os dados
while($row = $result->fetch_assoc()) {
$dados .= "<tr><td>" . $row["usuario_id"] . "</td><td>" . $row["pergunta_1"] . "</td><td>" . $row["pergunta_2"] . "</td><td>" . $row["pergunta_3"] . "</td><td>" . $row["pergunta_4"] . "</td><td>" . $row["pergunta_5"] . "</td><td>" . $row["pergunta_6"] . "</td><td>" . $row["pergunta_7"] . "</td><td>" . $row["pergunta_8"] . "</td><td>" . $row["pergunta_9"] . "</td><td>" . $row["pergunta_10"] . "</td></tr>";
}

$dados .= "</table>";

//Cria retorno de dados com status.
$retorna = ['status' => true, 'dados' => $dados];

	} else {
		//Consulta não retornou nada.
		$retorna = ['status' => false, 'msg' => 'Usuario não encontrada.'];
	}

//Transforma em json. O arquivo só pode ter um echo.
//O JS lerá esse echo	
echo json_encode($retorna);

//Fecha a conexão.	
	$conn->close();
	
?> 
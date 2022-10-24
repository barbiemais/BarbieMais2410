<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/tabela.css">
    <link rel="shortcut icon" type="img" a href="/img/logoreal.png">
    <title>Controle da Personalização</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>
    <div class="container">

    <?php
    include("dadosconexao.php");
	try
	{
		$conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha);
		$consultaSQL = "SELECT arquivo_id, usuario_id, arquivo_nome, arquivo_titulo, arquivo_tipo FROM personalizacao";
		$exComando = $conecta->prepare($consultaSQL); //testar o comando
		$exComando->execute(array());
		
        echo("
        <table>
        <br>
        <h1>Lista de Bonecas</h1>
        <br>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Titulo</th>
            <th>Tipo</th>
            <th>Abrir</th>
            <th>Thumbnail</th>
        </tr>
        </thead>
        ");
        
            
		foreach($exComando as $resultado) 
		{
            echo "
            <tr>
                <td>$resultado[arquivo_id]</td>
                <td>$resultado[arquivo_nome]</td>
                <td>$resultado[arquivo_titulo]</td>
                <td>$resultado[arquivo_tipo]</td>
                <td><a href='abrir_arquivo.php?id=$resultado[arquivo_id]'>abrir</a></td>
                <td><img src='abrir_arquivo.php?id=$resultado[arquivo_id]' width='120px'/></td>
            </tr>
            ";
		}
        echo("</table>");
        
	}catch(PDOException $erro)
	{
		echo("Errrooooo! foi esse: " . $erro->getMessage());
	}
    ?>

    </div>
</body>
</html>
<?php
 include("dadosconexao.php");
 try
	{
		$conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha);
		$consultaSQL = "SELECT arquivo_tipo, arquivo_conteudo FROM personalizacao WHERE arquivo_id=$_GET[id]";
		$exComando = $conecta->prepare($consultaSQL); //testar o comando
		$exComando->execute(array());
        foreach($exComando as $resultado) 
		{
            $tipo = $resultado['arquivo_tipo'];
            $conteudo = $resultado['arquivo_conteudo'];
            header("Content-Type: $tipo");
            echo $conteudo;
		}	
    }catch(PDOException $erro)
	{
		echo("Errrooooo! foi esse: " . $erro->getMessage());
	}
?>
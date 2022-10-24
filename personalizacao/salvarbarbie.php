<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="imagex/png" a href="/css/barbie2+.png"> 
    <title>Personalização da Boneca Barbie</title>
    
<body>
    
  <style>
  
  html, body{
  width:100%;
  overflow-x: hidden;
  background-color:#82c;
  font-family: 'Inconsolata', monospace;
}

h1 {

  font-size: 40px;
  color:#fff;
}
.input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 0px;
  box-sizing: border-box;
}

input[type="text"]:focus{
outline: none;
box-shadow: 0px 0px 5px #ffccfd;
border:1px solid #bc00b5;
}

input[type="text"]:hover{
border: 1px solid #999;
border-radius: 0px;
}

input[type="text"]:focus:hover{
outline: none;
box-shadow: 0px 0px 5px #ffccfd;
border:1px solid #bc00b5;
border-radius:0;

} 

label {
    font-weight: bold;
    padding-top:10px;
  font-size: 20px;
  color:#fff;
}

.btn{
  /*background-color: #4CAF50;  Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-weight: bold;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.btn {
   margin: 4px 2px;  
  background-color: white; 
  color: black; 
  border: 2px solid #bc00b5;
}

.btn:hover {
  background-color: #bc00b5;
  color: white;
}
</style>

<div class="container">
  <div class="row">
  <center>
  
    <h1> Salve sua Barbie Mais personalizada ❤</h1>
    <img src="https://i.pinimg.com/originals/f6/b7/cb/f6b7cb6d13fa171437111bd8c6def0b9.gif" height="500" width="325">
    <br>
        <form enctype="multipart/form-data" method="post">
            <label>Arquivo</label>
            <input type="file" name="arquivo" class="form-control" required>
<br><br>
            <label>Descrição</label>
            <input type="text" name="titulo" class="form-control" required>
<br><br>
            <button type="submit" class="btn">Anexar Barbie</button>
        </form>
        <ul></ul>
        
  </div>
</div>
</center>

        <?php
        $campousuario_id = $_SESSION['id'];

        if ($_POST) {        
            include("dadosconexao.php");
            $arquivo = $_FILES["arquivo"]["tmp_name"]; 
            $tamanho = $_FILES["arquivo"]["size"];
            $tipo    = $_FILES["arquivo"]["type"];
            $nome  = $_FILES["arquivo"]["name"];
            $titulo  = $_POST["titulo"];

            if ( $arquivo != "none" )
            {
                $fp = fopen($arquivo, "rb");
                $conteudo = fread($fp, $tamanho);
                $conteudo = addslashes($conteudo);
                fclose($fp);                 
                
                
                try { 
                     $conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha); //istancia a classe PDO
			         $comandoSQL = "INSERT INTO `personalizacao`(`arquivo_id`, `usuario_id`, `arquivo_nome`, `arquivo_titulo`, `arquivo_conteudo`, `arquivo_tipo`) VALUES (0, $campousuario_id, '$nome','$titulo','$conteudo','$tipo')";
			         $grava = $conecta->prepare($comandoSQL); //testa o comando SQL
			         $grava->execute(array()); 	                                        
                     echo '<br/><div class="alert alert-success" role="alert">
                                Arquivo enviado com sucesso para o servidor!
                            </div>';
		          } catch(PDOException $e) { // caso retorne erro
                     
                     echo '<br/><div class="alert alert-success" role="alert">
                                Erro ' . $e->getMessage() . 
                          '</div>';
		          }
            }}
    ?>
        
    <div style="height:50px"></div>
        

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>
        (function() {
            'use strict'

            if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
                var msViewportStyle = document.createElement('style')
                msViewportStyle.appendChild(
                    document.createTextNode(
                        '@-ms-viewport{width:auto!important}'
                    )
                )
                document.head.appendChild(msViewportStyle)
            }

        }())

    </script>
    
</body>
<meta http-equiv="refresh" content="20; URL='/postagens/index.php'"/>
</html>
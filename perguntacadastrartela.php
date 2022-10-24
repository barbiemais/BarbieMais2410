<html>
<head>
    
    
<title>Cadastro</title>
<meta charset="UTF-8">
  
<link rel="stylesheet"  href="./css/telacadastro.css">  
  
</head>

<?php
    //session_start();
    //Só administrador pode acessar o programa.
    //if($_SESSION['Acesso']=="Admin"){
?>

<body>
	<form action="cadastrarperguntas.php" method="post">
	    
	 <div class="login-wrap">
	<div class="login-html">  
	
	<label class="tab">Cadastrar perguntas</label>
	
	    <div class="login-form">

	<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Pergunta</label>
					<input type="text" name="pergunta" placeholder="Sua pergunta" required>
	</div>			
				
				
				
				<div class="group">
					<input type="submit" class="button" value="Ok">
					
	
	</div>
				<div class="hr"></div>
			
</div>

	</form>
	</body>
<?php
//else{
 //   header('Location: ./atualizado/ index.html'); //Redireciona para o form
 //   exit; // Interrompe o Script
//}

?>

</html>

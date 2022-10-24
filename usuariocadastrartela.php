<html>
<head>
    
    
<title>Cadastro</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="img/logoreal.png" type="image/ico" />
  
<!--<link rel="stylesheet" href="./css/form.css">-->

 <style>
   
   body{
	color:#ffffff;
background: linear-gradient(41deg, rgba(255,255,255,1) 0%, rgba(237,52,241,1) 35%, rgba(0,245,255,0.8232758620689655) 100%);
background-size: auto;
background-attachment: fixed;
  width:100%;
	font:600 16px/18px 'Open Sans',sans-serif;
}

*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
  padding: 0px 0;
  height: 56px;
	width:100%;
  top:55px;
	margin:auto;
	max-width:480px;
	min-height:550px;
	position:relative;
  /*background:#eB26bf;*/
	
}

.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 20px 0px 30px;
}


.login-html .sign-up-htm{
	top:0;
	left:0px;
	right:15px;
	bottom:0;
	position:absolute;
	backface-visibility:hidden;
	transition:all .4s linear;
}


.login-html .sign-up,
.login-form .group .check{
	display:none;
}
.login-html.tab-1,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
}


.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}

.login-html .sign-up:checked + .tab{
	color:#fff;
  transition: .3s ease;
	border-color:#CB117B;
}
.login-form{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
   
}
.login-form .group{
	margin-bottom:15px;
}

.login-form .group .input,
.login-form .group .button{/*usuario*/
	border:none;
	padding:15px 20px;
	border-radius:15px;
  background:#fff;
  /*background:#d387ff;*/
}

.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}

.login-form .group .input{/*cor fonte*/
  color:#000; 
}

.login-form .group .button:hover {
    background-color: #f9b028;
transition:.4s;
}

.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-form .group .label{ /*cor fonte*/
	color:#fff;
	font-size:12px;
}
.login-form .group .button{
 background:#CB117B;
transition: 0.5s;
opacity: 0.7;
}

.login-form .group label .icon{
  background:#fff;
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
	color:#fff;
}

.hr{
	height:3px;
	margin:25px 0 50px 0;
	background:rgba(255,255,255,.2);
}


  </style>
 
</head>

<?php
    //session_start();
    //Só administrador pode acessar o programa.
       //require 'acessoadm.php';
        
        /*if(isset($_GET["erro"])){
		if ($_GET["erro"]==1){
			echo "<h2>Caracter Proibido</h2>";
		}
		if ($_GET["erro"]==2){
			echo "<h2>Email já cadastrado</h2>";
		}
		
        }*/
		
?>

<body>

	<form action="usuariocadastrarcodigo.php" method="post">
    <form action="sanitizar.php" method="post">  
    
	    
	 <div class="login-wrap">
	<div class="login-html">  
	
	<label class="tab">Cadastre-se</label>
	
	    <div class="login-form">

	<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Nome de Usuário</label>
					<input type="text" name="nome" placeholder="Seu nome" class="input" required>
				</div>
				
				<div class="group">
				<label for="pass" class="label">Senha</label>
			<input type="password" name="senha" placeholder="Sua senha"  title="A senha deve conter pelo menos um caracter maiúsculo, um minúsculo, um número e no mínimo oito caracteres"class="input" required>	
				</div>
				
				<div class="group">
					<label for="pass" class="label">Email</label>
					<input type="email" name="email" placeholder="Seu e-mail"  class="input" required>
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="Entrar">
					
	
	</div>
				<div class="hr"></div>
			
</div>
    </form>
	</form>
	</body>
<?php
//else{
   // header('Location: index.html'); //Redireciona para o form
   // exit; // Interrompe o Script
//}

?>

</html>

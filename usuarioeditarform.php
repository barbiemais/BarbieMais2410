<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Faz a leitura do dado passado pelo link.
 $campoid = filter_input(INPUT_GET, 'id');

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM usuarios WHERE Id = $campoid";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	if ($result->num_rows > 0) {

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Editar Perfil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="static_mem/membros/css/perfil.css">
  <link rel="stylesheet" href="/static/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="shortcut icon" type="img" a href="./img/logoreal.png">
  <script src="/static/js/bootstrap.bundle.min.js"></script>
  
           <style>
                 .user-profile {
  font-weight: bold;
}
.user-profile .user-profile-body,
.user-profile {
  font-family: open_sansregular;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  align-items: center;
}
.user-profile .header {
  width: 100%;
  display: flex;
  justify-content: center;
  background: linear-gradient(#00cfe0, transparent);
  margin-bottom: 1.25rem;
}
.user-profile .cover {
  display: block;
  position: relative;
  width: 90%;
  height: 16rem;
  background: linear-gradient(100deg, #ff0095, #fa39aa);
  border-radius: 0 0 20px 20px;
}
.user-profile .user-profile-body {
  width: 70%;
  position: relative;
  max-width: 750px;
}
.user-profile .user-profile-body .titulo {
  display: block;
  width: 100%;
  font-size: 1.75em;
  margin-bottom: 0.5rem;
}

.user-profile .user-profile-footer,
.user-profile .user-profile-bio {
  display: flex;
  flex-wrap: wrap;
  padding: 1.5rem 2rem;
  box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
  background-color: #fff;
  border-radius: 10px;
}
.user-profile .user-profile-bio {
  margin-bottom: 1.25rem;
  text-align: center;
}
.user-profile .data-list {
  width: 80%;
  list-style: none;
}
.user-profile .data-list li {
  padding: 10px 0;
}
.user-profile .cover,
.user-profile .user-profile-body {
  width: 95%;
}
.perfil-usuario-avatar {
  display: flex;
  width: 180px;
  height: 180px;
  align-items: center;
  justify-content: center;
  border: 7px solid #ffffff;
  background-color: #dfe5f2;
  border-radius: 50%;
  box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
  position: absolute;
  bottom: -40px;
  left: calc(50% - 90px);
  z-index: 1;
}

.perfil-usuario-avatar img {
  width: 100%;
  position: relative;
  border-radius: 50%;
}
.user-profile .perfil-usuario-avatar .boton-avatar {
  position: absolute;
  left: -2px;
  top: -2px;
  border: 0;
  background-color: #fff;
  box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
  width: 45px;
  height: 45px;
  border-radius: 50%;
  cursor: pointer;
}
.mb-3{
 width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
@font-face {
     font-family: 'open_sansbold';
     src: url('fonts/opensans-bold-webfont.woff2') format('woff2'), url('fonts/opensans-bold-webfont.woff') format('woff');
     font-weight: normal;
     font-style: normal;
}
 @font-face {
     font-family: 'open_sansextrabold';
     src: url('fonts/opensans-extrabold-webfont.woff2') format('woff2'), url('fonts/opensans-extrabold-webfont.woff') format('woff');
     font-weight: normal;
     font-style: normal;
}
 @font-face {
     font-family: 'open_sanslight';
     src: url('fonts/opensans-light-webfont.woff2') format('woff2'), url('fonts/opensans-light-webfont.woff') format('woff');
     font-weight: normal;
     font-style: normal;
}
 @font-face {
     font-family: 'open_sansregular';
     src: url('fonts/opensans-regular-webfont.woff2') format('woff2'), url('fonts/opensans-regular-webfont.woff') format('woff');
     font-weight: normal;
     font-style: normal;
}


           </style>
    <body>
        <form action="usuarioeditar.php" method="post">
            <h3>Editar Usuário Id: <?php echo $row["Id"]; ?></h3>
            <input type="hidden" name="id" value="<?php echo $row["Id"]; ?>">
            <input type="text" name="nome" value="<?php echo $row["Nome"]; ?>" placeholder="Seu nome..." required>		
            <input type="email" name="email" value="<?php echo $row["Email"]; ?>" placeholder="Seu e-mail..." required>	     
        <?php if ($row["Acesso"]=="Admin"){ ?>
            <input type="radio" name="acesso" value="Comum" required><label>Comum</label>
            <input type="radio" name="acesso" value="Admin" checked="true"><label>Admin</label>        
        <?php }else{ ?>
            <input type="radio" name="acesso" value="Comum" required checked="true"><label>Comum</label>
            <input type="radio" name="acesso" value="Admin"><label>Admin</label>        
        <?php } ?>      
            <input type="submit" value="Editar">
        </form>
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
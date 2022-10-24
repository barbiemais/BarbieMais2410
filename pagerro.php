<!DOCTYPE html>

<html>
    
  <head>
  <meta charset= "UTF-8"> 
    
  <link href="https://fonts.googleapis.com/css?family=Inconsolata&display=swap" rel="stylesheet">

<body>
    
  <style>
     html, body{
  width:100%;
  overflow-x: hidden;
  background-color:#fa26da;
  font-family: 'Inconsolata', monospace;
}

/* Agora definimos as característica do título */
h1 {
  padding-top:100px;
  font-size: 60px;
  color:#fff;
}

/* Agora definimos as característica do parágrafo. */
p {
  font-size: 20px;
  color:#fff;
  white-space: nowrap;
  border-right: solid 3px #fff;
  overflow: hidden; 
}

/* Animação, sua velocidade... */
p {
  animation: animated-text 4s steps(25) 1s 1 normal both, animated-cursor 600ms steps(25) infinite; 
}

/* Animação do Parágrafo */

@keyframes animated-text{
  from{width: 0;}
  to{width: 340px;}
}

/* cursor animations */

@keyframes animated-cursor{
  from{border-right-color: #fff;}
  to{border-right-color: transparent;}
} 
    </style>  
    
    
<div class="container">
  <div class="row">
  <center>
    <h1>Error 404</h1>
    <p>Página não encontrada ¯\_(ツ)_/¯</p>
    
      <img src="https://i.pinimg.com/originals/60/16/7d/60167d4ee1ac5d7b78e6be546659e9a5.png" height="250" width="350">
  
        
        </center>
  </div>
</div>

</body>
</html>
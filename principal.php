<?php
session_start();

//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:principal.php');
  exit;
}

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];
?>

<!DOCTYPE html>
<html lang="pt-br">

 <head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="Barbie+" content="site da barbie" />
    <meta name="description" content="Barbie Mais - Local de Interação entre Admiradores da Boneca Barbie."/>
    <meta name="keywords" content="Barbie, Boneca, clube, meninas, rosa."/>
    <meta name="author" content="Seu nome" />
    <meta name="URL" content="https://www.www.seusite.com"/>
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="robots" content="index, follow"/>
    
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->       

	<link rel="stylesheet"  href="./css/boot.css">
	<link rel="stylesheet"  href="./css/style.css">
    <link rel="stylesheet"  href="./css/magnific-popup.css">
    <link rel="stylesheet"  href="./css/fonts-icones.css">
    <link rel="stylesheet"  href="./fonts/stylesheet.css">
    <link rel="stylesheet"  href="./js/shadowbox.css">
    <link rel="shortcut icon" href="img/logoreal.png" type="image/ico" />
    <script src="https://kit.fontawesome.com/5a0bfeccc9.js" crossorigin="anonymous"></script>

	<title>Barbie Mais</title>

<style>

/*960PX BREAKPOINT*/
/*960 dividido por 16 = 60em*/
@media (min-width:60em){

.topoPag .centraliza h1 { font-size:4em;}
.topoPag .centraliza p  { letter-spacing:6.5px; }

}

.dropbtn {
  background-color: #6925B6;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
        
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #f9f9f9;
}


/*1024PX BREAKPOINT*/
/*1024 dividido por 16 = 64em*/
@media (min-width:64em){


}

/*1280PX BREAKPOINT*/
/*1280 dividido por 16 = 80em*/
@media (min-width:80em){

.mobile_action   { display:none; }
.main_header_nav { float:right; width:auto; }
.main_header_nav a:hover, .main_header_nav> li:hover > a{ background:transparent; color:#00cfe0; }

.main_header_nav_item { position:relative; display:inline-block; float:left;}
.main_header_nav_item:last-of-type { margin-right:20px;} 

.main_header_nav_item  span   { display:none;  }

.main_header_nav_item > a  { color:#eB26bf; float:left; padding:1.5em 1em; font-size:0.95em; font-family:'open_sansbold'; text-decoration:none; text-transform:uppercase; }
.main_header_nav_item:hover, 
.main_header_nav_item > a:hover { background:transparent; color:#00cfe0; }

.galeria-barber .foto:nth-of-type(2n+0), 
.galeria-barber .foto { width:23.5%; margin-right:2%; margin-bottom:2%; }
.galeria-barber .foto:nth-of-type(4n+0) { margin-right:0; }

.topoPag .centraliza h1 { font-size:5.5em; margin-top:50px; }
.topoPag .centraliza p  { letter-spacing:13.5px; }
}

/*1366PX BREAKPOINT*/
/*1366 dividido por 16 = 85,375em*/
@media (min-width:85em){

 .content  { width:80%; margin:0 10%; }

}

/*1600PX BREAKPOINT*/
/*1600 dividido por 16 = 100em*/
@media (min-width:100em){


}

*{
  
  /*Resetando as configurações*/
    margin: 0; 
    padding: 0; 
    font-family: 'open_sanslight';
    box-sizing: border-box; 
    -moz-box-sizing: border-box; 
    -webkit-box-sizing: border-box; 
}

/*Reset basico das midias*/

object,
embed,
video,
iframe,
iframe['style'] { max-width:100%; height:auto; }
img { max-width:100%; vertical-align:middle; }
ul  { list-style:none; }

/*Reset p Formulários em Todos Dispositivos*/
fieldset{border: 0;}
input,
select,
textarea{padding: 10px; width: 100%;}
input.btn{width: auto; cursor: pointer;}

/*vai ser a box de controle*/
.container { float:left; width:100%; background-color:#fff; }
.clear     { clear:both; }
.fontzero  { font-size:0; }
    
</style>
 </head>
<body>

<header class="main_header container">
        
    <div class="content">
    
        <div class="main_header_logo">
            <a href="principal.php" title="Barbie Mais"><img src="img/iconreal.png" alt="Barbie Mais" title="Barbie Mais"/></a>
        </div>

        <div class="icon icon-menu mobile_action"></div>

        <ul class="main_header_nav"> 
            
           <li class="main_header_nav_item"><a href="postagens/index.php" title="Feed" class="scrollSuave"> Feed</a></li>
           <li class="main_header_nav_item"><a href="barbiemaisvendas.html" title="Vendas de Barbies" class="scrollSuave">Vendas </a></li>
           <li class="main_header_nav_item"><a href="/personalizacao/indexpersonalizacao.html" title="Personalizção de Barbies" class="scrollSuave"> Personalização </a></li>
           
           <div class="dropdown">
           <li class="main_header_nav_item"><a title="Usuário" class="scrollSuave">Usuário</a></li>  

  <div class="dropdown-content">
    <?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>  </div></div>
    
    
        
<?php if($_SESSION['acesso']=="Admin"){?>
        <div class="dropdown">
            <li class="main_header_nav_item"><a href="usuarioscontrolar.php" title="Área do administrador" class="scrollSuave">Área do administrador</a></li>
        <?php }?>
        
        <div class="dropdown-content">
    <?php
//Coloca o menu que está no arquivo
include 'menuadm.php';
?>  
        </div> </div>
        </ul>  
 </div> 
 
        <div class="clear"></div>
    
    </div>

</header>

    <main class="main_content container">

        <section class="section-chamada container" id="inicio">
            
            <div class="content">
                
                <article class="topoPag">
                  <div class="mascara">                              
                          
                      <div class="centraliza">
                          <h1 class="branco"> Barbie Mais</h1>
                          <p class="branco">Local de interação entre admiradores da boneca Barbie</b></p>
                      </div>                              
                                                        
                <img src="img/fundobarbie2.jpg" alt="Barber Shop" title="Site Barbie"/>

                  </div>
                </article>
            
            <div class="clear"></div>
            </div>

        </section><!--Fecha Section Chamada-->
       
        <section class="section-servicos container" id="servicos">
            
            <div class="content">
                
                <h1 class="title center rosapink" >Últimas Notícias</h1>
                
                <article class="hover_servicos">
                    <span class="appIcone"><i class="fa fa-star"></i></span>
                    <a href="pagnoticias1.html" class="appTitulo" title="Contrato com a netflix" > Contrato com a netflix</a>
                    
                    <div class="hoverMascara">
                        
                     <div class="hover_servicos_hover"></div>
                     <img class="appFoto" src="img/barbieescola.jpg">
                    </div>
                    
                    <div class="descricao">
                      <h4>Contrato com a netflix</h4>
                      <p>Na última semana, o grupo de stand by da marca Barbie, assinou um contrato com a empresa de criação de filmes: Netflix.</p>
                    </div>

                </article><!--1-->

                <article class="hover_servicos">
    
                    <span class="appIcone"><i class="fa fa-star"></i></span>
                    <a href="pagnoticias2.html" class="appTitulo" title="Mundo da Música"> Barbie & Pop </a>
                    
                    <div class="hoverMascara">
                     <div class="hover_servicos_hover"></div>
                     <img class="appFoto" src="img/musicabarbie.jpg">
                    </div>
                    
                    <div class="descricao">
                      <h4>Mundo Música</h4>
                      <p>A cantora do sucesso pop, Poccah, resolveu elaborar um video clipe com sua música que faz refêrencia as bonecas e o estilo Barbie.</p>
                    </div>

                </article><!--2-->

                <article class="hover_servicos">
                  
                    <span class="appIcone"><i class="fa fa-star"></i></span>
                    <a href="pagnoticias3.html" class="appTitulo" title="Novas Barbies"> Novas Barbies</a>
                    
                    <div class="hoverMascara">
                     <div class="hover_servicos_hover"></div>
                     <img class="appFoto" src="img/testebonecas.jpg">
                    </div>
                    
                    <div class="descricao">
                      <h4>Novas Barbies</h4>
                      <p>A empresa responsável pela criação das Barbies,a MATEL, nos últimos tempos, tem tentado buscar pela confecção de Barbies mais sustentáveis.</p>
                    </div>

                </article><!--3-->
            
            <div class="clear"></div>
            </div>

        </section><!--Fecha Section Sobre-->

        <section class="section-galeria container" id="galeria">
            
            <div class="content">
                
                 <h2 class="title center roxo">Galeria de Fotos</h2>

                <div class="galeria-barber">
                   
                    <article class="foto">
                       
                       <div class="mascara"></div>
                       
                      <a href="img/butterfly2.png" title="veja" class="image-link"> <i class="fa-solid fa-camera"></i> </a>  
                       <img src="img/butterfly.jpg">
         
                    </article>

                    <article class="foto">
                       
                       <div class="mascara"></div>
                       <a href="img/fashionista2.png" title="veja" class="image-link"> <i class="fa-solid fa-camera"></i> </a> 
                       <img src="img/fashionista.jpg">
         
                    </article>

                    <article class="foto">
                       
                       <div class="mascara"></div>
                       <a href="img/mosqueteira2.png" title="veja" class="image-link"> <i class="fa-solid fa-camera"></i> </a>  
                       <img src="img/mosqueteira.jpg">
         
                    </article>

                    <article class="foto">
                       
                       <div class="mascara"></div>
                       <a href="img/popstar2.png" title="veja" class="image-link"> <i class="fa-solid fa-camera"></i> </a>  
                       <img src="img/popstar.jpg">
         
                    </article>

                    <article class="foto">
                       
                       <div class="mascara"></div>
                       <a href="img/princesa2.png" title="veja" class="image-link"> <i class="fa-solid fa-camera"></i> </a>  
                       <img src="img/princesa.png">
         
                    </article>

					

                    <!--<article class="foto">
                       
                       <div class="mascara"></div>
                       <a href="img/6.jpg" title="veja" class="image-link"> <i class="icon icon-search"></i> </a>  
                       <img src="img/6.jpg">
         
                    </article>

                    <article class="foto">
                       
                       <div class="mascara"></div>
                       <a href="img/7.jpg" title="veja" class="image-link"> <i class="icon icon-search"></i> </a>  
                       <img src="img/butterfly.jpg">
         
                    </article>

                    <article class="foto">
                       
                       <div class="mascara"></div>
                       <a href="img/8.jpg" title="veja" class="image-link"> <i class="icon icon-search"></i> </a>  
                       <img src="img/mosqueteira.jpg">
         
                    </article>-->


                </div><!--Galeria Barber-->

            
            <div class="clear"></div>
            </div>

        </section><!--Fecha Section Galeria-->

        <section class="section-contato container" id="contato">
            
            <div class="content">

                <h2 class="title center rosapink">Fale Conosco</h2>
                                
                <div class="coluna">

                    <form method="post" action="#" class="formulario">
                        
                        <label>  
                            
                            <input type="text" name="nome" class="campo" placeholder="Nome" required="">
                        
                        </label>

                        <label>  
                            
                            <input type="text" name="email" class="campo" placeholder="E-mail" required="">
                        
                        </label>

                        <label>  
                            
                            <textarea name="mensagem" class="campo" placeholder="Deixe sua mensagem" rows="3" required=""></textarea>                    
                        
                        </label>

                        <label>  
                            
                            <input type="hidden" name="acao" value="enviar">
                            <button class="btn-enviar" title="Enviar">Enviar</button>

                        </label>

                    </form>

                </div><!---Div Coluna-->
                
                <div class="coluna design">

                    <div class="info">
                      
                        <p><i class="fa-solid fa-envelope"></i> barbiemais1305@gmail.com</p>                    
                        <p><i class="fa-solid fa-phone"></i> 21 0000-0000</p>
                        <p><i class="fa-solid fa-location-dot"></i> Local: Tijuca, Rio de Janeiro</p>
                        <p><i class="fa-regular fa-calendar"></i> Atendimento: Segunda a Sexta</p>
                        <p><i class="fa-regular fa-clock"></i> 9:00 ás 20:00</p>
                    
                    </div>

                    <div class="info">

    <a href="https://www.instagram.com/barbie/" class="btn"><span> <i class="fa-brands fa-instagram"></i></span></a>
    <a href="https://pt-br.facebook.com/oficialbarbiebrasil/" class="btn"><span> <i class="fa-brands fa-facebook-f"></i></span></a>
    <a href="https://play.barbie.com/en-us" class="btn"><span> <i class="fa-solid fa-globe"></i></span></a>
                    
                    </div>

                </div><!---Div Coluna-->
            
            <div class="clear"></div>
            </div>

        </section><!--Fecha Section Contato-->


    </main>

<footer class="main_footer container">

    <div class="main_footer_copy">
        <div class="content">
            <p class="t-copy-footer"> <b>Barbie Mais</b> - 2022, Todos os Direitos Reservados.</p> 
            <p class="by"> Por: <a href="https://www.seusite.com.br/" title="Seu Nome">Luisa Santana, Isabela da Costa, Stephany Firme, Juliana Fernandes, Janaina de Almeida</a></p>
        </div>
    </div>

</footer>

<script src="js/jquery.js"></script>
<script src="js/scripts.js"></script>	
<script src="js/jquery.magnific-popup.min.js"></script>


</body>
</html>
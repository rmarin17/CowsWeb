<?php 
//Reanudamos la sesión 
session_start();
//Validamos si existe realmente una sesión activa o no 
if($_SESSION['u_pago'] != '1')
{ 
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
  header("Location: index.php"); 
  exit(); 
} 
?>
<?php include_once('navbar.php');?>
<?php $idu=$_GET['idu'];?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    
    
  </head>

  <body>
    <main>
      <h1 class="grey-text text-darken-2" align="center" style="font-size:50px;font-family:Constantia;">Control de Ganado</h1>
        <div  Style="margin-left: 5%; margin-right: 5%;">
            <!-- Comienza el Card -->
              <div class="row">
                <div class="col m3">
                  <div class="card hoverable medium"  onclick="location.href='addcow.php?idu=<?php echo $idu ?>'">
                    <div class="card-image">
                      <img src="images/newcow.jpg">
                    </div>
                    <div class="card-content">
                      <p align="justify">Agrega a tus registros, el ganado que desees.</p>
                    </div>
                    <div class="card-action">
                      <center><a href="addcow.php?idu=<?php echo $idu ?>">Agregar</a></center>
                    </div>
                  </div>
                </div>
                <div class="col m3">
                  <div class="card hoverable medium" onclick="location.href='listcows.php?idu=<?php echo $idu ?>'">
                    <div class="card-image">
                      <img src="images/listcows.jpg">
                    </div>
                    <div class="card-content">
                      <p align="justify">Visualiza todo tu ganado por diferentes aspectos, como edad, raza, etc.</p>
                    </div>
                    <div class="card-action">
                      <center><a href="listcows.php?idu=<?php echo $idu ?>">Listar</a><center>
                    </div>
                  </div>
                </div>
                <div class="col m3">
                  <div class="card hoverable medium"  onclick="location.href='reprocows.php?idu=<?php echo $idu ?>'">
                    <div class="card-image">
                      <img src="images/newcow.jpg">
                    </div>
                    <div class="card-content">
                      <p align="justify">Controla todos los aspectos de reproduccion de tu ganado.</p>
                    </div>
                    <div class="card-action">
                      <center><a  href="reprocows.php?idu=<?php echo $idu ?>">Reproducción</a></center>
                    </div>
                  </div>
                </div>
              
              <div class="col m3">
                  <div class="card hoverable medium"  onclick="location.href='vacunas.php?idu=<?php echo $idu ?>'">
                    <div class="card-image">
                      <img src="images/newcow.jpg">
                    </div>
                    <div class="card-content">
                      <p align="justify">Controla todos los aspectos de vacunación de tu ganado.</p>
                    </div>
                    <div class="card-action">
                      <center><a  href="vacunas.php?idu=<?php echo $idu ?>">Vacunación</a></center>
                    </div>
                  </div>
                </div>
              </div>
            </div>                 
        </div>         
        <div class="section" Style="margin-left: 5%; margin-right: 5%;">
        <p align="justify">El registro y control de datos, es el punto de partida para construir la historia productiva, económica y financiera 
            de la unidad de producción.&nbsp;<i><b>“Si no se conoce el antes, el actuar del presente carece de visión y si no hay visión no hay 
            futuro con resultados positivos para el negocio”.</b></i></p>      
            <p align="justify">
            Por lo tanto es muy importante tener en cuenta el registro de datos de los aspectos de la ganadería, ya que la información que se genera, 
            entre otras funciones, permite hacer los diagnósticos y/o análisis de la estabilidad productiva-económica de la finca, a partir de 
            entonces la toma de decisiones se hace previendo mejores posibilidades para lograr los mejores resultados en cada actividad que se ejecute.
            </p>
        </div> 
        <br></br> 
    </main>      
    <?php include_once('footer.php');?>
  </body>
</html>
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
  <body>
    <main>
      <h1 class="grey-text text-darken-2" align="center" style="font-size:50px;font-family:Constantia;">Control de Reproducción</h1>      
        <div  class="container">
            <!-- Comienza el Card -->            
            <div class="row">
                <div class="col m4">
                  <div class="card hoverable medium"  onclick="location.href='celos.php?idu=<?php echo $idu ?>'">
                    <div class="card-image">
                      <img src="images/newcow.jpg">
                    </div>
                    <div class="card-content">
                      <p align="justify">Agrega todos los celos presentados por el ganado, listalos y modificalos.</p>
                    </div>
                    <div class="card-action">
                      <center><a href="celos.php?idu=<?php echo $idu ?>">Celos</a></center>
                    </div>
                  </div>
                </div>
                <div class="col m4">
                  <div class="card hoverable medium" onclick="location.href='partos.php?idu=<?php echo $idu ?>'">
                    <div class="card-image">
                      <img src="images/listcows.jpg">
                    </div>
                    <div class="card-content">
                      <p align="justify">Visualiza todos los partos de tu ganado, controlando la reproducción de estos.</p>
                    </div>
                    <div class="card-action">
                      <center><a href="partos.php?idu=<?php echo $idu ?>">Partos</a><center>
                    </div>
                  </div>
                </div>
                <div class="col m4">
                  <div class="card hoverable medium"  onclick="location.href='listcowsrepro.php?idu=<?php echo $idu ?>'">
                    <div class="card-image">
                      <img src="images/newcow.jpg">
                    </div>
                    <div class="card-content">
                      <p align="justify">Controla los aspectos de reproduccion, visualizando los celos y partos presentados.</p>
                    </div>
                    <div class="card-action">
                      <center><a  href="listcowsrepro.php?idu=<?php echo $idu ?>">Listar</a></center>
                    </div>
                  </div>
                </div>                            
            </div>   
            <p align="justify">En la mayoría de las granjas o fincas ganaderas, el proceso de reproducción es uno de los factores que determina 
            el éxito de la actividad económica relacionada con la producción. Esta tiene una importancia indispensable, porque es la actividad 
            esencial para iniciar la producción de carne, leche o doble propósito, dependiendo la eficacia de los programas de reproducción y de 
            la selección de sementales y vacas.
            <br></br>Son mucho los factores indirectos y directos que inciden en la reproducción, entre los factores indirectos tenemos la humedad 
            relativa y la velocidad del viento, y como factores directos tenemos la falta de alimento y la alta incidencia de enfermedades parasitarias, 
            estos factores retrasan el crecimiento del ganado, prolongando el inicio de la etapa productiva y detienen el reinicio de la actividad 
            sexual después del parto. Es importante tener claro que los aspectos sanitarios, alimenticios y genéticos son fundamentales para mejorar el 
            comportamiento reproductivo del ganado.
            </p>               
            <br></br>
        </div>  
         
    </main>      
    <?php include_once('footer.php');?>
  </body>
</html>
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

<?php $idu = $_GET['idu'];?>

<html>
  <body>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center blue-grey-text text-darken-3">ProCows</h1>
        <div class="row center">
          <h5 class="header col s12 white-text">¿Preparado?, ¿Con que quieres comenzar? </h5>
        </div>
        <div class="row center">
          <a href="controlg.php?idu=<?php echo $idu ?>" Style="margin-right: 40px;" class="btn tooltipped btn-large waves-effect waves-light  deep-orange accent-3" data-position="bottom" data-delay="50" data-tooltip="Registra, actualiza y despliega toda la información de tu ganado, incluida su reproducción">Control de Ganado</a>
          <a href="registro.php" Style="margin-left: 40px;" class="btn tooltipped btn-large waves-effect waves-light  deep-orange accent-3" data-position="bottom" data-delay="50" data-tooltip="Maneja tus potreros de una manera diferente, programando su rotación y fertilización">Control de Potreros</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="images/background2.jpg" alt="Unsplashed background img 1"></div>
  </div>
  

  <div class="container">
    <div id="main1" class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Rápido</h5>

            <p class="light" align="justify">ProCows te permite tener acceso a todos los aspectos de tu ganadería especializada de una forma rápida y eficaz, comprobando la cantidad de ganado, enfocándose en cada una de las vacas, la reproducción de estas y habilitando el manejo de poteros para controlar su desempeño. ¡Todo en un mismo lugar!.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Enfocado en el usuario</h5>

            <p class="light" align="justify">Nos especializamos en darte todas las posibilidades de gestión de tu ganadería lechera especializada de forma fácil, eficaz y práctica, haciendo una óptima experiencia de usuario enfocada en los administradores.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Fácil Manejo</h5>

            <p class="light" align="justify">Todas nuestras interfaces y funcionalidades, son intuitivas y de fácil interacción, puedes completar registros, actualizarlos o eliminarlos con simples pasos y en tan solo un momento tendrás completadas las operaciones.</p>
          </div>
        </div>
      </div>

    </div>
  </div>

  </body>

  <?php include_once('footer.php');?>

</html>
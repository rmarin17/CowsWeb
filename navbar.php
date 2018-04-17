<!DOCTYPE html>
<?php $idu=$_GET['idu'];?>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>ProCows</title>
  <link rel="icon" href="images/logo1.png"/>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <meta charset="utf-8">
</head>

<body>

  <!-- Dropdown Structure Ganado-->
  <ul id="dropdowncows" class="dropdown-content">
    <li><a href="#!">Registros</a></li>
    <li class="divider"></li>
    <li><a href="#!">Reproducción</a></li>
  </ul>
  <!-- Dropdown Structure Ganado-->
  <ul id="dropdownpot" class="dropdown-content grey-text">
    <li><a href="#!">Rotación</a></li>
    <li class="divider"></li>
    <li><a href="#!">Fertilización</a></li>
  </ul>
  
  <nav id="nav1" class="nav-extended white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo"><img Style="height:40px;width: 180px;margin-top: 12px;" src="images/procows.png"></a><!--lOGO-->
      <ul class="right hide-on-med-and-down ">
        <li><a href="controlg.php?idu=<?php echo $idu?>" >Ganado</a></li>
        <li><a href="#!">Potreros</a></li>
        <li><a href="includes/out.php"><i class="material-icons right">eject</i>Salir</a></li>
        <!--<li><a href="includes/out.php">Salir</a></li>-->
      </ul>
      <!--MENU LATERAL-->
      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">ProwCows</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  
  <!--MENU de 1-2-3
  <nav class="nav-extended blue-grey lighten-3">
    <div class="nav-wrapper container">
      <div class="col s12">
        <a href="#!" class="breadcrumb">First</a>
        <a href="#!" class="breadcrumb">Second</a>
        <a href="#!" class="breadcrumb">Third</a>
      </div>
    </div>  
  </nav>-->



  <!--  Scripts-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
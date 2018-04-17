<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="icon" href="images/logo1.png"/>
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

<nav class="white" role="navigation"><!--Barra Principal-->
    <div class="nav-wrapper container">
    <a id="logo-container" href="index.php" class="brand-logo"><img Style="height:40px;width: 180px;margin-top: 12px; " src="images/procows.png"></a><!--lOGO-->
      <ul class="right hide-on-med-and-down">
        
        <li><a href="registro.php">Registrarse</a></li>
      </ul>
      <!--MENU LATERAL-->
      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">ProwCows</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

  <div class="section"></div>
  <main id="container">
   
    <center>
     
      <div class="section"></div>

      
      <div class="section"></div>

      <div class="container" >
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 30px 68px 0px 68px; border: 1px solid #EEE;">
            <h5 class="indigo-text">Ingrese a su cuenta</h5>
          <form class="col s12" method="POST" action="includes/login.php">
                <div class='row'>
                
                  <div class='col s12'>
                  </div>
                </div>

                <div class='row'>
                  <div class='input-field col s12'>
                      <i class="material-icons prefix" Style="margin-top: 10px">account_circle</i>
                      <input name="uid" id="icon_prefix" type="text" class="validate" >
                      <label  for="icon_prefix">Usuario</label>
                  </div>
                </div>

                <div class='row'>
                  <div class='input-field col s12'>
                    <i class="material-icons prefix" Style="margin-top: 10px">lock_outline</i>
                    <input type="password" name="pwd"id="icon_prefix1"  class="validate" >
                    <label for="icon_prefix1">Contraseña</label>
                  </div>
                </div>

                <br/>
                <center>
                  <div class='row'>
                    <button type="submit" name="submit" class='col s12 btn btn-large waves-effect indigo'>Login</button> 
                  </div>
                </center>
          </form>
        </div>
      </div>
      <br></br>
      <?php
      $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

      if(strpos($fullUrl, "login=empty") == true){
          echo '<h style="color:teal;font-size:20px;font-family:calibri ;">Por favor rellena todos los campos</h> ';
      }
      elseif(strpos($fullUrl, "login=user") == true){
        echo '<h style="color:teal;font-size:20px;font-family:calibri;">Nombre de usuario incorrecto</h>';
      }
      elseif(strpos($fullUrl, "login=pass") == true){
        echo '<h style="color:teal;font-size:20px;font-family:calibri;">Contraseña incorrecta</h>';
      }
      elseif(strpos($fullUrl, "login=error") == true){
        echo '<h style="color:teal;font-size:20px;font-family:calibri;">Error inesperado, intenta de nuevo</h>';
      }
      ?>
     
    </center>

    

  </main>


  
      
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    <?php include_once('footer.php'); ?>
  </body>

  
  
</html>
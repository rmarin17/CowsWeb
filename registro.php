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
            <li><a href="login.php">Ingresar</a></li><!--BOTON LATERAL DERECHO-->
        </ul>
        <!--MENU LATERAL-->
        <ul id="nav-mobile" class="side-nav">
            <li><a href="login.php">Ingresar</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <div class="section"></div>
    <h5><center><p id="title"class="indigo-text">Registro</p></center></h5>
        <br></br>
            <div class="container">	
                <form class="col s12"action="includes/regisusers.php" method="POST" enctype="multipart/form-data">
                
                    <div class="row" >
                        <div class="input-field col s6">
                            <i class="material-icons prefix" Style="margin-top: 10px">person</i>
                            <input name="first" id="icon_telephone" type="tel" class="validate" >
                            <label  for="icon_telephone" >Nombre</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix" Style="margin-top: 10px">person</i>
                            <input name="last" id="icon_telephone" type="tel" class="validate">
                            <label  for="icon_telephone">Apellido</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix" Style="margin-top: 10px">mail</i>
                            <input name="email"id="icon_prefix" type="text" class="validate">
                            <label  for="icon_prefix">Email</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix" Style="margin-top: 10px">call</i>
                            <input name="telephone" id="icon_prefix" type="text" class="validate">
                            <label  for="icon_prefix">Telefono</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix" Style="margin-top: 10px">account_circle</i>
                            <input name="uid" id="icon_prefix" type="text" class="validate">
                            <label  for="icon_telephone">Login</label>
                        </div>
                
                        <div class='input-field col s6'>
                            <!--<i class="material-icons prefix" Style="margin-top: 10px">vpn_key</i>-->
                            <i class="material-icons prefix" Style="margin-top: 10px">lock_outline</i>
                            <input type="password" name="pwd" id="icon_prefix"  class="validate">
                            <label for="icon_prefix">Contraseña</label>
                        </div>
                    </div>

                    <br></br>
                    <div class="row">
                    <center><button class="waves-effect waves-light btn black" type="submit" value="Upload Image" name="submit"><i class="material-icons right">cloud_upload</i>Agregar Usuario</button></center>
                    </div>
                </form>         
            </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        
        <?php include_once('footer.php'); ?>
</body>
</html>
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
<?php include_once 'navbar.php'?>
<?php $idu=$_GET['idu'];
$fullUrl = "$_SERVER[REQUEST_URI]";
$url=str_replace('/ProCows/','',$fullUrl);

?>
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
  
  <!--Variables de Busqueda-->
 


  <body>
  
    <main>
    <!-- Dropdown Structure Ganado -->
    
      <ul  id="dropdowncows" class="dropdown-content">      
        <li><a href="<?php if(strpos($url, "filter") == true){
                    $search=array('&filter=v','&filter=t');
                    $newurl=str_replace($search,'',$url);                    
                    echo $newurl;
              }else{echo $url;}
        ?>&filter=v">Vacas</a></li>
        <li><a href="<?php if(strpos($url, "filter") == true){
                    $search=array('&filter=v','&filter=t');
                    $newurl=str_replace($search,'',$url);                    
                    echo $newurl;
              }else{echo $url;}
        ?>&filter=t">Terneras</a></li>        
      </ul>
      <!-- Dropdown Structure Ganado-->
      <ul id="dropdownorder" class="dropdown-content blue-grey-text">
        <li><a href="<?php if(strpos($url, "order") == true){
                    $search=array('&order=age','&order=name','&order=raza','&order=partos');
                    $newurl=str_replace($search,'',$url);                    
                    echo $newurl;
              }else{echo $url;}?>&order=name">Nombre</a></li>
        <li><a href="<?php if(strpos($url, "order") == true){
                    $search=array('&order=age','&order=name','&order=raza','&order=partos');
                    $newurl=str_replace($search,'',$url);                    
                    echo $newurl;
              }else{echo $url;}?>&order=age">Edad</a></li>
        <li><a href="<?php if(strpos($url, "order") == true){
                    $search=array('&order=age','&order=name','&order=raza','&order=partos');
                    $newurl=str_replace($search,'',$url);                    
                    echo $newurl;
              }else{echo $url;}?>&order=raza">Raza</a></li>
        <li><a href="<?php if(strpos($url, "order") == true){
                    $search=array('&order=age','&order=name','&order=raza','&order=partos');
                    $newurl=str_replace($search,'',$url);                    
                    echo $newurl;
              }else{echo $url;}?>&order=partos">Partos</a></li>
      </ul>
      <ul id="dropdowndes" class="dropdown-content blue-grey-text">
        <li><a href="<?php if(strpos($url, "des") == true){
                    $search=array('&des=si','&des=no');
                    $newurl=str_replace($search,'',$url);                    
                    echo $newurl;
              }else{echo $url;}
        ?>&des=si">Si</a></li>
        <li><a href="<?php if(strpos($url, "des") == true){
                    $search=array('&des=si','&des=no');
                    $newurl=str_replace($search,'',$url);                    
                    echo $newurl;
              }else{echo $url;}
        ?>&des=no">No</a></li>       
      </ul>      
      <!--NAVBAR secundaria-->
      <div id="nav2">
        <nav id="2" class="white">
          <div class="nav-wrapper container"> 
            <a class="brand-logo right"><i class="material-icons right">filter_list</i></a>         
            <ul class="Left hide-on-med-and-down">              
              <li><a data-beloworigin="true" class="dropdown-button below" href="#!" data-activates="dropdowncows">Ganado<i class="material-icons right">arrow_drop_down</i></a></li>
              <li><a data-beloworigin="true" class="dropdown-button below" href="#!" data-activates="dropdownorder">Listar<i class="material-icons right">arrow_drop_down</i></a></li>
              <li><a data-beloworigin="true" class="dropdown-button below" href="#!" data-activates="dropdowndes">Desecho<i class="material-icons right">arrow_drop_down</i></a></li>         
              <li><a href="listcows.php?idu=<?php echo $idu ?>" data-activates="dropdowndes">Eliminar Filtros<i class="material-icons right">delete</i></a></li>                   
            </ul>
          </div>
        </nav>
      </div>
    
    <h1 class="grey-text text-darken-2" align="center" style="font-size:50px;font-family:Constantia;">Listado del Ganado</h1>
      <div Style="margin-left: 10%; margin-right: 10%;">
            
            
            <br></br>
            <!-- collapsible la tabla -->
            <ul class="collapsible popout " data-collapsible="accordion">
            <?php
              
              $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  
              $desechado = "AND descarte = 'No'";            
              $filtrado = ''; 
              $ordenar = 'ORDER BY nombre ASC';
              $ban = '0';                 
              

              if(preg_match('/filter/', $fullUrl) == TRUE && preg_match('/order/', $fullUrl) == FALSE 
                  && preg_match('/des/', $fullUrl)== FALSE){
                    $ban = 1;
                $filtro = $_GET['filter'];
                switch ($filtro) {
                  case "v":
                      $filtrado = "AND partos > '0'";
                      break;
                  case "t":
                      $filtrado = "AND partos = '0'";
                      break;  
                                                    
                }                                                                                                                      
              } elseif(preg_match('/filter/', $fullUrl) == FALSE && preg_match('/order/', $fullUrl) == TRUE 
                        && preg_match('/des/', $fullUrl)== FALSE){
                          $ban = 1;
                $orden = $_GET['order'];
                switch ($orden) {
                  case "name":
                      $ordenar = "ORDER BY nombre ASC";
                      break;
                  case "age":
                      $ordenar = "ORDER BY nacimiento ASC";
                      break;
                  case "raza":
                      $ordenar = "ORDER BY raza ASC";
                      break; 
                  case "partos":
                      $ordenar = "ORDER BY partos ASC";
                      break;                               
                } 
                echo "2";   
              } elseif(preg_match('/filter/', $fullUrl) == FALSE && preg_match('/order/', $fullUrl) == FALSE 
                        && preg_match('/des/', $fullUrl)== TRUE){
                          $ban = 1;
                $desecho = $_GET['des'];
                switch ($desecho) {
                  case "si":
                      $desechado = "AND descarte = 'Si'";
                      break;
                  case "no":
                      $desechado = "AND descarte = 'No'";
                      break;                                
                } 
              } elseif(preg_match('/filter/', $fullUrl) == TRUE && preg_match('/order/', $fullUrl) == TRUE 
                        && preg_match('/des/', $fullUrl)== FALSE){
                          $ban = 1;
                $orden = $_GET['order'];
                switch ($orden) {
                  case "name":
                      $ordenar = "ORDER BY nombre ASC";
                      break;
                  case "age":
                      $ordenar = "ORDER BY nacimiento ASC";
                      break;
                  case "raza":
                      $ordenar = "ORDER BY raza ASC";
                      break; 
                  case "partos":
                      $ordenar = "ORDER BY partos ASC";
                      break;                               
                } 
                $filtro = $_GET['filter'];
                switch ($filtro) {
                  case "v":
                      $filtrado = "AND partos > '0'";
                      break;
                  case "t":
                      $filtrado = "AND partos = '0'";
                      break;  
                                                    
                }
              } elseif(preg_match('/filter/', $fullUrl) == TRUE && preg_match('/order/', $fullUrl) == TRUE 
                        && preg_match('/des/', $fullUrl)== TRUE){
                          $ban = 1;
                $filtro = $_GET['filter'];
                switch ($filtro) {
                  case "v":
                      $filtrado = "AND partos > '0'";
                      break;
                  case "t":
                      $filtrado = "AND partos = '0'";
                      break;                                                    
                }
                $orden = $_GET['order'];
                switch ($orden) {
                  case "name":
                      $ordenar = "ORDER BY nombre ASC";
                      break;
                  case "age":
                      $ordenar = "ORDER BY nacimiento ASC";
                      break;
                  case "raza":
                      $ordenar = "ORDER BY raza ASC";
                      break; 
                  case "partos":
                      $ordenar = "ORDER BY partos ASC";
                      break;                               
                }                 
                $desecho = $_GET['des'];
                switch ($desecho) {
                  case "si":
                      $desechado = "AND descarte = 'Si'";
                      break;
                  case "no":
                      $desechado = "AND descarte = 'No'";
                      break;                                
                } 
              } elseif(preg_match('/filter/', $fullUrl) == FALSE && preg_match('/order/', $fullUrl) == TRUE 
                        && preg_match('/des/', $fullUrl)== TRUE){  
                          $ban = 1;                              
                $orden = $_GET['order'];
                switch ($orden) {
                  case "name":
                      $ordenar = "ORDER BY nombre ASC";
                      break;
                  case "age":
                      $ordenar = "ORDER BY nacimiento ASC";
                      break;
                  case "raza":
                      $ordenar = "ORDER BY raza ASC";
                      break; 
                  case "partos":
                      $ordenar = "ORDER BY partos ASC";
                      break;                               
                }                 
                $desecho = $_GET['des'];
                switch ($desecho) {
                  case "si":
                      $desechado = "AND descarte = 'Si'";
                      break;
                  case "no":
                      $desechado = "AND descarte = 'No'";
                      break;                                
                }                  
              } elseif(preg_match('/filter/', $fullUrl) == TRUE && preg_match('/order/', $fullUrl) == FALSE 
                        && preg_match('/des/', $fullUrl)== TRUE){     
                          $ban = 1;                     
                $filtro = $_GET['filter'];
                switch ($filtro) {
                  case "v":
                      $filtrado = "AND partos > '0'";
                      break;
                  case "t":
                      $filtrado = "AND partos = '0'";
                      break;  
                                                    
                }                
                $desecho = $_GET['des'];
                switch ($desecho) {
                  case "si":
                      $desechado = "AND descarte = 'Si'";
                      break;
                  case "no":
                      $desechado = "AND descarte = 'No'";
                      break;                                
                }                 
              } else {
                $sql2 = "SELECT * from ganado where idu=$idu order by nombre ASC";
              }
              if ($ban == 0){
                $sql2 = "SELECT * from ganado where idu=$idu order by nombre ASC";
              } if ($ban == 1){
                $sql2 = "SELECT * from ganado where idu=$idu $filtrado $desechado $ordenar "; 
              }                                 
              include 'includes/conexion.php';              
              $res2 =mysqli_query($conn,$sql2);?>
              <?php
              while ($fila = mysqli_fetch_assoc($res2)){ 
              ?>                
              <li>              
                <div class="collapsible-header">                  
                  <img  width="60" src="<?php echo $fila['imagen'];?>">
                  <p Style="margin-left:10px;margin-top:10px"><?php echo $fila['nombre'];?></p>                                   
                  <p></p>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <p align="right" position= "relative" Style="margin-right:4%;margin-top:10px; color: red;font-size:22px;font-family:Britannic Bold;"><?php if($fila['partos'] == 0){echo "T";}else{echo "V";}?></p>
                  <a href="modcow.php?idg=<?php echo $fila['idg'];?>&idu=<?php echo $fila['idu'];?>" class="secondary-content"><i Style="color:#546e7a;" class="material-icons">edit</i></a>                  
                </div>
                <div class="collapsible-body">                

                <div class="row">
                    <div class="col s3">                                                
                      <img class="materialboxed" src="<?php echo $fila['imagen'];?>" style="margin-buttom:15%;margin-left:10%" width="200">                                                
                    </div> 
                    <div class="col s1 valign-wrapper">                          
                        <p style="color: teal;font-size:22px;font-family:Britannic Bold;">
                          Raza: 
                          Padre: 
                          Madre: 
                          Abuelo: 
                          Abuela: 
                         </p>                                                                   
                    </div>
                    <div class="col s2 valign-wrapper">                          
                        <p style="font-size:20px;font-family:Raleway regular;">
                          <?php echo $fila['raza'];?><br>
                          <?php echo $fila['padre'];?><br>
                          <?php echo $fila['madre'];?><br>
                          <?php echo $fila['abuelo'];?><br>
                          <?php echo $fila['abuela'];?><br>
                         </p>                                                                         
                    </div>
                    <div class="col s2 valign-wrapper">                        
                        <p style="color: teal;font-size:22px;font-family:Britannic Bold;"> 
                          Nacimiento:<br>
                          Edad:<br>
                          Partos:<br>
                          Identificación:<br> 
                          Propietario:<br>
                        </p>  
                    </div> 
                    <div class="col s2 valign-wrapper">                        
                        <p style="font-size:20px;font-family:Raleway regular;"> 
                          <?php echo $fila['nacimiento'];?> <br>
                          <?php $diff=date_diff(date_create($fila['nacimiento']), date_create('today'));                                
                                $meses= intval($diff->y * 12 + $diff->m + $diff->d/30 + $diff->h / 24); 
                                echo $meses;?> Meses <br> 
                          <?php echo $fila['partos'];?> <br>                            
                          <?php echo $fila['numero_ica'];?> <br>
                          <?php echo $fila['propietario'];?> <br>
                        </p>  
                    </div> 
                       
                   </div>
                </div>
                <?php } ?>
              </li>
            </ul>
            <!-- Comienza la tabla
            <ul  class="collection collapsible ">
                        
                        <?php
                        /*include 'includes/conexion.php';
                        $sql2 = "SELECT * from ganado where idu=$idu order by nombre ASC";
                        $res2 =mysqli_query($conn,$sql2);
                        while ($fila = mysqli_fetch_assoc($res2)){ 
                        ?>
                        <li  class="hoverable collection-item avatar">
                        <img Style="margin-top: 15px;" src="<?php echo $fila['imagen'];?>" alt="" class="circle ">
                        <span class="title">Nombre: <?php echo $fila['nombre'];?></span>
                        <p>Raza: <?php echo $fila['raza'];?> <br>
                           Edad: <?php echo date_diff(date_create($fila['nacimiento']), date_create('today'))->y; ?> Años
                        </p>
                        <a href="#!" class="secondary-content"><i Style="margin-top: 80%;" class="material-icons">edit</i></a>
                        <a href="#!" class="secondary-content"><i Style="margin-top: 80%;" class="material-icons">edit</i></a>
                        <?php } */?>
                        </li>
            </ul>
               Termina la tabla -->
          </div>
          
        </div>   
    </main>   
    <script>
    $(document).ready(function(){
      $(".dropdown-content>li>a").css("color", "#616161");
      $('.collapsible').collapsible();
      $('.modal').modal();      
      $(".dropdown-button").dropdown();        
      $(window).scroll(function(){
            if($(this).scrollTop() > 70 ){
              $('#nav2').addClass('navbar-fixed');                   
              $('#2').css("top", "0");
            } else {
              $('#nav2').removeClass('navbar-fixed');              
            }
      });
    });
     
    </script>   
    <?php include_once('footer.php');?>
  </body>
</html>
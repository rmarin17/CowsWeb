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
    <h1 class="grey-text text-darken-2" align="center" style="font-size:50px;font-family:Constantia;">Eliminar Ganado</h1>
      <div Style="margin-left: 10%; margin-right: 10%;">
                        
            <div class="row">
                <div id ="searchtext">
                  <form id ="searchbox" action="delcows.php">
                  <input name="idu" id="icon_prefix" type="hidden" value="<?php echo $idu?>" class="validate" required="" aria-required="true">                                    
                
                  <p style="font-size:20px;font-family:Raleway regular;">Mostrar:</p>
                    <div id="filter" style="margin-left: 20px">                      
                        <input class="with-gap" type="radio" name="filter" id="test1" value="tg" checked="checked"/>
                        <label for="test1">Todo el Ganado</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="with-gap" type="radio" name="filter" id="test2" value="v"/>
                        <label for="test2">Vacas</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="with-gap" type="radio" name="filter" id="test3" value="t"/>
                        <label for="test3">Terneras</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="with-gap" type="radio" name="filter" id="test4" value="gd"/>
                        <label for="test4">Ganado Desechado</label>
                        <button style="margin-left:25%"class="waves-effect waves-yellow btn black" type="submit" value="fil" name="submit">Filtrar</button>
                    </div>
                  </form>
                </div>
            </div>
            <!-- collapsible la tabla -->
            
            <ul class="collapsible popout " data-collapsible="accordion">                                               
            <?php
              
              $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              
              if(strpos($fullUrl, "filter=tg") == true){
                $sql2 = "SELECT * from ganado where idu=$idu order by nombre ASC";
              }
              elseif(strpos($fullUrl, "filter=v") == true){
                $sql2 = "SELECT * from ganado where partos > '0' order by nombre ASC";
              }
              elseif(strpos($fullUrl, "filter=t") == true){
                $sql2 = "SELECT * from ganado where partos = '0' order by nombre ASC";
              }
              elseif(strpos($fullUrl, "filter=gd") == true){
                $sql2 = "SELECT * from ganado where descarte = 'Si' order by nombre ASC";
              }elseif(!strpos($fullUrl, "q=") == true){
                $sql2 = "SELECT * from ganado where descarte = 'No' order by nombre ASC";
              }else{
                $sql2 = "SELECT * from ganado where idu=$idu order by nombre ASC";
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
                  <input type="checkbox"  id="id_<?php echo $fila['id'];?>" name:"del" value="<?php $array[] = $fila['id'];?>">
                    <label style="margin-top: 13px" for="id_<?php echo $fila['id'];?>"></label>
                  </input>                                    
                  <a class="secondary-content"><i Style="color:#d32f2f;margin-left: 10%;" class="material-icons">delete</i></a>
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
                          <?php echo date_diff(date_create($fila['nacimiento']), date_create('today'))->y; ?> Años <br> 
                          <?php echo $fila['partos'];?> <br>                            
                          <?php echo $fila['numero_ica'];?> <br>
                          <?php echo $fila['propietario'];?> <br>
                        </p>  
                    </div> 
                       
                   </div>
                </div>
                <?php } ?>
              </li>
              <div class="row" style="margin-top:20px">
              <center><a href="#del1"  class="modal-trigger btn-large waves-effect waves-yellow red darken-2">Eliminar Registros Seleccionados</a></center>              
              <div>
              <div id="del1" class="modal">
                <div class="modal-content">
                <h4>Eliminar Vacas Seleccionadas</h4>
                <p>Recuerde que se borraran todos los datos de las vacas seleccionadas y una vez completada la acción no se podrán volver a recuperar, ¿está seguro de eliminar las vacas?</p>
                </div>
                <div class="modal-footer">
                <a class="modal-action modal-close waves-effect waves-green btn-flat">NO</a>            
                <a href="includes/delvarcows.php?idu=<?php echo $idu?>&array=<?php print_r($array)?>"class="modal-action modal-close waves-effect waves-green btn-flat">SI</a>            
                </div>                
            </div>
            </ul> 
            
          </div>
          
        </div>   
    </main>   
    <script>
      $('.collapsible').collapsible();
      $('.modal').modal();
    </script>   
    <?php include_once('footer.php');?>
  </body>
</html>
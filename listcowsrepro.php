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
  
      

        <h1 class="grey-text text-darken-2" align="center" style="font-size:50px;font-family:Constantia;">Celos Registrados</h1>
        <div Style="margin-left: 10%; margin-right: 10%;">            
                                               
              <!-- Comienza la tabla-->
              <table id="tabla" class="highlight centered responsive-table" title="Lista de Celos">  
                    <thead>                          
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Fecha del Servicio</th>
                            <th>Fecha del Proximo Servicio</th>
                            <th>Toro</th>
                            <th>Tipo de Inceminación</th>
                            <th>Fecha Posible Parto</th>                            
                            <th></th>
                            <th></th>
                        </tr> 
                    </thead>  
                                  <?php
                              include 'includes/conexion.php';
                              $sql = "SELECT * FROM ganado INNER JOIN celos ON ganado.idg = celos.idg ORDER BY fecha_s";//consulta inter tablas
                              $res =mysqli_query($conn,$sql);                            
                              //$datos='';
                              if(mysqli_num_rows($res) == 0){ ?>
                                  <center><h style="color:teal;font-size:50px;font-family:calibri;">No Existen Datos Registrados</h></center>
                          <?php $datos='no';
                              } else{
                              while ($fila = mysqli_fetch_assoc($res)){ ?>
                    <tbody>   
                        <tr> 
                            <td><img src="<?php echo $fila['imagen'];?>" alt=""  class="circle" style="width:50px;height:50px;"></td>                                                                       
                            <td><?php echo $fila['nombre'];?></td>                                        
                            <td><?php echo $fila['fecha_s'];?></td>
                            <td><?php echo $fila['fecha_prox'];?></td>
                            <td><?php echo $fila['toro'];?></td>
                            <td><?php echo $fila['tipo'];?></td>
                            <td><?php echo $fila['fecha_psp'];?></td>                                                                    
                        </tr>
                    <tbody>  
                                  <?php $datos='si';
                                      }
                                  }?>
              </table>
          </div> 
          <br></br>       
          <hr Style="color:teal">
          <h1 class="grey-text text-darken-2" align="center" style="font-size:50px;font-family:Constantia;">Partos Registrados</h1>
          <div Style="margin-left: 10%; margin-right: 10%;">                        
                                 
            <!-- Comienza la tabla-->
            <table id="tabla" class="highlight centered responsive-table" title="Lista de Celos">  
                  <thead>                          
                      <tr>
                          <th>Imagen</th>
                          <th>Nombre</th>
                          <th>Fecha del Parto</th>
                          <th>Genero de Cria</th>                                                                 
                          <th></th>
                          <th></th>
                      </tr> 
                  </thead>  
                    <?php
                    include 'includes/conexion.php';
                    $sql = "SELECT * FROM ganado INNER JOIN partos ON ganado.idg = partos.idg ORDER BY fecha_parto";
                    $res =mysqli_query($conn,$sql);                            
                    //$datos='';
                    if(mysqli_num_rows($res) == 0){ ?>
                        <center><h style="color:teal;font-size:50px;font-family:calibri;">No Existen Datos Registrados</h></center>
                        <?php $datos='no';
                      } else{
                      while ($fila = mysqli_fetch_assoc($res)){ ?>
                  <tbody>   
                      <tr>       
                          <td><img src="<?php echo $fila['imagen'];?>" alt=""  class="circle" style="width:100px;height:100px;"></td>
                          <td><?php echo $fila['nombre'];?></td>                                        
                          <td><?php echo $fila['fecha_parto'];?></td>                                                                                
                          <td><?php echo $fila['cria'];?></td>                                                                                                    
                      </tr>
                  <tbody>  
                    <?php $datos='si';
                      }
                  }?>
              </table>                        
          </div>
          <br></br>
   
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
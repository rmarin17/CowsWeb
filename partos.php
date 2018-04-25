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
      <h1 class="grey-text text-darken-2" align="center" style="font-size:50px;font-family:Constantia;">Partos del Ganado</h1>
        <div  Style="margin-left: 10%; margin-right: 10%">
          <div  class="section">
            <!-- Comienza los tabs -->
            <div class="panel">
                <div class="row " id="tabs">	
                    <div class="col s12 ">
                        <ul class="tabs ">
                            <li class="tab col s4"><a href="#addcow">Registrar Partos</a></li>
                            <li class="tab col s4"><a href="#upcsvp">Subir Csv Excel</a></li>
                            <li class="tab col s4 "><a href="#cowlist">Partos Registrados</a></li>
                        </ul>
                    </div>
                    <br></br>
                    <br></br>
                    <div id="addcow" class="col s12">
                        <center><p class="flow-text">Primero selecciona la vaca y posteriormente la fecha.</p></center>
                        <br></br>
                        <section id="form">                            
                            <table id="tabla" class="highlight centered responsive-table" title="Lista de Ganado">  
                                <thead>                          
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Raza</th>                                                                                                                 
                                        <th></th>
                                    </tr> 
                                </thead>  
                            <?php
                            include 'includes/conexion.php';
                            $sql = "SELECT * from ganado where idu=$idu AND descarte='no'";
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
                                        <td><?php echo $fila['raza'];?></td>                                       
                                        <td><a href="regisparto.php?id=<?php echo $fila['idg'];?>&idu=<?php echo $fila['idu'];?>"><i Style="color:#546e7a;" class="material-icons">add_circle</i></a></td>                                        
                                    </tr>
                                <tbody>  
                                <?php $datos='si';
                                    }
                                }?>
                            </table>
                              
                        </section>
                    </div>
                    <div class="col s12" id="upcsvp">
                        <br></br>
                        <section style="border: solid">
                            <br></br>
                            <center>
                                <p class="flow-text">Sube tu Formato Csv Excel y Registra Varios Datos al Tiempo</p>
                                <br></br> 
                                <a href="downloads/cows.csv" download class="waves-effect waves-light btn green darken-3" >Descargar Formato CSV (Plantilla)</a>
                            </center>
                            <div class="row">	
                                <form class="col s12 "action="includes/cowcsv.php?idu=<?php echo $idu?>" method="POST" enctype="multipart/form-data">
                                <br></br>
                                <div class="row">
                                    <center>
                                        <span class="ico" ><img Style="height:60px;width: 60px;margin-top: 10px; " src="images/upcsv.png"></span>
                                        <div class="input-field " class="validate" required="" aria-required="true">
                                            <input name="csv" type="file" id="csv" required="" aria-required="true" class="validate">
                                        </div>
                                    </center>                            
                                </div>
                                <br> </br>
                                <center><input class="waves-effect waves-yellow btn black center" type="submit" value="Subir" name="submit"></input></center>
                                </form>
                            </div>
                        </section>
                    </div>
                    <div id="cowlist" class="col s12">
                        <form method="post" action="includes/delvarpartos.php">
                            <table id="tabla" class="highlight centered responsive-table" title="Lista de Celos">  
                                <thead>                          
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Fecha del Parto</th>
                                        <th>Genero de Cria</th>                                       
                                        <th>Seleccionar</th>
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
                                        <td><input type="checkbox" class="filled-in" id="select_<?php echo $fila['idp'];?>" name="eliminar[]" value="<?php echo $fila['idp'];?>"/><label for="select_<?php echo $fila['idp'];?>"></label></td>
                                        <td><a href="modpartos.php?idp=<?php echo $fila['idp'];?>&idu=<?php echo $fila['idu'];?>"><i Style="color:#546e7a;" class="material-icons">edit</i></a></td>                                        
                                    </tr>
                                <tbody>  
                                <?php $datos='si';
                                    }
                                }?>
                            </table>
                        
                        <br></br>    
                        <div class="row">
                            <div class="col s6">                    
                                <center><a href="#modal1"  class="modal-trigger btn-large waves-effect waves-yellow red darken-2 <?php if($datos == 'no'){ print "disabled"; }?>"><i class="material-icons left">delete</i>Eliminar Todos Los Registros</a></center>
                            </div>
                            <div class="col s6">                    
                                <center><a href="#modal2"  class="modal-trigger btn-large waves-effect waves-yellow red darken-2 <?php if($datos == 'no'){ print "disabled"; }?>"><i class="material-icons left">delete</i>Eliminar Registros Seleccionados</a></center>
                            </div>
                        </div>
                        <!-- Modal Structure -->
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                            <h4>Eliminar Todos los Registros</h4>
                            <p>Recuerde que se borraran todos los datos de celos registrados y una vez completada la acción no se podrán volver a recuperar, ¿está seguro de eliminar todos los datos?</p>
                            </div>
                            <div class="modal-footer">
                            <a class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
                            <a href="includes/deleteall.php?tabla=celos&idu=<?php echo $idu?>" class="modal-action modal-close waves-effect waves-green btn-flat">Si</a>
                            </div>
                        </div>
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                            <h4>Eliminar Todos los Datos Seleccionados</h4>
                            <p>Recuerde que se borraran todos los datos de los celos seleccionados y una vez completada la acción no se podrán volver a recuperar, ¿está seguro de eliminar los datos?</p>
                            </div>
                            <div class="modal-footer">
                            <a class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
                            <input type="submit" name="borrar" class="modal-action modal-close waves-effect waves-green btn-flat" value="Si"></input>
                            </div>
                        </div>
                        </form>
                    </section></div>
                    
                </div>
                    </div>
            
            <!-- Termina el Card -->
          </div>
          
        </div>  
    </main>      
    <?php include_once('footer.php');?>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script> 
    <script>
        $('.modal').modal();
        
        $('select').material_select();
       
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
        $(document).ready(function(){
    });
       
    </script> 
  </body>
</html>
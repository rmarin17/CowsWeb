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
      <h1 class="grey-text text-darken-2" align="center" style="font-size:50px;font-family:Constantia;">Agregar Ganado</h1>
        <div  Style="margin-left: 10%; margin-right: 10%">
          <div  class="section">
            <!-- Comienza los tabs -->
            <div class="panel">
                <div class="row " id="tabs">	
                    <div class="col s12 ">
                        <ul class="tabs ">
                            <li class="tab col s4"><a href="#addcow">Registrar Ganado</a></li>
                            <li class="tab col s4"><a href="#upcsvp">Subir Csv Excel</a></li>
                            <li class="tab col s4 "><a href="#cowlist">Ganado Registrado</a></li>
                        </ul>
                    </div>
                    <br></br>
                    <br></br>
                    <div id="addcow" class="col s12">
                        <center><h4 style="color:teal">Registra tu Ganado Uno por Uno</h4></center>
                        <section id="form">
                            <form class="col s12" action="includes/regiscow.php" method="POST" enctype="multipart/form-data">
                            <input name="idu" id="icon_prefix" type="hidden" value="<?php echo $idu?>" class="validate" required="" aria-required="true">
                            <div class="row">
                                <div id="c" class="col s6">
                                    <span class="ico"><img Style="height:40px;width: 40px;margin-top: 12px; " src="images/cow.png"></span>
                                    <div class="input-field ">
                                        <input name="nombre" id="icon_prefix" type="text" class="validate" required="" aria-required="true">
                                        <label  for="icon_prefix">Nombre</label>
                                    </div>
                                </div>
                                <div id="c" class="col s6">
                                    <span class="ico"><img Style="height:40px;width: 40px;margin-top: 12px; " src="images/raza.png"></span>
                                    <div class="input-field ">
                                        <input name="raza" id="icon_prefix" type="text" class="validate" required="" aria-required="true">
                                        <label  for="icon_prefix">Raza</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix" Style="height:40px;width: 40px;margin-top: 10px; ">date_range</i>
                                    <input name="nacimiento" type="date" class="datepicker validate" required="" aria-required="true">
                                    <label  for="icon_prefix">Fecha de Nacimiento</label>
                                </div>
                                <div id="c" class="col s6">
                                    <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/parto.png"></span>
                                    <div class="input-field ">
                                        <input  name="partos" id="icon_prefix" type="text" class="validate" required="" aria-required="true">
                                        <label  for="icon_prefix">Número de Partos</label>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div id="c" class="col s6">
                                    <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/bull.png"></span>
                                    <div class="input-field ">
                                        <input  name="padre" id="icon_prefix" type="text" class="validate" required="" aria-required="true">
                                        <label  for="icon_prefix">Padre</label>
                                    </div>
                                </div>
                                <div id="c" class="col s6">
                                    <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/cowmother.png"></span>
                                    <div class="input-field ">
                                        <input  name="madre" id="icon_prefix" type="text" class="validate" required="" aria-required="true">
                                        <label  for="icon_prefix">Madre</label>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div id="c" class="col s6">
                                    <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/bullgran.png"></span>
                                    <div class="input-field ">
                                        <input  name="abuelo" id="icon_prefix" type="text" class="validate" required="" aria-required="true">
                                        <label  for="icon_prefix">Abuelo</label>
                                    </div>
                                </div>
                                <div id="c" class="col s6">
                                    <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/cowgran.png"></span>
                                    <div class="input-field ">
                                        <input  name="abuela" id="icon_prefix" type="text" class="validate" required="" aria-required="true">
                                        <label  for="icon_prefix">Abuela</label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div id="c" class="col s6">
                                    <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/id.png"></span>
                                    <div class="input-field ">
                                        <input  name="identi" id="icon_prefix" type="text" class="validate" required="" aria-required="true">
                                        <label  for="icon_prefix">Número Identificación (Número ICA)</label>
                                    </div>
                                </div>
                                <div id="c" class="col s6">
                                    <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/user.png"></span>
                                    <div class="input-field ">
                                        <input  name="propietario" id="icon_prefix" type="text" class="validate" required="" aria-required="true">
                                        <label  for="icon_prefix">Propietario</label>
                                    </div>
                                </div>
                                                                
                            </div>
                            <div class="row">
                                <div id="c" class="col s6">
                                    <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/upload.png"></span>
                                    <div class="input-field " class="validate" required="" aria-required="true">
                                        <input Style="margin-top: 20px; "type="file" name="file" id="fileToUpload" >
                                        <label Style="margin-top: -14px;">Imagen</label>
                                    </div>
                                </div>
                                <div id="c" class="col s6">
                                    <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/desecho.png"></span>
                                    <div class="input-field " class="validate" required="" aria-required="true">
                                        <select name="desecho">
                                        <option value="" disabled selected>Escoge una opción</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                        </select>
                                        <label>¿Gando de Desecho?</label>
                                    </div>
                                </div>
                            </div>
                            <br></br>
                            <center><button class="waves-effect waves-yellow btn black" type="submit" value="Upload Image" name="submit">Agregar</button></center>
                            </form>                                          
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
                        <form method="post" action="includes/delvarcows.php">
                            <table id="tabla" class="highlight centered responsive-table" title="Lista de Ganado">  
                                <thead>                          
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Raza</th>
                                        <th>Nacimiento</th>
                                        <th>Padre</th>
                                        <th>Madre</th>
                                        <th>Abuelo</th>
                                        <th>Abuela</th>
                                        <th>Número Identificación</th>
                                        <th>Propietario</th>
                                        <th>Desecho</th>
                                        <th>Número de Partos</th>
                                        <th>Seleccionar</th>
                                        <th></th>
                                        <th></th>
                                    </tr> 
                                </thead>  
                            <?php
                            include 'includes/conexion.php';
                            $sql = "SELECT * from ganado where idu=$idu ORDER BY nombre";
                            
                            $res =mysqli_query($conn,$sql);                            
                            //$datos='';
                            if(mysqli_num_rows($res) == 0){ ?>
                                <center><h style="color:teal;font-size:50px;font-family:calibri;">No Existen Datos Registrados</h></center>
                        <?php $datos='no';
                            } else{
                                $sql2 = "SELECT count(*) FROM ganado";
                                $res2 = mysqli_query($conn,$sql2);                            
                                $fila2 = mysqli_fetch_assoc($res2);
                                $cantidad = $fila2['count(*)'];
                                ?><center><h4 style="color:teal">Cantidad de Registros: <?php echo $cantidad?></h4></center>
                                
                                <?php
                            while ($fila = mysqli_fetch_assoc($res)){?>                                
                                <tbody>   
                                    <tr>                                
                                        <td><img src="<?php echo $fila['imagen'];?>" alt=""  class="circle" style="width:100px;height:100px;"></td>
                                        <td><?php echo $fila['nombre'];?></td>
                                        <td><?php echo $fila['raza'];?></td>
                                        <td><?php echo $fila['nacimiento'];?></td>
                                        <td><?php echo $fila['padre'];?></td>
                                        <td><?php echo $fila['madre'];?></td>
                                        <td><?php echo $fila['abuelo'];?></td>
                                        <td><?php echo $fila['abuela'];?></td>
                                        <td><?php echo $fila['numero_ica'];?></td>
                                        <td><?php echo $fila['propietario'];?></td>
                                        <td><?php echo $fila['descarte'];?></td>
                                        <td><?php echo $fila['partos'];?></td>
                                        <td><input type="checkbox" class="filled-in" id="select_<?php echo $fila['idg'];?>" name="eliminar[]" value="<?php echo $fila['idg'];?>"/><label for="select_<?php echo $fila['idg'];?>"></label></td>
                                        <td><a href="modcow.php?idg=<?php echo $fila['idg'];?>&idu=<?php echo $fila['idu'];?>"><i Style="color:#546e7a;" class="material-icons">edit</i></a></td>                                        
                                    </tr>
                                <tbody>  
                                <?php $datos='si';
                                    }
                                }?>
                            </table>
                        
                        <br></br>    
                        <div class="row">
                            <div class="col s6">                    
                                <center><a href="#modal1"  class="modal-trigger btn-large waves-effect waves-yellow red darken-2 <?php if($datos == 'no'){ print "disabled"; }?>"><i class="material-icons left">delete</i>Eliminar Todos Los Registros de Ganado</a></center>
                            </div>
                            <div class="col s6">                    
                                <center><a href="#modal2"  class="modal-trigger btn-large waves-effect waves-yellow red darken-2 <?php if($datos == 'no'){ print "disabled"; }?>"><i class="material-icons left">delete</i>Eliminar Los Registros de Ganado Seleccionado</a></center>
                            </div>
                        </div>
                        <!-- Modal Structure -->
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                            <h4>Eliminar Todos los Registros</h4>
                            <p>Recuerde que se borraran todos los datos del ganado registrado y una vez completada la acción no se podrán volver a recuperar, ¿está seguro de eliminar todos los datos?</p>
                            </div>
                            <div class="modal-footer">
                            <a class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
                            <a href="includes/deleteall.php?tabla=ganado&idu=<?php echo $idu?>" class="modal-action modal-close waves-effect waves-green btn-flat">Si</a>
                            </div>
                        </div>
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                            <h4>Eliminar Todos los Datos Seleccionados</h4>
                            <p>Recuerde que se borraran todos los datos del ganado seleccionado y una vez completada la acción no se podrán volver a recuperar, ¿está seguro de eliminar los datos?</p>
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
    </script> 
  </body>
</html>
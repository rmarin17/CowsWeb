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
<?php
	include 'includes/conexion.php';
    $id=$_GET['idg'];
    $idu=$_GET['idu'];
	$sql = "SELECT * from ganado WHERE idg='$id'";
	$res =mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $final_date= date('d F, Y', strtotime ($row['nacimiento']));//Representacion de numerico a letras
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

        <meta charset="utf-8">
    </head>

    <body>
        <main>
            <center><h1 class="flow-text" style="color:teal;font-size:50px;font-family:calibri;">Editar Vaca</h1></center>
            <section id="form" style="margin-left:300px; margin-right:300px">
                <form class="col s12"action="includes/actcow.php" method="POST" enctype="multipart/form-data">
                <input name="id" id="icon_prefix" type="hidden" value="<?php echo $id?>" class="validate" required="" aria-required="true">
                <input name="idu" id="icon_prefix" type="hidden" value="<?php echo $idu?>" class="validate" required="" aria-required="true">               
                 
                
                <div class="row">
                    <div id="c" class="col s6">
                        <span class="ico"><img Style="height:40px;width: 40px;margin-top: 12px; " src="images/cow.png"></span>
                        <div class="input-field ">
                            <input name="nombre" id="icon_prefix" type="text" class="validate" required="" aria-required="true" value="<?php echo $row['nombre'];?>">
                            <label  for="icon_prefix">Nombre</label>
                        </div>
                    </div>
                    <div id="c" class="col s6">
                        <span class="ico"><img Style="height:40px;width: 40px;margin-top: 12px; " src="images/raza.png"></span>
                        <div class="input-field ">
                            <input name="raza" id="icon_prefix" type="text" class="validate" required="" aria-required="true" value="<?php echo $row['raza'];?>">
                            <label  for="icon_prefix">Raza</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix" Style="height:40px;width: 40px;margin-top: 10px; ">date_range</i>
                        <input name="nacimiento" type="date" class="datepicker validate" required="" aria-required="true" value="<?php echo $final_date;?>">
                        <label  for="icon_prefix">Fecha de Nacimiento</label>
                    </div>
                    <div id="c" class="col s6">
                        <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/parto.png"></span>
                        <div class="input-field ">
                            <input  name="partos" id="icon_prefix" type="text" class="validate" required="" aria-required="true" value="<?php echo $row['partos'];?>">
                            <label  for="icon_prefix">Número de Partos</label>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div id="c" class="col s6">
                        <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/bull.png"></span>
                        <div class="input-field ">
                            <input  name="padre" id="icon_prefix" type="text" class="validate" required="" aria-required="true" value="<?php echo $row['padre'];?>">
                            <label  for="icon_prefix">Padre</label>
                        </div>
                    </div>
                    <div id="c" class="col s6">
                        <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/cowmother.png"></span>
                        <div class="input-field ">
                            <input  name="madre" id="icon_prefix" type="text" class="validate" required="" aria-required="true" value="<?php echo $row['madre'];?>">
                            <label  for="icon_prefix">Madre</label>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div id="c" class="col s6">
                        <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/bullgran.png"></span>
                        <div class="input-field ">
                            <input  name="abuelo" id="icon_prefix" type="text" class="validate" required="" aria-required="true" value="<?php echo $row['abuelo'];?>">
                            <label  for="icon_prefix">Abuelo</label>
                        </div>
                    </div>
                    <div id="c" class="col s6">
                        <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/cowgran.png"></span>
                        <div class="input-field ">
                            <input  name="abuela" id="icon_prefix" type="text" class="validate" required="" aria-required="true" value="<?php echo $row['abuela'];?>">
                            <label  for="icon_prefix">Abuela</label>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div id="c" class="col s6">
                        <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/id.png"></span>
                        <div class="input-field ">
                            <input  name="identi" id="icon_prefix" type="text" class="validate" required="" aria-required="true" value="<?php echo $row['numero_ica'];?>">
                            <label  for="icon_prefix">Número Identificación (Número ICA)</label>
                        </div>
                    </div>
                    <div id="c" class="col s6">
                        <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/user.png"></span>
                        <div class="input-field ">
                            <input  name="propietario" id="icon_prefix" type="text" class="validate" required="" aria-required="true" value="<?php echo $row['propietario'];?>">
                            <label  for="icon_prefix">Propietario</label>
                        </div>
                    </div>                    
                </div>
                                
                <div class="row">                
                    <div class="col s6 valign-wrapper">
                        <tr>
                            <td>Imagen Actual:</td>
                            <td><img src="<?php echo $row['imagen'];?>" style="width:150px;height:150px;margin-left:50px"></td>
                        </tr>
                    </div>
                    <div id="c" class="col s6" Style="margin-top: 40px;">
                        <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/desecho.png"></span>
                        <div class="input-field " class="validate" required="" aria-required="true">
                            <select name="desecho">
                            <?php if($row['descarte']=='Si'){
                                $des='1';
                            }elseif($row['descarte']=='No'){
                                $des='0';
                            }?>
                            <option value="<?php echo $row['descarte'];?>"><?php echo $row['descarte'];?></option>
                            <?php if($row['descarte']=='Si'){
                                echo '<option value="No">No</option>';
                            }elseif($row['descarte']=='No'){
                                echo '<option value="Si">Si</option>';
                            }else{
                                echo '<option value="Si">Si</option>';
                                echo '<option value="No">No</option>';
                            }?>                            
                            </select>
                            <label>¿Gando de Desecho?</label>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div id="c" class="col s6">
                        <span class="ico"><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/upload.png"></span>
                        <div class="input-field " class="validate" required="" aria-required="true">
                            <input Style="margin-top: 20px; "type="file" name="file" id="fileToUpload">
                            <label Style="margin-top: -14px;">Actualizar Imagen</label>
                        </div>
                    </div>
                    
                </div>
                <br></br>
                <center><button class="waves-effect waves-light btn black" type="submit" value="Upload Image" name="submit">Actualizar</button></center>
                </form>                                          
            </section>
            <br></br>
        </main>
    </body>
   <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script>        
            $('select').material_select();
        
            $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
        </script>

    <?php
        include_once 'footer.php'
    ?>
</html>
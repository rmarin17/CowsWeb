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
    $idp=$_GET['idp'];
    $idu=$_GET['idu'];
	$sql = "SELECT * FROM ganado INNER JOIN partos ON ganado.idg = partos.idg WHERE idp = '$idp' ";
	$res =mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $fecha_parto= date('d F, Y', strtotime ($row['fecha_parto']));//Representacion de numerico a letras
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
                <form class="col s12"action="includes/actparto.php" method="POST" enctype="multipart/form-data">
                <input name="idp" id="icon_prefix" type="hidden" value="<?php echo $idp?>" class="validate" required="" aria-required="true">
                <input name="idg" id="icon_prefix" type="hidden" value="<?php echo $row['idg'];?>" class="validate" required="" aria-required="true">
                <input name="idu" id="icon_prefix" type="hidden" value="<?php echo $idu?>" class="validate" required="" aria-required="true">               
                 
                
                <div class="row">
                    <div id="c" class="col s6">
                        <span class="ico"><img Style="height:40px;width: 40px;margin-top: 12px; " src="images/cow.png"></span>
                        <div class="input-field ">
                            <input name="nombre" id="icon_prefix" type="text" class="validate" required="" aria-required="true" readonly="readonly" value="<?php echo $row['nombre'];?>">
                            <label  for="icon_prefix">Nombre</label>
                        </div>
                    </div>
                    <div id="c" class="col s6">
                        <span class="ico"><img Style="height:40px;width: 40px;margin-top: 12px; " src="images/raza.png"></span>
                        <div class="input-field ">
                            <input name="raza" id="icon_prefix" type="text" class="validate" required="" aria-required="true" readonly="readonly" value="<?php echo $row['raza'];?>">
                            <label  for="icon_prefix">Raza</label>
                        </div>
                    </div>                    
                </div>
                <div class="row">                      
                    <div class="input-field col s6">
                        <i class="material-icons prefix" Style="height:40px;width: 40px;margin-top: 10px; ">date_range</i>
                        <input name="parto" type="date" class="datepicker validate" required="" aria-required="true" value="<?php echo $fecha_parto;?>">
                        <label  for="icon_prefix">Fecha de Parto</label>
                    </div>                                                                                                              
                    <div id="c" class="col s6" >
                        <span class="ico" ><img Style="height:40px;width: 40px;margin-top: 10px; " src="images/desecho.png"></span>
                        <div class="input-field " class="validate" required="" aria-required="true">
                            <select name="genero">
                            <option value="<?php echo $row['cria'];?>"><?php echo $row['cria'];?></option>
                            <?php if($row['cria']=='Hembra'){
                                echo '<option value="Macho">Macho</option>';
                            }elseif($row['cria']=='Macho'){
                                echo '<option value="Hembra">Hembra</option>';
                            }else{
                                echo '<option value="Macho">Macho</option>';
                                echo '<option value="Hembra">Hembra</option>';
                            }?>                            
                            </select>
                            <label>¿Genero de la Cria?</label>
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
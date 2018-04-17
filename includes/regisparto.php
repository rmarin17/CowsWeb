<?php
if(isset($_POST['submit']))
{    
include_once 'conexion.php';
$nombre=$_POST['nombre'];
$idg = mysqli_real_escape_string($conn,$_POST['id']);

$idu = mysqli_real_escape_string($conn,$_POST['idu']);
$parto = mysqli_real_escape_string($conn,$_POST['parto']);
$genero = mysqli_real_escape_string($conn,$_POST['genero']);	

$date=str_replace(',',' ', $parto);
$fechaparto=date('Y-m-d', strtotime($date));

    $sql="INSERT INTO partos (idu, idg, fecha_parto, cria) 
                        VALUES('$idu', '$idg', '$fechaparto','$genero')";               
    $comprobar = mysqli_query($conn,$sql);				
    if($comprobar){    
        print '<script language="JavaScript">'; 
        print 'alert("PARTO REGISTRADO CORRECTAMENTE");'; 
        print "window.history.go(-2);";
        print '</script>'; 
        // header("location: ../listcows.php?idu=$idu");
        }else{
            print '<script language="JavaScript">'; 
            print 'alert("NO SE PUEDO COMPLETAR EL REGISTRO");'; 
            print "window.history.go(-2);";
            print '</script>'; 
        } 
}                  
?>
<?php
if(isset($_POST['submit']))
{    
include_once 'conexion.php';
$nombre=$_POST['nombre'];
$idg = mysqli_real_escape_string($conn,$_POST['id']);

$vacuna = mysqli_real_escape_string($conn,$_POST['vacuna']);
$tipo = mysqli_real_escape_string($conn,$_POST['tipo']);	

$date=str_replace(',',' ', $vacuna);
$fechavacu=date('Y-m-d', strtotime($date));

    $sql="INSERT INTO vacunas (idg, fecha, tipo) 
                        VALUES('$idg', '$fechavacu','$tipo')";               
    $comprobar = mysqli_query($conn,$sql);				
    if($comprobar){    
        print '<script language="JavaScript">'; 
        print 'alert("VACUNA REGISTRADA CORRECTAMENTE");'; 
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
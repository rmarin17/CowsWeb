<?php
if(isset($_POST['submit']))
{    
include_once 'conexion.php';
$idg = $_POST['idg'];
$idv = $_POST['idv'];
$idu = $_POST['idu'];
$vacuna = $_POST['vacuna'];
$tipo = $_POST['tipo'];

$date=str_replace(',',' ', $vacuna);
$fecha_vacu=date('Y-m-d', strtotime($date));

    $sql="UPDATE vacunas SET idg='$idg', fecha='$fecha_vacu', tipo='$tipo'  WHERE idv='$idv'";                                   
    $comprobar = mysqli_query($conn,$sql);				
    if($comprobar){    
        print '<script language="JavaScript">'; 
        print 'alert("VACUNA ACTUALIZADA CORRECTAMENTE");'; 
        print "window.history.go(-2);";
        print '</script>'; 
        // header("location: ../listcows.php?idu=$idu");
        }else{
            print '<script language="JavaScript">'; 
            print 'alert("NO SE PUEDO COMPLETAR LA ACCIÓN");'; 
            print "window.history.go(-2);";
            print '</script>'; 
        } 
}                  
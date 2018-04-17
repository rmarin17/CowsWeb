<?php
if(isset($_POST['submit']))
{    
include_once 'conexion.php';
$idg = mysqli_real_escape_string($conn,$_POST['id']);

$idu = mysqli_real_escape_string($conn,$_POST['idu']);
$servicio = mysqli_real_escape_string($conn,$_POST['servicio']);
$toro = mysqli_real_escape_string($conn,$_POST['toro']);
$toro = ucwords($toro);
$tipo = mysqli_real_escape_string($conn,$_POST['tipo']);	

$date=str_replace(',',' ', $servicio);
$celo=date('Y-m-d', strtotime($date));
$proxcelo=date('Y-m-d', strtotime($date. ' + 21 days'));

$parto=date('Y-m-d', strtotime($date. ' + 283 days'));


    $sql="INSERT INTO celos (idu, idg,  fecha_s, fecha_prox, toro, tipo, fecha_psp) 
                        VALUES('$idu', '$idg', '$celo', '$proxcelo', '$toro','$tipo','$parto')";               
    $comprobar = mysqli_query($conn,$sql);				
    if($comprobar){    
        print '<script language="JavaScript">'; 
        print 'alert("CELO REGISTRADO CORRECTAMENTE");'; 
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
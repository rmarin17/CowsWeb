<?php
if(isset($_POST['submit']))
{    
include_once 'conexion.php';
$idg = $_POST['idg'];
$idc = $_POST['idc'];
$idu = $_POST['idu'];
$servicio = $_POST['servicio'];
$toro = $_POST['toro'];
$toro = ucwords($toro);
$tipo = $_POST['tipo'];	

$date=str_replace(',',' ', $servicio);
$celo=date('Y-m-d', strtotime($date));
$proxcelo=date('Y-m-d', strtotime($date. ' + 21 days'));

$parto=date('Y-m-d', strtotime($date. ' + 283 days'));                       

    $sql="UPDATE celos SET idu='$idu', idg='$idg', fecha_s='$celo', fecha_prox='$proxcelo', toro='$toro',
                        tipo='$tipo', fecha_psp='$parto'  WHERE idc='$idc'";                                   
    $comprobar = mysqli_query($conn,$sql);				
    if($comprobar){    
        print '<script language="JavaScript">'; 
        print 'alert("CELO ACTUALIZADO CORRECTAMENTE");'; 
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
?>
<?php
if(isset($_POST['submit']))
{    
include_once 'conexion.php';
$idg = $_POST['idg'];
$idp = $_POST['idp'];
$idu = $_POST['idu'];
$parto = $_POST['parto'];
$genero = $_POST['genero'];

$date=str_replace(',',' ', $parto);
$fecha_parto=date('Y-m-d', strtotime($date));

    $sql="UPDATE partos SET idu='$idu', idg='$idg', fecha_parto='$fecha_parto', cria='$genero'  WHERE idp='$idp'";                                   
    $comprobar = mysqli_query($conn,$sql);				
    if($comprobar){    
        print '<script language="JavaScript">'; 
        print 'alert("PARTO ACTUALIZADO CORRECTAMENTE");'; 
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
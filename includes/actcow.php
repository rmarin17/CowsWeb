<?php

if(isset($_POST['submit']))
{
    include_once 'conexion.php';
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="../uploads/";
    $nombre=$_POST['nombre'];
    $idg = $_POST['id'];
    $idu = $_POST['idu'];
	$raza = $_POST['raza'];
	$nacimiento = $_POST['nacimiento'];
	$padre = $_POST['padre'];
	$madre = $_POST['madre'];
	$abuelo = $_POST['abuelo'];
	$abuela = $_POST['abuela'];
	$identi = $_POST['identi'];
    $propietario = $_POST['propietario'];
    $desecho = $_POST['desecho'];
    $imagen = $_POST['nombre'];
    $partos = $_POST['partos'];
	
    // new file size in KB
    $new_size = $file_size/1024;  
    // new file size in KB
    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case
    $final_file=str_replace(' ','-',$imagen);
    $date=str_replace(',',' ', $nacimiento);
    $final_date=date('Y-m-d', strtotime($date));

    if ($_FILES['file']['size'] > 0 )
    {
        // cover_image is empty (and not an error)
        if(move_uploaded_file($file_loc,$folder.$final_file))
        {
        $sql="UPDATE ganado SET idu='$idu', nombre='$nombre', raza='$raza', nacimiento='$final_date', padre='$padre', madre='$madre', abuelo='$abuelo',
                                abuela='$abuela', numero_ica='$identi', propietario='$propietario', descarte='$desecho', imagen='uploads/$imagen', partos='$partos' WHERE idg='$idg'";                 
                                $comprobar = mysqli_query($conn,$sql);				
                                    if($comprobar){
                                            print '<script language="JavaScript">'; 
                                            print 'alert("VACA ACTUALIZADA CORRECTAMENTE con imagen");'; 
                                            print "window.history.go(-2);";
                                            print '</script>'; 
                                        }else{
                                            print '<script language="JavaScript">'; 
                                            print 'alert("NO SE PUEDO COMPLETAR EL REGISTRO");'; 
                                            print "window.history.go(-2);";
                                            print '</script>'; 
                                        }                                        
        }else{
                print '<script language="JavaScript">'; 
                print 'alert("ERROR SUBIENDO EL ARCHIVO");'; 
                print "window.history.go(-1);";
                print '</script>'; 
            }
    } 
    else {
         $sql="UPDATE ganado SET idu='$idu', nombre='$nombre', raza='$raza', nacimiento='$final_date', padre='$padre', madre='$madre', 
                abuelo='$abuelo', abuela='$abuela', numero_ica='$identi', propietario='$propietario', descarte='$desecho', partos='$partos' WHERE idg='$idg'";               
         $comprobar = mysqli_query($conn,$sql);				
         if($comprobar){
                print '<script language="JavaScript">'; 
                print 'alert("VACA ACTUALIZADA CORRECTAMENTE");'; 
                print "window.history.go(-2);";
                print '</script>'; 
            // header("location: ../listcows.php?idu=$idu");
             }else{
                print '<script language="JavaScript">'; 
                print 'alert("NO SE PUEDO COMPLETAR EL REGISTRO");'; 
                print "window.history.go(-1);";
                print '</script>'; 
             }           
    }    
}
?>

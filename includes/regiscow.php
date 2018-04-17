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
$nombre = ucwords($nombre);
$idu = mysqli_real_escape_string($conn,$_POST['idu']);
$raza = mysqli_real_escape_string($conn,$_POST['raza']);
$raza = ucwords($raza);
$nacimiento = mysqli_real_escape_string($conn,$_POST['nacimiento']);
$padre = mysqli_real_escape_string($conn,$_POST['padre']);
$padre = ucwords($padre);
$madre = mysqli_real_escape_string($conn,$_POST['madre']);
$madre = ucwords($madre);
$abuelo = mysqli_real_escape_string($conn,$_POST['abuelo']);
$abuelo = ucwords($abuelo);
$abuela = mysqli_real_escape_string($conn,$_POST['abuela']);
$abuela = ucwords($abuela);
$identi = mysqli_real_escape_string($conn,$_POST['identi']);
$propietario = mysqli_real_escape_string($conn,$_POST['propietario']);
$propietario = ucwords($propietario);
$desecho = mysqli_real_escape_string($conn,$_POST['desecho']);
$imagen = mysqli_real_escape_string($conn,$_POST['nombre']);
$partos = mysqli_real_escape_string($conn,$_POST['partos']);
	
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
            if(move_uploaded_file($file_loc,$folder.$final_file))
            {
            $sql="INSERT INTO ganado (idu, nombre, raza, nacimiento, padre , madre, abuelo, abuela, numero_ica, propietario, descarte, imagen, partos) 
                              VALUES('$idu', '$nombre','$raza', '$final_date', '$padre','$madre','$abuelo','$abuela','$identi','$propietario','$desecho',
                                          'uploads/$imagen', '$partos')";
                                          $comprobar = mysqli_query($conn,$sql);				
                                          if($comprobar){
                                                print '<script language="JavaScript">'; 
                                                print 'alert("VACA REGISTRADA CORRECTAMENTE");'; 
                                                print "window.history.go(-1);";
                                                print '</script>'; 
                                          }else{
                                                print '<script language="JavaScript">'; 
                                                print 'alert("NO SE PUEDO COMPLETAR EL REGISTRO");'; 
                                                print "window.history.go(-1);";
                                                print '</script>'; 
                                          }                                          
            }
            else
            {
                  print '<script language="JavaScript">'; 
                  print 'alert("ERROR SUBIENDO EL ARCHIVO");'; 
                  print "window.history.go(-1);";
                  print '</script>'; 
            }
      } 
      else {
           $sql="INSERT INTO ganado (idu, nombre, raza, nacimiento, padre , madre, abuelo, abuela, numero_ica, propietario, descarte, partos) 
                              VALUES('$idu', '$nombre','$raza', '$final_date', '$padre','$madre','$abuelo','$abuela','$identi','$propietario','$desecho', '$partos')";               
           $comprobar = mysqli_query($conn,$sql);				
           if($comprobar){
              print '<script language="JavaScript">'; 
              print 'alert("VACA REGISTRADA CORRECTAMENTE");'; 
              print "window.history.go(-1);";
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
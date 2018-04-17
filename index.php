<?php 
//Reanudamos la sesión 
session_start();
//Validamos si existe realmente una sesión activa o no 
$idu = $_SESSION['u_id'];
if(!$_SESSION)
{ 
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
  header("Location: index.html"); 
  exit(); 
} 
else{
  header("Location: principal.php?&idu=$idu"); 
}
?>
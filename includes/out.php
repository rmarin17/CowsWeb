<?php 
session_start();
if ($_SESSION["u_id"]) 
  {
   session_destroy();
   header("Location: ../index.html"); 
   exit();
  }

  ?>
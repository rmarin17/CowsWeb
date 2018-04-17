<?php 
	
	include 'conexion.php';
	$tabla=$_GET['tabla'];
	$idu=$_GET['idu'];
	$sql = "DELETE from $tabla WHERE idu='$idu'";
	$res =mysqli_query($conn,$sql);
	
?>

<html>
	<head>
		<title>Eliminar Ganado</title>
	</head>	
	<body>
		<center>
			<?php 
				if($res>0){			
                    print '<script language="JavaScript">'; 
                    print 'alert("REGISTROS ELIMINADOS CORRECTAMENTE");'; 
					print "window.history.go(-1);";
                    print '</script>'; 				
				?>								
				<?php }else{?>				
				<h1>Error al Eliminar </h1>				
			<?php }?>
			<p></p>	
		</center>
	</body>
</html>
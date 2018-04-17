<?php 
	include 'conexion.php';
	$idg=$_GET['id'];
	$sql2="SELECT idu FROM ganado WHERE id=$id";
	$res2 = mysqli_query($conn,$sql2);
	$fila = mysqli_fetch_assoc($res2);
	$idu=$fila['idu'];
	$sql = "DELETE from ganado WHERE idg='$idg'";
	$res =mysqli_query($conn,$sql);
?>

<html>
	<head>
		<title>Eliminar Ponente</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($res>0){				
				print '<script language="JavaScript">'; 
                print 'alert("VACA ELIMINADA CORRECTAMENTE");'; 
                print "window.history.go(-1);";
				print '</script>'; 				
				?>
								
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Ponente</h1>
				
			<?php	} ?>
			<p></p>	
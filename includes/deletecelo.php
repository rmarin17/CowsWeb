<?php 
	include 'conexion.php';
	$idc=$_GET['idc'];
	$sql = "DELETE from celos WHERE idc='$idc'";
    $res =mysqli_query($conn,$sql);
    print $res;
?>

<html>
	<head>
		<title>Eliminar Celos</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($res>0){				
				print '<script language="JavaScript">'; 
                print 'alert("REGISTRO ELIMINADO CORRECTAMENTE");'; 
                print "window.history.go(-1);";
				print '</script>'; 				
				?>
								
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar CELO</h1>
				
			<?php	} ?>
			<p></p>	
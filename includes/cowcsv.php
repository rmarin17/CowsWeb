<?php  
if(isset($_POST['submit']))
	{
	//connect to the database 
	include_once 'conexion.php';
	$idu = $_GET['idu'];
	// 
	if (!empty($_FILES['csv']['size']) && $_FILES['csv']['size'] > 0) { 
		//get the csv file 
		$file = $_FILES['csv']['tmp_name']; 
		$handle = fopen($file,"r"); 
		//loop through the csv file and insert into database 
		$i=0;
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				$i++;
				if($i==1) continue;
				if ($data[0]) { 
						$sql1 ="SELECT * FROM ganado WHERE numero_ica='".addslashes($data[7])."'";
						$result = mysqli_query($conn,$sql1);
						$fila = mysqli_fetch_assoc($result);
						$id = $fila['idg'];
						
						if(mysqli_num_rows($result) == 0){
							$date=str_replace('/','-', addslashes($data[2]));
							$final_date = date('Y-m-d', strtotime($date));
							$sql="INSERT INTO ganado (idu, nombre, raza, nacimiento, padre, madre, abuelo, abuela, numero_ica, propietario, descarte, partos)
							VALUES ( 
									'$idu', 
									'".addslashes($data[0])."', 
									'".addslashes($data[1])."', 
									'$final_date',
									'".addslashes($data[3])."',
									'".addslashes($data[4])."',
									'".addslashes($data[5])."',
									'".addslashes($data[6])."',
									'".addslashes($data[7])."',
									'".addslashes($data[8])."',
									'".addslashes($data[9])."',
									'".addslashes($data[10])."'
									)";
									$res = mysqli_query($conn,$sql);
									
									if($res){	
											print $final_date;
											print addslashes($data[2]);
											print '<script language="JavaScript">'; 
											print 'alert("Registro Completado");'; 
											print "window.location.href='../addcow.php?idu=$idu';";
											print '</script>'; 
											//header("location: ../addcow.php?idu='$idu'");
										}else{
											echo $res;
											print '<script language="JavaScript">'; 
											print 'alert("No se pudo completar el registro, vuelve a intentarlo");'; 
											print "window.location.href='../addcow.php?idu=$idu';";
											print '</script>'; 
										}
							}else{
								$date=str_replace('/','-', addslashes($data[2]));
								$final_date = date('Y-m-d', strtotime($date));
								$sql2="UPDATE ganado SET idu='$idu', nombre='".addslashes($data[0])."', raza='".addslashes($data[1])."', 
									nacimiento='$final_date', padre='".addslashes($data[3])."', madre='".addslashes($data[4])."', 
									abuelo='".addslashes($data[5])."', abuela='".addslashes($data[6])."', numero_ica='".addslashes($data[7])."', 
									propietario='".addslashes($data[8])."', descarte='".addslashes($data[9])."', partos='".addslashes($data[10])."' WHERE id='$id'";
	
								$comprobar = mysqli_query($conn,$sql2);				
								if($comprobar){
									print $final_date;
									print addslashes($data[2]);
									print '<script language="JavaScript">'; 
									print 'alert("Registro Completado");'; 
									print "window.location.href='../addcow.php?idu=$idu';";
									print '</script>'; 
									// header("location: ../listcows.php?idu=$idu");
									}else{
										echo $comprobar;
										echo "No se pudo completar la acción, por favor vuelva a intertarlo";
									}
									
							}
					} 
			}	

		
	} else{
				print '<script language="JavaScript">'; 
				print 'alert("CSV vacio");'; 
				print "window.location.href='../addcow.php?idu=$idu';";
				print '</script>'; 
			exit();
		}

}
?>
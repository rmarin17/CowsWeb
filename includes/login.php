<?php
session_start();
if(isset($_POST['submit'])){
	
	include 'conexion.php';
	$uid =mysqli_real_escape_string($conn,$_POST['uid']);
	
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
	//ERROR HANDLERS
	//CHECH IF INPUTS ARE EMPTY
	if(empty($uid)||empty($pwd)){
		header("Location: ../login.php?login=empty");
		echo $alert;
		exit();
		
	}else{
		$sql ="SELECT * FROM usuarios WHERE correo='$uid' OR ulogin='$uid'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck<1){
			header("Location: ../login.php?login=user");
			exit();
			
		}else{
			if($row= mysqli_fetch_assoc($result)){
				//De-hashing the password
				
				$hashedPwdCheck = password_verify($pwd, $row['pass']);
				if($hashedPwdCheck == false){
					header("Location: ../login.php?login=pass");
					exit();
					
				}elseif($hashedPwdCheck == true){
					//Log in the user here
					$_SESSION['u_id'] = $row['uid'];
					$_SESSION['u_pago'] = $row['pago'];
					$idu = $row['uid'];
					header("Location: ../principal.php?&idu=$idu");
					/*if($row['user_type']=="Administrador"){
						header("Location: ../inicio.php?ide=$ide&ida=$ida");
					}
					elseif($row['user_type']=="Sadministrador"){
						header("Location: ../administrativos.php?ide=$ide&ida=$ida");
					}
					elseif($row['user_type']=="Asistente"){
						header("Location: ../asistentes.php?ide=$ide&ida=$ida");
					}
					elseif($row['user_type']=="Ponente"){
						header("Location: ../asistentes.php?ide=$ide&ida=$ida");
					}
					elseif($row['user_type']=="Pren"){
						header("Location: ../asistentes.php?ide=$ide&ida=$ida");
					}
					elseif($row['user_type']=="Empresario"){
						header("Location: ../asistentes.php?ide=$ide&ida=$ida");
					}*/
					
					exit();
								
				}
				
			}
						
		}
		
	}
	
	
}else {
	
	header("Location: ../index.php?login=error");
	exit();
}
?>
</html>
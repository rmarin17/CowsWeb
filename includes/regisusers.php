<?php
if(isset($_POST['submit']))
{
	include_once 'conexion.php';
	$first = mysqli_real_escape_string($conn,$_POST['first']);
	$last = mysqli_real_escape_string($conn,$_POST['last']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$telephone = mysqli_real_escape_string($conn,$_POST['telephone']);
	$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
	//Error handler
	//Check for empty fields 
	if(empty($first)||empty($last) ||empty($email)||empty($telephone)||empty($uid))
	{
		header("location: ../registro.php?signup=empty");
	exit();
	}else 
	{
		//Check if input characters are valid
		if(!preg_match("/^[a-zA-Z]*$/", $first)|| !preg_match("/^[a-zA-Z]*$/", $last)){
			header("location: ../registro.php?signup=invalid");
	exit();
		}else
		   {
			//check if email is valid
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				header("location: ../registro.php?signup=email");
	exit();
			}else{
				$sql="SELECT * FROM usuarios WHERE ulogin='$uid'";
				$result = mysqli_query($conn,$sql);
				$resultCheck= mysqli_num_rows($result);
				
				if($resultCheck > 0)
				{
					header("location: ../registro.php?signup=usertaken");
				exit();
				}else{
					//Hashing the password
					$hasedPWD = password_hash($pwd,PASSWORD_DEFAULT);
					//Insert the user into the data base
					$sql="INSERT INTO usuarios (nombres, apellidos, correo, pass, pago, ulogin, telefono) VALUES('$first', '$last', '$email','$hasedPWD', '1', '$uid', '$telephone')";
					$comprobar = mysqli_query($conn,$sql);

					if($comprobar){
						echo "Registo Completado!";
						header("location: ../index.php");
					}else{
						echo "No se pudo completar el registro por favor vuelva a intertarlo";
					}
					exit();
				}
				
			}
		}
	}
	
}else{
	header("location: ../signup.php");
	exit();
}
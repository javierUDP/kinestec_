<?php
	session_start();
	include("../login/check.php");

	if(isset($_POST['add'])){

		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$tipo= $_POST['tipo'];
		$rut = $_POST['rut'];
		$password = $_POST['password'];
		$confirm_password= $_POST['confirm_password'];



		if(isset($_SESSION["user"]))
		{


				$sql2 = $db->prepare("SELECT * FROM utenti WHERE rut=?");
				$sql2->bindParam(1, $_POST["rut"]);
				$sql2->execute();
				$exists=$sql2->rowCount();
				if ($exists) {$error="Este Rut ya existe";
					$_SESSION['errorsito']=$error;
					header('location: personal.php?');
					exit();
				}

			if ($_POST["password"]!=$_POST["confirm_password"]) {$error="Contraseñas no coinciden";

				$_SESSION['errorsito']=$error;
				header('location: personal.php');
				exit();
			}
			if (strlen($_POST["password"])<8) {$error="Contraseña incorrecta (mínimo 8 carácteres)";
				$_SESSION['errorsito']=$error;
				header('location: personal.php');
				exit();
			}





			$hash = password_hash($_POST['password'].PEPPER, PASSWORD_DEFAULT, ['cost' => 12]);
		     //echo '<h3>Login Exitoso, Bienvenido - '.$_SESSION["usuario"].'</h3>';
		     //echo '<br /><br /><a href="CerrarSesion.php"><div class="btn btn-danger">Cerrar Sesion</div></a>';
		     $sql = "INSERT INTO utenti (nombre, apellido, email, telefono, tipo, rut, password) VALUES (?,?,?,?,?,?,?)";



		     $req = $db->prepare($sql);
		     $req->bindParam(1, $nombre);
				 $req->bindParam(2, $apellido);
				 $req->bindParam(3, $email);
				 $req->bindParam(4, $telefono);
				 $req->bindParam(5, $tipo);
				 $req->bindParam(6, $rut);
				 $req->bindParam(7, $hash);
		     //$req->execute();
		}
		else
		{
		     header("location:../login/login.php");
		}






		if($req->execute()){
			$_SESSION['success'] = 'Datos almacenados correctamente';
		}

		else{
			$_SESSION['error'] = 'Algo salió mal al agregar el registro';
		}
	}
	else{
		$_SESSION['error'] = 'Rellena el formulario de agregar primero';
	}

	header('location: personal.php');
?>

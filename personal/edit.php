<?php
	session_start();
	include("../login/check.php");

	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$fecha_nacimiento = $_POST['fecha_nacimiento'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];




		if(isset($_SESSION["user"]))
		{
				 //echo '<h3>Login Exitoso, Bienvenido - '.$_SESSION["usuario"].'</h3>';
				 //echo '<br /><br /><a href="CerrarSesion.php"><div class="btn btn-danger">Cerrar Sesion</div></a>';
				 $sql = "UPDATE clientes SET nombre = ?, apellido = ?, fecha_nacimiento = ?, email = ?, telefono = ? WHERE id = ?";



				 $req = $db->prepare($sql);
				 $req->bindParam(1, $nombre);
				 $req->bindParam(2, $apellido);
				 $req->bindParam(3, $fecha_nacimiento);
				 $req->bindParam(4, $email);
				 $req->bindParam(5, $telefono);
				 $req->bindParam(6, $id);
				 //$req->execute();


		}
		else
		{
				 header("location:../login/login.php");
		}



		//use for MySQLi OOP
		if($req->execute()){
			$_SESSION['success'] = 'Registro actualizado correctamente.';
		}


		else{
			$_SESSION['error'] = 'Algo salió mal al actualizar miembro.';
		}
	}
	else{
		$_SESSION['error'] = 'Selecciona un miembro para editarlo.';
	}

	header('location: clientes.php');

?>

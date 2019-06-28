<?php
	session_start();
	include("../login/check.php");

	if(isset($_POST['add'])){
		$nombre = $_POST['nombre'];


		if(isset($_SESSION["user"]))
		{
		     //echo '<h3>Login Exitoso, Bienvenido - '.$_SESSION["usuario"].'</h3>';
		     //echo '<br /><br /><a href="CerrarSesion.php"><div class="btn btn-danger">Cerrar Sesion</div></a>';
		     $sql = "INSERT INTO maquinas (nombre) VALUES (?)";



		     $req = $db->prepare($sql);
		     $req->bindParam(1, $nombre);
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

	header('location: maquinas.php');
?>

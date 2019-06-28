<?php
	session_start();
	include("../login/check.php");




	if(isset($_GET['id'])){


		if(isset($_SESSION["user"]))
		{
				 //echo '<h3>Login Exitoso, Bienvenido - '.$_SESSION["usuario"].'</h3>';
				 //echo '<br /><br /><a href="CerrarSesion.php"><div class="btn btn-danger">Cerrar Sesion</div></a>';
				 $sql = "DELETE FROM utenti WHERE id = ?";



				 $req = $db->prepare($sql);
				 $req->bindParam(1, $_GET['id']);
				 //$req->execute();


		}
		else
		{
				 header("location:../login/login.php");
		}

		if($req->execute()){
			$_SESSION['success'] = 'Miembro eliminado con éxito.';
		}

		else{
			$_SESSION['error'] = 'Algo salió mal al eliminar miembro.';
		}
	}
	else{
		$_SESSION['error'] = 'Seleccionar miembro para eliminar primero.';
	}

	header('location: personal.php');
?>

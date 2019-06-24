<?php
	session_start();
	include("../login/check.php");

	if(isset($_POST['edit'])){
		$id=$_POST['id'];
	  $peso = $_POST['peso'];
		$tamano = $_POST['tamano'];
		$observacion = $_POST['observacion'];





		if(isset($_SESSION["user"]))
		{
				 //echo '<h3>Login Exitoso, Bienvenido - '.$_SESSION["usuario"].'</h3>';
				 //echo '<br /><br /><a href="CerrarSesion.php"><div class="btn btn-danger">Cerrar Sesion</div></a>';
				 $sql = "UPDATE clientes SET peso = ?, tamano = ?, observacion = ? WHERE id = ?";



				 $req = $db->prepare($sql);
				 $req->bindParam(1, $peso);
				 $req->bindParam(2, $tamano);
				 $req->bindParam(3, $observacion);
				 $req->bindParam(4, $id);
				 //$req->execute();


		}
		else
		{
				 header("location:../login/login.php");
		}




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

<?php
session_start();
include("check.php");

if (isset($_SESSION['user'])) {
die("You are already Logged in. Enjoy contents <a href=../index.php>here</a>");
}

//if form sent
if (isset($_POST["register"])) {
$_POST["email"]=trim($_POST["email"]);

do {
if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)===false or !preg_match('/@.+\./', $_POST["email"])) {$error="Correo invalido";break;}
if ($_POST["password"]!=$_POST["confirm_password"]) {$error="Password mismatch";break;}
if (strlen($_POST["password"])<8) {$error="Password incorrecta (mínimo 8 carácteres)";break;}

$sql = $db->prepare("SELECT * FROM utenti WHERE email=?");
$sql->bindParam(1, $_POST["email"]);
$sql->execute();
$exists=$sql->rowCount();

if ($exists) {$error="Este email ya existe";break;}

$hash = password_hash($_POST['password'].PEPPER, PASSWORD_DEFAULT, ['cost' => 12]);

try {
$sql = $db->prepare("INSERT INTO utenti (email,password) VALUES (? ,?)");
$sql->bindParam(1, $_POST["email"]);
$sql->bindParam(2, $hash);
$sql->execute();
} catch (PDOException $e) {
$error="Error during ". $e;break;
}

$registered=1;

} while(0);

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registración</title>
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <link href=../css/style.css  rel='stylesheet' type='text/css'>
	</head>
<body>

	<div class="header">
		<a href="/">Kinestec<br><small>Registrar usuario</small></a>
	</div>


		<br>


	<h1>Registrar</h1>
	<span>o <a href="login.php">Ingresar aquí</a></span>
    <br><p style=color:#C00><b><?= $error ?></b></p>
	<?php

	if(!$registered) { ?>
	<form action="register.php" method="POST">
		<input type="email" required placeholder="Ingresar email" name="email" value=<?=$_POST["email"];?>>
		<input type="password" required placeholder="Contraseña" name="password" pattern=".{8,}" minlength="8">
		<input type="password" required placeholder="Confirmar contraseña" name="confirm_password">
		<input type="submit" name=register>
	</form>
	<?
	} else {
	?>
	<br><br><p>Cuenta registrada! ingresar a <a href=login.php>Ingresar</a>.
	<?
	}
	?>
</body>
</html>
<?
echo "<br><br><br><span style=font-family:courier;color:#AAA>## $debug</span>";

?>
<script>
var password = document.getElementsByName("password")[0]
  , confirm_password = document.getElementsByName("confirm_password")[0];

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Contraseñas no coinciden");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

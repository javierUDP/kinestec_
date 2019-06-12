<?php
session_start();
//checkear las cookies
include("check.php");

if (isset($_SESSION['user'])) {
header("location:../index.php");
$message="Tu cuenta ya está ingresada.<a href=../index.php>here</a> ";
}

if (isset($_POST["login"])) {
$_POST["email"]=trim($_POST["email"]);
do {

if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)===false or !preg_match('/@.+\./', $_POST["email"])) {$message="Invalid Email";break;}
//evitar brutal force attack
$sql = $db->prepare("SELECT data FROM log_accessi WHERE ip='".$_SERVER['REMOTE_ADDR']."' and accesso=0 and data>date_sub(now(), interval 10 minute) ORDER BY data DESC");
$sql->execute();
$attempts=$sql->rowCount();
$last=$sql->fetchColumn();

$last=strtotime($last);
$delay=min(max(($attempts-3),0)*2,30);


if (time()<($last+$delay)) {$message="muchos intentos, espera $delay segundos antes de intentar nuevamente";break;}
$sql = $db->prepare("SELECT * FROM utenti WHERE email=?");
$sql->bindParam(1, $_POST["email"]);
$sql->execute();
$rows = $sql->fetch(PDO::FETCH_ASSOC);
$checked = password_verify($_POST['password'].PEPPER, $rows["password"]);
if ($checked) { //if email/pw are right:
    $message='Contraseña correcta <br>entra <a href=../index.php>aquí</a>';
	$_SESSION['user'] = $rows["id"];
  $_SESSION['email'] = $rows["email"];
	if ($_POST["remember"]=="true") {

	 $selector = aZ();
	 $authenticator = bin2hex(random_ver(33));
	   $res=$db->prepare("INSERT INTO auth_tokens (selector,hashedvalidator,userid,expires,ip) VALUES (?,?,?,FROM_UNIXTIME(".(time() + 864000*7)."),?)");
	   $res->execute(array($selector,password_hash($authenticator, PASSWORD_DEFAULT, ['cost' => 12]),$rows['id'],$_SERVER['REMOTE_ADDR']));
//set the cookie
setcookie(
        'remember',
         $selector.':'.base64_encode($authenticator),
         (time() + 864000*7),
         '/',
         WEBSITE,
         false, // solo si hay https, cambiar a true
         false  // http-only
    );
}
header("location:../index.php");
//if email/pw are wrong
} else {
    $message=($attempts>1)?"Credenciales incorrectas ($attempts attempts)":"Credenciales incorrectas, reintente";
}
//save the access log
$sql = $db->prepare("INSERT INTO log_accessi (ip,mail_immessa,accesso) VALUES (? ,? ,?)");
$sql->bindParam(1, $_SERVER['REMOTE_ADDR']);
$sql->bindParam(2, $_POST["email"]);
$sql->bindParam(3, $checked);
$sql->execute();
}while(0);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema de gestión kinestec">
  <meta name="author" content="udp">

  <title>Kinestec Login</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                  </div>
                  <form action="login.php" method="POST">
                    <div class="form-group">
                      <input type="email" required class="form-control form-control-user" name="email" placeholder="usuario">
                    </div>
                    <div class="form-group">
                      <input type="password" required class="form-control form-control-user" name="password" placeholder="Contraseña">
                    </div>
                  <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember value=true">
                        <label class="custom-control-label" for="customCheck">Recuerdame</label>
                      </div>
                    </div>
                      <!--<a href="../index.php" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>-->
                    <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="Iniciar Sesion" />
                    <!--<button id ="button" name="login" type="button" value="Iniciar Sesion" class="btn btn-primary">Iniciar Sesión</button>-->
                    <!--<a href="../index.php" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="../index.php" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>-->
                  </form>
                  <!--<hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>-->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>

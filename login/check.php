<?
define ("PEPPER",'s4l7S4!t');
define ("WEBSITE",'kinestec.ddns.net');
define ("SCRIPTFOLDER",'/login');
$hosting="localhost";
$database="kinestec_kinestec";
$database_user="kinestec_admin";
$database_password="testito123testito123";

require_once('pdo_db.php');
function aZ ($n=12) {
$chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$bytes = random_ver($n);
$result="";
foreach (str_split($bytes) as $byte) $result .= $chars[ord($byte) % strlen($chars)];
return $result;
}
function random_ver ($n=10) {
$v=(int)phpversion()+0;
if ($v<7) {
return openssl_random_pseudo_bytes($n);
}else{
return random_bytes($n);
}
}
//logout
if ($_GET["logout"]==1 && isset($_SESSION["user"])) {
 $del=$db->prepare("DELETE FROM auth_tokens WHERE userid = ".$_SESSION["user"]);
 $del->execute();
 setcookie("remember", "", 111, '/',WEBSITE);
 session_unset();
 session_destroy();
 unset($_COOKIE["remember"]);
 $debug.="<br>cookie borrada, ya no hay sesión<br>";
}


$expireAfter = 15;
if(isset($_SESSION['last_action'])){
    $secondsInactive = time() - $_SESSION['last_action'];
    $expireAfterSeconds = $expireAfter * 60;
	$debug.="last action: $secondsInactive seconds ago<br>";
    if($secondsInactive >= $expireAfterSeconds){
        session_unset();
        session_destroy();
		$debug.="Sesión cerrada por inactividad<br>";
    }
}
$_SESSION['last_action'] = time();
//check with cookie
if (empty($_SESSION['user']) && !empty($_COOKIE['remember']) && $_GET["logout"]!=1) {
$debug.="cookie read<br>";
    list($selector, $authenticator) = explode(':', urldecode($_COOKIE['remember']));


$sql = $db->prepare("SELECT * FROM auth_tokens WHERE selector = ? limit 1");
$sql->bindParam(1, $selector);
$sql->execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);
if (empty($authenticator) or empty($selector)) $debug.="cookie invalid format<br>";
if (($sql->rowCount() > 0) && !empty($authenticator) && !empty($selector)) {
$debug.="cookie valid format<br>";

    if (password_verify(base64_decode($authenticator), $row['hashedvalidator']))
 {
        $_SESSION['user'] = $row['userid'];

	 $authenticator = bin2hex(random_ver(33));
	   $res=$db->prepare("UPDATE auth_tokens SET hashedvalidator = ? , expires = FROM_UNIXTIME(".(time() + 864000*7).") , ip = ? WHERE selector = ?");
	   $res->execute(array(password_hash($authenticator, PASSWORD_DEFAULT, ['cost' => 12]),$_SERVER['REMOTE_ADDR'],$selector));
$setc=setcookie(
        'remember',
         $selector.':'.base64_encode($authenticator),
         time() + 864000*7,
         '/',
         WEBSITE,
         false, // cambiarlo por a true cuando https
         false  // http-only
    );

		$debug.="cookie right selector<br>cookie right token<br>set a new token in DB and in cookie<br>session set<br>";
    } else {


	  $res=$db->prepare("DELETE FROM auth_tokens WHERE userid = ".$row["userid"]);
	  $res->execute();

	  $debug.="cookie right selector<br>cookie wrong token (all DB entry for that user are deleted)<br>";
	}
} else {
$debug.="selector not found in DB<br>";
}
} else {
$debug.="skip the cookie check: ";
if (!empty($_SESSION['user'])) $debug.="ya hay sesión<br>";
if (empty($_COOKIE['remember'])) $debug.="no hay cookie<br>";
}

?>

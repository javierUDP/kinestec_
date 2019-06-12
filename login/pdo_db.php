<?php
try{
    $db = new pdo( 'mysql:host='.$hosting.';dbname='.$database,$database_user,$database_password,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //echo(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    //echo(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
	die("Unable to Connect");
}
?>

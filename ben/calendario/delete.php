<?php



if(isset($_POST["id"]))
{
  session_start();
  include("../login/check.php");

 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>

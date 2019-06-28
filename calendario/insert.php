<?php

session_start();
include("../login/check.php");

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events
 (title, start_event, end_event, cliente)
 VALUES (:title, :start_event, :end_event, :quota )
 ";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':quota' => $_POST['quota'],
  )
 );
}


?>

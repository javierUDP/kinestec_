<?php
session_start();
include("../login/check.php");
$data = array();

$query = "SELECT id,cliente,start_event,end_event FROM events ORDER BY id";

$statement = $db->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["cliente"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>

<?php
session_start();
include("../login/check.php");


// Attempt search query execution
try{
    if(isset($_REQUEST["term"])){
        // create prepared statement
        $sql = "SELECT * FROM clientes WHERE email LIKE :term";
        $stmt = $db->prepare($sql);
        $term = $_REQUEST["term"] . '%';
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                echo "<p>" . $row["email"] . "</p>";
            }
        } else{
            echo "<p>No se encontraron coincidencias</p>";
        }
    }
} catch(PDOException $e){
    die("ERROR: no se puede ejecutar $sql. " . $e->getMessage());
}

// Close statement
unset($stmt);

// Close connection
unset($db);
?>

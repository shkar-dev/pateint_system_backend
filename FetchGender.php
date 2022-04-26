<?php

include  ( "Connection.php");

$sql = " Select * from gender ";
$statement = $connection->prepare($sql);
$statement->execute();

$gender = array();
while ($data = $statement->fetch(PDO::FETCH_ASSOC)){
    $gender[]= $data;
}

echo json_encode($gender);

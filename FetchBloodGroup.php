<?php

include  ( "Connection.php");

$sql = " Select * from bloodgroup ";
$statement = $connection->prepare($sql);
$statement->execute();

$bloodgroup = array();
while ($data = $statement->fetch(PDO::FETCH_ASSOC)){
    $bloodgroup[]= $data;
}

echo json_encode($bloodgroup);


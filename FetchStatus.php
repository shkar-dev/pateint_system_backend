<?php

include  ( "Connection.php");

$sql = " Select * from status ";
$statement = $connection->prepare($sql);
$statement->execute();
$status = array();
while ($data = $statement->fetch(PDO::FETCH_ASSOC)){
    $status[]= $data;
}

echo json_encode($status);

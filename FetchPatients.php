<?php

include "Connection.php";

$sql= "SELECT * FROM patients " ;

$stmt = $connection->prepare($sql);
$stmt->execute();
$patients = array();
while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $patients[] = $data;
}

echo json_encode($patients);
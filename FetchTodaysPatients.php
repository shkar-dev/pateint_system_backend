<?php
include("Connection.php");
$date = date("Y-m-d");
$sql = "SELECT * FROM patients where Date_time like '%$date%'" ;
$stmt = $connection->prepare($sql);
$stmt->execute();
$patients = array();
while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $patients [] = $data;
}
echo json_encode($patients);
<?php

include_once "Connection.php";
$request_body =file_get_contents('php://input');
$data=  json_decode($request_body,true);

$sql = "select * from visits inner join patients on patients.Id = visits.Patient_id  and patients.Id = :id";
$query  =$connection->prepare($sql);
$query->bindParam(':id',$data['Id']);
$query->execute();

$data = [];
while($row=$query->fetch(PDO::FETCH_ASSOC)){
    $data[]=$row;
}
print_r($data);


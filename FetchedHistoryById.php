<?php
include "Connection.php";
$request_body =file_get_contents('php://input');
$data =  json_decode($request_body,true);

$sql = "SELECT * FROM patients inner join history on history.Id = patients.History_id  where patients.Id =  :Id ";
$stmt= $connection->prepare($sql);
$stmt->bindParam(":Id",$data['Id']);
$stmt->execute();
$data =$stmt->fetch(PDO::FETCH_ASSOC);

echo  json_encode($data);
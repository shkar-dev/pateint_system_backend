<?php
include "Connection.php";
$request_body =file_get_contents('php://input');
$data =  json_decode($request_body,true);
$sql = "SELECT * from patients where Id = :id ";
$stmt = $connection->prepare($sql);
$stmt->bindParam(':id',$data['Id']);
$stmt->execute();
$info = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($info);
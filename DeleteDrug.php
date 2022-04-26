<?php
include "Connection.php";
$request_body =file_get_contents('php://input');
$data =  json_decode($request_body,true);
$sql = "Delete from drug where Id = :id ";
$stmt = $connection->prepare($sql);
$stmt->bindParam(":id",$data['Id']);
$stmt->execute();
echo true;
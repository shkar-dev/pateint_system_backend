<?php
include ("Connection.php");
$request_body =file_get_contents('php://input');
$data =  json_decode($request_body,true);
$sql =" INSERT INTO drug Values( '', :generic , :trade )";
$stmt = $connection->prepare($sql);
$stmt->bindParam(':generic' , $data['Generic']);
$stmt->bindParam(':trade' , $data['Trade']);
$stmt->execute();
echo  true;

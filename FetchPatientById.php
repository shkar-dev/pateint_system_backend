<?php
include "Connection.php";
$request_body =file_get_contents('php://input');
$data =  json_decode($request_body,true);

$sql = "SELECT * FROM patients inner join history on history.Id = patients.History_id inner join report on report.Id=patients.Report_id and    Patients.Id=:Id";
$stmt= $connection->prepare($sql);
$stmt->bindParam(":Id",$data['Id']);
$stmt->execute();

$data = $stmt->fetch(PDO::FETCH_ASSOC);
$sql = "SELECT * from treatment where Patient_id = :Id";
$stmt = $connection->prepare($sql);
$stmt->bindParam(":Id", $data['Id']);
$stmt->execute();
$data["Treatment"] =$stmt->fetch(PDO::FETCH_ASSOC) ;

$sql = "SELECT * from history where Id = :Id";
$stmt = $connection->prepare($sql);
$stmt->bindParam(":Id", $data["History_id"]);
$stmt->execute();
$data["History_id"] = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * from report where Id = :Id";
$stmt = $connection->prepare($sql);
$stmt->bindParam(":Id", $data["Report_id"]);
$stmt->execute();
$data["Report_id"] = $stmt->fetch(PDO::FETCH_ASSOC);

echo  json_encode($data);
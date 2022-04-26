<?php
include "Connection.php";
$request_body =file_get_contents('php://input');
$data =  json_decode($request_body,true);
$sql = "SELECT * FROM patients where id = :id";
$stmt = $connection->prepare($sql);
$stmt->bindParam(':id', $data['Id']);
$stmt->execute();
$report_id = $stmt->fetch(PDO::FETCH_ASSOC);
if($report_id['Report_id'] != null ){
    $sql="Update report set Description = :description where id = :id";
    $stmt =$connection->prepare($sql);
    $stmt->bindParam(':id', $report_id['Report_id']);
    $stmt->bindParam(':description', $data['Description']);
    $stmt->execute();
    echo true;
}else{
    $sql="Insert into report (id,Description) Values ('', :description)";
    $stmt =$connection->prepare($sql);
    $stmt->bindParam(':description', $data['Description']);
    $stmt->execute();
    echo true;
    $id= $connection->lastInsertId();
    $sql = "Update patients set Report_id = :rid where  Id = :id";
    $stmt= $connection->prepare($sql);
    $stmt->bindParam(":rid" , $id);
    $stmt->bindParam(":id" , $data['Id']);
    $stmt->execute();
    echo true;
}
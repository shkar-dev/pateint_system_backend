<?php
include "Connection.php";
$request_body =file_get_contents('php://input');
$data =  json_decode($request_body,true);

$sql = "SELECT * FROM patients where Id = :id";
$stmt = $connection->prepare($sql);
$stmt->bindParam(':id', $data['Id']);
$stmt->execute();
$history_id = $stmt->fetch(PDO::FETCH_ASSOC);
if ($history_id['History_id'] != null ){
    $sql = "UPDATE history set Allergy = :allergy , Plan = :plan , Diagnoses = :diagnose , History = :history WHERE Id = :id ";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':allergy',$data['Allergy'] );
    $stmt->bindParam(':plan', $data['Plan']);
    $stmt->bindParam(':diagnose', $data['Diagnose']);
    $stmt->bindParam(':history', $data['History']);
    $stmt->bindParam(':id', $history_id['History_id']);
    $stmt->execute();
    echo true;
}else{
    $sql = " INSERT INTO history VALUES ('', :history , :plan , :diagnose , :allergy)" ;
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':history' ,$data['History'] );
    $stmt->bindParam(':plan' , $data['Plan'] );
    $stmt->bindParam(':diagnose' , $data['Diagnose']);
    $stmt->bindParam(':allergy' , $data['Allergy']);
    $stmt->execute();
    $id= $connection->lastInsertId();
    $sql = "Update patients set History_id = :pid where  Id = :id";
    $stmt= $connection->prepare($sql);
    $stmt->bindParam(":pid" , $id);
    $stmt->bindParam(":id" , $data['Id']);
    $stmt->execute();
    echo 'true';
}

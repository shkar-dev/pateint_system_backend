<?php
include "Connection.php";
$request_body =file_get_contents('php://input');
$data =  json_decode($request_body,true);
$increment = 0;
while($increment < count($data)){
    echo $data[$increment]['Id'];
    echo $data[$increment]['PatientId'];
    echo $data[$increment]['Meal'];
     $sql = "INSERT INTO treatment (Id,Drug_id ,Patient_id, Meal )  values ('',  :drug  , :pid , :meal )";
     $stmt = $connection->prepare($sql);
     $stmt->bindParam(':drug' , $data[$increment]['Id']);
     $stmt->bindParam(':pid'  , $data[$increment]['PatientId']);
     $stmt->bindParam(':meal' , $data[$increment]['Meal']);
     $stmt->execute() ;
     $increment++;
}
echo true;


<?php

include_once "Connection.php";
$request_body =file_get_contents('php://input');
$data=  json_decode($request_body,true);



$date = date("d-m-Y");
$sql = "INSERT INTO visits values ('' , :patientId , :datetime , :is_paid)";
$query  =$connection->prepare($sql);
$query->bindParam(':patientId',$data['id']);//wargrtnawai aw datayai ka daxl krawa id akai
$query->bindParam(':datetime' ,   $date);
$query->bindParam(':is_paid' , $data['isPaid']);
if($query->execute()){
    echo "true";
}else{
    echo "false";
}

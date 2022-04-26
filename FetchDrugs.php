<?php
include "Connection.php";
$sql = "Select * from drug";
$stmt = $connection->prepare($sql);
$stmt->execute();
$drug = [] ;
while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $drug[] = $data;
}
echo json_encode($drug);
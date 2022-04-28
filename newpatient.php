<?php



include_once "Connection.php";
$request_body =file_get_contents('php://input');
$patient =  json_decode($request_body,true);
$sql="INSERT INTO patients (FirstName, LastName, SpouseName,  Age, Weight , Height, Address, PhoneNumber  , Occupation , Gender_id , Status_id , BloodGroup_id ) 
        values (:fname , :lname, :spName  , :age , :weight , :height , :address , :phone  , :occupation ,  :gender  , :status  , :bg  )";
$stmt=$connection->prepare($sql) ;
$stmt->bindParam(':fname',$patient['FirstName']) ;
$stmt->bindParam(':lname',$patient['LastName']);
$stmt->bindParam(':spName',$patient['SpouseName']);
$stmt->bindParam(':age',$patient['Age']);
$stmt->bindParam(':weight',$patient['Weight']);
$stmt->bindParam(':height',$patient['Height']);
$stmt->bindParam(':address',$patient['Address']);
$stmt->bindParam(':phone',$patient['PhoneNumber']);
$stmt->bindParam(':occupation',$patient['Occupation']);
$stmt->bindParam(':gender',$patient['Gender']);
$stmt->bindParam(':status',$patient['Status']);
$stmt->bindParam(':bg',$patient['BloodGroup']);
$stmt->execute();
echo $connection->lastInsertId();







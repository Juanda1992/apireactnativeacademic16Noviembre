<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

include 'DBConfig.php';
 
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
$json = file_get_contents('php://input');
 
$obj = json_decode($json,true);
 
$S_ID = $obj['user_id'];
 
$S_Name = $obj['user_name'];
 
$S_Phone = $obj['user_phone'];
 
$S_Email = $obj['user_email'];
 
$S_Password = $obj['user_password'];
 

$Sql_Query = "UPDATE user SET user_name= '$S_Name', user_phone = '$S_Phone', user_email = '$S_Email', user_password = '$S_Password' WHERE user_id = $S_ID";
 
 if(mysqli_query($con,$Sql_Query)){
 
$MSG = 'El usuario ha sido actualizado correctamente ...' ;
 
$json = json_encode($MSG);

 echo $json ;
 
 }
 else{
 
 echo 'Inténtelo de nuevo';
 
 }
 mysqli_close($con);
?>
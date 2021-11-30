<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
// Importar la conexion
include 'DBConfig.php';
 
// Conectar a la base de datos
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Obteniendo los datos en la variable $json.
 $json = file_get_contents('php://input');

 // Decodificando los datos en formato JSON en la variables $obj.
 $obj = json_decode($json,true);
 
 // Crear variables por cada campo.
 $S_Name = $obj['user_name'];
 
 $S_Phone = $obj['user_phone'];
 
 $S_Email = $obj['user_email'];
 
 $S_Password = $obj['user_password'];
 
 // Instrucción SQL para agregar el estudiante.
 $Sql_Query = "insert into User (user_name,user_phone,user_email,user_password) values ('$S_Name','$S_Phone','$S_Email','$S_Password')";
 
 
 if(mysqli_query($con,$Sql_Query)){
 
    $MSG = 'Usuario registrado correctamente...' ;
    
    $json = json_encode($MSG);
 
    echo $json ;
 
 }
 else{
 
    echo 'Inténtelo de nuevo...';
 
 }
 mysqli_close($con);
?>
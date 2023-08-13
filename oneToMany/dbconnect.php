<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = 'crud';

try{
    $pdo =new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connection Successful";

}catch(PDOException $e) 
{ 
    echo "Connection Error!" .$e->getMessage();

}
?>
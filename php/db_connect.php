<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "nuitinfo";

$conn_status = NULL;

try 
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    $conn_status = "Connection failed: " . $e->getMessage();
}

?>
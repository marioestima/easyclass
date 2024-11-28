<?php

$host = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "easyclass"; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>

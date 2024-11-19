<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/db_connect.php');


$materials = []; 
$one = 1; // Se você deseja filtrar por um ID específico ou outra condição

// Aqui você deve definir uma condição válida para a consulta
$query = "SELECT * FROM `Materias` WHERE id = ?"; // Exemplo de condição
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die('Erro na preparação da consulta: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param('i', $one); 
if ($stmt->execute()) {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $materials[] = $row; 
    }
} else {
    echo "<h1 class='danger'>Nenhum resultado encontrado.🤨</h1>";
}
?>

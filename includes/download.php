<?php

$archive = $_GET["archive"] ?? '';
$allowed_exts = ["pdf"];
if (!empty($archive) && file_exists($archive)) {
  
    $ext = strtolower(pathinfo($archive, PATHINFO_EXTENSION));
    switch ($ext) {
        case "pdf":
            $type = "application/pdf";
            break;
        case "jpg":
            $type = "image/jpeg";
            break;
            $type = "image/png";
            break;
        case "docx":
            $type = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
            break;
        case "doc":
            $type = "application/msword";
            break;
        default:
            die("Tipo de arquivo não suportado.");
    }
    header("Content-Type: " . $type);
    header("Content-Length: " . filesize($archive));
    header("Content-Disposition: attachment; filename=" . basename($archive));
    readfile($archive);
    exit;
} else {
    die("Arquivo não encontrado.");
}
?>
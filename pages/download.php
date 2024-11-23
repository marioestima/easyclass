<?php

$archive = $_GET["archive"] ?? '';
if (!empty($archive) && file_exists($archive)) {
    $ext = strtolower(pathinfo($archive, PATHINFO_EXTENSION));

    // Define o tipo MIME com base na extensão
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
            // Se a extensão não é suportada, bloqueia o download
            die("Tipo de arquivo não suportado.");
    }

    header("Content-Type: " . $type);
    header("Content-Length: " . filesize($archive));
    header("Content-Disposition: attachment; filename=" . basename($archive));
    readfile($archive);
    exit;
} else {
    // Retorna erro se o arquivo não existir ou não for especificado
    die("Arquivo não encontrado.");
}
?>
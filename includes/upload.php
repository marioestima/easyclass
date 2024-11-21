<?php 

include("includes/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars(trim($_POST['title']));
    $description = htmlspecialchars(trim($_POST['description']));

    $uploadDir = '/opt/lampp/htdocs/easyclass/uploads/';
    
    if (!empty($_FILES['files']['name'][0])) {
        foreach ($_FILES['files']['name'] as $key => $file_name) {
            
            $file_tmp_name = $_FILES['files']['tmp_name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_exts = ['pdf', 'jpg', 'png', 'docx'];

            if (in_array($file_ext, $allowed_exts) && $file_size <= 10 * 1024 * 1024) { 
                $uniqueName = uniqid() . '.' . $file_ext;
                $uploadFile = $uploadDir . $uniqueName;

                if (move_uploaded_file($file_tmp_name, $uploadFile)) {
                    insertData($conn, $title, $description, $file_name);
                    echo "<p class='success'>Arquivo " . htmlspecialchars($file_name) . " enviado com sucesso!</p>";
                } else {
                    echo "<p class='danger'>Erro ao mover o arquivo: " . htmlspecialchars($file_name) . ".</p>";
                }
            } else {
                echo "<p class='danger'>Arquivo " . htmlspecialchars($file_name) . " é inválido ou muito grande.</p>";
            }
        }
    } else {
        echo "<p class='danger'>Nenhum arquivo foi enviado.</p>";
    }
} else {
    echo "<h1 class='danger'>Método de requisição inválido.</h1>";
}
?>

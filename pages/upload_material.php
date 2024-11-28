<?php 
include("../includes/db_connect.php");
include("../includes/login_register.php");

function insertData($conn, $user_id, $titule, $description, $fileName) {
    $stmt = $conn->prepare("INSERT INTO `Materias` (titule, user_id, description, archive, data_upload) VALUES (?, ?, ?, ?, NOW())");
    if ($stmt) {
        $stmt->bind_param("iiss", $user_id, $titule, $description, $fileName);   
        if ($stmt->execute()) {
            echo "<p class='success'>Material Enviado com sucesso.</p>";
        } else {
            echo "<p class='danger'>Falha ao Enviar o Material: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='danger'>Erro ao preparar a consulta: " . $conn->error . "</p>";
    }
}

function getUserId() {
    if (isset($_SESSION['userId']) && is_numeric($_SESSION['userId'])) {
        return (int) htmlspecialchars($_SESSION['userId']);
    } else {
        die("<h2 class='danger'>Usuario não Autenticado.<h2/>");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = getUserId();
    $title = htmlspecialchars(trim($_POST['title']));
    $description = htmlspecialchars(trim($_POST['description']));

    $uploadDir = '/opt/lampp/htdocs/easyclass/uploads/Material/';
    
    if (!empty($_FILES['files']['name'][0])) {
        foreach ($_FILES['files']['name'] as $key => $file_name) {
            
            $file_tmp_name = $_FILES['files']['tmp_name'][$key];
            $file_size = $_FILES['files']['size'][$key];

            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_exts = ['pdf', 'jpg', 'png', 'docx'];

            if (in_array($file_ext, $allowed_exts)  && $file_size <= 10 * 1024 * 1024) { 
                $uniqueName = uniqid() . '.' . $file_ext;
                $uploadFile = $uploadDir . $uniqueName;

                if (move_uploaded_file($file_tmp_name, $uploadFile)) {
                    insertData($conn, $user_id, $title, $description, $uniqueName);
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


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/upload_materials.css">
    <title>Upload de arquivos</title>
</head>

<body>
    <div class="nav">
        <div class="back-button_container">
            <a href="../pages/dashboard.php" class="back-button">
                <img src="../icons/back-right.svg" style="width:1rem; height: 2rem;">
            </a>
        </div>
          
        <div class="form-container">
            <form method="POST" enctype="multipart/form-data">
                <h2>Upload de Arquivos</h2>
                <label for="title">Por favor, coloque um título</label>
                <input id="title" type="text" placeholder="Título do material..." name="title" required>
        
                <label for="description">Por favor, coloque uma descrição referente ao Material</label>
                <textarea id="description" name="description" required></textarea>

                <div class="upload-area">
                    <input id="file" type="file" name="files[]" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png" onchange="handleFiles(this.files)" multiple required>
                </div>

                <div class="file-list" id="fileList"></div>
                <button type="submit" class="upload-button">Fazer Upload🗂️</button>
            </form>
        </div>

        <script>
            let selectedFiles = [];

            function handleFiles(files) {
                const fileList = document.getElementById('fileList');
                fileList.innerHTML = ''; 
                selectedFiles = Array.from(files); // Salvar arquivos

                selectedFiles.forEach((file, index) => {
                    const listItem = document.createElement('p');
                    listItem.innerHTML = `${file.name} <button class="remove" data-index="${index}">X</button>`;
                    fileList.appendChild(listItem);
                });
            }

            document.getElementById('fileList').addEventListener("click", function (e) {
                if (e.target.classList.contains("remove")) {
                    const index = e.target.dataset.index;
                    selectedFiles.splice(index, 1); 
                    handleFiles(selectedFiles);
                }
            });
        </script>
    </div>
</body>
</html>

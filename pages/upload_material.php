
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/upload_materials.css">
    <title>Upload de arquivos</title>
</head>

<body>

    <div class="nav">
        <div class="back-button_container">
            <a href="../pages/dashboard.php" class="back-button"><img src="../icons/back-right.svg"
            style="width:1rem; height: 2rem;"></a>
        </div>
          
 
       <div class="form-container">
                <form action="../includes/upload.php" method="POST" enctype="multipart/form-data">
                    <h2>Upload de Arquivos</h2>
                    <label for="title">Por favor, coloque um título</label>
                    <input type="text" placeholder="Título do material..." name="title" required>
            
                    <label for="description">Por favor, coloque uma descrição referente ao Material</label>
                    <textarea name="description" id="my-text-area" required></textarea>


                    <div class="upload-area">
                        <input id="file" type="file" name="files[]" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png"  onchange="handleFiles(this.files)" multiple required>
                    </div>

                    <div class="file-list" id="fileList"></div>
                    <button type="submit" class="upload-button">Fazer Upload🗂️</button>

                </form>
        </div>
        <script>
            function handleFiles(files) {
                const fileList = document.getElementById('fileList');
                fileList.innerHTML = ''; 

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const listItem = document.createElement('p');
                    listItem.innerHTML = `${file.name} <button class="remove">X</button>`;
                    fileList.appendChild(listItem);
                }
            }
            document.getElementById('fileList').addEventListener("click", function (e) {
                if (e.target.classList.contains("remove")) {
                    e.target.parentElement.remove();
                }
            });
        </script>
    </div>
</body>
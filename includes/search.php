<?php
require("db_connect.php");
$materials = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['search_term'])) {
        $search = trim($_POST['search_term']);
        $searchTerm = "%$search%";

        $query = "SELECT * FROM `Materias` WHERE titule LIKE ? OR description LIKE ? OR data_upload = CURDATE()";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $materials[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/search.css">
    <title>Pesquisar Material</title>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="../images/logo.png" alt="Logo EasyClass" />
            <a href="../pages/dashboard.php">
                <h2>Easy<span class="danger">Class</span></h2>
            </a>
        </div>
        <a href="../pages/upload_material.php" class="nav-link">Upload 📂</a>

        <div class="search-bar">
            <i class="fas fa-search"></i>
            <form method="POST">
                <input placeholder="pesquise..." type="text" name="search_term" />
            </form>
        </div>
    </nav>

    <div class="results-container" id="results-container">
        <?php if (!empty($materials)): ?>
        <h2>Resultados da busca para "<?php echo htmlspecialchars($search); ?>"</h2>
        <ul>
            <?php foreach ($materials as $material): ?>
            <li>
                <p><strong>Título:</strong> <?php echo htmlspecialchars($material['titule']); ?></p>
                <p><strong>Descrição:</strong> <?php echo htmlspecialchars($material['description']); ?></p>
                <p><strong>Data de Emissão:</strong> <?php echo htmlspecialchars($material['data_upload']); ?></p>
                <button class="see-details">
                    <a style="color: #fff" href="seeDetails.php?id=<?php echo $material['id']; ?>">Ver detalhes</a>
                </button>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
        <div class="response-message" style="display: flex">
            <h1>Nenhum material encontrado🤔</h1>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>

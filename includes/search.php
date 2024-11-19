<?php
require("db_connect.php");
$materials = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['search'])) { 
        $search = trim($_POST['search']);
        $searchTerm = "%$search%";

        $query = "SELECT * FROM `Materias` WHERE titule LIKE ? OR description LIKE ?";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/search.css">
    <title>Pesquisar Material</title>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="../images/logo.png" alt="Logo EasyClass">
            <a href="../pages/dashboard.php">
                <h2>Easy<span class="danger">Class</span></h2>
            </a>
        </div>

        <a href="../pages/upload_material.php" class="nav-link">Upload 📂</a>

        <form method="POST" class="search-form">
            <input type="text" name="search" placeholder="Pesquisar..." id="searchInput" required>
            <button type="submit" class="search-button">
                <img src="../icons/search.png" alt="Pesquisar">
            </button>
        </form>
    </nav>

    <div class="results-container" id="results-container" style="diplay: none;">
        <?php if (!empty($materials)): ?>
            <h2>Resultados da busca para "<?php echo htmlspecialchars($search); ?>"</h2>
            <ul>
                <?php foreach ($materials as $material): ?>
                    <li>
                        <p><strong>Título:</strong> <?php echo htmlspecialchars($material['titule']); ?></p>
                        <p><strong>Descrição:</strong> <?php echo htmlspecialchars($material['description']); ?></p>

                        <button class="see-details" >
                            <a style="color: #fff;"href="seeDetails.php?id=<?php echo $material['id']; ?>">Ver detalhes</a>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>  
            <h1>Nenhum material encontrado. 🤔</h1>
        <?php endif; ?>
    </div>

</body>
</html>

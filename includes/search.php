<?php
require("db_connect.php");
$materials = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['search'])) { 
        $search = trim($_POST['search']);
        $searchTerm = "%$search%";

        $query = "SELECT * FROM `Materias` WHERE titule LIKE ? OR description OR data_upload LIKE  NOW() ";
        $stmt = $conn->prepare($query); 
        $stmt->bind_param("ssi", $searchTerm,$searchTerm);
        $stmt->execute(); 
        $result = $stmt->get_result(); 
        while ($row=$result->fetch_assoc()) 
        { 
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
    <link rel="stylesheet" href="../assets/css/search.css" />
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

      <div class="container" id="container">
        <div class="input-group">

          <div class="input-icon">
            <img src="../images/search.png" />
          </div>
          <input
            type="text"
            id="search"
            class="input-field"
            placeholder="Pesquisar"
          />
        </div>
      </div>
    </nav>

    <div class="results-container" id="results-container"">
      <?php if (!empty($materials)): ?>
      <h2>
        Resultados da busca para "<?php echo htmlspecialchars($search); ?>"
      </h2>
      <ul>
        <?php foreach ($materials as $material): ?>
        <li>
          <p>
            <strong>Título:</strong>
            <?php echo htmlspecialchars($material['titule']); ?>
          </p>
          <p>
            <strong>Descrição:</strong>
            <?php echo htmlspecialchars($material['description']); ?>
          </p>

          <p>
            <strong>Data de Emição:</strong>
            <? echo htmlspecialchars($material['date']);?>
          </p>

          <button class="see-details">
            <a
              style="color: #fff"
              href="seeDetails.php?id=<?php echo $material['id']; ?>"
              >Ver detalhes</a
            >
          </button>
        </li>
        <?php endforeach; ?>
      </ul>

      <?php else: ?>
      <div class="response-message" style="display: flex">
        <h1>Nenhum material encontrado. 🤔</h1>
      </div>
      <?php endif; ?>
    </div>
  </body>
</html>

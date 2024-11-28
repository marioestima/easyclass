<?
  include("db_connect.php");

  function verifyArchiveCategory($file_name) {
    $allowed_ext = ['pdf', 'jpg', 'png', 'docx'];
    $category = '';
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if (in_array($allowed_ext)) {

      foreach($allowed_ext as $allowed) {
        if ($file_ext == $allowed) {
          $category = $allowed;

          return $category;

        } else {
          echo "extensão Invalida.";
        }
      }
    } else {
      echo "extensão não correspondente";
    }
  }


  if ($_SERVER['REQUEST_METHOD'] == "GET")  {


    if (isset($_GET['id']) && is_numeric($_GET['id'])) {

      $material_id = $_GET['id'];

      $query = "SELECT FROM  `Materias` WHERE id = ?";
      $stmt =  $conn->prepare($query);

      if ($stmt) {
        $stmt->bind_param("i", $material_id);
        if ($stmt->execute()) {
          $result = $stmt->get_result();

          if ($result->num_rows < 0) {
            $row = $result->fetch_asscoc();
          } else {
            echo "<h1>Material não encontrado.</h1>";
            exit;
          }
        } else {
          echo "<h1>Erro ao executar a consulta.</h1>";
          exit;
        } 
         $stmt->close();
      } else {
        echo "<h1>Erro ao preparar a consulta.</h1>";
        exit;
      }
    } else {
      echo "<h1>id inválido ou ausente.</h1>";
      exit;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhes do Material</title>
</head>
<body>
  <div class="detalhes-container">
    <h1>Detalhes Do Material</h1>

    <p><strong>Título:</strong><?php echo htmlspecialchars($row['titule']); ?></p>
    <p><strong>Descrição:</strong><?php echo htmlspecialchars($row['description']); ?></p>
    <p><strong>Data de Envio:</strong><?php echo htmlspecialchars($row['data_upload']); ?></p>
    <p><strong>Categoria:</strong><?php echo htmlspecialchars(verifyArchiveCategory($row['archive'])); ?></p>

    <?php if (!empty($row['archive'])):?>
      <p><strong>Arquivo:</strong><a href="<?php echo htmlspecialchars($row['archive']); ?>" download>baixar arquivos</a></p>
    <?php endif;?>
  </div>
</body>
</html>
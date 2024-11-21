<?
include("db_connect.php");


function insertData($conn, $title, $description, $fileName) {
  $stmt = $conn->prepare("INSERT INTO `Materias` (title, description, archive, data_upload) VALUES (?, ?, ?, NOW())");
  
  if ($stmt) {
      $stmt->bind_param("sss", $title, $description, $fileName);
      
      if ($stmt->execute()) {
          echo "<p class='success'>Consulta executada com sucesso.</p>";
      } else {
          echo "<p class='danger'>Falha ao executar a consulta: " . $stmt->error . "</p>";
      } 
      $stmt->close();
  } else {
      echo "<p class='danger'>Erro ao preparar a consulta: " . $conn->error . "</p>";
  }
}
?>
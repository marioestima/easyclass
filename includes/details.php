<?
  include("db_connect.php");


  if ($_SERVER["REQUEST_METHOD"] == "GET")  {
      $detail_list = [];

      $material_id = $_GET['id'];
      $material_title = trim($_GET['titule']);
      $material_description = trim($_GET['description']);
      $archive = trim($_GET['archive']);

      $query = "SELECT * FROM `Materias` WHERE id LIKE ? OR user_id LIKE ? OR  titule LIKE  ? OR description LIKE ? OR archive LIKE ? ";
      $stmt =  $conn->prepare($query);


      if ($stmt) {
        $stmt->bind_param("iisss", material_id, $material_title, $material_description);
        if ($stmt->execute()) {
          // $array_lenght = count($detail_list);
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();

          var_dump($row);
          // for ($count = 0; $count < $array_lenght; $count++) {
          //   $row = $detail_list[$count];
          // }
        }

      }

  } 
?>
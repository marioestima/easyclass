<?php

    include("../includes/db_connect.php");

    $materials = []; 
    $one = 1;
    $query = "SELECT * FROM `Materias` WHERE id = ?"; 
    $stmt = $conn->prepare($query);
    
    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . htmlspecialchars($conn->error));
    }
    
    $stmt->bind_param('i', $one); 
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $materials[] = $row;
        }
    } else {
        echo "<h1 class='danger'>Nenhum resultado encontrado.🤨</h1>";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/materials.css">
    <title>Meus Materiais</title>
</head>
<body>
    <div class="container">
        <h1>Materiais Disponíveis</h1>
        <?php if (count($materials) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>data</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($materials as $material): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($material['data_upload'])?></td>
                            <td><?php echo htmlspecialchars($material['titule']); ?></td>
                            <td><?php echo htmlspecialchars($material['description']); ?></td>
                            <td>
                                <a href="download.php?id=<?php echo $material['id']; ?>">Baixar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum material disponível.</p>
        <?php endif; ?>
    </div>
</body>
</html>
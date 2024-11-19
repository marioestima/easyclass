<?php
    include("includes/materials.php")
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
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($materials as $material): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($material['id']); ?></td>
                            <td><?php echo htmlspecialchars($material['title']); ?></td>
                            <td><?php echo htmlspecialchars($material['description']); ?></td>
                            <td>
                                <a href="download.php?id=<?php echo $material['id']; ?>">Baixar</a> <!-- Link para download -->
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
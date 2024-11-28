<?php
include("../includes/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $datas = [];

        $query = "SELECT * FROM `Materias`";
        $stmt = $conn->prepare($query);
        if ($stmt) {
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    $datas[] = $row;
                }
            } else {
                echo "<p>Erro ao executar a consulta: " . $stmt->error . "</p>";
            }

            $stmt->close();
        } else {
            echo "<p>Erro ao preparar a consulta: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Por favor, insira um termo de pesquisa.</p>";
    }
?>

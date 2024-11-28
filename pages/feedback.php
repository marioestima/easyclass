<?php
    // include("includes/db_connect.php");

    // if ($_SESSION['userLogged'] == $row['name']) {

    //     $query = "INSERT INTO `feedack` (email, username, feedback) VALUES (?, ?, ?)";
    //     $stmt = $conn->prepare($query);

    //     if ($stmt) {
    //         $stmt->bind_param("sss", $email, $username, $feedback);
    //         if ($stmt->execute()) {
    //             echo "<h1>Feedback enviado com sucesso</h1>";
    //         } else {
    //             echo "erro ao enviar o comentario";
    //         }
    //     } else {
    //         echo "Erro a executar a consulta";
    //     }
    // } else {
    //     echo "<h2>usuario invalido!</h2>";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/feedback.css">
    <title>Feedback</title>
</head>
<body>
    <main class="main-container">
        <div class="who-posted">
            <div class="user-profile">
                <img src="../images/image_1.jpg">
                
                <div class="user-info">
                    <h2>post de:</h2>
                    <b>Mario Estima/Aluno/Colega</b>
                </div>
            </div>
        </div>

        <div class="material-container">
            <h3>Ficheiros disponiveis</h3>
            <div class="data-material">
                <div class="images-container">
                    <img src="../images/i_.jpeg">
                    <img src="../images/i_.jpeg">
                    <img src="../images/i_.jpeg">
                </div>
                    <div class="preview-btn">
                        <p>pré-visualizar</p>
                    </div>
            </div>
                <span>
                    <p>titulo:</p><b>como ser bom em python.</b>
                </span>

                <span class="material-info">
                    <p>descrição:</p>
                        <b>
                            Lorem ipsum dolor sit amet, 
                            consectetur adipisicing elit.
                            Vitae at placeat dicta laborum,
                            expedita maxime reprehenderit! 
                            Ad, quae voluptate repellat necessitatibus
                            et placeat quidem quas, non similique aperiam 
                            nobis itaque?
                        </b>
                </span>

                <span class="date">
                    <p>data:</p><b>12/2021/2023</b>
                </span>
        </div>

        <div class="feedback-container">
            <div class="avaliation">
                <div class="avaliation-icons">
                    <span>good</span>
                    <span>bad</span>
                    <span>not bad at all</span>
                </div>
            </div>
            <div class="form-container">
                <form method="POST">
                    <input type="text" name="user-feedback">
                    <button type="submit">Enviar comentario</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
<?php
    session_start();
    include("db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST['action'] === 'register') {
        
        $username = trim($_POST['name']);
        $pass = trim($_POST['senha']);
        $email = trim($_POST['email']);

        if (empty($username) || empty($pass) || empty($email)) {
            die("Todos os campos são obrigatórios.");
        }

        $stmt = $conn->prepare("SELECT id FROM `Users` WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->close();
            die("Este e-mail já está registrado.");
        }

        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO Users (name, email, senha) VALUES (?, ?, ?)");
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        if ($stmt) {
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                $_SESSION['userLogged'] = $username;
                header("Location: index.php");
                exit();
            } else {
                echo "Erro ao registrar. Tente novamente.";
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta.";
        }
    } elseif ($_POST['action'] === 'login') {

        $email = trim($_POST['email']);
        $pass = trim($_POST['senha']);

        if (empty($email) || empty($pass)) {
            die("E-mail e senha são obrigatórios.");
        }

        $stmt = $conn->prepare("SELECT * FROM `Users` WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['senha'])) {
                $_SESSION['userLogged'] = $row['name'];
                $_SESSION['userId'] = $row['id'];
                header("Location: pages/dashboard.php");
                exit();
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Nenhum usuário encontrado.";
        }
        $stmt->close();
    }
}
?>

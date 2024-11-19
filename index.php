<?php
include("includes/login_register.php");

if (isset($_SESSION['userLogged'])) {
    header("Location: pages/dashboard.php");
    exit(); // Adicione exit() após redirecionar
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyClass | Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST">
                <h1>Criar Conta</h1>
                <span>ou use seu email para se Registrar</span>
                <input type="hidden" name="action" value="register">
                <input type="text" placeholder="Nome" name="name" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="senha" required>
                <button type="submit">Registrar</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form method="POST">
                <h1>Iniciar Sessão</h1>
                <span>use seu email e a sua password</span>
                <input type="hidden" name="action" value="login">
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="senha" name="senha" required>
                <a href="#">Esqueceu-se da sua password?</a>
                <button type="submit">Entrar</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>É como Wy de que estás a espera registra-te no site</h1>
                    <p>Registrar-te com seus detalhes pessoais para usar todas as funcionalidades do site.</p>
                    <button class="hidden" id="login">Entrar</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Bem-vindo de volta</h1>
                    <p>Digite seus detalhes para ver todas as features do site.</p>
                    <button class="hidden" id="register">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/script.js"></script>
</body>
</html>
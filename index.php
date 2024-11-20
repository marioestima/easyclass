<?php
include("includes/login_register.php");

if (isset($_SESSION['userLogged'])) {
    header("Location: pages/dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyClass | Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body {
    background: linear-gradient(to right, #e2e2e2, #c9d6ff);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    height: 100vh;

    background-image: url(image/mulher-afro-americana-feliz-e-despreocupada-com-penteado-encaracolado-desfrutando-de-uma-otima-companhia-rindo-alto-e-se-divertindo-mostrando-um-sinal-de-ok-ou-perfeito-com-os-dedos-circulados_176420-23227.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    margin: 0;
}

.container {
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
    
}
.container p {
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.3px;
    margin: 20px 0;
}

.container span {
    font-size: 12px;
}

.container a {
    color: #333;
    font-size: 13px;
    text-decoration: none;
    margin: 15px 0 10px;
}

.container button {
    background: linear-gradient(to right, #1522d3b4, #24a7dbcc);
    color: #fff;
    border: none;
    font-size: 12px;
    padding: 10px 45px;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
}

.container button.hidden {
    background-color: transparent;
    border-color: #fff;
}

.container form {
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding:  0 40px;   
    height: 100%;
}

.container input {
    background-color: #eee;
    border: none;
    margin: 8px 0;
    padding: 10px 10px;
    font-size: 13px;
    border-radius: 5px;
    width: 100%;
    outline: none;
}

.form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in {
    left: 0;
    width: 50%;
    z-index: 2;
}

.container.active .sign-in {
    transform: translateX(100%);
}

.sign-up {
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.active .sign-up {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: move 0.6s;
}

@keyframes move {
    0%, 49.99% {
        opacity: 0;
        z-index: 1;
    }

    50%, 100% {
        opacity: 1;
        z-index: 5;
    }
}

.social-icons {
    margin: 20px 0; 
}

.social-icons a{
    border: 1px solid #ccc;
    border-radius: 28%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 3px;
    width: 40px;
    height: 40px;
}


.toggle-container {
    position: relative;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    border-radius: 150px 0 0 100px;
    transition: all 0.6s ease-in-out;
    z-index: 1000;
}

.container.active .toggle-container {
    transform: translateX(-100%); 
    border-radius: 0 150px 100px 0;

}

.toggle {
    background-color: #1522d3b4;
    height: 100%;
    background: linear-gradient(to right, #5c6bc8, #512da8);
    color: #fff;
    position: absolute;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;

}

.container.active .toggle{
    transform: translateX(50%);
}

.toggle-panel {
    position: absolute;
    width: 50%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 0 30px;
    top: 0;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
} 

.toggle-left {
    transform: translateX(-200%); 
}

.container.active .toggle-left {
    transform: translateX(0);
}

.toggle-right {
    transform: translateX(0);
    right: 0;
}

.container.active .toggle-right {
    transform: translateX(200%);
}

</style>
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
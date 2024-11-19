<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyClass | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    
    <div class="container" id="container">

        <div class="form-container sign-up">
            <form>
                <h1>Create Account</h1>            

                <span>
                    or use your email for registration
                </span>

                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">

                <button>Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form>
                <h1>Sign In</h1>
                <span>
                    or use your email for password
                </span>

                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">

                <a href="#">Forgot your password?</a>
                <button>Log In</button>
            </form>
        </div>

        <div class="toggle-container">

            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Hello my friend</h1>

                    <p>
                        register with your personal details to use all the site features.
                    </p>

                    <button class="hidden" id="login">Sign In</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Welcome back</h1>

                    <p>
                        Enter your personal details to use all the site features.
                    </p>

                    <button class="hidden" id="register">Sign Up</button>
                </div>

            </div>
        </div>
    </div>

    <script src="./js/script.js"></script>
</body>
</html>

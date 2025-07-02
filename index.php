<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="styles/style.css">
    <script type="module" src='styles/config.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>



    <div class="signupForm bg-secondary">

        <div class="signup text-center">
            <h1 class="">Sign up</h1>
        </div>

        <div class="formContainer">
            <form action="user.php" method="POST">

                <div class="formInputContainer">
                    <div class="emailField">
                        <label for="mailFieldInput">Email:</label> <br>
                        <input type="email" name="usermail" id="mailFieldInput">
                    </div>

                    <div class="usernameField">
                        <label for="usernameFieldInput">Nome de usuario:</label> <br>
                        <input type="text" name="username" id="usernameFieldInput">
                    </div>

                    <div class="passwordField">
                        <label for="passwordFieldInput">Senha:</label> <br>
                        <input type="password" name="password" id="passwordFieldInput">
                    </div>
                    <div class="passwordRules">
                        <ul>
                            <p>Sua senha deve conter:</p>
                            <li class="passwordRule">8 caracteres</li>
                            <li class="passwordRule2">Deve ter caracteres especiais (*,@,/,$)</li>
                        </ul>
                    </div>
                </div>

                <input type="submit" name="registrar" class="registerButton">
            </form>

        </div>
    </div>
</body>

</html>
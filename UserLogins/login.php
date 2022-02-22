<?php
require_once("./inc/autoLoadClassesLogin.inc.php");
session_start();

$login = new AgentsController();
$login->login();
$login->redirectToSpecificPage();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/login.css">
    </link>

    <title>Cashwin Login</title>
</head>

<body>
    <form method="POST">
        <div class="container-body">
            <div class="header">
                Login Form
            </div>

            <div class="container-userLogin">
                <div class="field">
                    <input type="text" name="username" id="username" placeholder=" " />
                    <label class='username-tag' id='username-tag'>Username/Email</label>
                </div>
                <div class="field">
                    <input type="password" name="password" id="password" />
                    <label class='password-tag' id='password-tag'>Password</label>
                </div>
            </div>

            <div class="container-rememberMe">
                <div class="container-remember">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>

                <div class="pass-link">
                    <a href="#">Forgot Password?</a>
                </div>
            </div>

            <div class="container-button">
                <button type="submit" name="login" class="btn btn-primary">Log In</button>
            </div>

            <div class="container-signup">
                Not a member? <a name="signUp" href="./signup.php">Signup now</a>
            </div>
        </div>
    </form>


    <script src="./Js/login.js"></script>
</body>

</html>
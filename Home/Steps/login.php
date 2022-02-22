<?php
require_once('../inc/autoLoadClasses.inc.php');
$newAppView = new NewAppController();
$newAppView->login();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <br>
        <br>
        <button type="submit" name="submit-login">Login</button>
        <a href="../homepage.php">Home</a>
        <br>
        <br>
        <br>
        <label>Already have an account? <a href="./step1.php">Signup</a></label>
    </form>
</body>

</html>
<?php
session_start();
if (!isset($_SESSION['clientData'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/clientsPage.css" class="rel">
    <title>Document</title>
</head>

<body>
    <div class="container-content">
        <div class="content-header">
            <div class="container-balance">
                <div class="currency">
                    PHP
                </div>
                <div class="balance">
                    5,000
                </div>
            </div>
            <div class="container-tag">
                Available Balance
            </div>
        </div>
    </div>
    <div class="container-navigation">
        <div class="container-name">
            <img src="https://img.icons8.com/material-outlined/24/000000/home--v2.png" /> <br> HOME
        </div>
        <div class="navigation-content">
            History
        </div>
    </div>
</body>

</html>
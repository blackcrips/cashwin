<?php
require_once('../../inc/autoLoadClasses.inc.php');
session_start();
$userDetails = new AgentsController;
$clientsController = new ClientsController;

$clientsController->direct_dashboard();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../Css/header.css">
    <script src="../../Js/header.js" defer></script>
    <title>Verifier Dashboard</title>
</head>

<body id="body">
    <div class="header" id="header">
        <div class="tab-design" id="tab-design">
            <div class="tab-1"></div>
            <div class="tab-2"></div>
            <div class="tab-3"></div>
        </div>
        <div class="container-navigation" id="container-navigation">
            <form method="GET">
                <nav class="navigation">
                    <ul>
                        <li>
                            <a href="../../login.php" class="home">
                                <i class="material-icons">home</i>
                                HOME
                            </a>
                        </li>
                        <li>
                            <a href="./dashboard.php">
                                <i class="material-icons">dashboard</i>
                                Dashboard
                            </a>
                        </li>

                        <li>
                            <a href="../Others/checkrecord.php">
                                <i class="material-icons">fact_check</i>
                                Check Record
                            </a>
                        </li>

                        <li>
                            <a href="../Others/declineCancelled.php">
                                <i class="material-icons">approval</i>
                                Decline/Cancel
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="material-icons">warning</i>
                                ORR
                                <i class="material-icons expand">expand_more</i>
                            </a>
                            <div class="container-orr-sublist">
                                <ul class="orr-sub-list">
                                    <li><a href="../Others/orrBarangay.php">Barangay</a></li>
                                    <li><a href="../Others/orrCompany.php">Company</a></li>
                                    <li><a href="../Others/orrPosition.php">Position</a></li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="blankInterviewer.php">
                                <i class="material-icons">add</i>
                                Add new &#x2b;
                            </a>
                        </li>

                        <li>
                            <a href="#" id="btn-logout">
                                <i class="material-icons">logout</i>
                                Log
                            </a>
                        </li>
                    </ul>
                </nav>
            </form>
        </div>
    </div>
    <div class="container-profle">
        <div class="user-login">
            <label>You are logged in as <?php echo $userDetails->set_userdata()['name']; ?> </label>
        </div>

    </div>

    <!-- overlay or modal for logout button when clicked -->
    <div class="container-overlay" id="container-overlay">
        <div class="modal-logout">
            <div class="modal-logout-header">
                <p>Confirm Logout</p>
            </div>
            <div class="modal-logout-message">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-buttons">
                <form action="../../logout.php" method="POST">
                    <button type="submit" class="btn btn-danger" name="log-out">YES</button>
                </form>
                <button class="btn btn-primary" id="modal-cancel">CANCEL</button>
            </div>
        </div>
    </div>
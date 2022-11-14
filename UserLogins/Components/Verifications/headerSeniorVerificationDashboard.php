<?php
require_once('../../inc/autoLoadClasses.inc.php');
session_start();
$viewDetails = new ClientsView();
$userDetails = new AgentsController;
$deleteUser = new ClientsController;

$viewDetails->showForwardedApplications();
// $deleteUser->saveRemarksandAttachment();
$deleteUser->delete_user();
$deleteUser->direct_dashboard();


$active = '';


if (isset($_POST['view-details'])) {
    $active = 'active';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../Css/svoDashboard.css">
    <link rel="stylesheet" href="../../css/dashboard.css" class="rel">
    <title>Senior Verification Dashboard</title>
</head>

<body class="" id="body">
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
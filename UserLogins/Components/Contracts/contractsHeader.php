<?php
require_once('../../inc/autoLoadClasses.inc.php');
session_start();
$viewDetails = new ClientsView();
$userDetails = new AgentsController;
$agentsView = new Agentsview;
$deleteUser = new ClientsController;

$userDetails->logout();
$deleteUser->saveRemarksandAttachmentContracts();
$deleteUser->forwardToAccounts();

// $deleteUser->direct_dashboard();


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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Css/verifierDashboard.css">
    <link rel="stylesheet" href="../../Css/contracts.css">
    </link>
    <title>Contracts Dashboard</title>
</head>

<body class="" id="body">
    <div class="header">
        <div class="container-navigation">
            <form method="GET">
                <nav class="navigation">
                    <ul>
                        <li><a href="./dashboard.php">Dashboard</a></li>
                        <li><a href="#">Check Record</a></li>
                        <li><a href="#">Decline/Cancel</a></li>
                        <li class="orr-sub"><a href="#">ORR</a>
                            <div class="container-orr-sublist">
                                <ul class="orr-sub-list">
                                    <li><a href="#">Barangay</a></li>
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Position</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </form>
        </div>

        <div class="container-profle">
            <div class="profile-picture">
                <!-- with css design for profile picture -->
            </div>

            <nav class="navigation-profile">
                <ul>
                    <li><a href="#"><span><?php echo $userDetails->set_userdata()['name']; ?></span></a></li>
                    <li><a href="#">Edit profile</a></li>
                    <li><a href="#" id="btn-logout">Log out</a></li>
                </ul>
            </nav>
        </div>
    </div>
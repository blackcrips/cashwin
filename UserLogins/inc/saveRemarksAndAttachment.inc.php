<?php

include_once("./autoLoadIncClasses.inc.php");

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_POST['save-id'])) {
    header("Location: ../login.php");
}


$applicationNo = $_POST['save-id'];
$remarks = htmlspecialchars($_POST['remarks-field']);

$clientsController = new ClientsController();
$clientsController->saveRemarksandAttachment($applicationNo, $remarks);

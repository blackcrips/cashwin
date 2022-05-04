<?php

include_once("./autoLoadIncClasses.inc.php");

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_POST['save-id'])) {
    header("Location: ../login.php");
}

$applicationNo = $_POST['save-id'];

$fileGovtId = $_FILES['file-govtid'];
$fileCoid = $_FILES['file-coid'];
$filePoi = $_FILES['file-poi'];
$filePob = $_FILES['file-pob'];
$fileAtm = $_FILES['file-atm'];
$fileOthers = $_FILES['file-others'];
$filesUploaded = [
    $fileGovtId,
    $fileCoid,
    $filePoi,
    $filePob,
    $fileAtm,
    $fileOthers
];
$remarks = htmlspecialchars($_POST['remarks-field']);

$clientsController = new ClientsController();
$clientsController->saveRemarksandAttachment($applicationNo, $filesUploaded, $remarks);

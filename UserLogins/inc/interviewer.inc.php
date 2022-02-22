<?php

require_once('autoLoadIncClasses.inc.php');

session_start();

$clientsController = new ClientsController();
if ($clientsController->interviewerUpdate() != '') {
    header("Location: ../login.php");
} elseif ($clientsController->forwardToContracts() != '') {
    header("Location: ../agreement.php?valid_application_id={$_SESSION['editClient']['id']}");
}

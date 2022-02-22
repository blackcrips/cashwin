<?php

require_once('./autoLoadClasses.inc.php');
$newAppController = new NewAppController();
$newAppController->clientSignup();

if (!isset($_SESSION)) {
    session_start();
}

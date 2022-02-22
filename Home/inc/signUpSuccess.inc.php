<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!$_SESSION['clientData'] || $_SESSION['clientData'] == null || $_SESSION['clientData'] == '') {
    header("Location: login.php");
} else {
    unset($_SESSION['clientData']);
    header("Location: ../Steps/login.php");
}

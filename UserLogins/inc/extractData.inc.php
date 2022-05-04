<?php

include_once('./autoLoadIncClasses.inc.php');

if (!isset($_POST['request_status'])) {
    header("Location: ../login.php");
} else {
    getThisData($_POST['request_status']);
}

function getThisData($status)
{
    $extractedData = new Apiresponse();
    return $extractedData->displayClients($status);
}

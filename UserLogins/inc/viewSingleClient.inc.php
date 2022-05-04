<?php

include_once('./autoLoadIncClasses.inc.php');

if (!isset($_POST['request_details'])) {
    header("Location: ../login.php");
} else {
    getThisData($_POST['request_details']);
}

function getThisData($request)
{
    $viewData = new ClientsView();
    return $viewData->view_single_client_details($request);
}

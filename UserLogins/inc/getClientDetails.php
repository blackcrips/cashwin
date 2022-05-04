<?php

include_once('./autoLoadIncClasses.inc.php');


if (!isset($_POST['get_single_client'])) {
    header("Location: ../login.php");
} else {

    getThisData($_POST['get_single_client']);
}


function getThisData($request)
{
    $viewData = new ClientsView();
    return $viewData->displayClientDetails($request);
}

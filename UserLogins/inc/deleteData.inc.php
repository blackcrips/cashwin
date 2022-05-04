<?php

include_once('./autoLoadIncClasses.inc.php');
$clientsController = new ClientsController();


if (!isset($_POST['viewDetailsHidden'])) {
    header("Location: ../login.php");
} else {
    $id = $_POST['viewDetailsHidden'];
    $applicationNo = $clientsController->getApplicationNo($id);
    $clientsController->deleteApplication($applicationNo[0]['application_no']);
    echo "<script>alert('Record successfully deleted!');</script>";
    echo "<script>window.location.href = '../login.php'</script>";
}

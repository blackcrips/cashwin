<?php


if (isset($_POST)) {

    $fileDestination = "../Contracts/" . $_POST['contractNo'];

    if (!file_exists($fileDestination)) {
        mkdir($fileDestination, 077, true);
    }

    $fileNewDestination = $fileDestination . '/' . 'Contracts.pdf';
    move_uploaded_file($_FILES['pdf']['tmp_name'], $fileNewDestination);

    header("Location: login.php");

    // move_uploaded_file(
    //     $_FILES['pdf']['tmp_name'],
    //     '../Contracts/' . $_POST['contractNo'] . '.pdf'
    // );
} else {
    header("Location: login.php");
}

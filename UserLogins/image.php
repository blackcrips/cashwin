<?php
require_once('./inc/autoLoadClassesLogin.inc.php');
if (!isset($_SESSION)) {
    session_start();
}
$viewDetails = new ClientsController();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/attachment.css">
    <title>Attachment</title>
</head>

<body>

    <?php
    $fileName = $viewDetails->getAttachment();

    $explodedName = explode('.', $fileName);


    $fileActualExt = strtolower(end($explodedName));
    $fileActualName = array_shift($explodedName);


    if ($fileActualExt == 'pdf') {

        echo "<embed src='../Uploads/" . $_GET['application_no'] . "/" . $fileActualName . '.' . $fileActualExt . " ' width='100%' height='1000px' scrolling='auto'  type='application/pdf'/> ";
    } else {
        echo "<img src='../Uploads/" . $_GET['application_no'] . "/" . $fileActualName . '.' . $fileActualExt . " ' scrolling='auto' /> ";
    }

    ?>
</body>

</html>
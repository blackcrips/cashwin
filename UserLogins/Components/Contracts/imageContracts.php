<?php
require_once('../../inc/autoLoadClasses.inc.php');
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
    $viewDetails->getAttachment();


    if ($_GET['filename'] == 'Contracts') {
        echo "<embed src='../../../Contracts/" . $_GET['application_no'] . "/" . 'Contracts' . '.' . 'pdf' . " ' width='100%' height='1000px' scrolling='auto'  type='application/pdf'/> ";
    } elseif ($_GET['filename'] == 'Merge_Contracts') {
        echo "<embed src='../../../Contracts/" . $_GET['application_no'] . "/" . 'Merge_Contracts' . '.' . 'pdf' . " ' width='100%' height='1000px' scrolling='auto'  type='application/pdf'/> ";
    } else {
        header('Location: ../../login.php');
    }

    ?>
</body>

</html>
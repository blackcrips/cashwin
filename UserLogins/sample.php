<?php

include('../UserLogins/inc/autoLoadClassesLogin.inc.php');
$sampleController = new ClientsController();
$sampleViews = new ClientsView();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
</head>

<body class="bg-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 bg-light rounded my-2 py-2">
                <h4 class="text-center text-dark pt-2">Pagination Using JQUERY DataTables</h4>
                <hr>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Application No</th>
                            <th>Name</th>
                            <th>Contact number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sampleViews->show_fresh_clients() as $sampleView) : ?>
                            <tr>
                                <td><?php echo $sampleView['application_no']; ?></td>
                                <td><?php echo $sampleView['firstname'] . " " . $sampleView['middlename'] . " " . $sampleView['lastname']; ?></td>
                                <td><?php echo $sampleView['primary_no']; ?></td>
                                <td><?php echo $sampleView['email']; ?></td>
                                <form method="POST">
                                    <td class="td-buttons">
                                        <input type="submit" class="btn btn-primary" name="view-details" value="View">
                                        <input type="hidden" name="viewDetailsHidden" id="viewDetailsHidden" value="<?php echo $sampleView['application_no']; ?>">
                                        <input type="submit" class="btn btn-danger <?php echo $sampleView['application_no']; ?>" id="delete" name="delete" value="Delete">
                                    </td>
                                </form>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
</body>

</html>
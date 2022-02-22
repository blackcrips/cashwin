<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <title>Test page</title>
</head>

<body class="bg-info">
    <div class="container">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-lg-10 bg-light rounded my-2 py-2">
                    <h4 class="text-center text-dark pt-2">Pagination Using Jquery DataTables</h4>
                    <hr>
                    <table class="table table-bordered table-stripped table-hover">
                        <thead>
                            <tr>
                                <th>Application No</th>
                                <th>Name</th>
                                <th>Contact No</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conn = new mysqli("localhost", "root", 123456, "new_aeging");
                            $sql = "SELECT application_no,name,contact_no1,personal_email FROM clients_information WHERE past_due_or_closed = 'Past Due'";
                            $res = $conn->query($sql);
                            while ($row = $res->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?= $row['application_no'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['contact_no1'] ?></td>
                                    <td><?= $row['personal_email'] ?></td>
                                    <td>
                                        <button class="btn btn-primary">View</button>
                                        <button class="btn btn-danger">Cancel</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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
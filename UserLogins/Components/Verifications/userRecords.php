<?php
include('./inc/autoLoadClasses.inc.php');

$DbhUsers = new Agentsview();
$agentsController = new AgentsController();
$agentsController->deleteRecord();
$agentsController->updateAgentDetails();
$editDetails = new Agentsview();
$editDetails->editDetails();

$active = '';

if (isset($_POST['edit'])) {
    $active = 'active';
}

if (isset($_POST['cancel'])) {
    $active = '';

    echo "<script>
                window.location.href='userRecords.php';
              </script>";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/agentsRecord.css">
    </link>
    <script src="./Js/userRecords.js" defer></script>
    <title>User Records</title>
</head>

<body>
    <h1>User Records</h1>
    <?php if ($editDetails->editDetails()) : ?>
        <?php foreach ($editDetails->editDetails() as $editDetail) : ?>
            <div class="container-overlay <?php echo $active ?>" id="container-overlay">
                <div class="container-agents-data">
                    <h1>Edit Record</h1>
                    <table>
                        <form method="POST">
                            <tr>
                                <td><label>First Name</label></td>
                                <td><input name="firstname" type="text" value="<?php echo $editDetail['first_name']; ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Middle Name</label></td>
                                <td><input type="text" name="middlename" value="<?php echo $editDetail['middle_name']; ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Last Name</label></td>
                                <td><input type="text" name="lastname" value="<?php echo $editDetail['last_name']; ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Username</label></td>
                                <td><input type="text" name="username" value="<?php echo $editDetail['username']; ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Gender</label></td>
                                <td><input type="text" name="gender" value="<?php echo $editDetail['gender']; ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Email</label></td>
                                <td><input type="text" name="email" value="<?php echo $editDetail['email']; ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Department</label></td>
                                <td><input type="text" name="department" value="<?php echo $editDetail['department']; ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Position</label></td>
                                <td><input type="text" name="position" value="<?php echo $editDetail['position']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Password</label></td>
                                <td><input type="text" name="password" value="<?php echo $editDetail['password']; ?>"></td>
                            </tr>
                    </table>

                    <div class="container-button">

                        <input type="submit" class="btn btn-success" name="update" value="Update">
                        <input type="hidden" name="hiddenUpdateId" value="<?php echo $editDetail['id']; ?>">
                        </form>

                        <form action="userRecords.php" method="post">
                            <input type="submit" class="btn btn-danger" name="cancel" value="Cancel">
                            <input type="hidden" name="hiddenCancelId" value="<?php echo $editDetail['id']; ?>">
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>

                </div>
            </div>

            <div class="container-table">
                <table>
                    <thead>
                        <tr class="tr-data">
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>position</th>
                            <th>Password</th>
                            <th class="th-action">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php if ($DbhUsers->showAgentsDetails()) : ?>
                                <?php foreach ($DbhUsers->showAgentsDetails() as $DbhUser) : ?>
                                    <td><?php echo $DbhUser['id']; ?></td>
                                    <td><?php echo $DbhUser['first_name']; ?></td>
                                    <td><?php echo $DbhUser['middle_name']; ?></td>
                                    <td><?php echo $DbhUser['last_name']; ?></td>
                                    <td><?php echo $DbhUser['username']; ?></td>
                                    <td><?php echo $DbhUser['gender']; ?></td>
                                    <td><?php echo $DbhUser['email']; ?></td>
                                    <td><?php echo $DbhUser['department']; ?></td>
                                    <td><?php echo $DbhUser['position']; ?></td>
                                    <td><?php echo $DbhUser['password']; ?></td>
                                    <td class="container-buttons">
                                        <form method="POST">
                                            <input type="submit" class="btn btn-primary" name="edit" id="edit" value="Edit">
                                            <input type="hidden" name="editId" value="<?php echo $DbhUser['id']; ?>">

                                        </form>

                                        <form action="userRecords.php" method="post">
                                            <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                                            <input type="hidden" name="deleteID" value="<?php echo $DbhUser['id']; ?>">
                                        </form>
                                    </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p> post is empty</p>
                <?php endif; ?>
                    </tbody>
                </table>
            </div>
</body>

</html>
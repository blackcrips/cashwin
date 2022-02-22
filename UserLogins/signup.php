<?php
require_once('./inc/autoLoadClassesLogin.inc.php');
$addUser = new AgentsController();
$addUser->addUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    </link>
    <script src="./Js/signup.js" defer></script>
    <title>Sign Up</title>
</head>

<body>
    <div class="signUp" id="signUp">
        <form method="POST">
            <div class="signUp-header">
                <div class="profile-photo"></div>
                <label class="signUp-reminder">Please fill in this form to create an account!</label>
            </div>

            <div class="signUp-information">
                <input type="text" name="first-name" placeholder="First Name">
                <input type="text" name="middle-name" placeholder="Middle Name">
                <input type="text" name="last-name" placeholder="Last Name">
                <input type="text" name="username" placeholder="Username">
                <!-- <input type="select" name="gender" placeholder="Gender"> -->
                <select name="gender">
                    <option class="option" selected hidden value="gender">Gender</option>
                    <option class="option" value="Male">Male</option>
                    <option class="option" value="Female">Female</option>
                </select>
                <input type="email" name="email-address" placeholder="Email Address">
                <!-- <input type="text" name="department" placeholder="Department"> -->
                <select name="department">
                    <option class="option" selected hidden value="department">Department</option>
                    <option class="option" value="Accounts">Accounts</option>
                    <option class="option" value="Collection">Collection</option>
                    <option class="option" value="Compliance">Compliance</option>
                    <option class="option" value="Contracts">Contracts</option>
                    <option class="option" value="Marketing">Marketing</option>
                    <option class="option" value="Reloan">Reloan</option>
                </select>
                <!-- <input type="text" name="position" placeholder="Position"> -->
                <select name="position">
                    <option class="option" selected hidden value="position">Position</option>
                    <option class="option" value="Approver">Approver</option>
                    <option class="option" value="Senior Verification Officer">Senior Verification Officer</option>
                    <option class="option" value="Team Leader">Team Leader</option>
                    <option class="option" value="Verification Officer">Verification Officer</option>
                </select>
                <input type="password" name="first-password" placeholder="Password" id="password">
                <input type="password" name="confirm-password" placeholder="Re-type Password" id="repassword">
                <select name="access" id="access">
                    <option hidden selected value="User">User</option>
                    <option value="Administrator">Administrator</option>
                    <option value="User">User</option>
                </select>
            </div>

            <div class="button-create-account">
                <div class="signup-button">
                    <button type="submit" name="create-user" class="button-submit" id="create-user">Create Account</button>
                </div>

                <div class="container-reminder">
                    <label class="bottom-reminder">Already have an account?
                        <a href="login.php">Login Here</a>
                    </label>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
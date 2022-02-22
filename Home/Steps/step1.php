<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/step1.css">
    <title>Step 1</title>
</head>

<body>
    <div class="step1-container">
        <form action="../inc/step1.inc.php" method="post">
            <div class="step1-wrapper">
                <div class="step1-wrapper-content">
                    <label for="firstname">Firstname:</label>
                    <input type="text" name="firstname" id="firstname" />
                </div>
                <div class="step1-wrapper-content">
                    <label for="middlename">Middlename:</label>
                    <input type="text" name="middlename" id="middlename" />
                </div>
                <div class="step1-wrapper-content">
                    <label for="lastname">Lastname:</label>
                    <input type="text" name="lastname" id="lastname" />
                </div>
            </div>
            <div class="step1-wrapper">
                <div class="step1-wrapper-content">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" />
                </div>
                <div class="step1-wrapper-content">
                    <label for="confirm-email">Confirm email:</label>
                    <input type="text" name="confirm-email" id="confirm-email" />
                </div>
            </div>
            <div class="step1-wrapper">
                <div class="step1-wrapper-content">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" />
                </div>
                <div class="step1-wrapper-content">
                    <label for="confirm-password">Confirm password:</label>
                    <input type="password" name="confirm-password" id="confirm-password" />
                </div>
            </div>
            <div class="step1-wrapper">
                <div class="step1-wrapper-content">
                    <label for="mobile">Mobile number:</label>
                    <input type="text" name="mobile" id="mobile" />
                </div>
                <div class="step1-wrapper-content">
                    <div class="step1-wrapper-content1">
                        <label for="otp">OTP:</label>
                        <input type="text" name="otp" id="otp" />
                    </div>
                    <div class="button">
                        <button class="btn btn-flat pull-right">Resend</button>
                    </div>
                </div>
            </div>

            <div class="send-cancel">
                <button type="submit" class="btn btn-primary" name='submit-create'>Submit</button>
                <!-- <input type="submit" class="btn btn-danger" name='cancel-create' value="Cancel"> -->
                <a href="./login.php">Back</a>
            </div>
        </form>
    </div>

</body>

</html>
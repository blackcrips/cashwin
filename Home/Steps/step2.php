<?php
require_once('../inc/autoLoadClasses.inc.php');
if (!isset($_SESSION)) {
    session_start();
}
$clientView = new NewAppView();
$clientView->getClientData();
$clientController = new NewAppController();
$clientController->updateUser();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/step2.css">
    <title> Application</title>
</head>

<body>
    <div class="step2-body">
        <form method="post" enctype="multipart/form-data">
            <?php foreach ($clientView->getClientData() as $data) :  ?>
                <div class="col-md-12 container-head">
                    <h4 class="col-md-12">Personal Information</h4>
                    <div class="col-md-12 d-flex ">
                        <div class="col-md-4 col-sm-4 d-flex flex-column ">
                            <label for="firstname">Firstname:</label>
                            <input type="text" disabled name="firstname" id="firstname" value="<?php echo $data['firstname'] ?>">
                        </div>

                        <div class="col-md-4 col-sm-4 d-flex flex-column ">
                            <label for="middlename">Middlename:</label>
                            <input type="text" disabled name="middlename" id="middlename" value="<?php echo $data['middlename'] ?>">
                        </div>

                        <div class="col-md-4 col-sm-4 d-flex flex-column ">
                            <label for="lastname">Lastname:</label>
                            <input type="text" disabled name="lastname" id="lastname" value="<?php echo $data['lastname'] ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 d-flex container-head">
                    <div class="col-md-4 d-flex flex-column">
                        <label for="email">Email:</label>
                        <input type="text" disabled id="email" value="<?php echo $data['email'] ?>">
                        <input type="text" hidden name="email" id="email" value="<?php echo $data['email'] ?>">
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <label for="contact-number">Contact number:</label>
                        <input type="text" disabled name="contact-number" id="contact-number" value="<?php echo $data['primary_no'] ?>">
                    </div>
                </div>

                <div class="col-md-12 d-flex container-head">
                    <div class="col-md-4 d-flex flex-column">
                        <label for="house-no">House no.:</label>
                        <input type="text" name="house-no" id="house-no" />
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <label for="street">Street:</label>
                        <input type="text" name="street" id="street" />
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <label for="barangay">Barangay:</label>
                        <input type="text" name="barangay" id="barangay" />
                    </div>
                </div>

                <div class="col-md-12 d-flex container-head">
                    <div class="col-md-4 d-flex flex-column">
                        <label for="city">City:</label>
                        <input type="text" name="city" id="city" />
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <label for="municipality">Municipality:</label>
                        <input type="text" name="municipality" id="municipality" />
                    </div>
                </div>

                <div class="col-md-12 d-flex flex-column container-head">
                    <h4 class="col-md-12">Employment Details</h4>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-4 d-flex flex-column">
                            <label for="company-name">Company/Business Name/Source of Income:</label>
                            <input type="text" name="company-name" id="company-name" />
                        </div>
                        <div class="col-md-4 d-flex flex-column">
                            <label for="company-address">Company Address:</label>
                            <input type="text" name="company-address" id="company-address" />
                        </div>

                        <div class="col-md-4 d-flex flex-column">
                            <label for="company-phone-no">Company Phone No:</label>
                            <input type="text" name="company-phone-no" id="company-phone-no" />
                        </div>

                    </div>
                </div>

                <div class="col-md-12 d-flex container-head">
                    <div class="col-md-4 d-flex flex-column">
                        <label for="joining-date">Joining Date</label>
                        <input type="date" name="joining-date" id="joining-date" />
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <label for="industry">Industry:</label>
                        <input type="text" name="industry" id="industry" />
                    </div>

                    <div class="col-md-4 d-flex flex-column">
                        <label for="position-in-company">Position in Company:</label>
                        <input type="text" name="position-in-company" id="position-in-company" />
                    </div>
                </div>

                <div class="col-md-12 d-flex container-head">
                    <div class="col-md-4 d-flex flex-column">
                        <label for="gross-monthly-income">Gross Monthly Income</label>
                        <input type="text" name="gross-monthly-income" id="gross-monthly-income" />
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <label for="pay-date1">Pay Date 1:</label>
                        <input type="date" name="pay-date1" id="pay-date1" />
                    </div>

                    <div class="col-md-4 d-flex flex-column">
                        <label for="pay-date2">Pay Date 2:</label>
                        <input type="date" name="pay-date2" id="pay-date2" />
                    </div>
                </div>

                <div class="col-md-12 d-flex flex-column container-head">
                    <h4>Loan Details</h4>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-4 d-flex flex-column">
                            <label for="loan-amount">Loan Amount</label>
                            <input type="text" name="loan-amount" id="loan-amount" />
                        </div>
                        <div class="col-md-4 d-flex flex-column">
                            <label for="term-type">Term type:</label>
                            <input type="text" name="term-type" id="term-type" />
                        </div>

                        <div class="col-md-4 d-flex flex-column">
                            <label for="terms">Terms</label>
                            <input type="text" name="terms" id="terms">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 d-flex flex-column container-head">
                    <label>Best Time to Call</label>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-4 d-flex flex-column">
                            <label for="morning">Morning</label>
                            <input type="text" name="morning" id="morning" />
                        </div>
                        <div class="col-md-4 d-flex flex-column">
                            <label for="afternoon">Afternoon</label>
                            <input type="text" name="afternoon" id="afternoon" />
                        </div>
                    </div>
                </div>

                <div class="col-md-12 d-flex  container-head">
                    <div class="file-upload-container col-md-6">
                        <input type="file" name="file-govtid" id="govt-id" />
                        <label>*File type must be maximum of 25mb* - GOV'T ID</label>
                        <input type="file" name="file-coid" />
                        <label>*File type must be maximum of 25mb* - COID</label>
                        <input type="file" name="file-poi" />
                        <label>*File type must be maximum of 25mb* - POI</label>
                    </div>
                    <div class="file-upload-container col-md-6">
                        <input type="file" name="file-pob" />
                        <label>*File type must be maximum of 25mb* - POB</label>
                        <input type="file" name="file-atm" />
                        <label>*File type must be maximum of 25mb* - ATM</label>
                        <input type="file" name="file-others" />
                        <label>*File type must be maximum of 25mb* - OTHERS</label>
                    </div>
                </div>

                <div class="send-cancel">
                    <input type="submit" class="btn btn-primary" name='submit-create' value="Submit">
                    <!-- <input type="submit" class="btn btn-danger" name='cancel-create' value="Cancel"> -->
                    <a href="../inc/signUpSuccess.inc.php">Back</a>

                </div>
            <?php endforeach; ?>
        </form>
    </div>
</body>

</html>
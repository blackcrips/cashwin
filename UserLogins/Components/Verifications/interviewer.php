<?php
require_once('../../inc/autoLoadClasses.inc.php');
session_start();
$clientsController = new ClientsController();
$clientsView = new ClientsView();
$bankNames = new BankAccountsView();
$bankNames->bankname_dropdown();
$clientsView->editClient();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Css/interviewer.css">
    <script src="../../Js/interviewer.js" defer></script>
    <script src="../../moment/moment.min.js"></script>
    <title>Clients information</title>
</head>

<body>
    <div class="container-body">
        <div class="container-header">
            <div class="container-header-content">
                <div class="header header-first">
                    <label>CLIENTS INFROMATION </label>
                </div>
                <div class="header header-second">
                    <label>Do not forget to fill up everything</p>
                </div>
            </div>

            <div class="navigation-box">
                <div id="navigation-content">
                    <div data-tab-target="#personal-information" class="active tab" id="li1">Personal Information</div>
                    <div data-tab-target="#job-description" class="tab" id="li2">Job Description</div>
                    <div data-tab-target="#loan-history" class="tab" id="li3">Loan History</div>
                    <div data-tab-target="#loan-and-bank-details" class="tab" id="li4">Loan and bank details</div>
                    <div data-tab-target="#character-references" class="tab" id="li5">Character references</div>
                </div>
            </div>
        </div>

        <div class="container-information">

            <form action="../../inc/interviewer.inc.php" id="form" method="POST">
                <?php foreach ($clientsView->showForEditDetails($_SESSION['editClient']['id']) as $key) : ?>
                    <div id="tab-content">
                        <div id="personal-information" data-tab-content class="active">
                            <div class="label-header">
                                <label>PERSONAL INFORMATION</label>
                            </div>

                            <div class="container-flexbox-name">
                                <div class="clients-name">
                                    <label id="clients-name">Name <span style="color:red">*</span></label>
                                </div>

                                <div class="full-name-box">
                                    <div class="first-name-box">
                                        <input type="text" id="first-name" data-validation name='firstname' value="<?php echo $key['firstname'] ?>">
                                        <label for="first-name" class="first-name">First Name</label>
                                    </div>

                                    <div class="middle-name-box">
                                        <input type="text" id="middle-name" name='middlename' value="<?php echo $key['middlename'] ?>">
                                        <label for="middle-name" class="middle-name">Middle Name</label>
                                    </div>

                                    <div class="last-name-box">
                                        <input type="text" id="last-name" name='lastname' value="<?php echo $key['lastname'] ?>">
                                        <label for="last-name" class="last-name">Last Name</label>
                                    </div>
                                </div>

                            </div>

                            <div class="container-flexbox">
                                <div class="information-details-split">
                                    <div class="birthday-box">
                                        <div class="birthday-child">
                                            <input type="date" name="birthday" id='birthday' value="<?php echo $key['birthday'] ?>">
                                            <span id="birthday-span">asdf </span>
                                        </div>
                                        <div class="birthday-label">
                                            <label for="birthday" class="last-name">Birthday</label>
                                        </div>
                                    </div>


                                    <div class="container-gender details-first-column">
                                        <select name="gender" id="gender" data-validation>
                                            <option hidden selected value="<?php echo $key['gender'] ?>"><?php echo $key['gender'] ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <label for="gender">Gender</label>
                                    </div>
                                    <div class="container-dependent details-first-column">
                                        <input type="text" name="dependent" data-validation value="<?php echo $key['dependent'] ?>">
                                        <label for="dependent">Dependent</label>
                                    </div>
                                    <div class="container-email details-first-column">
                                        <input type="text" name="email" data-validation value="<?php echo $key['email'] ?>">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="container-alternate-email details-first-column">
                                        <input type="text" name="alternate-email" value="<?php echo $key['alternate_email'] ?>">
                                        <label for="alternate-email">Alternate Email</label>
                                    </div>
                                    <div class="container-facebook-link details-first-column">
                                        <input type="text" name="facebook-link" data-validation value="<?php echo $key['facebook'] ?>">
                                        <label for="facebook-link">Facebook link</label>
                                    </div>
                                    <div class="container-place-of-birth details-first-column">
                                        <input type="text" name="place-of-birth" value="<?php echo $key['place_of_birth'] ?>">
                                        <label for="place-of-birth">Place of birth</label>
                                    </div>
                                </div>
                            </div>

                            <div class="container-flexbox">
                                <div class="civil-status-tag">
                                    <label>Civil Status <span style="color:red">*</span></label>
                                </div>
                                <div class="civil-status-option">
                                    <div class="status-single">
                                        <label for="civil-status-single">
                                            <input type="radio" name="civil-status" id="civil-status-single" value='Single' <?php if ($key['civil_status'] == 'Single' || $key['civil_status'] == '') {
                                                                                                                                echo 'Checked ';
                                                                                                                            } ?>> Single
                                        </label>
                                    </div>

                                    <div class=" status-married">
                                        <label for="civil-status-married">
                                            <input type="radio" name="civil-status" id="civil-status-married" value='Married' <?php if ($key['civil_status'] == 'Married') {
                                                                                                                                    echo 'Checked ';
                                                                                                                                } ?>> Married
                                        </label>
                                    </div>

                                    <div class="status-widowed">
                                        <label for="civil-status-widowed">
                                            <input type="radio" name="civil-status" id="civil-status-widowed" value='Widowed' <?php if ($key['civil_status'] == 'Widowed') {
                                                                                                                                    echo 'Checked ';
                                                                                                                                } ?>> Widowed
                                        </label>
                                    </div>

                                    <div class="status-separated">
                                        <label for="civil-status-separated">
                                            <input type="radio" name="civil-status" id="civil-status-separated" value='Separated' <?php if ($key['civil_status'] == 'Separated') {
                                                                                                                                        echo 'Checked ';
                                                                                                                                    } ?>> Separated
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="container-flexbox">
                                <div class="personal-number-tag">
                                    <label>Primary Number <span style="color:red">*</span></label>
                                </div>

                                <div class="personal-number-box">
                                    <div class="contact-number">
                                        <input type="text" id="primary-number" data-validation name="primary-number" value="<?php echo $key['primary_no'] ?>">
                                        <label for="primary-number">Contact Number</label>
                                    </div>

                                    <div class="postpaid-prepaid-box">
                                        <label for="postpaid">
                                            <input type="radio" name="postpaid-prepaid" id="postpaid" value='Postpaid' <?php if ($key['primary_no_line'] == 'Postpaid' || $key['primary_no_line'] == '') {
                                                                                                                            echo 'Checked ';
                                                                                                                        } ?>> Postpaid
                                        </label>

                                        <label for="prepaid">
                                            <input type="radio" name="postpaid-prepaid" id="prepaid" value='Prepaid' <?php if ($key['primary_no_line'] == 'Prepaid') {
                                                                                                                            echo 'Checked ';
                                                                                                                        } ?>> Prepaid
                                        </label>
                                    </div>

                                    <div class="postpaid-plan-box">
                                        <input data-expenses type="Number" id="postpaid-plan" name="postpaid-plan" value="<?php $key['primary_no_plan_amount']; ?>">
                                        <label for="postpaid-plan">How much plan?</label>
                                    </div>

                                    <div class="primary-number-remarks">
                                        <input type="text" id="primary-number-remarks" name="primary-number-remarks" value="<?php echo $key['primary_no_remarks']; ?>">
                                        <label for="primary-number-remarks">Remarks</label>
                                    </div>
                                </div>
                            </div>

                            <div class="container-flexbox">
                                <div class="personal-number-tag">
                                    <label>Secondary Number <span style="color:red">*</span></label>
                                </div>

                                <div class="alternate-number-box">
                                    <div class="contact-number">
                                        <input type="text" data-validation id="alternate-number" name="alternate-number" value="<?php echo $key['secondary_no']; ?>">
                                        <label for="alternate-number">Contact Number</label>
                                    </div>

                                    <div class="postpaid-prepaid-box">
                                        <label for="postpaid-alternate">
                                            <input type="radio" name="postpaid-prepaid-alternate" id="postpaid-alternate" value='Postpaid' <?php if ($key['secondary_no_line'] == 'Postpaid' || $key['secondary_no_line'] == '') {
                                                                                                                                                echo 'Checked ';
                                                                                                                                            } ?>> Postpaid
                                        </label>

                                        <label for="prepaid-alternate">
                                            <input type="radio" name="postpaid-prepaid-alternate" id="prepaid-alternate" value='Prepaid' <?php if ($key['secondary_no_line'] == 'Prepaid') {
                                                                                                                                                echo 'Checked ';
                                                                                                                                            } ?>> Prepaid
                                        </label>
                                    </div>

                                    <div class="postpaid-plan-box">
                                        <input data-expenses type="Number" id="postpaid-plan-alternate" name="postpaid-plan-alternate" value="<?php $key['secondary_no_plan_amount']; ?>">
                                        <label for="postpaid-plan-alternate">How much plan?</label>
                                    </div>

                                    <div class="alternate-number-remarks">
                                        <input type="text" id="alternate-number-remarks" name="alternate-number-remarks" value="<?php echo $key['secondary_no_remarks']; ?>">
                                        <label for="alternate-number-remarks">Remarks</label>
                                    </div>
                                </div>
                            </div>

                            <div class="container-flexbox">
                                <div class="present-address-tag">
                                    <label>Present Address <span style="color:red">*</span></label>
                                </div>

                                <div class="present-address-box">
                                    <div class="house-number-box">
                                        <input type="text" id="house-number" data-validation name="house-number" value="<?php echo $key['house_no']; ?>">
                                        <label for="house-number">House number and subdivision</label>
                                    </div>

                                    <div class="street-box">
                                        <input type="text" id="street" data-validation name="street" value="<?php echo $key['street']; ?>">
                                        <label for="street">Street</label>
                                    </div>

                                    <div class="barangay-box">
                                        <input type="text" id="barangay" data-validation name="barangay" value="<?php echo $key['barangay']; ?>">
                                        <label for="barangay">Barangay</label>
                                    </div>

                                    <div class="city-box">
                                        <input type="text" id="city" name="city" data-validation value="<?php echo $key['city']; ?>">
                                        <label for="city">City</label>
                                    </div>

                                    <div class="municipality-box">
                                        <input type="text" id="municipality" data-validation name="municipality" value="<?php echo $key['municipality']; ?>">
                                        <label for="municipality">Municipality</label>
                                    </div>

                                    <div class="zip-code-box">
                                        <input type="text" id="zip-code" data-validation name="zip-code" value="<?php echo $key['zip_code']; ?>">
                                        <label for="zip-code">Zip Code</label>
                                    </div>

                                    <div class="address-remarks-box">
                                        <input type="text" id="address-remarks" name="address-remarks" value="<?php echo $key['address_remarks']; ?>">
                                        <label for="address-remarks">Remarks</label>
                                    </div>

                                    <div class="map-link-box">
                                        <input type="text" id="map-link" data-validation name="map-link" value="<?php echo $key['map_link']; ?>">
                                        <label for="map-link">Map link</label>
                                    </div>
                                </div>
                            </div>

                            <div class="container-flexbox">
                                <div class="permanent-address-tag">
                                    <label>Permanent address <span style="color:red">*</span></label>
                                </div>

                                <div class="permanent-address-box">
                                    <input type="text" id="permanent-address" data-validation name="permanent-address" value="<?php echo $key['permanent_address']; ?>">
                                    <label for="permanent-address">Address</label>
                                </div>

                                <div class="sss-number-box">
                                    <input type="text" id="sss-number" data-validation name="sss-number" value="<?php echo $key['sss_no']; ?>">
                                    <label for="sss-number">SSS/CRN/TIN number </label>
                                </div>
                            </div>

                            <div class="container-flexbox">
                                <div class="others-tag">
                                    <label>Others <span style="color:red">*</span></label>
                                </div>

                                <div class="others-husband-box">
                                    <div class="husband-name-box">
                                        <input type="type" id="husband-name" data-validation name="husband-name" value="<?php echo $key['spouse_name']; ?>">
                                        <label for="husband-name">Husband/Spouse name</label>
                                    </div>

                                    <div class="husband-work-box">
                                        <input type="type" id="husband-work" name="husband-work" value="<?php echo $key['spouse_occupation']; ?>">
                                        <label for="husband-work">Occupation</label>
                                    </div>

                                    <div class="husband-remarks-box">
                                        <input type="type" id="husband-remarks" name="husband-remarks" value="<?php echo $key['spouse_remarks']; ?>">
                                        <label for="husband-remarks">Remarks</label>
                                    </div>
                                </div>

                                <div class="others-mother-box">
                                    <div class="mother-name-box">
                                        <input type="type" id="mother-name" data-validation name="mother-name" value="<?php echo $key['mothers_name']; ?>">
                                        <label for="mother-name">Mother's maiden name</label>
                                    </div>

                                    <div class="mother-work-box">
                                        <input type="type" id="mother-work" name="mother-work" value="<?php echo $key['mothers_occupation']; ?>">
                                        <label for="mother-work">Occupation</label>
                                    </div>

                                    <div class="mother-address-box">
                                        <input type="type" id="mother-address" name="mother-address" value="<?php echo $key['mothers_address']; ?>">
                                        <label for="mother-address">Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--container personal information end div-->



                        <div id="job-description" data-tab-content>
                            <div class="label-header">
                                <label>Job Description</label>
                            </div>

                            <div class="flex-box-9">
                                <div class="company-information-tag">
                                    <label>Company Information <span style="color:red">*</span></label>
                                </div>

                                <div class="company-container">
                                    <div class="company-name-box">
                                        <input type="text" id="company-name" data-validation name="company-name" value="<?php echo $key['company_name']; ?>">
                                        <label for="company-name">Company name</label>
                                    </div>

                                    <div class="company-address-box">
                                        <input type="text" id="company-address" data-validation name="company-address" value="<?php echo $key['company_address']; ?>">
                                        <label for="company-address">Company address</label>
                                    </div>

                                    <div class="agency-name-box">
                                        <input type="text" id="agency-name" data-validation name="agency-name" value="<?php echo $key['agency_name']; ?>">
                                        <label for="agency-name">Agency name</label>
                                    </div>

                                    <div class="branch-site-address-box">
                                        <input type="text" id="branch-site-address" data-validation name="branch-site-address" value="<?php echo $key['branch_site_address']; ?>">
                                        <label for="branch-site-address">Branch site address</label>
                                    </div>

                                    <div class="line-of-business-box">
                                        <input type="text" id="line-of-business" data-validation name="line-of-business" value="<?php echo $key['line_of_business']; ?>">
                                        <label for="line-of-business">Line of business</label>
                                    </div>
                                </div>
                            </div>


                            <div class="company-number-tag">
                                <label>Company contact number <span style="color:red">*</span></label>
                            </div>

                            <div class="employer-number-box">
                                <div class="employer-contact-number">
                                    <input type="text" id="company-no1" name="company-no1" data-validation value="<?php echo $key['company_no1']; ?>">
                                    <label for="employer-contact-number">Contact number 1</label>
                                </div>

                                <div class="employer-alternate-number-box">
                                    <input type="text" id="company-no2" name="company-no2" value="<?php echo $key['company_no2']; ?>">
                                    <label for="employer-alternate-number">Contact number 2</label>
                                </div>
                            </div>

                            <div class="flex-box-10">
                                <div class="date-hire-tag">
                                    <label class="date-hire">Date hired <span style="color:red">*</span></label>
                                </div>
                                <div class="date-hire-inside">
                                    <input type="date" name="date-hire" data-validation id='date-hire' value="<?php echo $key['date_hired']; ?>">
                                    <span id="date-hire-span"></span>
                                </div>
                            </div>

                            <div class="flex-box-11">
                                <div class="position-box">
                                    <input type="text" id="position" data-validation name="position" value="<?php echo $key['position']; ?>">
                                    <label for="position">Position</label>
                                </div>

                                <div class="nature-of-work-box">
                                    <input type="text" name="nature-of-work" data-validation id="nature-of-work" value="<?php echo $key['nature_of_work']; ?>">
                                    <label for="nature-of-work">Nature of work</label>
                                </div>
                            </div>


                            <div class="flex-box-12">
                                <div class="employment-status-tag">
                                    <label>Status <span style="color:red">*</span></label>
                                </div>

                                <div class="employment-status-container">
                                    <div class="status-regular-box">
                                        <label for="status-regular">
                                            <input type="radio" name="company-status" id="status-regular" value='Regular' <?php if ($key['status_in_company'] == 'Regular' || $key['status_in_company'] == '') {
                                                                                                                                echo 'Checked ';
                                                                                                                            } ?>> Regular
                                        </label>
                                    </div>

                                    <div class="status-probationary-box">
                                        <label for="status-probationary">
                                            <input type="radio" name="company-status" id="status-probationary" value='Probationary' <?php if ($key['status_in_company'] == 'Probationary') {
                                                                                                                                        echo 'Checked ';
                                                                                                                                    } ?>> Probationary
                                        </label>
                                    </div>

                                    <div class="status-freelance-box">
                                        <label for="status-freelance">
                                            <input type="radio" name="company-status" id="status-freelance" value='Freelancer' <?php if ($key['status_in_company'] == 'Freelancer') {
                                                                                                                                    echo 'Checked ';
                                                                                                                                } ?>> Freelancer
                                        </label>
                                    </div>

                                    <div class="status-others-box">
                                        <label for="status-others">
                                            <input type="radio" name="company-status" id="status-others" value='Others' <?php if ($key['status_in_company'] == 'Others') {
                                                                                                                            echo 'Checked ';
                                                                                                                        } ?>> Others
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-box-13">
                                <div class="salary-tag">
                                    <label>Salary <span style="color:red">*</span></label>
                                </div>

                                <div class="container-salary">
                                    <div class="basic-box">
                                        <input type="text" name="basic-salary" data-validation id="basic" value="<?php echo $key['basic_salary']; ?>">
                                        <label for="basic">Basic</label>
                                    </div>

                                    <div class="net-1-box">
                                        <input data-inputnet name="net-1" type="number" id="net-1" value="<?php echo $key['salary1']; ?>">
                                        <label for="net-1">Net pay 1</label>
                                    </div>

                                    <div class="net-2-box">
                                        <input data-inputnet name="net-2" type="number" id="net-2" value="<?php echo $key['salary2']; ?>">
                                        <label for="net-2">Net pay 2</label>
                                    </div>

                                    <div class="net-3-box">
                                        <input data-inputnet name="net-3" type="number" id="net-3" value="<?php echo $key['salary3']; ?>">
                                        <label for="net-3">Net pay 3</label>
                                    </div>

                                    <div class="net-4-box">
                                        <input data-inputnet name="net-4" type="number" id="net-4" value="<?php echo $key['salary4']; ?>">
                                        <label for="net-4">Net pay 4</label>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-box-14">
                                <div class="payroll-tag">
                                    <label class="payroll">Payroll Date <span style="color:red">*</span></label>
                                </div>

                                <div class="container-payroll">
                                    <div class="container-payroll-type">
                                        <select type="text" data-validation name="payroll-type" id="payroll-type">
                                            <option hidden selected value="<?php echo $key['payroll_type']; ?>"><?php echo $key['payroll_type']; ?></option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Bi-weekly">Bi-weekly</option>
                                            <option value="Weekly">Weekly</option>
                                        </select>
                                        <label for="payroll-type">Payroll Type</label>
                                    </div>

                                    <div class="container-payroll-date">
                                        <input type="text" name="payroll-date1" data-validation id="payroll-date-1" value="<?php echo $key['paydate1']; ?>">

                                        </input>
                                        <label for="payroll-date-1" class="payroll-date-1">Date 1</label>
                                    </div>

                                    <div class="container-payroll-date">
                                        <input type="text" name="payroll-date2" id="payroll-date-2" value="<?php echo $key['paydate2']; ?>">

                                        </input>
                                        <label for="payroll-date-2" class="payroll-date-2">Date 2</label>
                                    </div>

                                    <div class="container-payroll-date">
                                        <input type="text" name="payroll-date3" id="payroll-date-3" value="<?php echo $key['paydate3']; ?>">

                                        </input>
                                        <label for="payroll-date-3" class="payroll-date-3">Date 3</label>
                                    </div>
                                    <div class="container-payroll-date">
                                        <input type="text" name="payroll-date4" id="payroll-date-4" value="<?php echo $key['paydate4']; ?>">

                                        </input>
                                        <label for="payroll-date-4" class="payroll-date-4">Date 4</label>
                                    </div>
                                </div>

                                <div class="resignation-container">
                                    <input type="text" name='plan-to-transfer' id="plan-to-transfer" value="<?php echo $key['job_description_remarks']; ?>">
                                    <label for="resignation" class="resignation">Any plan to transfer company? / Remarks</label>
                                </div>
                            </div>
                        </div> <!-- End of container job information -->

                        <div id="loan-history" data-tab-content>
                            <div class="loan-history-content">
                                <div class="label-header">
                                    <label>Loan history</label>
                                </div>

                                <div class="loan-history-box">
                                    <div class="loan-history-box-content">
                                        <div class="sample-div">
                                            <label for="1st-loan">Name</label>
                                            <input type="text" name="loan-history1" data-validation id="1st-loan" value="<?php echo $key['history_name1']; ?>">
                                        </div>
                                        <div class="sample-div">
                                            <label for="amount-1">Amount</label>
                                            <input data-expenses name="loan-amount1" type="number" id="amount-1" value="<?php echo $key['history_amount1']; ?>">
                                        </div>
                                    </div>

                                    <div class="loan-history-box-content">
                                        <div class="sample-div">
                                            <label for="2nd-loan">Name</label>
                                            <input type="text" name="loan-history2" id="2nd-loan" value="<?php echo $key['history_name2']; ?>">
                                        </div>
                                        <div class="sample-div">
                                            <label for="amount-2">Amount</label>
                                            <input data-expenses name="loan-amount2" type="number" id="amount-2" value="<?php echo $key['history_amount2']; ?>">
                                        </div>
                                    </div>

                                    <div class="loan-history-box-content">
                                        <div class="sample-div">
                                            <label for="3rd-loan">Name</label>
                                            <input type="text" name="loan-history3" id="3rd-loan" value="<?php echo $key['history_name3']; ?>">
                                        </div>
                                        <div class="sample-div">
                                            <label for="amount-3">Amount</label>
                                            <input data-expenses name="loan-amount3" type="number" id="amount-3" value="<?php echo $key['history_amount3']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End of loan history-->

                        <div id="loan-and-bank-details" data-tab-content>
                            <div class="label-header">
                                <label>Loan and bank details</label>
                            </div>

                            <div class="loan-and-bank-details-box">
                                <div class="container-left">
                                    <div class="loan-details-tag">
                                        <label>Loan details <span style="color:red">*</span></label>
                                    </div>

                                    <div class="loan-details-box">
                                        <input type="text" name="requested-amount" data-validation id="requested-loan" value="<?php echo $key['requested_amount']; ?>">
                                        <label for="requested-loan">Requested loan amount</label>

                                        <select type="text" name="requested-term" data-validation id="requested-term">
                                            <option hidden selected value="<?php echo $key['requested_term']; ?>"><?php echo $key['requested_term']; ?></option>
                                            <option value="Weekly-2">Weekly-2</option>
                                            <option value="Weekly-3">weekly-3</option>
                                            <option value="Weekly-4">Weekly-4</option>
                                            <option value="Weekly-5">Weekly-5</option>
                                            <option value="Bi-weekly-1">Bi-weekly-1</option>
                                            <option value="Bi-weekly-2">Bi-weekly-2</option>
                                            <option value="Bi-weekly-3">Bi-weekly-3</option>
                                        </select>
                                        <label for="requested-term">Requested loan term</label>

                                        <select type="text" name="purpose-of-loan" data-validation id="purpose-of-loan">
                                            <option hidden selected value="<?php echo $key['purpose_of_loan']; ?>"><?php echo $key['purpose_of_loan']; ?></option>
                                        </select>
                                        <label for="purpose-of-loan">Purpose of loan</label>
                                    </div>

                                    <div class="bank-account-tag">
                                        <label>Bank account information <span style="color:red">*</span></label>
                                    </div>

                                    <div class="container-bank-account">
                                        <div class="bank-account-box">
                                            <select name="primary-bank" data-validation id="bank-name">

                                                <?php if ($bankNames->bankname_dropdown()) : ?>
                                                    <?php foreach ($bankNames->bankname_dropdown() as $bankName) : ?>
                                                        <option hidden selected value="<?php echo $key['primary_bank']; ?>"><?php echo $key['primary_bank']; ?></option>
                                                        <option value="<?php echo $bankName['name'] ?>"><?php echo $bankName['name'] ?></option>

                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>

                                            <input type='text' name="destination-account" id="destination-account" disabled value="">
                                            <label for="bank-name">Bank name</label>
                                        </div>

                                        <div class="bank-account-box">
                                            <input type="text" name="account-number" data-validation id="account-number" value="<?php echo $key['primary_bank_no']; ?>">
                                            <input type='text' disabled id="account-number-count" value="">
                                            <label for="account-number">Account number</label>
                                        </div>
                                    </div>

                                    <div class="alternate-bank-account-tag">
                                        <label>Alternate bank account <span style="color:red">*</span></label>
                                    </div>

                                    <div class="container-alternate-bank">
                                        <div class="alternate-bank-account-box">
                                            <select id="alternate-bank-name" name="alternate-bank-name">

                                                <?php if ($bankNames->bankname_dropdown()) : ?>
                                                    <?php foreach ($bankNames->bankname_dropdown() as $bankName) : ?>
                                                        <option hidden selected value="<?php echo $key['alternate_bank']; ?>"><?php echo $key['alternate_bank']; ?></option>
                                                        <option value="<?php echo $bankName['name'] ?>"><?php echo $bankName['name'] ?></option>

                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                            <input type='text' disabled id="alternate-destination-account">
                                            <label for="alternate-bank-name">Alternate bank name</label>
                                        </div>

                                        <div class="alternate-bank-account-box">
                                            <input type="text" name="alternate-account-number" id="alternate-account-number" value="<?php echo $key['alternate_bank_no']; ?>">
                                            <input type='text' disabled id="alternate-account-number-count">
                                            <label for="alternate-account-number">Alternate account number</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-right">
                                    <div class="container-expneses">
                                        <div class="container-original-net">
                                            <input class="netpay" name="netpay" id="original-net" value="<?php echo $key['netpay']; ?>">
                                            <label>Net pay</label>
                                        </div>

                                        <div class="container-unofficial-expenses">
                                            <input class="netpay" name="unofficial-expenses" disabled id="unofficial-expenses" />
                                            <label>Expenses</label>
                                        </div>

                                        <div class="container-additional-expenses">
                                            <input data-expenses type="number" name=' additional-expenses' id="additional-expenses" value="<?php echo $key['additional_expenses']; ?>">
                                            <label><em><u>Additional expenses</u></em></label>
                                        </div>
                                        <div class="total-netpay">
                                            <input class="netpay" type="text" name="total-net" disabled id="total-net" />
                                            <label>Total Net pay</label>
                                        </div>

                                    </div>

                                    <div class="container-approve-disbursement">
                                        <div class="approve-box">
                                            <input type="number" name="approve-amount" data-validation id="approve-amount" value="<?php echo $key['approve_amount']; ?>">
                                            <label for="approve-amount">Approve amount</label>
                                        </div>

                                        <div class="disbursement-box">
                                            <input type="date" id="disbursement-date" data-validation name="disbursement-date" value="<?php echo $key['disbursement_date']; ?>">
                                            <label for="disbursement-date">Disbursement date</label>
                                        </div>
                                    </div>

                                    <select type="text" id="approve-term" data-validation name="approve-term">
                                        <option hidden selected value="<?php echo $key['approve_term']; ?>"><?php echo $key['approve_term']; ?></option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Weekly-2">Weekly-2</option>
                                        <option value="Weekly-3">weekly-3</option>
                                        <option value="Weekly-4">Weekly-4</option>
                                        <option value="Weekly-5">Weekly-5</option>
                                        <option value="Bi-weekly-1">Bi-weekly-1</option>
                                        <option value="Bi-weekly-2">Bi-weekly-2</option>
                                        <option value="Bi-weekly-3">Bi-weekly-3</option>
                                    </select>
                                    <label for="approve-term">Approve term</label>

                                    <div class="container-due-date">
                                        <div class="first-due-date due-date-hide" id="first-due-date">
                                            <div class="first-due-date-container">
                                                <input type="text" id="due-dates" name="due-dates" disabled>
                                                <label>1st due date</label>
                                            </div>

                                            <div class="first-due-date-payment">
                                                <input type="text" id="payment" name="payment" disabled>
                                                <label>Amount</label>
                                            </div>

                                        </div>

                                        <div class="second-due-date due-date-hide" id="second-due-date">
                                            <div class="second-due-date-container">
                                                <input type="text" id="due-dates" name="due-dates" disabled>
                                                <label>2nd due date</label>
                                            </div>

                                            <div class="second-due-date-payment">
                                                <input type="text" id="payment" disabled>
                                                <label>Amount</label>
                                            </div>

                                        </div>

                                        <div class="third-due-date due-date-hide" id="third-due-date">
                                            <div class="third-due-date-container">
                                                <input type="text" id="due-dates" disabled>
                                                <label>3rd due date</label>
                                            </div>

                                            <div class="third-due-date-payment">
                                                <input type="text" id="payment" disabled>
                                                <label>Amount</label>
                                            </div>

                                        </div>

                                        <div class="fourth-due-date due-date-hide" id="fourth-due-date">
                                            <div class="fourth-due-date-container">
                                                <input type="text" id="due-dates" disabled>
                                                <label>4th due date</label>
                                            </div>

                                            <div class="fourth-due-date-payment">
                                                <input type="text" id="payment" disabled>
                                                <label>Amount</label>
                                            </div>

                                        </div>

                                        <div class="fifth-due-date due-date-hide" id="fifth-due-date">
                                            <div class="fifth-due-date-container">
                                                <input type="text" id="due-dates" disabled>
                                                <label>5th due date</label>
                                            </div>

                                            <div class="fifth-due-date-payment">
                                                <input type="text" id="payment" disabled>
                                                <label>Amount</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="container-interest-tax">
                                        <div class="container-interest-tax">
                                            <div class="interest-rate-box">
                                                <input type="text" id="interest-rate" name="interest-rate" disabled>
                                                <label for="interest-rate">Interest rate</label>
                                            </div>

                                            <div class="processing-fee-box">
                                                <input type="text" id="processing-fee" name="processing-fee" disabled value="10%">
                                                <label for="processing-fee">Processing fee</label>
                                            </div>
                                        </div>

                                        <div class="container-disburse-payment">
                                            <div class="disburse-amount-box">
                                                <input type="text" id="disburse-amount" name="disburse-amount" disabled>
                                                <label for="disburse-amount">Disburse amount</label>
                                            </div>

                                            <div class="total-payment-box">
                                                <input type="text" id="total-payment" name="total-payment" disabled>
                                                <label for="total-payment">Total paymet</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- End of Loan and bank Details-->

                        <div id="character-references" data-tab-content>
                            <div class="label-header">
                                <label>Character References</label>
                            </div>

                            <div class="references-tag">
                                <label>Character references <span style="color:red">*</span></label>
                            </div>

                            <div class="flex-box-15">
                                <div class="container-box-1">
                                    <div class="reference-box-1">
                                        <input type="text" id="reference-1" data-validation name="reference-1" value="<?php echo $key['char_ref1_name']; ?>">
                                        <label for="reference-1">Character reference 1</label>
                                    </div>

                                    <div class="reference-box-1">
                                        <input type="text" id="reference-number-1" data-validation name="reference-number-1" value="<?php echo $key['char_ref1_no']; ?>">
                                        <label for="reference-number-1">Contact number</label>
                                    </div>

                                    <div class="reference-box-1">
                                        <input type="text" id="reference-relationship-1" data-validation name="reference-relationship-1" value="<?php echo $key['char_ref1_relationship']; ?>">
                                        <label for="reference-relationship-1">Relationship</label>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-box-16">
                                <div class="container-box-1">
                                    <div class="reference-box-1">
                                        <input type="text" id="reference-2" data-validation name="reference-2" value="<?php echo $key['char_ref2_name']; ?>">
                                        <label for="reference-2">Character reference 2</label>
                                    </div>

                                    <div class="reference-box-1">
                                        <input type="text" id="reference-number-2" data-validation name="reference-number-2" value="<?php echo $key['char_ref2_no']; ?>">
                                        <label for="reference-number-2">Contact number</label>
                                    </div>

                                    <div class="reference-box-1">
                                        <input type="text" id="reference-relationship-2" data-validation name="reference-relationship-2" value="<?php echo $key['char_ref2_relationship']; ?>">
                                        <label for="reference-relationship-2">Relationship</label>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-box-17">
                                <div class="container-box-1">
                                    <div class="reference-box-1">
                                        <input type="text" id="reference-3" data-validation name="reference-3" value="<?php echo $key['char_ref3_name']; ?>">
                                        <label for="reference-3">Character reference 3</label>
                                    </div>

                                    <div class="reference-box-1">
                                        <input type="text" id="reference-number-3" data-validation name="reference-number-3" value="<?php echo $key['char_ref3_no']; ?>">
                                        <label for="reference-number-3">Contact number</label>
                                    </div>

                                    <div class="reference-box-1">
                                        <input type="text" id="reference-relationship-3" data-validation name="reference-relationship-3" value="<?php echo $key['char_ref3_relationship']; ?>">
                                        <label for="reference-relationship-3">Relationship</label>
                                        <input type="text" name="application-no" hidden value="<?php echo $key['application_no']; ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="save-and-back">
                                <div class="container-message">
                                    <span id="message"></span>
                                </div>
                                <div class="container-button" id="container-button">
                                    <button type="button" id="next" class="btn btn-primary">Save</button>
                                    <button type='button' id="back" class="btn btn-danger">Back</button>
                                </div>
                            </div>

                        </div>
                        <!--End of Character References-->
                    </div> <!-- End of clients-information-general-box -->
                <?php endforeach; ?>
            </form>

        </div>
    </div>

</body>

</html>
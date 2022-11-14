<?php

class ClientsController extends DbhModelClients
{

    // Delete single data from dabase
    public function delete_user()
    {
        if (isset($_GET['delete'])) {
            $id = intVal($_GET['delete']);

            $this->delete_single_user($id);
            header("Location: verifierDashboard.php");
        }
    }

    // function to transfer client in to inprocess tab
    public function transfer_fresh()
    {

        $action = "Transferred From Fresh to In Process bucket";
        $status = "In Process";

        if (isset($_POST['btnInprocess'])) {
            $applicationNo = $_POST['save-id'];
            $verifier = $_SESSION['userData']['name'];
            $dateForwarded = '';
            $this->update_single_user($status, $verifier,$remarks, $dateForwarded, $applicationNo);
            $this->addClientsHistory($applicationNo, $action);
        }
    }

    // direct access of dashboard
    // redirecting to login.php if no session has been set
    public function direct_dashboard()
    {
        if (isset($_SESSION['userData']) == '') {
            header('location: ../../login.php');
        }
    }

    public function saveRemarksandAttachment($applicationNo, $remarks)
    {
        if ($remarks == "") {

            $this->transfer_fresh();

            echo "<script>alert('Check inprocess tab')</script>";
            echo "<script>window.location.href = '../login.php'</script>";
            return;
        } else {
            $fileGovtId = $_FILES['file-govtid'];
            $fileCoid = $_FILES['file-coid'];
            $filePoi = $_FILES['file-poi'];
            $filePob = $_FILES['file-pob'];
            $fileAtm = $_FILES['file-atm'];
            $fileOthers = $_FILES['file-others'];
            $filesUploaded = [
                $fileGovtId,
                $fileCoid,
                $filePoi,
                $filePob,
                $fileAtm,
                $fileOthers
            ];
            $this->upLoadAttachments($filesUploaded, $applicationNo);
            $action = "Added remarks // " . $remarks;
            $oldRemark = $this->get_specific_client_details($applicationNo);
            if ($oldRemark[0]['remarks'] == $remarks) {
                $action = "Added file // ";
                $this->addClientsHistory($applicationNo, $action);
            } else {
                $action = "Added remarks // " . $remarks;
                $this->addClientsHistory($applicationNo, $action);
                $this->update_remarks($remarks, $applicationNo);
            }

            echo "<script>alert('Remarks save!')</script>";
            header("Refresh: 0");
            return;
        }
    }

    private function upLoadAttachments($filesUploaded, $applicationNo)
    {
        $clientToSave = $this->get_specific_client_details($applicationNo);

        for ($i = 0; $i < count($filesUploaded); $i++) {
            if ($filesUploaded[$i]['name'] == "") {
                continue;
            } else {
                date_default_timezone_set("Asia/Taipei");
                $loggedInUser = $_SESSION['userData']['name'];
                $applicationHistory = "Uploaded files by {$loggedInUser} " . date('Y-m-d h:i:sa', strtotime('now')) . " // ";
                $this->attachments($filesUploaded, $applicationNo);
                $this->update_remarks($clientToSave[0]['remarks'], $applicationHistory, $applicationNo);

                $action = "Added file";
                $this->addClientsHistory($applicationNo, $action);
            }
        }
    }

    private function attachments($filesUploaded, $application_no)
    {
        for ($i = 0; $i < count($filesUploaded); $i++) {
            if ($filesUploaded[$i]['name'] != '') {
                $this->validateAttachment($filesUploaded[$i], $application_no, $i);
            }
        }
    }

    private function validateAttachment($storeNotEmpyAttachment, $folderName, $index)
    {
        $fileName = $storeNotEmpyAttachment['name'];
        $fileSize = $storeNotEmpyAttachment['size'];
        $fileError = $storeNotEmpyAttachment['error'];
        $fileTmpName = $storeNotEmpyAttachment['tmp_name'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowedFileType = array('jpg', 'jpeg', 'png', 'pdf');


        if (in_array($fileActualExt, $allowedFileType)) {
            if ($fileError === 0) {
                if ($fileSize < 5242880) {
                    $this->finalAttachmentValidation($fileActualExt, $fileTmpName, $folderName, $index);
                } else {
                    echo "<script>alert('File " . $storeNotEmpyAttachment['name'] . " too big!')</script>";
                    return false;
                }
            } else {
                echo "<script>alert('Error " . $storeNotEmpyAttachment['name'] . " file type!')</script>";
                return false;
            }
        } else {
            echo "<script>alert('Error " . $storeNotEmpyAttachment['name'] . " file type!')</script>";
            return false;
        }
    }

    private function finalAttachmentValidation($fileActualExt, $fileTmpName, $folderName, $index)
    {

        $fileDestination = "../../Uploads/" . $folderName . "/";

        if (!file_exists($fileDestination)) {
            mkdir($fileDestination, 077, true);
        }

        $fileNewName = 'Attachment' . $index;
        $fileNewDestination = $fileDestination . $fileNewName . '.' . $fileActualExt;
        move_uploaded_file($fileTmpName, $fileNewDestination);


        $applicationNo = $folderName;
        return $this->uploadFiles($fileNewName, $fileActualExt, $applicationNo);
    }

    private function uploadFiles($fileNewName, $fileActualExt, $applicationNo)
    {
        $name = $fileNewName;
        $type = $fileActualExt;
        $this->uploadDocuments($name, $type, $applicationNo);
    }

    public function getAttachment()
    {
        if (!isset($_GET['application_no']) or $_SESSION['userData']['name'] == '') {
            header("Location: login.php");
        } else {
            $applicationNo = $_GET['application_no'];
            $filename = $_GET['filename'];

            $attachment = $this->fetchAttachment($applicationNo);

            for ($i = 0; $i < count($attachment); $i++) {
                if ($attachment[$i]['name'] == $filename) {
                    $fileToOpen = $attachment[$i]['name'] . '.' . $attachment[$i]['type'];
                    return $fileToOpen;
                }
            }
        }
    }


    public function interviewerUpdate()
    {
        if (isset($_POST['submit-edit'])) {
            $id = $_POST['application-no'];
            $firstname = htmlEntities($_POST['firstname']);
            $middlename = htmlEntities($_POST['middlename']);
            $lastname = htmlEntities($_POST['lastname']);
            $birthday = htmlEntities($_POST['birthday']);
            $gender = htmlEntities($_POST['gender']);
            $dependent = htmlEntities($_POST['dependent']);
            $email = htmlEntities($_POST['email']);
            $alternateEmail = htmlEntities($_POST['alternate-email']);
            $facebookLink = htmlEntities($_POST['facebook-link']);
            $placeOfBirth = htmlEntities($_POST['place-of-birth']);
            $civilStatus = htmlEntities($_POST['civil-status']);
            $primaryNumber = htmlEntities($_POST['primary-number']);
            $postpaidPrepaid = htmlEntities($_POST['postpaid-prepaid']);
            $postpaidPlan = htmlEntities($_POST['postpaid-plan']);
            $primaryNumberRemarks = htmlEntities($_POST['primary-number-remarks']);
            $alternateNumber = htmlEntities($_POST['alternate-number']);
            $postpaidPrepaidAlternate = htmlEntities($_POST['postpaid-prepaid-alternate']);
            $postpaidPlanAlternate = htmlEntities($_POST['postpaid-plan-alternate']);
            $alternateNumberRemarks = htmlEntities($_POST['alternate-number-remarks']);
            $houseNumber = htmlEntities($_POST['house-number']);
            $street = htmlEntities($_POST['street']);
            $barangay = htmlEntities($_POST['barangay']);
            $city = htmlEntities($_POST['city']);
            $municipality = htmlEntities($_POST['municipality']);
            $zipCode = htmlEntities($_POST['zip-code']);
            $addressRemarks = htmlEntities($_POST['address-remarks']);
            $mapLink = htmlEntities($_POST['map-link']);
            $permanentAddress = htmlEntities($_POST['permanent-address']);
            $sssNumber = htmlEntities($_POST['sss-number']);
            $husbandName = htmlEntities($_POST['husband-name']);
            $husbandWork = htmlEntities($_POST['husband-work']);
            $husbandRemarks = htmlEntities($_POST['husband-remarks']);
            $motherName = htmlEntities($_POST['mother-name']);
            $motherWork = htmlEntities($_POST['mother-work']);
            $motherAddress = htmlEntities($_POST['mother-address']);
            $companyName = htmlEntities($_POST['company-name']);
            $companyAddress = htmlEntities($_POST['company-address']);
            $agencyName = htmlEntities($_POST['agency-name']);
            $branchSiteAddress = htmlEntities($_POST['branch-site-address']);
            $lineOfBusiness = htmlEntities($_POST['line-of-business']);
            $companyNo1 = htmlEntities($_POST['company-no1']);
            $companyNo2 = htmlEntities($_POST['company-no2']);
            $dateHire = htmlEntities($_POST['date-hire']);
            $position = htmlEntities($_POST['position']);
            $natureOfWork = htmlEntities($_POST['nature-of-work']);
            $companyStatus = htmlEntities($_POST['company-status']);
            $basicSalary = htmlEntities($_POST['basic-salary']);
            $net1 = htmlEntities($_POST['net-1']);
            $net2 = htmlEntities($_POST['net-2']);
            $net3 = htmlEntities($_POST['net-3']);
            $net4 = htmlEntities($_POST['net-4']);
            $payrollType = htmlEntities($_POST['payroll-type']);
            $payrollDate1 = htmlEntities($_POST['payroll-date1']);
            $payrollDate2 = htmlEntities($_POST['payroll-date2']);
            $payrollDate3 = htmlEntities($_POST['payroll-date3']);
            $payrollDate4 = htmlEntities($_POST['payroll-date4']);
            $planToTransfer = htmlEntities($_POST['plan-to-transfer']);
            $loanHistory1 = htmlEntities($_POST['loan-history1']);
            $loanAmount1 = htmlEntities($_POST['loan-amount1']);
            $loanHistory2 = htmlEntities($_POST['loan-history2']);
            $loanAmount2 = htmlEntities($_POST['loan-amount2']);
            $loanHistory3 = htmlEntities($_POST['loan-history3']);
            $loanAmount3 = htmlEntities($_POST['loan-amount3']);
            $requestedAmount = htmlEntities($_POST['requested-amount']);
            $requestedTerm = htmlEntities($_POST['requested-term']);
            $purposeOfLoan = htmlEntities($_POST['purpose-of-loan']);
            $primaryBank = htmlEntities($_POST['primary-bank']);
            $accountNumber = htmlEntities($_POST['account-number']);
            $alternateBankName = htmlEntities($_POST['alternate-bank-name']);
            $alternateAccountNumber = htmlEntities($_POST['alternate-account-number']);
            $netpay = htmlEntities($_POST['netpay']);
            $additionalExpenses = htmlEntities($_POST['additional-expenses']);
            $approveAmount = htmlEntities($_POST['approve-amount']);
            $approveTerm = htmlEntities($_POST['approve-term']);
            $disbursementDate = htmlEntities($_POST['disbursement-date']);
            $reference1 = htmlEntities($_POST['reference-1']);
            $referenceNumber1 = htmlEntities($_POST['reference-number-1']);
            $referenceRelationship1 = htmlEntities($_POST['reference-relationship-1']);
            $reference2 = htmlEntities($_POST['reference-2']);
            $referenceNumber2 = htmlEntities($_POST['reference-number-2']);
            $referenceRelationship2 = htmlEntities($_POST['reference-relationship-2']);
            $reference3 = htmlEntities($_POST['reference-3']);
            $referenceNumber3 = htmlEntities($_POST['reference-number-3']);
            $referenceRelationship3 = htmlEntities($_POST['reference-relationship-3']);
            $applicationNo = htmlEntities($_POST['application-no']);

            $forFoward = 'Forward';
            $action = "Edited application details";
            $this->addClientsHistory($id, $action);

            $this->updateNewApplication($firstname, $middlename, $lastname, $birthday, $gender, $dependent, $email, $alternateEmail, $facebookLink, $placeOfBirth, $civilStatus, $primaryNumber, $postpaidPrepaid, $postpaidPlan, $primaryNumberRemarks, $alternateNumber, $postpaidPrepaidAlternate, $postpaidPlanAlternate, $alternateNumberRemarks, $houseNumber, $street, $barangay, $city, $municipality, $zipCode, $addressRemarks, $mapLink, $permanentAddress, $sssNumber, $husbandName, $husbandWork, $husbandRemarks, $motherName, $motherWork, $motherAddress, $companyName, $companyAddress, $agencyName, $branchSiteAddress, $lineOfBusiness, $companyNo1, $companyNo2, $dateHire, $position, $natureOfWork, $companyStatus, $basicSalary, $net1, $net2, $net3, $net4, $payrollType, $payrollDate1, $payrollDate2, $payrollDate3, $payrollDate4, $planToTransfer, $loanHistory1, $loanAmount1, $loanHistory2, $loanAmount2, $loanHistory3, $loanAmount3, $requestedAmount, $requestedTerm, $purposeOfLoan, $primaryBank, $accountNumber, $alternateBankName, $alternateAccountNumber, $netpay, $additionalExpenses, $approveAmount, $approveTerm, $disbursementDate, $reference1, $referenceNumber1, $referenceRelationship1, $reference2, $referenceNumber2, $referenceRelationship2, $reference3, $referenceNumber3, $referenceRelationship3, $forFoward, $applicationNo);
            return $id;
        }
    }

    public function addClient()
    {
        if (isset($_POST['submit-edit'])) {
            $firstname = htmlEntities($_POST['firstname']);
            $middlename = htmlEntities($_POST['middlename']);
            $lastname = htmlEntities($_POST['lastname']);
            $birthday = htmlEntities($_POST['birthday']);
            $gender = htmlEntities($_POST['gender']);
            $dependent = htmlEntities($_POST['dependent']);
            $email = htmlEntities($_POST['email']);
            $alternateEmail = htmlEntities($_POST['alternate-email']);
            $facebookLink = htmlEntities($_POST['facebook-link']);
            $placeOfBirth = htmlEntities($_POST['place-of-birth']);
            $civilStatus = htmlEntities($_POST['civil-status']);
            $primaryNumber = htmlEntities($_POST['primary-number']);
            $postpaidPrepaid = htmlEntities($_POST['postpaid-prepaid']);
            $postpaidPlan = htmlEntities($_POST['postpaid-plan']);
            $primaryNumberRemarks = htmlEntities($_POST['primary-number-remarks']);
            $alternateNumber = htmlEntities($_POST['alternate-number']);
            $postpaidPrepaidAlternate = htmlEntities($_POST['postpaid-prepaid-alternate']);
            $postpaidPlanAlternate = htmlEntities($_POST['postpaid-plan-alternate']);
            $alternateNumberRemarks = htmlEntities($_POST['alternate-number-remarks']);
            $houseNumber = htmlEntities($_POST['house-number']);
            $street = htmlEntities($_POST['street']);
            $barangay = htmlEntities($_POST['barangay']);
            $city = htmlEntities($_POST['city']);
            $municipality = htmlEntities($_POST['municipality']);
            $zipCode = htmlEntities($_POST['zip-code']);
            $addressRemarks = htmlEntities($_POST['address-remarks']);
            $mapLink = htmlEntities($_POST['map-link']);
            $permanentAddress = htmlEntities($_POST['permanent-address']);
            $sssNumber = htmlEntities($_POST['sss-number']);
            $husbandName = htmlEntities($_POST['husband-name']);
            $husbandWork = htmlEntities($_POST['husband-work']);
            $husbandRemarks = htmlEntities($_POST['husband-remarks']);
            $motherName = htmlEntities($_POST['mother-name']);
            $motherWork = htmlEntities($_POST['mother-work']);
            $motherAddress = htmlEntities($_POST['mother-address']);
            $companyName = htmlEntities($_POST['company-name']);
            $companyAddress = htmlEntities($_POST['company-address']);
            $agencyName = htmlEntities($_POST['agency-name']);
            $branchSiteAddress = htmlEntities($_POST['branch-site-address']);
            $lineOfBusiness = htmlEntities($_POST['line-of-business']);
            $companyNo1 = htmlEntities($_POST['company-no1']);
            $companyNo2 = htmlEntities($_POST['company-no2']);
            $dateHire = htmlEntities($_POST['date-hire']);
            $position = htmlEntities($_POST['position']);
            $natureOfWork = htmlEntities($_POST['nature-of-work']);
            $companyStatus = htmlEntities($_POST['company-status']);
            $basicSalary = htmlEntities($_POST['basic-salary']);
            $net1 = htmlEntities($_POST['net-1']);
            $net2 = htmlEntities($_POST['net-2']);
            $net3 = htmlEntities($_POST['net-3']);
            $net4 = htmlEntities($_POST['net-4']);
            $payrollType = htmlEntities($_POST['payroll-type']);
            $payrollDate1 = htmlEntities($_POST['payroll-date1']);
            $payrollDate2 = htmlEntities($_POST['payroll-date2']);
            $payrollDate3 = htmlEntities($_POST['payroll-date3']);
            $payrollDate4 = htmlEntities($_POST['payroll-date4']);
            $planToTransfer = htmlEntities($_POST['plan-to-transfer']);
            $loanHistory1 = htmlEntities($_POST['loan-history1']);
            $loanAmount1 = htmlEntities($_POST['loan-amount1']);
            $loanHistory2 = htmlEntities($_POST['loan-history2']);
            $loanAmount2 = htmlEntities($_POST['loan-amount2']);
            $loanHistory3 = htmlEntities($_POST['loan-history3']);
            $loanAmount3 = htmlEntities($_POST['loan-amount3']);
            $requestedAmount = htmlEntities($_POST['requested-amount']);
            $requestedTerm = htmlEntities($_POST['requested-term']);
            $purposeOfLoan = htmlEntities($_POST['purpose-of-loan']);
            $primaryBank = htmlEntities($_POST['primary-bank']);
            $accountNumber = htmlEntities($_POST['account-number']);
            $alternateBankName = htmlEntities($_POST['alternate-bank-name']);
            $alternateAccountNumber = htmlEntities($_POST['alternate-account-number']);
            $netpay = htmlEntities($_POST['netpay']);
            $additionalExpenses = htmlEntities($_POST['additional-expenses']);
            $approveAmount = htmlEntities($_POST['approve-amount']);
            $approveTerm = htmlEntities($_POST['approve-term']);
            $disbursementDate = htmlEntities($_POST['disbursement-date']);
            $reference1 = htmlEntities($_POST['reference-1']);
            $referenceNumber1 = htmlEntities($_POST['reference-number-1']);
            $referenceRelationship1 = htmlEntities($_POST['reference-relationship-1']);
            $reference2 = htmlEntities($_POST['reference-2']);
            $referenceNumber2 = htmlEntities($_POST['reference-number-2']);
            $referenceRelationship2 = htmlEntities($_POST['reference-relationship-2']);
            $reference3 = htmlEntities($_POST['reference-3']);
            $referenceNumber3 = htmlEntities($_POST['reference-number-3']);
            $referenceRelationship3 = htmlEntities($_POST['reference-relationship-3']);

            $forFoward = "For Forward";

            $this->createNewCPI($firstname, $middlename, $lastname, $birthday, $gender, $dependent, $email, $alternateEmail, $facebookLink, $placeOfBirth, $civilStatus, $primaryNumber, $postpaidPrepaid, $postpaidPlan, $primaryNumberRemarks, $alternateNumber, $postpaidPrepaidAlternate, $postpaidPlanAlternate, $alternateNumberRemarks, $sssNumber, $husbandName, $husbandWork, $husbandRemarks, $motherName, $motherWork, $motherAddress, $forFoward);
            $this->createNewCLH($loanHistory1, $loanAmount1, $loanHistory2, $loanAmount2, $loanHistory3, $loanAmount3, $email);
            $this->createNewCLBD($requestedAmount, $requestedTerm, $purposeOfLoan, $primaryBank, $accountNumber, $alternateBankName, $alternateAccountNumber, $netpay, $additionalExpenses, $approveAmount, $disbursementDate, $approveTerm, $email);
            $this->createNewCJD($companyName, $companyAddress, $agencyName, $branchSiteAddress, $lineOfBusiness, $companyNo1, $companyNo2, $dateHire, $position, $natureOfWork, $companyStatus, $basicSalary, $net1, $net2, $net3, $net4, $payrollType, $payrollDate1, $payrollDate2, $payrollDate3, $payrollDate4, $planToTransfer, $email);
            $this->createNewCCR($reference1, $referenceNumber1, $referenceRelationship1, $reference2, $referenceNumber2, $referenceRelationship2, $reference3, $referenceNumber3, $referenceRelationship3, $email);

            $verifier = $this->getUserLogin();
            $this->createNewCAH($verifier, $email);
            $this->createNewCA($houseNumber, $street, $barangay, $city, $municipality, $zipCode, $addressRemarks, $mapLink, $permanentAddress, $email);

            $action = "Created application by";
            $applicationNo = $this->getSingleClientUsingEmail($email);
            $this->addClientsHistory($applicationNo, $action);
            header("Location: ../login.php");
        } else {
            header("Location: ../login.php");
        }
    }

    private function getUserLogin()
    {
        if (!isset($_SESSION)) {
            session_start();
        }


        $userLogin = $_SESSION['userData']['name'];
        return  $userLogin;
    }

    private function getSingleClientUsingEmail($email)
    {
        $applicationNo = $this->singleClientFromNewApp($email);

        return $applicationNo['application_no'];
    }

    public function forwardToSVO()
    {
        if (isset($_POST['button-forward'])) {
            $applicationNo = $_POST['save-id'];
            $status = "Senior Verification";

            $verifier = $_SESSION['userData']['name'];

            $dateForwarded = date("Y/m/d");
            $action = "Forwarded application to SVO dashboard";
            $this->addClientsHistory($applicationNo, $action);

            $this->update_single_user($status, $verifier,$remarks, $dateForwarded, $applicationNo);
            header("Refresh: 0");
        } else {
            return;
        }
    }

    public function forwardToAgreement()
    {
        if (isset($_GET['valid_application_id'])) {
            $id = $_GET['valid_application_id'];
            $clientInformation = $this->get_client_details($id);

            return $clientInformation;
        }
    }

    public function forwardToApprover()
    {
        if (isset($_POST['button-approve'])) {
            $id = $_POST['save-id'];
            $status = "Senior Verification";

            $verifier = $_SESSION['userData']['name'];

            $dateForwarded = date("Y/m/d");

            $this->update_single_user($status, $verifier,$remarks, $dateForwarded, $id);
            header("Refresh: 0");
        }
    }

    public function getApplicationNo($id)
    {
        $applicationNo = $this->fetchApplicationNo($id);
        return $applicationNo;
    }


    // SVO Controller

    // From SVO dashboard to Contracts Dashboard
    // this will delete first the information in new_application database
    // then it will insert the information to inprocess_application --> this will help the database not to overload
    public function forwardToContracts()
    {
        if (isset($_POST['forward-button'])) {
            $applicationNo = $_POST['application-id'];

            $status = 'Waiting for Signed Contracts';
            $forFoward = 'Forwarded';
            $action = "Forwarded application to Contracts dashboard";
            $this->addClientsHistory($applicationNo, $action);
            $this->createContractNo(9);

            $loggedInUser = $_SESSION['userData']['name'];

            $this->updateSingleData($status, $loggedInUser, $forFoward, $applicationNo);

            return $applicationNo;
        }
    }

    public function createContractNo($count)
    {
        $randomChar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $s = '';
        $r_new = '';
        $r_old = '';

        for ($i = 1; $i < $count; $i++) {
            while ($r_old == $r_new) {
                $r_new = rand(0, 61);
            }
            $r_old = $r_new;
            $s = $s . $randomChar[$r_new];

            // $s = 'CM' . $s;
        }

        return 'CM' . $s;
    }

    public function add_new()
    {
        $addnew = filter_input(INPUT_GET, 'addNew');
        if (!$addnew) {
            return;
        } else {
            header("location: verifierDashboard.php");
        }
    }

    // Contracts controller

    public function saveRemarksandAttachmentContracts()
    {
        if (isset($_POST['save-remarks'])) {
            $applicationNo = $_POST['save-id'];

            $fileMergeContracts = $_FILES['file-merge-contracts'];
            $remarks = htmlspecialchars($_POST['remarks']);

            $clientToSave = $this->get_client_details($applicationNo);
            $application_no = $clientToSave[0]['application_no'];
            $oldRemarks = $this->get_clients_information($applicationNo);

            if ($remarks == "" && $fileMergeContracts['name'] == '') {
                Header("Refresh: 0");
            } elseif ($fileMergeContracts['name'] == '' && $remarks != '') {
                if ($oldRemarks[0]['contract_remarks'] == $remarks) {
                    header("Refresh: 0");
                } else {
                    $action = "Added remarks // " . $remarks;
                    $this->addClientsHistory($applicationNo, $action);
                    $this->addContractRemarks($remarks, $applicationNo);

                    echo "<script>alert('Remarks save!')</script>";
                    header("Refresh: 0");
                }
            } else {
                $fileExt = explode('/', $fileMergeContracts['type']);
                $fileActualExt = strtolower(end($fileExt));

                if ($fileActualExt == 'pdf') {
                    if ($fileMergeContracts['error'] === 0) {
                        if ($fileMergeContracts['size'] < 5242880) {
                            $fileDestination = "../../../Contracts/" . $application_no;

                            $fileNewDestination = $fileDestination . '/' . 'Merge_Contracts.pdf';
                            move_uploaded_file($fileMergeContracts['tmp_name'], $fileNewDestination);

                            if ($oldRemarks[0]['contract_remarks'] == $remarks) {
                                $action = "Added file";
                                $this->addClientsHistory($applicationNo, $action);
                                echo "<script>alert('Merge contracts uploaded!')</script>";
                                header("Refresh: 0");
                            } else {
                                $action = "Added file";
                                $this->addClientsHistory($applicationNo, $action);


                                $action = "Added remarks // " . $remarks;
                                $this->addClientsHistory($applicationNo, $action);
                                $this->addContractRemarks($remarks, $applicationNo);
                                echo "<script>alert('Merge contracts uploaded!')</script>";
                                header("Refresh: 0");
                            }
                        } else {
                            echo "<script>alert('File " . $fileMergeContracts['name'] . " too big!')</script>";
                        }
                    } else {
                        echo "<script>alert('Error " . $fileMergeContracts['name'] . " file type!')</script>";
                    }
                } else {
                    echo "<script>alert('Error " . $fileMergeContracts['name'] . " file type!')</script>";
                }
            }
        }
    }

    private function addContractRemarks($contractRemarks, $applicationNo)
    {
        $this->add_contract_remarks($contractRemarks, $applicationNo);
    }


    private function addClientsHistory($applicationNo, $action)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $agentName = $_SESSION['userData']['name'];
        $this->addClientActionHistory($applicationNo, $action, $agentName);
    }

    public function forwardToAccounts()
    {
        if (isset($_POST['forward-contracts'])) {
            $applicationNo = $_POST['save-id'];
            $status = "For Disbursement";

            $verifier = $_SESSION['userData']['name'];

            $clientsDetails = $this->get_client_details($applicationNo);

            $dateForwarded = $clientsDetails[0]['date_forwarded'];

            $this->update_single_user($status, $verifier,$remarks, $dateForwarded, $applicationNo);

            $action = "Forwarded application to Accounts dashboard";
            $this->addClientsHistory($applicationNo, $action);
            header("Refresh: 0");
        }
    }

    // accounts controller
    public function saveAccountsRemarks()
    {
        if (isset($_POST['save-remarks'])) {
            $applicationNo = $_POST['save-id'];
            $remarks = htmlspecialchars($_POST['remarks']);
            $oldRemarks = $this->get_clients_information($applicationNo);

            if ($oldRemarks[0]['accounts_remarks'] == $remarks) {
                header("Refresh: 0");
            } else {
                $action = "Added remarks // " . $remarks;
                $this->addClientsHistory($applicationNo, $action);
                $this->addAccountsRemarks($applicationNo, $remarks);
                echo "<script>alert('Remarks save!')</script>";
                header("Refresh: 0");
            }
        }
    }

    private function addAccountsRemarks($applicationNo, $remarks)
    {
        $this->add_accounts_remarks($remarks, $applicationNo);
    }

    public function forwardToDisburse()
    {
        if (isset($_POST['forward-disburse'])) {
            $id = $_POST['save-id'];
            $status = "Disbursed";

            $verifier = $_SESSION['userData']['name'];

            $clientsDetails = $this->get_client_details($id);

            $dateForwarded = $clientsDetails[0]['date_forwarded'];

            $this->update_single_user($status, $verifier,$remarks, $dateForwarded, $id);
            header("Refresh: 0");
        }
    }

    public function deleteApplication($applicationNo)
    {
        $this->deleteSingleApplication($applicationNo);
    }



    public function sampleRemarks()
    {
        if (isset($_POST)) {
            // $email = $_POST['email'];
            $email = "test7@email.com";
            $tableName = "clients_personal_information";
            $array = array_slice($_POST, 0, 31);
            $aplicaionNo = 101010;
            $clientToSave = $this->sampleGet($aplicaionNo);

            return $clientToSave;
        }
    }
} // end of ClientsController scope
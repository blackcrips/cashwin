<?php

class NewAppController extends NewAppModel
{

    public function login()
    {
        if (isset($_POST['submit-login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($email == "" || $password == "") {
                echo "<script>alert('Invalid username or password!')</script>";
                header("Refresh: 0");
            } else {
                if (is_array($this->loginUser($email, $password))) {
                    $array = $this->loginUser($email, $password);
                    $this->createSession($array[0]);
                    header("Location: updateApplication.php");
                } else {
                    echo "<script>alert('Invalid username or password!')</script>";
                    header("Refresh: 0");
                }
            };
        }
    }

    public function clientSignup()
    {
        if (isset($_POST['submit-create'])) {
            $firstname = htmlEntities($_POST['firstname']);
            $middlename = htmlEntities($_POST['middlename']);
            $lastname = htmlEntities($_POST['firstname']);
            $email = htmlEntities($_POST['email']);
            $confirmEmail = htmlEntities($_POST['confirm-email']);
            $password = htmlEntities($_POST['password']);
            $confirmPassword = htmlEntities($_POST['confirm-password']);
            $mobileNumber = htmlEntities($_POST['mobile']);


            $validation = new Step1Validation($firstname, $middlename, $lastname, $email, $confirmEmail, $password, $confirmPassword, $mobileNumber);
            $validation->signUpUser();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['clientData'] = array(
                'email' => $email
            );

            header("Location: ../Steps/step2.php");
        } else {
            header('Location: ../Steps/step1.php');
        }
    }

    protected function checkExistingEmail($email)
    {
        $checkEmail = $this->getSingleClient($email);
        return $checkEmail[0];
    }

    protected function createClientAccount($firstname, $middlename, $lastname, $email, $password, $mobileNumber)
    {
        $this->createNewClientRecord($firstname, $middlename, $lastname, $email, $mobileNumber);
        $this->createNewClientUser($firstname, $middlename, $lastname, $email, $password);
    }

    public function createSession($array)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // fetching userlogin information (position and firstname concatinated with lastname)
        // This will check for the assigned position to choose what Dashboard to be displayed
        $_SESSION['clientData'] = array(
            'email' => $array['email']
        );
    }

    public function updateUser()
    {
        if (isset($_POST['submit-create'])) {
            $email = htmlEntities($_POST['email']);
            $houseNo = htmlEntities($_POST['house-no']);
            $street = htmlEntities($_POST['street']);
            $barangay = htmlEntities($_POST['barangay']);
            $city = htmlEntities($_POST['city']);
            $municipality = htmlEntities($_POST['municipality']);
            $companyName = htmlEntities($_POST['company-name']);
            $companyAddress = htmlEntities($_POST['company-address']);
            $companyPhoneNo = htmlEntities($_POST['company-phone-no']);
            $joiningDate = htmlEntities($_POST['joining-date']);
            $industry = htmlEntities($_POST['industry']);
            $positionIncompany = htmlEntities($_POST['position-in-company']);
            $grossMonthlyIncome = htmlEntities($_POST['gross-monthly-income']);
            $paydate1 = htmlEntities($_POST['pay-date1']);
            $paydate2 = htmlEntities($_POST['pay-date2']);
            $loanAmount = htmlEntities($_POST['loan-amount']);
            $termType = htmlEntities($_POST['term-type']);
            $terms = htmlEntities($_POST['terms']);
            $morning = htmlEntities($_POST['morning']);
            $afternoon = htmlEntities($_POST['afternoon']);
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


            $getClientData = $this->singleClientFromNewApp($email);
            $applicationNo = $getClientData[1][0]['application_no'];
            if (!$this->getAttachment($filesUploaded, $applicationNo)) {
                echo "<script>alert('Please upload all files needed')</script>";
            } else {
                $validateUpdate = new Step2validation($email, $houseNo, $street, $barangay, $city, $municipality, $companyName, $companyAddress, $companyPhoneNo, $joiningDate, $industry, $positionIncompany, $grossMonthlyIncome, $paydate1, $paydate2, $loanAmount, $termType, $terms, $morning, $afternoon);


                if ($validateUpdate->updateUserData()) {
                    echo "<script>alert('Please wait for our team to call you!')</script>";
                    echo "<script>window.location.href='../inc/signUpSuccess.inc.php'</script>";
                    return;
                } else {
                    echo    "<script>
                        alert('Please check informations!');
                    </script>";
                }
            }
        }
    }

    protected function updateClientsInformation($houseNo, $street, $barangay, $city, $municipality, $companyName, $companyAddress, $companyPhoneNo, $joiningDate, $industry, $positionIncompany, $grossMonthlyIncome, $paydate1, $paydate2, $loanAmount, $terms, $morning, $afternoon, $email)
    {
        $applicationNo = $this->singleClientFromNewApp($email);
        $this->insertAddressInformation($applicationNo[1][0]['application_no'], $houseNo, $street, $barangay, $city, $municipality);
        $this->insertloanAndBankDetails($applicationNo[1][0]['application_no'], $loanAmount, $terms);
        $this->insertJobDescription($applicationNo[1][0]['application_no'], $companyName, $companyAddress, $companyPhoneNo, $joiningDate, $industry, $positionIncompany, $grossMonthlyIncome, $paydate1, $paydate2);
        $this->insertApplicationHistory($applicationNo[1][0]['application_no']);
        $this->insertCharacterRefereces($applicationNo[1][0]['application_no']);
        $this->insertLoanHistory($applicationNo[1][0]['application_no']);
        return true;
    }

    private function uploadFiles($fileName, $fileActualExt)
    {
        $name = $fileName;
        $type = $fileActualExt;
        $clientData = $this->singleClientFromNewApp($_SESSION['clientData']['email']);
        $this->uploadDocuments($name, $type, $clientData[1][0]['application_no']);
    }

    private function getAttachment($filesUploaded, $fileFolderName)
    {
        $storeNotEmpyAttachment = [];
        $folderName = $fileFolderName;
        for ($i = 0; $i < count($filesUploaded); $i++) {
            if ($filesUploaded[$i]['name'] != "") {
                array_push($storeNotEmpyAttachment, $filesUploaded[$i]);
            }
        }

        if (count($storeNotEmpyAttachment) != count($filesUploaded)) {

            return false;
        } else {
            $this->validateAttachment($storeNotEmpyAttachment, $folderName);
            return true;
        }
    }

    private function validateAttachment($storeNotEmpyAttachment, $folderName)
    {
        $storeValidAttachment = [];
        for ($i = 0; $i < count($storeNotEmpyAttachment); $i++) {
            $fileName = $storeNotEmpyAttachment[$i]['name'];
            $fileSize = $storeNotEmpyAttachment[$i]['size'];
            $fileError = $storeNotEmpyAttachment[$i]['error'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowedFileType = array('jpg', 'jpeg', 'png', 'pdf');


            if (in_array($fileActualExt, $allowedFileType)) {
                if ($fileError === 0) {
                    if ($fileSize < 5242880) {
                        array_push($storeValidAttachment, $storeNotEmpyAttachment[$i]);
                    } else {
                        echo "<script>alert('File " . $storeNotEmpyAttachment[$i]['name'] . " too big!')</script>";
                        return false;
                    }
                } else {
                    echo "<script>alert('Error " . $storeNotEmpyAttachment[$i]['name'] . " file type!')</script>";
                    return false;
                }
            } else {
                echo "<script>alert('Error " . $storeNotEmpyAttachment[$i]['name'] . " file type!')</script>";
                return false;
            }
        }
        $this->finalAttachmentValidation($storeValidAttachment, $folderName);
    }

    private function finalAttachmentValidation($storeValidAttachment, $folderName)
    {
        $finalArray = [];
        if (count($storeValidAttachment) !== 6) {
            return false;
        } else {
            for ($i = 0; $i < count($storeValidAttachment); $i++) {
                $fileNewName = '';
                $fileName = $storeValidAttachment[$i]['name'];
                $fileTmpName = $storeValidAttachment[$i]['tmp_name'];

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $fileDestination = "../../Uploads/" . $folderName . "/";
                $fileNewName = 'Attachment' . $i;
                $finalArrayValue = $fileNewName . '.' . $fileActualExt;
                array_push($finalArray, $finalArrayValue);
                $fileNewDestination = $fileDestination . $fileNewName . '.' . $fileActualExt;


                if (!file_exists($fileDestination)) {
                    mkdir($fileDestination, 077, true);
                }
                move_uploaded_file($fileTmpName, $fileNewDestination);
            }

            $applicationNo = $folderName;
            $this->uploadFiles($finalArray, $applicationNo);
        }
    }
}

<?php


class NewAppModel extends Dbh
{
    protected function getApplicationNo($email)
    {
        $sql = "SELECT application_no from clients_personal_information WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $rowCount = $stmt->rowCount();


        if ($rowCount == 0) {
            echo "Error fetching application. Please contact your system administrator";
            exit();
        } else {
            $result = $stmt->fetchAll();
            return $result;
        }
    }





    protected function createNewClientRecord($firstname, $middlename, $lastname, $email, $mobileNumber)
    {
        $sql = "INSERT INTO clients_personal_information (`firstname`,`middlename`,`lastname`,`email`,`primary_no`,`application_no`,`status`) VALUES (?,?,?,?,?,?,?)";

        if (!$this->connect()->prepare($sql)) {
            echo "Failed to create application";
            exit();
        } else {
            $stmt = $this->connect()->prepare($sql);
            $status = "Fresh";
            $staticClient = $this->getStaticApplicationNo();
            $originalAppNo = $staticClient[0]['application_no'];
            $application_no = substr($originalAppNo, 2, strlen($originalAppNo)) + 1;
            $newStaticApplicationNo = "CM" . $application_no;
            $this->updateStaticApplicationNo($newStaticApplicationNo);

            $stmt->execute([$firstname, $middlename, $lastname, $email, $mobileNumber, $application_no, $status]);

            $arrayData = ['clients_loan_history', 'clients_loan_and_bank_details', 'clients_job_description', 'clients_character_references', 'clients_address'];
            $this->insertInitialData($arrayData, $this->getApplicationNo($email)[0]['application_no']);
        }
    }

    private function insertInitialData($arrayData, $applicationNo)
    {
        for ($i = 0; $i < count($arrayData); $i++) {
            $sql = "INSERT INTO " . $arrayData[$i] . "(`application_no`) VALUES(?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$applicationNo]);
        }
    }

    protected function createNewClientUser($firstname, $middlename, $lastname, $email, $password)
    {
        $sql = "INSERT INTO clients_accounts (`firstname`,`middlename`,`lastname`,`email`,`password`) VALUES (?,?,?,?,?)";

        if (!$this->connect()->prepare($sql)) {
            echo "Failed to create application";
            exit();
        } else {
            $stmt = $this->connect()->prepare($sql);
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute([$firstname, $middlename, $lastname, $email, $hashPassword]);
        }
    }

    private function getStaticApplicationNo()
    {
        $sql = "SELECT * FROM clients_personal_information WHERE id = 1";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute()) {
            $result = $stmt->fetchAll();
            return $result;
        } else {
            die();
        }
    }

    private function updateStaticApplicationNo($application_no)
    {
        $sql = "UPDATE clients_personal_information SET application_no = :application_no WHERE id = 1";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([':application_no' => $application_no])) {
            return;
        } else {
            die();
        }
    }

    // fetch to clients_accounts
    protected function getSingleClient($email)
    {
        $sql = "SELECT * FROM clients_accounts where email = ?";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$email])) {
            $rowCount = $stmt->rowCount();
            $result = $stmt->fetchAll();
            return array($rowCount, $result);
        } else {
            die();
        }
    }

    // fetch to clients_personal_information
    protected function checkExistingMobileNumber($mobileNumber)
    {
        $sql = "SELECT * FROM clients_personal_information WHERE primary_no = ?";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$mobileNumber])) {
            $rowCount = $stmt->rowCount();
            return $rowCount;
        } else {
            die();
        }
    }

    // fetch to new_application
    protected function singleClientFromNewApp($email)
    {
        $getApplicationNo = $this->getApplicationNo($email);
        $applicationNo = $getApplicationNo[0]['application_no'];

        $sql = "SELECT * FROM clients_personal_information WHERE application_no = $applicationNo";

        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute()) {
            $rowCount = $stmt->rowCount();
            $result = $stmt->fetchAll();
            return array($rowCount, $result);
        } else {
            die();
        }
    }

    protected function getClientDetails($email)
    {
        $getApplicationNo = $this->getApplicationNo($email);
        $applicationNo = $getApplicationNo[0]['application_no'];

        $sql = "SELECT * FROM clients_personal_information pi 
        JOIN clients_job_description jd ON pi.application_no = jd.application_no 
        JOIN clients_address ad ON pi.application_no = ad.application_no 
        JOIN clients_loan_and_bank_details lbd ON pi.application_no = lbd.application_no WHERE pi.application_no = $applicationNo";

        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute()) {
            $rowCount = $stmt->rowCount();
            $result = $stmt->fetchAll();
            return array($rowCount, $result);
        } else {
            die();
        }
    }

    protected function insertAddressInformation($applicationNo, $houseNo, $street, $barangay, $city, $municipality)
    {
        $sql = "INSERT INTO clients_address (`application_no`, `house_no`,`street`,`barangay`,`city`,`municipality`) VALUES (?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$applicationNo, $houseNo, $street, $barangay, $city, $municipality])) {
            return;
        } else {
            echo "There was an error updating!";
            exit();
        }
    }

    protected function insertJobDescription($applicationNo, $companyName, $companyAddress, $companyPhoneNo, $joiningDate, $industry, $positionIncompany, $grossMonthlyIncome, $paydate1, $paydate2)
    {
        $sql = "INSERT INTO clients_job_description (`application_no`,`company_name`, `company_address`,`company_no1`,`date_hired`,`line_of_business`,`position`,`basic_salary`,`paydate1`,`paydate2`) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$applicationNo, $companyName, $companyAddress, $companyPhoneNo, $joiningDate, $industry, $positionIncompany, $grossMonthlyIncome, $paydate1, $paydate2])) {
            return;
        } else {
            echo "There was an error updating!";
            exit();
        }
    }

    protected function insertloanAndBankDetails($applicationNo, $loanAmount, $terms)
    {
        $sql = "INSERT INTO clients_loan_and_bank_details (`application_no`,`requested_amount`, `requested_term`) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$applicationNo, $loanAmount, $terms])) {
            return;
        } else {
            echo "There was an error updating!";
            exit();
        }
    }

    protected function insertApplicationHistory($applicationNo)
    {
        $sql = "INSERT INTO clients_application_history (`application_no`) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$applicationNo])) {
            return;
        } else {
            echo "There was an error updating!";
            exit();
        }
    }

    protected function insertCharacterRefereces($applicationNo)
    {
        $sql = "INSERT INTO clients_character_references (`application_no`) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$applicationNo])) {
            return;
        } else {
            echo "There was an error updating!";
            exit();
        }
    }

    protected function insertLoanHistory($applicationNo)
    {
        $sql = "INSERT INTO clients_loan_history (`application_no`) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$applicationNo])) {
            return;
        } else {
            echo "There was an error updating!";
            exit();
        }
    }

    protected function loginUser($email, $password)
    {
        $sql = "SELECT * FROM clients_accounts WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetchAll();
        $rowCount = $stmt->rowCount();

        if ($rowCount == 0) {
            return false;
        } else {
            $hashedPassword = $result[0]['password'];
            $passwordVerified = password_verify($password, $hashedPassword);

            if (!$passwordVerified) {
                return false;
            } else {
                $sql = "SELECT email FROM clients_personal_information WHERE email = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$email]);

                $result = $stmt->fetchAll();
                return $result;
            }
        }
    }

    protected function uploadDocuments($finalArrayValue, $applicationNO)
    {
        $sql = "SELECT * FROM uploaded_files WHERE application_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$applicationNO]);
        $rowCount = $stmt->rowCount();



        if ($rowCount === 0) {
            for ($i = 0; $i < count($finalArrayValue); $i++) {
                $name = $finalArrayValue[$i];

                $explodedName = explode('.', $name);
                $filename = array_shift($explodedName);
                $fileExtension = strtolower(end($explodedName));

                $sql1 = "INSERT INTO uploaded_files (`name`, `type`, `application_id`) VALUES (?,?,?) ";
                $stmt1 = $this->connect()->prepare($sql1);
                $stmt1->execute([$filename, $fileExtension, $applicationNO]);
            }
        } else {
            for ($i = 0; $i < count($finalArrayValue); $i++) {
                $name = $finalArrayValue[$i];

                $explodedName = explode('.', $name);
                $filename = array_shift($explodedName);
                $fileExtension = strtolower(end($explodedName));

                $sql1 = "UPDATE uploaded_files SET `name` = ?, `type` = ? WHERE `application_id` = ? AND `name` = ? ";
                $stmt1 = $this->connect()->prepare($sql1);
                $stmt1->execute([$filename, $fileExtension, $applicationNO, $filename]);
            }
        }
    }
}

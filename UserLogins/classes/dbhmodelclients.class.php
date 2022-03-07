<?php


class DbhModelClients extends dbh
{
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

    //create new Clients Personal Information
    protected function createNewCPI($firstname, $middlename, $lastname, $birthday, $gender, $dependent, $email, $alternateEmail, $facebookLink, $placeOfBirth, $civilStatus, $primaryNumber, $postpaidPrepaid, $postpaidPlan, $primaryNumberRemarks, $alternateNumber, $postpaidPrepaidAlternate, $postpaidPlanAlternate, $alternateNumberRemarks, $sssNumber, $husbandName, $husbandWork, $husbandRemarks, $motherName, $motherWork, $motherAddress, $forFoward)
    {
        $sql = "INSERT INTO clients_personal_information (`firstname`, `middlename`, `lastname`, `birthday`, `gender`, `dependent`, `email`, `alternate_email`, `facebook`, `place_of_birth`, `civil_status`, `primary_no`, `primary_no_line`, `primary_no_plan_amount`, `primary_no_remarks`, `secondary_no`, `secondary_no_line`, `secondary_no_plan_amount`, `secondary_no_remarks`, `sss_no`, `spouse_name`, `spouse_occupation`, `spouse_remarks`, `mothers_name`, `mothers_occupation`, `mothers_address`, `for_forward`,`application_no`,`status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

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

            $stmt->execute([$firstname, $middlename, $lastname, $birthday, $gender, $dependent, $email, $alternateEmail, $facebookLink, $placeOfBirth, $civilStatus, $primaryNumber, $postpaidPrepaid, $postpaidPlan, $primaryNumberRemarks, $alternateNumber, $postpaidPrepaidAlternate, $postpaidPlanAlternate, $alternateNumberRemarks, $sssNumber, $husbandName, $husbandWork, $husbandRemarks, $motherName, $motherWork, $motherAddress, $forFoward, $application_no, $status]);
        }
    }

    //create new clients Loan History
    protected function createNewCLH($loanHistory1, $loanAmount1, $loanHistory2, $loanAmount2, $loanHistory3, $loanAmount3, $email)
    {
        $sql = "INSERT INTO clients_loan_history (`history_name1`, `history_amount1`, `history_name2`, `history_amount2`, `history_name3`, `history_amount3`,`application_no`) VALUES (?,?,?,?,?,?,?)";

        if (!$this->connect()->prepare($sql)) {
            echo "Failed to create application";
            exit();
        } else {
            $stmt = $this->connect()->prepare($sql);
            $singleClient = $this->singleClientFromNewApp($email);
            $applicationNo = $singleClient['application_no'];
            $stmt->execute([$loanHistory1, $loanAmount1, $loanHistory2, $loanAmount2, $loanHistory3, $loanAmount3, $applicationNo]);
        }
    }

    //create new Clients Loan and Bank Details
    protected function createNewCLBD($requestedAmount, $requestedTerm, $purposeOfLoan, $primaryBank, $accountNumber, $alternateBankName, $alternateAccountNumber, $netpay, $additionalExpenses, $approveAmount, $disbursementDate, $approveTerm, $email)
    {
        $sql = "INSERT INTO clients_loan_and_bank_details (`requested_amount`, `requested_term`, `purpose_of_loan`, `primary_bank`,`primary_bank_no`, `alternate_bank`,`alternate_bank_no`,`netpay`,`additional_expenses`,`approve_amount`,`disbursement_date`,`approve_term`,`application_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        if (!$this->connect()->prepare($sql)) {
            echo "Failed to create application";
            exit();
        } else {
            $stmt = $this->connect()->prepare($sql);
            $singleClient = $this->singleClientFromNewApp($email);
            $applicationNo = $singleClient['application_no'];
            $stmt->execute([$requestedAmount, $requestedTerm, $purposeOfLoan, $primaryBank, $accountNumber, $alternateBankName, $alternateAccountNumber, $netpay, $additionalExpenses, $approveAmount, $disbursementDate, $approveTerm, $applicationNo]);
        }
    }

    //create new Clients Job Description
    protected function createNewCJD($companyName, $companyAddress, $agencyName, $branchSiteAddress, $lineOfBusiness, $companyNo1, $companyNo2, $dateHire, $position, $natureOfWork, $companyStatus, $basicSalary, $net1, $net2, $net3, $net4, $payrollType, $payrollDate1, $payrollDate2, $payrollDate3, $payrollDate4, $planToTransfer, $email)
    {
        $sql = "INSERT INTO clients_job_description (`company_name`,`company_address`,`agency_name`,`branch_site_address`,`line_of_business`,`company_no1`,`company_no2`,`date_hired`,`position`,`nature_of_work`,`status_in_company`,`basic_salary`,`salary1`,`salary2`,`salary3`,`salary4`,`payroll_type`,`paydate1`,`paydate2`,`paydate3`,`paydate4`,`job_description_remarks`,`application_no`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        if (!$this->connect()->prepare($sql)) {
            echo "Failed to create application";
            exit();
        } else {
            $stmt = $this->connect()->prepare($sql);
            $singleClient = $this->singleClientFromNewApp($email);
            $applicationNo = $singleClient['application_no'];
            $stmt->execute([$companyName, $companyAddress, $agencyName, $branchSiteAddress, $lineOfBusiness, $companyNo1, $companyNo2, $dateHire, $position, $natureOfWork, $companyStatus, $basicSalary, $net1, $net2, $net3, $net4, $payrollType, $payrollDate1, $payrollDate2, $payrollDate3, $payrollDate4, $planToTransfer, $applicationNo]);
        }
    }

    //create new Clients Character References
    protected function createNewCCR($reference1, $referenceNumber1, $referenceRelationship1, $reference2, $referenceNumber2, $referenceRelationship2, $reference3, $referenceNumber3, $referenceRelationship3, $email)
    {
        $sql = "INSERT INTO clients_character_references (`char_ref1_name`,`char_ref1_no`,`char_ref1_relationship`,`char_ref2_name`,`char_ref2_no`,`char_ref2_relationship`,`char_ref3_name`,`char_ref3_no`,`char_ref3_relationship`,`application_no`) VALUES (?,?,?,?,?,?,?,?,?,?)";

        if (!$this->connect()->prepare($sql)) {
            echo "Failed to create application";
            exit();
        } else {
            $stmt = $this->connect()->prepare($sql);
            $singleClient = $this->singleClientFromNewApp($email);
            $applicationNo = $singleClient['application_no'];
            $stmt->execute([$reference1, $referenceNumber1, $referenceRelationship1, $reference2, $referenceNumber2, $referenceRelationship2, $reference3, $referenceNumber3, $referenceRelationship3, $applicationNo]);
        }
    }

    //create new Clients Application History
    protected function createNewCAH($verifier, $email)
    {
        $sql = "INSERT INTO clients_application_history (`verifier`,`application_no`) VALUES (?,?)";

        if (!$this->connect()->prepare($sql)) {
            echo "Failed to create application";
            exit();
        } else {
            $stmt = $this->connect()->prepare($sql);
            $singleClient = $this->singleClientFromNewApp($email);
            $applicationNo = $singleClient['application_no'];
            $stmt->execute([$verifier, $applicationNo]);
        }
    }

    //create new Clients Address
    protected function createNewCA($houseNumber, $street, $barangay, $city, $municipality, $zipCode, $addressRemarks, $mapLink, $permanentAddress, $email)
    {
        $sql = "INSERT INTO clients_address (`house_no`,`street`,`barangay`,`city`,`municipality`,`zip_code`,`address_remarks`,`map_link`,`permanent_address`,`application_no`) VALUES (?,?,?,?,?,?,?,?,?,?)";

        if (!$this->connect()->prepare($sql)) {
            echo "Failed to create application";
            exit();
        } else {
            $stmt = $this->connect()->prepare($sql);
            $singleClient = $this->singleClientFromNewApp($email);
            $applicationNo = $singleClient['application_no'];
            $stmt->execute([$houseNumber, $street, $barangay, $city, $municipality, $zipCode, $addressRemarks, $mapLink, $permanentAddress, $applicationNo]);
        }
    }

    // getting all clients data from database
    protected function show_details($status)
    {
        $sql = "SELECT application_no,firstname,middlename,lastname,primary_no,email 
        FROM clients_personal_information 
        JOIN clients_loan_and_bank_details 
            USING (application_no)
        JOIN clients_job_description 
            USING (application_no) 
        WHERE status = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status]);

        $result = $stmt->fetchAll();
        return $result;
    }

    // getting clients information based on the given username and status
    protected function show_details_inprocess($status, $activeUser)
    {
        $sql = "SELECT 
            firstname, 
            middlename, 
            lastname,
            primary_no, 
            email, 
            pi.application_no, 
            ah.verifier,
            pi.status
        FROM clients_personal_information pi 
        JOIN clients_application_history ah 
            USING (application_no)
        WHERE pi.status = ? 
        AND ah.verifier = ?";


        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status, $activeUser]);
        $result = $stmt->fetchAll();
        return $result;
    }

    //fetching single clients information from server
    protected function get_client_details($applicationNo)
    {
        $sql = "SELECT 
        application_no, 
        firstname,
        middlename,
        lastname,
        gender,
        primary_no,
        secondary_no,
        email,
        company_name,
        position,
        date_hired,
        basic_salary,
        primary_bank,
        house_no,
        street,
        barangay,
        city,
        municipality,
        status,
        for_forward,
        ah.remarks,
        ah.application_history,
        ah.contract_remarks,
        ah.accounts_remarks

        FROM clients_personal_information pi 
        JOIN clients_job_description jd 
            using (application_no)
        JOIN clients_loan_and_bank_details lbd
            using (application_no)
        JOIN clients_address a
            using (application_no)
        JOIN clients_application_history ah
            using (application_no)
        WHERE pi.application_no = ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$applicationNo]);
        $result = $stmt->fetchAll();

        return $result;
    }

    protected function get_clients_information($applicationNo)
    {
        $sql = "SELECT * FROM clients_personal_information pi 
        JOIN clients_job_description jd 
            using (application_no)
        JOIN clients_loan_and_bank_details lbd
            using (application_no)
        JOIN clients_address a
            using (application_no)
        JOIN clients_application_history ah
            using (application_no)
        JOIN clients_loan_history clh
            using (application_no)
        JOIN clients_character_references cr
            using (application_no)


        WHERE pi.application_no = ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$applicationNo]);
        $result = $stmt->fetchAll();

        return $result;
    }

    // Delete single record from database
    protected function delete_single_user($id)
    {
        $sql = "DELETE FROM new_application WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }


    // updated client's information
    protected function update_single_user($status, $verifier, $dateForwarded, $applicationNo)
    {
        $sql = "UPDATE clients_personal_information SET status = :status WHERE application_no = :applicationNo";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['status' => $status, 'applicationNo' => $applicationNo]);

        $sql = "UPDATE clients_application_history SET verifier = :verifier WHERE application_no = :applicationNo";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['verifier' => $verifier, 'applicationNo' => $applicationNo]);

        $sql = "UPDATE clients_loan_and_bank_details SET date_forwarded = :dateForwarded WHERE application_no = :applicationNo";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['dateForwarded' => $dateForwarded, 'applicationNo' => $applicationNo]);

        return $stmt;
    }

    protected function update_remarks($remarks, $applicationNo)
    {
        $sql = "UPDATE clients_application_history SET remarks = :remarks WHERE application_no = :applicationNo";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(['remarks' => $remarks, 'applicationNo' => $applicationNo])) {
            $stmt = null;
            exit();
        }
    }

    protected function update_application_history($applicationHistory, $id)
    {
        $sql = "UPDATE new_application SET application_history = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$applicationHistory, $id])) {
            echo 'Error uploading files';
            exit();
        } else {
            return;
        }
    }

    protected function fetchAttachment($applicationId)
    {
        $sql = "SELECT * FROM uploaded_files WHERE application_id = :applicationId";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':applicationId' => $applicationId]);
        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            $result = $stmt->fetchAll();
            return $result;
        } else {
            echo 'No attachment!';
            exit();
        }
    }

    protected function getSingleClient($applicationNo)
    {
        $sql = "SELECT application_no FROM clients_personal_information WHERE application_no = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$applicationNo]);
        $rowCount = $stmt->rowCount();


        if ($rowCount == 0) {
            echo "Error server side! Please contact your system administrator!";
            exit();
        } else {
            $result = $stmt->fetchAll();
            return $result;
        }
    }

    protected function addClientActionHistory($applicationNo, $action, $agentName)
    {
        $sql = "INSERT INTO clients_action_history (`application_no`,`remark_content`,`action_by`) VALUES (?,?,?);";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$applicationNo, $action, $agentName])) {
            return;
        } else {
            echo "Error server side! Please contact your system administrator!";
            exit();
        }
    }

    protected function add_contract_remarks($contractRemarks, $applicationNo)
    {
        $sql = "UPDATE clients_application_history SET contract_remarks = ? WHERE application_no = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$contractRemarks, $applicationNo])) {
            echo "Error server side! Please contact your system administrator!";
            exit();
        } else {
            return;
        }
    }

    protected function add_accounts_remarks($remarks, $applicationNo)
    {
        $sql = "UPDATE clients_application_history SET accounts_remarks = ? WHERE application_no = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$remarks, $applicationNo])) {
            echo "Error server side! Please contact your system administrator!";
            exit();
        } else {
            return;
        }
    }

    protected function uploadAttachmentAndRemarks($id, $name, $type)
    {
        $sql = "INSERT INTO uploaded_files (`name`,`type`,`application_id`) VALUES (?,?,?);";
        $stmt = $this->connect()->prepare($sql);


        if ($stmt->execute([$name, $type, $id])) {
            return;
        } else {
            echo 'Error uploading';
            die();
        }
    }

    protected function uploadDocuments($name, $type, $applicationNO)
    {
        $sql = "SELECT application_id FROM uploaded_files WHERE application_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$applicationNO]);
        $rowCount = $stmt->rowCount();



        if ($rowCount === 0) {
            $sql1 = "INSERT INTO uploaded_files (`name`, `type`, `application_id`) VALUES (?,?,?) ";
            $stmt1 = $this->connect()->prepare($sql1);
            $stmt1->execute([$name, $type, $applicationNO]);
        } else {
            $sql1 = "UPDATE uploaded_files SET `name` = ?, `type` = ? WHERE `application_id` = ? AND `name` = ? ";
            $stmt1 = $this->connect()->prepare($sql1);
            $stmt1->execute([$name, $type, $applicationNO, $name]);
        }
    }

    protected function singleClientFromNewApp($email)
    {
        $sql = "SELECT * FROM clients_personal_information WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$email])) {
            $result = $stmt->fetch();
            return $result;
        } else {
            die();
        }
    }

    protected function updateNewApplication($firstname, $middlename, $lastname, $birthday, $gender, $dependent, $email, $alternateEmail, $facebookLink, $placeOfBirth, $civilStatus, $primaryNumber, $postpaidPrepaid, $postpaidPlan, $primaryNumberRemarks, $alternateNumber, $postpaidPrepaidAlternate, $postpaidPlanAlternate, $alternateNumberRemarks, $houseNumber, $street, $barangay, $city, $municipality, $zipCode, $addressRemarks, $mapLink, $permanentAddress, $sssNumber, $husbandName, $husbandWork, $husbandRemarks, $motherName, $motherWork, $motherAddress, $companyName, $companyAddress, $agencyName, $branchSiteAddress, $lineOfBusiness, $companyNo1, $companyNo2, $dateHire, $position, $natureOfWork, $companyStatus, $basicSalary, $net1, $net2, $net3, $net4, $payrollType, $payrollDate1, $payrollDate2, $payrollDate3, $payrollDate4, $planToTransfer, $loanHistory1, $loanAmount1, $loanHistory2, $loanAmount2, $loanHistory3, $loanAmount3, $requestedAmount, $requestedTerm, $purposeOfLoan, $primaryBank, $accountNumber, $alternateBankName, $alternateAccountNumber, $netpay, $additionalExpenses, $approveAmount, $approveTerm, $disbursementDate, $reference1, $referenceNumber1, $referenceRelationship1, $reference2, $referenceNumber2, $referenceRelationship2, $reference3, $referenceNumber3, $referenceRelationship3, $forFoward, $applicationNo)
    {
        $sql = "UPDATE clients_personal_information SET firstname = ?, middlename = ?, lastname = ?, birthday = ?, gender = ?, dependent = ?, email= ?, alternate_email = ?, facebook = ?, place_of_birth = ?, civil_status = ?, primary_no = ?, primary_no_line = ?, primary_no_plan_amount = ?, primary_no_remarks = ?, secondary_no = ?, secondary_no_line = ?, secondary_no_plan_amount = ?, secondary_no_remarks = ?, sss_no = ?, spouse_name = ?, spouse_occupation = ?, spouse_remarks = ?, mothers_name = ?, mothers_occupation = ?, mothers_address = ?, for_forward = ?  WHERE application_no = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname, $middlename, $lastname, $birthday, $gender, $dependent, $email, $alternateEmail, $facebookLink, $placeOfBirth, $civilStatus, $primaryNumber, $postpaidPrepaid, $postpaidPlan, $primaryNumberRemarks, $alternateNumber, $postpaidPrepaidAlternate, $postpaidPlanAlternate, $alternateNumberRemarks, $sssNumber, $husbandName, $husbandWork, $husbandRemarks, $motherName, $motherWork, $motherAddress, $forFoward, $applicationNo]);


        $sql = "UPDATE clients_job_description SET company_name = ?, company_address = ?, agency_name = ?, branch_site_address = ?, line_of_business = ?, company_no1 = ?, company_no2 = ?, date_hired = ?, position = ?, nature_of_work = ?, status_in_company = ?, basic_salary = ?, salary1 = ?, salary2 = ?, salary3 = ?, salary4 = ?, payroll_type = ?, paydate1 = ?, paydate2 = ?, paydate3 = ?, paydate4 = ?, job_description_remarks = ? WHERE application_no = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$companyName, $companyAddress, $agencyName, $branchSiteAddress, $lineOfBusiness, $companyNo1, $companyNo2, $dateHire, $position, $natureOfWork, $companyStatus, $basicSalary, $net1, $net2, $net3, $net4, $payrollType, $payrollDate1, $payrollDate2, $payrollDate3, $payrollDate4, $planToTransfer, $applicationNo]);

        $sql = "UPDATE clients_loan_history SET history_name1 = ?, history_amount1 = ?, history_name2 = ?, history_amount2 = ?, history_name3 = ?, history_amount3 = ? WHERE application_no = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$loanHistory1, $loanAmount1, $loanHistory2, $loanAmount2, $loanHistory3, $loanAmount3, $applicationNo]);

        $sql = "UPDATE clients_loan_and_bank_details SET requested_amount = ?, requested_term =?, purpose_of_loan = ?, primary_bank = ?, primary_bank_no = ?, alternate_bank = ?, alternate_bank_no = ?, netpay = ?, additional_expenses = ?, approve_amount = ?, approve_term = ?, disbursement_date = ? WHERE application_no = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$requestedAmount, $requestedTerm, $purposeOfLoan, $primaryBank, $accountNumber, $alternateBankName, $alternateAccountNumber, $netpay, $additionalExpenses, $approveAmount, $approveTerm, $disbursementDate, $applicationNo]);

        $sql = "UPDATE clients_character_references SET char_ref1_name = ?, char_ref1_no = ?, char_ref1_relationship = ?,char_ref2_name = ?, char_ref2_no = ?, char_ref2_relationship = ?, char_ref3_name = ?, char_ref3_no = ?, char_ref3_relationship = ? WHERE application_no = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reference1, $referenceNumber1, $referenceRelationship1, $reference2, $referenceNumber2, $referenceRelationship2, $reference3, $referenceNumber3, $referenceRelationship3, $applicationNo]);

        $sql = "UPDATE clients_address SET house_no = ?, street = ?, barangay = ?, city = ?, municipality = ?, zip_code = ?, address_remarks = ?, map_link = ?, permanent_address = ? WHERE application_no = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$houseNumber, $street, $barangay, $city, $municipality, $zipCode, $addressRemarks, $mapLink, $permanentAddress, $applicationNo]);
    }

    protected function getAllUsersAgent()
    {
        $sql = "SELECT * FROM login_data ORDER BY `status`";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // SVO models actions

    protected function updateSingleData($status, $verifier, $forFoward, $id)
    {
        $sql = "UPDATE clients_personal_information SET status = :status, for_forward = :forFoward WHERE application_no = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['status' => $status, 'forFoward' => $forFoward, 'id' => $id]);

        $sql = "UPDATE clients_application_history SET approved_by = :verifier WHERE application_no = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['verifier' => $verifier, 'id' => $id]);

        return $stmt;
    }

    // inprocess_application
    protected function insertToProcessingApplication($applicationNo, $contractNo, $firstname, $middlename, $lastname, $contactNo1, $contactNo2, $contactNo3, $companyNo1, $companyNo2, $reference1, $reference2, $reference3, $dateApplied, $email, $address, $verifier, $verifiedBy)
    {
        $sql = "INSERT INTO inprocess_application (`application_no`,`contract_no`,`first_name`,`middle_name`,`last_name`,`contact_no1`,`contact_no2`,`contact_no3`,`company_no1`,,`company_no2`,`reference_contact_no1`,`reference_contact_no2`,`reference_contact_no3`,`date_applied`,`personal_email`,`address`,`verifier_name`,`verified_by`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);
    }


    protected function sampleFunction($tableName)
    {
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$tableName]);
        return $stmt->fetchAll();
    }

    public function sampleInsert($tableName, $array)
    {
        $sql = "INSERT INTO clients_personal_information VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([array($array)]);
    }

    protected function sampleGet($applicaitonNo)
    {
        $sql = "CALL addClient(?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$applicaitonNo]);
        // $result = $stmt->fetch();

        // return $result;
        return;
    }
} /* end of class scope */
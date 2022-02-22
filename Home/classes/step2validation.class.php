<?php

class Step2validation extends NewAppController
{

    private $email;
    private $houseNo;
    private $street;
    private $barangay;
    private $city;
    private $municipality;
    private $companyName;
    private $companyAddress;
    private $companyPhoneNo;
    private $joiningDate;
    private $industry;
    private $positionIncompany;
    private $grossMonthlyIncome;
    private $paydate1;
    private $paydate2;
    private $loanAmount;
    private $termType;
    private $terms;
    private $morning;
    private $afternoon;



    public function __construct($email, $houseNo, $street, $barangay, $city, $municipality, $companyName, $companyAddress, $companyPhoneNo, $joiningDate, $industry, $positionIncompany, $grossMonthlyIncome, $paydate1, $paydate2, $loanAmount, $termType, $terms, $morning, $afternoon)
    {
        $this->email = $email;
        $this->houseNo = $houseNo;
        $this->street = $street;
        $this->barangay = $barangay;
        $this->city = $city;
        $this->municipality = $municipality;
        $this->companyName = $companyName;
        $this->companyAddress = $companyAddress;
        $this->companyPhoneNo = $companyPhoneNo;
        $this->joiningDate = $joiningDate;
        $this->industry = $industry;
        $this->positionIncompany = $positionIncompany;
        $this->grossMonthlyIncome = $grossMonthlyIncome;
        $this->paydate1 = $paydate1;
        $this->paydate2 = $paydate2;
        $this->loanAmount = $loanAmount;
        $this->termType = $termType;
        $this->terms = $terms;
        $this->morning = $morning;
        $this->afternoon = $afternoon;
    }

    public function updateUserData()
    {
        if ($this->emptyInput() == false) {
            echo    "<script>
                        alert('Invalid Input!');
                    </script>";
            header('refresh: 0');
            exit();
        }

        $results = $this->updateClientsInformation(
            $this->houseNo,
            $this->street,
            $this->barangay,
            $this->city,
            $this->municipality,
            $this->companyName,
            $this->companyAddress,
            $this->companyPhoneNo,
            $this->joiningDate,
            $this->industry,
            $this->positionIncompany,
            $this->grossMonthlyIncome,
            $this->paydate1,
            $this->paydate2,
            $this->loanAmount,
            $this->terms,
            $this->morning,
            $this->afternoon,
            $this->email
        );

        return $results;
    }

    private function emptyInput()
    {
        $result = '';

        if (
            empty($this->email) ||
            empty($this->houseNo) ||
            empty($this->street) ||
            empty($this->barangay) ||
            empty($this->city) ||
            empty($this->municipality) ||
            empty($this->companyName) ||
            empty($this->companyAddress) ||
            empty($this->companyPhoneNo) ||
            empty($this->joiningDate) ||
            empty($this->industry) ||
            empty($this->positionIncompany) ||
            empty($this->grossMonthlyIncome) ||
            empty($this->paydate1) ||
            empty($this->paydate2) ||
            empty($this->loanAmount) ||
            empty($this->termType) ||
            empty($this->terms) ||
            empty($this->morning) ||
            empty($this->afternoon)
        ) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}

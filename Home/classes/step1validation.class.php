<?php

class Step1Validation extends NewAppController
{
    private $firstname;
    private $middlename;
    private $lastname;
    private $email;
    private $confirmEmail;
    private $password;
    private $confirmPassword;
    private $mobileNumber;

    // soon to add OTP 


    public function __construct($firstname, $middlename, $lastname, $email, $confirmEmail, $password, $confirmPassword, $mobileNumber)
    {
        $this->firstname = $firstname;
        $this->middlename = $middlename;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->confirmEmail = $confirmEmail;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->mobileNumber = $mobileNumber;
    }

    public function signUpUser()
    {
        if ($this->emptyInput() == false) {
            echo    "<script>
                        alert('Invalid Input!');
                    </script>";
            header('refresh: 0');
            exit();
        }

        if ($this->invalidEmail() == false) {
            echo    "<script>
                        alert('Invalid Email!');
                    </script>";
            header('refresh: 0');
            exit();
        }

        if ($this->pwdMatch() == false) {
            echo    "<script>
                        alert('Password not match!');
                    </script>";
            header('refresh: 0');
            exit();
        }

        if ($this->emailMatch() == false) {
            echo    "<script>
                        alert('Password not match!');
                    </script>";
            header('refresh: 0');
            exit();
        }

        if ($this->userNameTaken() == false) {
            echo    "<script>
                        alert('Username already exist!');
                    </script>";
            header('refresh: 0');
            exit();
        }

        // $this->createClientAccount($firstname, $middlename, $lastname, $email, $password, $mobileNumber);
        $output = $this->createClientAccount($this->firstname, $this->middlename, $this->lastname, $this->email, $this->password, $this->mobileNumber);
        return $output;
    }

    private function emptyInput()
    {
        $result = '';

        if (empty($this->firstname) || empty($this->middlename) || empty($this->lastname) || empty($this->email) || empty($this->confirmEmail) || empty($this->password) || empty($this->confirmPassword) || empty($this->mobileNumber)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail()
    {
        $result = '';
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function pwdMatch()
    {
        $result = "";

        if ($this->password !== $this->confirmPassword) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function emailMatch()
    {
        $result = "";

        if ($this->email !== $this->confirmEmail) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function userNameTaken()
    {
        $result = '';
        if ($this->checkExistingEmail($this->email) > 0) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}

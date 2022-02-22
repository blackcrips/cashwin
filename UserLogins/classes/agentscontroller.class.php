<?php

class AgentsController extends DbhModelAgents
{

    // check input username and password if valid
    public function login()
    {
        if (isset($_POST['login'])) {
            $status = 'active';
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username == "" || $password == '') {
                echo "<script>alert('Invalid Username or password!')</script>";
            } else {
                $getValidUser = $this->loginUser($username, $password);
                if ($getValidUser[0]['department'] == 'Compliance' && $getValidUser[0]['position'] == 'Approver') {
                    if ($getValidUser[0]['status'] == '') {
                        $this->creatingUserlogin($getValidUser[0]);
                        $this->adding_agent_status($status, $username);
                        header("Location: ./Components/Verifications/verifierDashboard.php");
                    } else {
                        echo "<script>alert('User already logged in!')</script>";
                        header("Refresh: 0");
                    }
                } else if ($getValidUser[0]['department'] == 'Compliance' && $getValidUser[0]['position'] == 'Senior Verification Officer') {
                    if ($getValidUser[0]['status'] == '') {
                        $this->creatingUserlogin($getValidUser[0]);
                        $this->adding_agent_status($status, $username);
                        header("Location: ./Components/Verifications/svoDashboard.php");
                    } else {
                        echo "<script>alert('User already logged in!')</script>";
                        header("Refresh: 0");
                    }
                } else if ($getValidUser[0]['department'] == 'Contracts' && $getValidUser[0]['position'] == 'Verification Officer') {
                    if ($getValidUser[0]['status'] == '') {
                        $this->creatingUserlogin($getValidUser[0]);
                        $this->adding_agent_status($status, $username);
                        header("Location: ./Components/Contracts/contracts.php");
                    } else {
                        echo "<script>alert('User already logged in!')</script>";
                        header("Refresh: 0");
                    }
                } else {
                    if ($getValidUser[0]['status'] == '') {
                        $this->creatingUserlogin($getValidUser[0]);
                        $this->adding_agent_status($status, $username);
                        header("Location: ./Components/Accounts/accounts.php");
                    } else {
                        echo "<script>alert('User already logged in!')</script>";
                        header("Refresh: 0");
                    }
                }
            }
        }
    }

    function redirectToSpecificPage()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION['userData'])) {
            $sessionStored = $_SESSION['userData'];
            if ($sessionStored['department'] == 'Compliance' && $sessionStored['position'] == 'Approver') {
                header("Location: ./Components/Verifications/verifierDashboard.php");
            } else if ($sessionStored['department'] == 'Compliance' && $sessionStored['position'] == 'Senior Verification Officer') {
                header("Location: ./Components/Verifications/svoDashboard.php");
            } elseif ($sessionStored['department'] == 'Contracts' && $sessionStored['position'] == 'Verification Officer') {
                header("Location: ./Components/Contracts/contracts.php");
            } else {
                header("Location: ./Components/Accounts/accounts.php");
            }
        } else {
            return;
        }
    }


    // activating session if valid username and password success
    public function creatingUserlogin($array)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // fetching userlogin information (position and firstname concatinated with lastname)
        // This will check for the assigned position to choose what Dashboard to be displayed
        $_SESSION['userData'] = array(
            'name' => $array['first_name'] . " " . $array['last_name'],
            'position' => $array['position'],
            'username' => $array['username'],
            'access' => $array['access'],
            'department' => $array['department']
        );

        return $_SESSION['userData'];
    }

    // delete agent's record from database
    public function deleteRecord()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['deleteID'];


            echo "<script>if(confirm('Are you sure you want to delete this application?') == true) {" .
                $this->deleteUserDetails($id) . "


            } else {
                return;
            }
            
            </script>";
        }
    }


    // add user agent to database
    public function addUser()
    {
        if (isset($_POST['create-user'])) {
            $firstname = $_POST["first-name"];
            $middlename = $_POST["middle-name"];
            $lastname = $_POST["last-name"];
            $username = $_POST["username"];
            $gender = $_POST["gender"];
            $email = $_POST["email-address"];
            $department = $_POST["department"];
            $position = $_POST["position"];
            $password = $_POST["first-password"];
            $passwordRepeat = $_POST['confirm-password'];
            $access = $_POST['access'];

            // checking if input password is same as the input re-type password

            $validatenewUser = new SignupValidation($firstname, $middlename, $lastname, $username, $gender, $email, $department, $position, $password, $passwordRepeat, $access);
            $validatenewUser->signUpUser();


            return header("Location: login.php");
        }
    }

    protected function createNewUser($firstname, $middlename, $lastname, $username, $gender, $email, $department, $position, $password, $access)
    {
        $this->createUser($firstname, $middlename, $lastname, $username, $gender, $email, $department, $position, $password, $access);
    }

    protected function checkUserAvalability($username, $email)
    {
        return $this->userAvailability($username, $email);
    }

    // Getting information from database based on username logged
    public function set_userdata()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        return $_SESSION['userData'];
    }

    public function logout()
    {
        $status = '';
        if (isset($_POST['log-out'])) {
            if (!isset($_SESSION)) {
                session_start();
            }

            $this->adding_agent_status($status, $_SESSION['userData']['username']);

            $_SESSION['userData'] = null;
            unset($_SESSION['userData']);
        }
    }


    // update agents details
    public function updateAgentDetails()
    {
        if (isset($_POST['update'])) {
            $id = $_POST['hiddenUpdateId'];
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $department = $_POST['department'];
            $position = $_POST['position'];
            $password = $_POST['password'];

            $this->updateData($firstname, $middlename, $lastname, $username, $gender, $email, $department, $position, $password, $id);

            echo "<script>
                            alert('Record successfully updated!');
                            </script>";
        }
    }
} // End of class
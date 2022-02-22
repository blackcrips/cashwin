<?php


class NewAppView extends NewAppModel
{
    public function createSession($array)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // fetching userlogin information (position and firstname concatinated with lastname)
        // This will check for the assigned position to choose what Dashboard to be displayed
        $_SESSION['clientData'] = array(
            'email' => $array['personal_email']
        );
    }

    public function getClientData()
    {
        if (!$_SESSION['clientData'] || $_SESSION['clientData'] == null || $_SESSION['clientData'] == '') {
            header("Location: login.php");
        } else {
            $getData = $this->singleClientFromNewApp($_SESSION['clientData']['email']);
            return $getData[1];
        }
    }
}

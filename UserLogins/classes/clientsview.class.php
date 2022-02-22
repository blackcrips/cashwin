<?php

class ClientsView extends DbhModelClients
{

    // showing all client's details to fresh bucket
    public function show_fresh_clients()
    {
        $status = "Fresh";
        return $this->show_details($status);
    }

    // showing all client's details to inprocess bucket
    public function show_inprocess_clients()
    {
        $status = "Inprocess";
        $activeUser = $_SESSION['userData']['name'];
        return $this->show_details_inprocess($status, $activeUser);
        // $status, $activeUser
    }

    // showing all client's details to inprocess bucket
    public function show_return_clients()
    {
        $status = "Return";
        $activeUser = $_SESSION['userData']['name'];
        return $this->show_details_inprocess($status, $activeUser);
    }

    // getting client's details when view button is clicked
    public function view_single_client_details()
    {
        if (isset($_POST['view-details'])) {
            $applicationNo = $_POST['viewDetailsHidden'];
            $singleClientData =  $this->get_client_details($applicationNo);

            return $singleClientData;
        }
    }

    public function editClient()
    {
        if (isset($_POST['edit'])) {
            $applicationNo = $_POST['save-ids'];
            $editClient = $this->get_client_details($applicationNo);

            $_SESSION['editClient'] = array(
                'id' => $editClient[0]['application_no']
            );

            header("Refresh: 0");
        }
    }

    public function displayClientDetails()
    {
        if ($_SESSION['editClient'] == '' || $_SESSION['editClient'] == null) {
            header("Location: ../../login.php");
        } else {
            $id = $_SESSION['editClient']['id'];
            $editClient = $this->get_clients_information($id);
            return $editClient;
        }
    }

    public function hideInprocessButton()
    {
        if (isset($_POST['view-details'])) {
            $id = $_POST['viewDetailsHidden'];
            $singleClient = $this->get_client_details($id);

            if ($singleClient[0]['status'] == 'Inprocess' || $singleClient[0]['status'] == 'Return') {
                echo 'hidden';
            } else {
                return;
            }
        }
    }

    // SVO view
    public function showForwardedApplications()
    {
        $status = "Senior Verification";
        return $this->show_details($status);
    }


    // contracts view

    public function showForContractsApplication()
    {
        $status = "Waiting for Signed Contracts";
        return $this->show_details($status);
    }

    // accounts view
    public function showAccountsApplication()
    {
        $status = "For Disbursement";
        return $this->show_details($status);
    }
}

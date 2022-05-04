<?php

class ClientsView extends DbhModelClients
{

    // getting client's details when view button is clicked
    public function view_single_client_details($request)
    {
        $singleClientData =  $this->get_client_details($request);

        return $singleClientData;
    }

    public function editClient()
    {
        if (isset($_POST['save-ids'])) {
            $applicationNo = $_POST['application_no'];

            $_SESSION['editClient'] = array(
                'id' => $applicationNo
            );

            header("Refresh: 0");
        }
    }

    public function displayClientDetails($id)
    {
        $displayDetails = $this->get_client_details($id);
        return $displayDetails;
    }

    public function showForEditDetails($id)
    {
        if (!isset($_SESSION['editClient']) || $_SESSION['editClient']['id'] == '') {
            header("Location: ../../login.php");
        } else {
            $displayDetails = $this->get_clients_information($id);
            return $displayDetails;
        }
    }

    public function hideInprocessButton()
    {
        if (isset($_POST['view-details'])) {
            $id = $_POST['viewDetailsHidden'];
            $singleClient = $this->get_client_details($id);

            if ($singleClient[0]['status'] == 'In Process' || $singleClient[0]['status'] == 'Return') {
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

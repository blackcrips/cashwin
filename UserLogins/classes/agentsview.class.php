<?php

class Agentsview extends DbhModelAgents
{

    // show all users/agents data
    public function showAgentsDetails()
    {

        $agentsDetails = $this->getAgentsData();
        return $agentsDetails;
    }


    // show agents data when button edit is clicked
    public function editDetails()
    {
        if (isset($_POST['edit'])) {
            $id = $_POST['editId'];
            $singleUser = $this->getUserData($id);
            return $singleUser;
        }
    }

    public function getAllUsers()
    {
        return $this->getAgentsData();
    }
}

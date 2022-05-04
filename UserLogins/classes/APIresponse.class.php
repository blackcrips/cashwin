<?php

class Apiresponse extends DbhModelClients
{
    public function displayClients($status)
    {
        $sql = "SELECT application_no,firstname,primary_no,email,id FROM clients_personal_information WHERE status = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status]);
        $result = $stmt->fetchAll();
        $rowCount = $stmt->rowCount();

        if ($rowCount <= 0) {
            $output = array(
                "recordsTotal"      => $rowCount,
                "recordsFiltered"   => $rowCount,
                "data"   => $rowCount,
            );
            exit(json_encode($output));
        } else {

            foreach ($result as $rowData) {
                $sub_array = array();
                $sub_array[] = $rowData['application_no'];
                $sub_array[] = $rowData['firstname'];
                $sub_array[] = $rowData['primary_no'];
                $sub_array[] = $rowData['email'];
                $sub_array[] = "<div class='action-buttons'>
                                    <form action='../../inc/deleteData.inc.php' id='form-action-buttons' method='post'>
                                        <input type='button' class='btn btn-primary' data-view-details value='View'>
                                        <input type='hidden' name='viewDetailsHidden' id='viewDetailsHidden' value='" . $rowData['id'] . "'>
                                        <input type='button' class='btn btn-danger " . $rowData['id'] . "' id='delete' name='delete' value='Delete'>
                                    </form>
                                </div>";
                $sub_array[] = $rowData['id'];


                $data[] = $sub_array;
            }

            $output = array(
                "recordsTotal"      => $rowCount,
                "recordsFiltered"   => $rowCount,
                "data"              => $data
            );

            exit(json_encode($output));
        }
    }
}

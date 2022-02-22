<?php


class SampleModel extends dbh
{
    public function sampleView()
    {
        $email = 'test7@email.com';

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
}

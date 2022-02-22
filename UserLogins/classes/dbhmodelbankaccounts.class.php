<?php

class DbhModelBankAccounts extends dbh {
    protected function get_bank_names() {
        $sql = "SELECT * FROM bank_accounts";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }
}
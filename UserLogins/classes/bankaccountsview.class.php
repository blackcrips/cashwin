<?php

    class BankAccountsView extends DbhModelBankAccounts {

        // displaying bank accounts name in interviewer form as dropdown option
        public function bankname_dropdown() {
            return $this->get_bank_names();
        }
    }
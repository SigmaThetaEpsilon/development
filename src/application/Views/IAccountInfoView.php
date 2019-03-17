<?php

declare(strict_types = 1);

class AccountInfo {
    public $isLoggedIn = false;

    public $loginError = '';
}

/**
 * Describes the behavior of a view that needs account info passed in.
 */
interface IAccountInfoView {
    /**
     * Mechanism to populate the account info to be used in the view.
     * @param accountInfo Reference to AccountInfo class
     */
    public function setAccountInfo($accountInfo);
}

?>
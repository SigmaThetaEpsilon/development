<?php

declare(strict_types = 1);

$viewsPath = __DIR__ . '/../';
require_once($viewsPath . "IView.php");
require_once($viewsPath . "IAccountInfoView.php");

class LoginView implements IView, IAccountInfoView {
    private $accountInfo = null;

    /**
     * Mechanism to populate the account info to be used in the view.
     * @param accountInfo Array of account information
     */
    public function setAccountInfo($accountInfo) {
        $this->accountInfo = $accountInfo;
    }

    /**
     * Prefix to put in a <title> element
     */
    public function getTitle(): string {
        return 'Login';
    }

    /**
     * main HTML content
     */
    public function getMainContent(): string {
        // TODO - error if failed to login
        // TODO - register link

        $html = <<<HTML
<section class="card cell--span-6 cell-center">
    <h3 class="card-header">Account Login</h3>
    <form action="/Accounts/Login">
        <div class="field">
            <label for="Username">Username</label>
            <input type="text" name="Username" id="Username" />
        </div>

        <div class="field">
            <label for="Password">Password</label>
            <input type="password" name="Password" id="Password" />
        </div>

        <input type="submit" value="Login" class="raised" title="Submit information to login." />
        
        <div>
            <a href="/Accounts/ForgotPassword" title="Start the process of resetting your password.">Forgot Password</a>
        </div>
    </form>
</section>
HTML;

        return $html;
    }
}

?>
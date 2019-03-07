<?php

declare(strict_types = 1);

require_once('IController.php');

class AccountsController implements IController {
    /**
     * Gets the base route for all requests handled by this controller.
     */
    public static function GetBaseRoute(): string {
        return 'accounts';
    }

     /**
     * Initializes the controller with the given application root
     * @param appRoot - Base path of the application
     */
     public function Initialize($appRoot) {
         // TODO - 

         // Views:
         // - Login
         // - Register
         // - Edit (by default can only edit self unless you have security)
         // - Index (can only get to if you have security)
         // - ForgotPassword
         // - ResetPassword

         // Actions:
         // - ProccessLogin 
         // - ProcessLogout
         // - ProcessRegister
         // - ProccessEdit
         // - ProcessForgotPassword
         // - ProcessResetPassword

         // Data model:
         // - First name
         // - Last name
         // - ID (auto-assigned)
         // - Username (unique)
         // - Password (store encrypted for security)
         // - E-mail address
         // - Status (active, inactive)
     }

     /**
     * Attempt to processes the given request
     * @param requestUri - Value from $_SERVER['REQUEST_URI']
     * @param requestMethod - Value from $_SERVER['REQUEST_METHOD']
     * @return bool
     */
    public function TryProcessRequest($requestUri, $requestMethod): bool {
        //TODO - 
    }
}

?>
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
        $viewsPath = $appRoot . 'Views/';
        require_once($viewsPath . 'IView.php');
        require_once($viewsPath . 'IAccountInfoView.php');
        require_once($viewsPath . 'ViewLayout.php');

        $routesPath = $viewsPath . 'Accounts/';
        require_once($routesPath . 'LoginView.php');

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
     * @param postValues - Value from $_POST (i.e. form input elements)
     * @param getValues - Value from $_GET (i.e. query string elements)
     * @return bool
     */
    public function TryProcessRequest($requestUri, $requestMethod, $postValues, $getValues): bool {
        if (HttpMethods::IsGet($requestMethod)) {
            return $this->tryProcessGetRequest($requestUri);
        }
        else if (HttpMethods::IsPost($requestMethod)) {
            return $this->tryProcessPostRequest($requestUri);
        }
        else {
            return false;
        }
    }

    private function tryProcessGetRequest($requestUri): bool {
        $uriPieces = explode('/', $requestUri);
        if (count($uriPieces) > 2) {
            $route = $uriPieces[2];
            if (strcasecmp($route, '') == 0) {
                // TODO - Part 5 (Only if admin)
                return false;
            }
            else if (strcasecmp($route, 'Login') == 0) {
                $view = new LoginView();
                $relativeRoute = '/' . $this->GetBaseRoute() . '/Login';
                ViewLayout::RenderHTML($view->getTitle(), $relativeRoute, $view->getMainContent());
                return true;
            }
            else if (strcasecmp($route, 'Register') == 0) {
                // TODO - part 2
                return false;
            }
            else if (strcasecmp($route, 'Edit') == 0) {
                // TODO - Part 3
                // Need to get current user from session
                // Can only edit self or if admin
                return false;
            }
            else if (strcasecmp($route, 'ForgotPassword') == 0) {
                // TODO - Part 4
                // Can only get to if no user in session?
                return false;
            }
            else if (strcasecmp($route, 'ResetPassword') == 0) {
                // TODO - Part 4
                // This is the part after the validation e-mail.
                return false;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    private function tryProcessPostRequest($requestUri): bool {

    }
}

?>
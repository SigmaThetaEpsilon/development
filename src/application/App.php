<?php

declare(strict_types = 1);

require_once('SessionManager.php');

/**
 * Top-level application in charge of processing requests.
 */
class App {
    /**
     * Processes the given HTTP Request
     * @param docRoot - Value from $_SERVER['DOCUMENT_ROOT']
     * @param requestUri - Value from $_SERVER['REQUEST_URI']
     * @param requestMethod - Value from $_SERVER['REQUEST_METHOD']
     * @param postValues - Value from $_POST (i.e. form input elements)
     * @param getValues - Value from $_GET (i.e. query string elements)
     */
    public static function ProcessRequest($docRoot, $requestUri, $requestMethod, $postValues, $getValues) {
        SessionManager::StartRequest();

        $appRoot = $docRoot . '/../application/';

        $controllerPath = $appRoot . 'Controllers/';
        require_once($controllerPath . 'IController.php');
        require_once($controllerPath . 'DefaultController.php');
        require_once($controllerPath . 'AccountsController.php');
        //require_once($controllerPath . 'ChaptersController.php');

        try {
            $uriToProcess = parse_url($requestUri, PHP_URL_PATH);
            $uriPieces = explode('/', $uriToProcess);
            $controller = App::getControllerForUri($uriPieces);
            if ($controller == null) {
                App::handleNoControllerFound($appRoot);
            }
            else {
                // TODO - give to controller to process request.
                $controller->Initialize($appRoot);                
                if (!$controller->TryProcessRequest($uriToProcess, $requestMethod, $postValues, $getValues)) {
                    App::handleFailedRequest($appRoot);
                }
            }
        }
        catch(Exception $e) {
            App::handleUnexpectedError($appRoot, $e);
        }

        SessionManager::EndRequest();
    }

    /**
     * Get the controller that should be used to process the request
     * @param uriPieces - Value from running explode on $_SERVER['REQUEST_URI'] with '/'
     * @return IController - Can be null if route is unknown (404), otherwise the c
     */
    private static function getControllerForUri($uriPieces) {
        $numUriPieces = count($uriPieces);
        if ($numUriPieces == 2) {
            // URI in format /<page>, so use the default controller
            $controller = new DefaultController();
        }
        else if ($numUriPieces > 2) {
            // URI in format /<controller>/<page>, so need to parse out
            $controllerName = $uriPieces[1];

            // TODO - for now this works, but should be a generic load all IController definitions then call it generically.
            if (strcasecmp($controllerName, AccountsController::GetBaseRoute()) == 0) {
                $controller = new AccountsController();
            }
            // else if (strcasecmp($controllerName, ChaptersController::GetBaseRoute())) {
            //     $controller = new ChaptersController();
            // }
            else {
                $controller = null;
            }
        }
        else {
            // Shouldn't happen
            $controller = null;
        }

        return $controller;
    }

    private static function handleNoControllerFound($appRoot) {
        error_log('No controller was found for request.');
        App::redirectHomePage($appRoot);
    }

    private static function handleFailedRequest($appRoot) {
        error_log('Mapped controller was unable to handle the request.');
        App::redirectHomePage($appRoot);
    }

    private static function handleUnexpectedError($appRoot, $e) {
        error_log('Unexpected error occurred. Details: ' . $e);
        App::redirectHomePage($appRoot); // TODO - 500 error page
    }

    /**
     * Performs an HTTP 303 redirect to the home page.
     */
    private static function redirectHomePage() {
        $homePage = 'https://www.sigmathetaepsilon.org'; // TODO - Configurable.
        header('Location: ' . $homePage, true, 303);
    }
}

?>
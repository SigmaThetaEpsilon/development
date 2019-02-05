<?php

declare(strict_types = 1);

/**
 * Top-level application in charge of processing requests.
 */
class App {
    /**
     * Processes the given HTTP Request
     * @param docRoot - Value from $_SERVER['DOCUMENT_ROOT']
     * @param requestUri - Value from $_SERVER['REQUEST_URI']
     * @param requestMethod - Value from $_SERVER['REQUEST_METHOD']
     */
    public static function ProcessRequest($docRoot, $requestUri, $requestMethod) {
        $appRoot = $docRoot . '/../application/';

        $controllerPath = $appRoot . 'Controllers/';
        require_once($controllerPath . 'IController.php');
        require_once($controllerPath . 'DefaultController.php');
        require_once($controllerPath . 'ChaptersController.php');

        try {
            $uriPieces = explode('/', $requestUri);
            $controller = App::getControllerForUri($uriPieces);
            if ($controller == null) {
                App::handleNoControllerFound($appRoot);
            }
            else {
                // TODO - give to controller to process request.
                $controller->Initialize($appRoot);
                if (!$controller->TryProcessRequest($requestUri, $requestMethod)) {
                    App::handleFailedRequest($appRoot);
                }
            }
        }
        catch(Exception $e) {
            App::handleUnexpectedError($appRoot, $e);
        }
    }

    /**
     * Get the controller that should be used to process the request
     * @param uriPieces - Value from running explode on $_SERVER['REQUEST_URI'] with '/'
     * @return IController - Can be null if route is unknown (404), otherwise the c
     */
    private static function getControllerForUri($uriPieces) {
        $controller = null;
        $numUriPieces = count($uriPieces);
        if ($numUriPieces > 1) {
            $controllerName = $uriPieces[0];

            // TODO - for now this works, but should be a generic load all IController definitions then call it generically.
            if (strcasecmp($controllerName, DefaultController::GetBaseRoute()) == 0) {
                $controller = new DefaultController();
            }
            // else if (strcasecmp($controllerName, ChaptersController::GetBaseRoute())) {
            //     $controller = new ChaptersController();
            // }
        }

        return $controller;
    }

    private static function handleNoControllerFound($appRoot) {
        // TODO - log that this happened
        App::redirectHomePage($appRoot);
    }

    private static function handleFailedRequest($appRoot) {
        // TODO - log that this happened
        App::redirectHomePage($appRoot);
    }

    private static function handleUnexpectedError($appRoot, $e) {
        // TODO - log that this happened
        App::redirectHomePage($appRoot); // TODO - 500 error page
    }

    /**
     * Performs an HTTP 303 redirect to the home page.
     * 
     */
    private static function redirectHomePage() {
        $homePage = 'https://www.sigmathetaepsilon.org';
        header('Location: ' . $homePage, true, 303);
    }
}

?>
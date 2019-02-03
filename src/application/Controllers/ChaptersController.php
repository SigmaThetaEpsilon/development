<?php

declare(strict_types = 1);

require_once('IController.php');

// TODO - finish this later.

/**
 * MVC controller for handling requests dealing with Chapter entities
 */
class ChaptersController implements IController {
    /**
     * Gets the base route for all requests handled by this controller.
     * @return string
     */
    public static function GetBaseRoute(): string {
        return 'Chapters';
    }

    /**
     * Dependency-injected base path of the application
     */
    private $appRoot = '';

    /**
     * Initializes the controller with the given application root
     * @param appRoot - Base path of the application
     */
    public function Initialize($appRoot) {

    }

    /**
     * Attempt to processes the given request
     * @param requestUri - Value from $_SERVER['REQUEST_URI']
     * @param requestMethod - Value from $_SERVER['REQUEST_METHOD']
     * @return bool
     */
    public function TryProcessRequest($requestUri, $requestMethod): bool {
        return false;
    }
}

?>
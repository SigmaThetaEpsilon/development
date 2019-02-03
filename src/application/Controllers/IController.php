<?php

declare(strict_types = 1);

/**
 * 'Enum' to represent different HTTP request methods.
 */
class HttpMethods {
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';
}

/**
 * Describes the behavior of an MVC controller
 */
interface IController {
    /**
     * Gets the base route for all requests handled by this controller.
     * This generally means requests must be in format '<value>/page'.
     * @return string
     */
    public static function GetBaseRoute(): string;

    /**
     * Initializes the controller with the given application root
     * @param appRoot - Base path of the application
     */
    public function Initialize($appRoot);

    /**
     * Attempt to processes the given request
     * @param requestUri - Value from $_SERVER['REQUEST_URI']
     * @param requestMethod - Value from $_SERVER['REQUEST_METHOD']
     * @return bool
     */
    public function TryProcessRequest($requestUri, $requestMethod): bool;
}

?>
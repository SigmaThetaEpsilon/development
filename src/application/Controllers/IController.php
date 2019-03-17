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

    public static function IsGet($method): bool {
        return HttpMethods::DoesMethodMatch($method, HttpMethods::GET);
    }

    public static function IsPost($method): bool {
        return HttpMethods::DoesMethodMatch($method, HttpMethods::POST);
    }

    private static function DoesMethodMatch($toCheck, $matchAgainst): bool {
        if ((strlen($toCheck) > 0) && (strlen($matchAgainst) > 0)) {
            return strcasecmp($toCheck, $matchAgainst) == 0;
        }
        else {
            return false;
        }
    }
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
     * @param postValues - Value from $_POST (i.e. form input elements)
     * @param getValues - Value from $_GET (i.e. query string elements)
     * @return bool
     */
    public function TryProcessRequest($requestUri, $requestMethod, $postValues, $getValues): bool;
}

?>
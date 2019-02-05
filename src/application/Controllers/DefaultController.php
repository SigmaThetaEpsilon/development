<?php

declare(strict_types = 1);

require_once('IController.php');

/**
 * MVC controller for handling requests at the home path.
 * Example requests:
 * - myCompany.com
 * - myCompany.com/about
 * - myCompany.com/contact
 */
class DefaultController implements IController {
    /**
     * Gets the base route for all requests handled by this controller.
     * This controller has special handling since it doesn't use a root path but rather ignores it.
     * @return string
     */
    public static function GetBaseRoute(): string {
        return '';
    }

    /**
     * Dependency-injected base path of the application
     */
    private $applicationRoot = '';

    /**
     * Initializes the controller with the document root for the application.
     * @param appRoot - Base path of the application
     */
    public function Initialize($appRoot) {
        $this->applicationRoot = $appRoot;
    }

    /**
     * Attempt to processes the given request
     * @param requestUri - Value from $_SERVER['REQUEST_URI']
     * @param requestMethod - Value from $_SERVER['REQUEST_METHOD']
     * @return bool
     */
    public function TryProcessRequest($requestUri, $requestMethod): bool {
        if (strcasecmp($requestMethod, HttpMethods::GET) == 0) {
            return $this->tryProcessGetRequest($requestUri);
        }
        else {
            return false; // TODO - Failure reason error code.
        }
    }

    /**
     * Attempt to process the given GET request.
     * @param requestUri - Value from $_SERVER['REQUEST_URI']
     * @return bool
     */
    private function tryProcessGetRequest($requestUri): bool {
        $viewsPath = $this->applicationRoot . 'Views/';
        require_once($viewsPath . 'IView.php');
        require_once($viewsPath . 'ViewLayout.php');
        
        $routesPath = $viewsPath . 'Default/';
        require_once($routesPath . 'IndexView.php');
        require_once($routesPath . 'PhiloiView.php');
        require_once($routesPath . 'StoreView.php');
        require_once($routesPath . 'ChaptersView.php'); // TODO - Transition this view from here to ChaptersController, where it will live in the future.

        $uriPieces = explode('/', $requestUri);
        if (count($uriPieces) > 1) {
            $route = $uriPieces[1];
            if (strcasecmp($route, '') == 0) {
                $view = new IndexView();
                $relativeRoute = '/' . $this->GetBaseRoute() . '';
                ViewLayout::RenderHTML($view->getTitle(), $relativeRoute, $view->getMainContent());
                return true;
            }
            else if (strcasecmp($route, 'philoi') == 0) {
                $view = new PhiloiView();
                $relativeRoute = '/' . $this->GetBaseRoute() . 'philoi';
                ViewLayout::RenderHTML($view->getTitle(), $relativeRoute, $view->getMainContent());
                return true;
            }
            else if (strcasecmp($route, 'store') == 0) {
                $view = new StoreView();
                $relativeRoute = '/' . $this->GetBaseRoute() . 'store';
                ViewLayout::RenderHTML($view->getTitle(), $relativeRoute, $view->getMainContent());
                return true;
            }
            else if (strcasecmp($route, 'chapters') == 0) {
                $view = new ChaptersView();
                $relativeRoute = '/' . $this->GetBaseRoute() . 'chapters';
                ViewLayout::RenderHTML($view->getTitle(), $relativeRoute, $view->getMainContent());
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
}

?>
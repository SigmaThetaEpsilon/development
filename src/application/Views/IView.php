<?php

/**
 * Describes the behavior of a view 
 */
interface IView {
    /**
     * identifier for the page you are rendering.
     */
    public function getRoute();
    
    /**
     * prefix to put in a <title> element
     */
    public function getTitle();

    /**
     * main HTML content
     */
    public function getMainContent();
}

?>
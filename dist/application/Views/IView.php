<?php

declare(strict_types = 1);

/**
 * Describes the behavior of a view 
 */
interface IView {
    /**
     * Prefix to put in a <title> element
     */
    public function getTitle(): string;

    /**
     * main HTML content
     */
    public function getMainContent(): string;
}

?>
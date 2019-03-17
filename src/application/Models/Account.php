<?php

/**
 * Data model to represent an entry in the 'accounts' table
 */
class Account {
    /**
     * Primary key for the entity.
     */
    public $ID = 0;

    /**
     * Username for the account.
     */
    public $Username = '';

    /**
     * Hashed password for the account.
     */
    public $Password = '';

    public $FirstName = '';

    public $LastName = '';

    public $EmailAddress = '';

    public $StatusID = 0;
}

?>
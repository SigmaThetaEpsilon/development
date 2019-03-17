<?php

/**
 * Class in charge of working with sessions
 */
class SessionManager {
    /**
     * Upon start of an HTTP request, make sure session can be worked with.
     */
    public static function StartRequest() {
        SessionManager::SetupSession();
        session_start();
    }

    /**
     * Upon end of an HTTP request, make sure session is handled.
     */
    public static function EndRequest() {
        session_write_close();
    }

    private static function SetupSession() {
        session_name('SID');

        $lifetime = 0; // Until browser is closed
        $path = '/';
        $domain = '';
        $secure = true;
        $httpOnly = true;

        session_set_cookie_params($lifetime, $path, $domain, $secure, $httpOnly);
    }
}

?>
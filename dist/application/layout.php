<?php

/**
 * Helper class in charge of rendering a consistent layout for a web application
 */
class Layout {
    /**
     * Renders some HTML with a consistent look and feel using a layout template. 
     */
    public static function renderHTML($pageTitle, $mainContent) {
        try {
            // TODO - more robust validation will be necessary
            if (strlen($pageTitle) == 0) { throw new InvalidArgumentException('Page title is invalid.'); }
            if (strlen($mainContent) == 0) { throw new InvalidArgumentException('Main content is invalid.'); }

            $html = layoutHTML();
            str_replace($tokenTitle, $pageTitle, $html);
            str_replace($tokenMainContent, $mainContent, $html);
            echo $html;
        }
        catch (Exception $e) {
            http_response_code(500);
            // TODO - log error somehow
        }
    }

    /**
     * Token to replace for the title in layout HTML.
     */
    private static $tokenTitle = '{{TITLE}}';

    /**
     * Token to replace for the main content in layout HTML.
     */
    private static $tokenMainContent = '{{MAIN_CONTENT}}';

    /**
     * Actual HTML template to render.
     * This syntax may look weird, but it is called a HEREDOC (http://php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc).
     * Basically a way to render a big multi-line string without needing to do a lot of manual concatenation.
     * @return string HTML layout
     */
    private static function layoutHTML() {
        return <<<HTML
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>$tokenTitle | Sigma Theta Epsilon</title> 

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="styles/appStyles.css" />
</head>
<body>
    <header>
        <a href="/" title="Return to home page">
            <img src="images/logo.png" alt="Organization logo" />
            Sigma Theta Epsilon
        </a>
    </header>

    <nav>
        TODO - some navigation links
    </nav>

    <section>
        <h1>$tokenTitle</h1>
        $tokenMainContent
    </section>

    <footer>
        <p>&copy; Copyright 2018 <a href="/" title="Return to home page">Sigma Theta Epsilon</a>. All rights reserved.</p>
        <p>TODO - Social Media Links</p>
    </footer>
</body>
</html>
HTML;
    }
}

?>
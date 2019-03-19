<?php

declare(strict_types = 1);

/**
 * Helper class in charge of rendering a consistent layout for a web application
 */
class ViewLayout {
    /**
     * Renders some HTML with a consistent look and feel using a layout template. 
     * @param $pageTitle - prefix to put in a <title> element
     * @param $pageUri - identifier for the page you are rendering to control the active link in the navbar.
     * @param $mainContent - main HTML content
     */
    public static function RenderHTML($pageTitle, $pageUri, $mainContent) {
        try {
            // TODO - more robust validation will be necessary
            if (strlen($pageTitle) == 0) { throw new InvalidArgumentException('Page title is invalid.'); }
            if (strlen($mainContent) == 0) { throw new InvalidArgumentException('Main content is invalid.'); }

            $navbarContents = ViewLayout::buildNavbarLeft($pageUri) . ViewLayout::buildNavbarRight();

            $html = ViewLayout::layoutHTML();
            $html = str_replace(ViewLayout::$tokenTitle, $pageTitle, $html);
            $html = str_replace(ViewLayout::$tokenMainContent, $mainContent, $html);
            $html = str_replace(ViewLayout::$tokenNavbar, $navbarContents, $html);

            echo $html;
        }
        catch (Exception $e) {
            http_response_code(500);
            // TODO - log error somehow
        }
    }

    /**
     * Helper in charge of building the navigation bar
     * @param $pageUri - identifier for the page you are rendering to control the active link in the navbar.
     * @return string HTML string
     */
    private static function buildNavbarLeft($pageUri): string {
        $navbarLinks = [
            '/' => 'Home',
            '/Chapters' => 'Chapters',
            '/Store' => 'Store',
            '/Philoi' => 'The Philoi'
        ];

        $navbarHtml = '';
        foreach ($navbarLinks as $uri => $caption) {
            $class = '';
            if (strcmp($uri, $pageUri) == 0) {
                $class = 'currentPage';
            }
            $linkHtml = "<a href='$uri' class='$class'>$caption</a>";
            $navbarHtml .= $linkHtml;
        }

        return $navbarHtml;
    }

    /**
     * Helper in charge of building the right-side of the navigation bar.
     * @return string HTML string
     */
    private static function buildNavbarRight(): string {
        $linkHtml = "<a href='/Accounts/Login'>Login</a>"; // TODO - look at session to see if we need login/logout link
        
        $html = "<div class='navbar-right'>";
        $html .= $linkHtml;
        $html .= "</div>";

        return $html;
    }

    /**
     * Token to replace for the title in layout HTML.
     */
    private static $tokenTitle = '{{TITLE}}';

    /**
     * Token to replace for the navigation bar content in layout HTML.
     */
    private static $tokenNavbar = '{{NAVBAR}}';

    /**
     * Token to replace for the main content in layout HTML.
     */
    private static $tokenMainContent = '{{MAIN_CONTENT}}';

    /**
     * Actual HTML template to render.
     * This syntax may look weird, but it is called a HEREDOC (http://php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc).
     * Basically a way to render a big multi-line string without needing to do a lot of manual concatenation.
     * The string has to start and end without any tabbing, otherwise it won't work.
     * @return string HTML layout
     */
    private static function layoutHTML(): string {
        $title = ViewLayout::$tokenTitle;
        $navbar = ViewLayout::$tokenNavbar;
        $mainContent = ViewLayout::$tokenMainContent;

        return <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>$title | Sigma Theta Epsilon</title> 

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="/styles/appStyles.css" />
</head>
<body>
    <div class="content">
        <header>
            <a href="/" title="Return to home page">
                <img src="/images/logo.png" alt="Sigma Theta Epsilon Logo" />
                <span>Sigma Theta Epsilon</span>
            </a>
            <p id="subHeader">National Christian Fraternity</p>
        </header>

        <nav>$navbar</nav>

        <main class="grid">
            $mainContent

            <noscript>
                <section class="cell--span-8 cell-center">
                    <h3 class="card-header">No JavaScript</h3>
                    <p>We noticed that you have JavaScript disabled, which we use in order to provide you a better user experience when visiting our website. We promise that we are not doing anything malicious to your computer.</p>
                    <p>More information about how and why to enable JavaScript can be found here: <a href="https://www.enable-javascript.com/" target="_blank" title="How to enable JavaScript">https://www.enable-javascript.com/</a></p>
                </section>
            </noscript>
        </main>
    </div>

    <footer>
        <p>&copy; Copyright 2018 <a href="/" title="Return to home page">Sigma Theta Epsilon</a>. All rights reserved.</p>
        <div>
            <a href="https://www.facebook.com/SigmaThetaEpsilon/" target="_blank" title="National Fraternity Facebook Page" class="socialMediaLink">
                <img src="/images/social/Facebook_White.png" alt="Facebook logo" />
            </a>
            <a href="https://twitter.com/SigmaTheta" target="_blank" title="National Fraternity Twitter Account" class="socialMediaLink">
                <img src="/images/social/Twitter_White.png" alt="Twitter logo" />
            </a>
            <a href="https://www.linkedin.com/groups/1888663/" target="_blank" title="National Fraternity LinkedIn Group" class="socialMediaLink">
                <img src="/images/social/LinkedIn_White.png" alt="LinkedIn logo" />
            </a>
        </div>
    </footer>
</body>
</html>
HTML;
    }
}

?>
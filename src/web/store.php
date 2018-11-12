<?php

define('APP_PATH', '../application/');
require(APP_PATH . 'layout.php');

$pageHtml = <<<HTML
<section class='card cell--span-8 cell-center'>
    <h3 class="card-header">Store</h3>
    <p>Sigma Theta Epsilon has partnered with <a href="https://undergroundshirts.com/" target="_blank">Underground Printing</a> to carry branded merchandise. We have worked with a designer to come up with clothing and other merchandise to show off your STE side like never before.</p>
    <p>We have arranged for 2-week ordering periods to collect orders, after which they will be processed as a bulk order. You can always check back here to see if we are in an ordering period or a processing period.</p>
    <p>Here is a link to the ordering form: <a href="https://pogo.undergroundshirts.com/collections/sigma-theta-epsilon" target="_blank">https://pogo.undergroundshirts.com/collections/sigma-theta-epsilon</a></p>
    <div id="storeCountdownContainer"><p>We are currently in a processing period. Check back later for our next sale.</p></div>
</section>

HTML;

Layout::renderHTML('Store', '/store.php', $pageHtml);

?>
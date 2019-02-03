<?php

declare(strict_types = 1);

require_once(__DIR__ . "/../IView.php");

class PhiloiView implements IView {
    /**
     * Prefix to put in a <title> element
     */
    public function getTitle(): string {
        return 'The Philoi';
    }

    /**
     * main HTML content
     */
    public function getMainContent(): string {
        $html = <<<HTML
<section class='card cell--span-8 cell-center'>
    <h3 class="card-header">The Philoi</h3>
    <p>The Philoi has traditionally been the alumni newsletter of Sigma Theta Epsilon. Starting in 2018, it is a newsletter not just for alumni brothers, but also for the active brothers.</p>
    <p>Here is a list of Philoi newsletters that have been published:</p>
    <ul>
        <li><a href="/files/philoi/Philoi102018.pdf" target="_blank">October 2018</a></li>
        <li><a href="/files/philoi/Philoi082003.pdf" target="_blank">July/August 2003</a></li>
        <li><a href="/files/philoi/Philoi111950.pdf" target="_blank">November 1950</a></li>
    </ul>
</section>
HTML;

        return $html;
    }
}

?>
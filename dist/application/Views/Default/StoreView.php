<?php

declare(strict_types = 1);

require_once(__DIR__ . "/../IView.php");

class StoreView implements IView {
    /**
     * Prefix to put in a <title> element
     */
    public function getTitle(): string {
        return 'Store';
    }

    /**
     * main HTML content
     */
    public function getMainContent(): string {
        $html = <<<HTML
<section class='card cell--span-8 cell-center'>
    <h3 class="card-header">Store</h3>
    <p>Sigma Theta Epsilon is working on getting new partners to do both bulk orders and ad-hoc orders. We will post updates when this has been finalized, so check back later.</p>
</section>
HTML;

        return $html;
    }
}

?>
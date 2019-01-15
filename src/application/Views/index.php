<?php

require_once("IView.php");

class HomeView implements IView {
    public function getRoute() {
        return '/';
    }
    
    public function getTitle() {
        return 'Home';
    }

    /**
     * main HTML content
     */
    public function getMainContent() {
        $html = <<<HTML
<div class="media-container cell--span-12">
    <div class="image-container">
        <img src="/images/media/jordan-river_1998x798.jpg" title="Jordan River" />
    </div>
    <p class="caption">Picture of the Jordan River, where Jesus was baptized by John the Baptist. <a href="https://commons.wikimedia.org/wiki/File:Jordan_River_(5418351509).jpg" target="_blank">Image source</a></p>
</div>

<section class='card cell--span-8 cell-center'>
    <h3 class="card-header">About Us</h3>
    <p>Sigma Theta Epsilon, National Christian Fraternity, is an organization that works with colleges and universities to help young men grow as a Christian and a member of society. We strive to do this by assigning each member The Task, which is symbolic of the duty that God has laid before each person. Rather than each person trying to figure this out on their own, Sigma Theta Epsilon believes that a fraternal organization can help each member figure out what The Task means to them so members can become more productive members of both the church and society as a whole.</p>
    <p>The meaning of the root Greek words of our fraternity mean "Fellow Workers with God." As such, we use the Bible verse 1 Corinthians 3:9 as a reminder of The Task and strive to pursue it together as a brotherhood of Jesus Christ.</p>
</section>
HTML;

        return $html;
    }
}

?>
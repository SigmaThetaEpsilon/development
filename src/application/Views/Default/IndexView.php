<?php

declare(strict_types = 1);

require_once(__DIR__ . "/../IView.php");

class IndexView implements IView {
    /**
     * Prefix to put in a <title> element
     */
    public function getTitle(): string {
        return 'Home';
    }

    /**
     * main HTML content
     */
    public function getMainContent(): string {
        $html = <<<HTML
<section class="card cell--span-8 cell-center">
    <h3 class="card-header">March Madness 2019</h3>
    
    <p>
        The National Fraternity of Sigma Theta Epsilon is offering up an NCAA March Madness Bracket Challenge!
        This year, each entry is $5/bracket submitted, with unlimited brackets being allowed.
    </p>

    <p>The money raised from the tournament challenge shall go as follows:</p>
    <ul>
        <li>1/3 to the tournament champion.</li>
        <li>1/3 to the the fraternity for future programs and operations.</li>
        <li>1/3 to the charity of the WINNERS choice.</li>
    </ul>

    <p>
        You read that correctly. 
        The winner not only takes a cut, but can help the National Board decide where to send a portion of the money raised in the event.
        Want to show us which organization you want to support right away if you take home the title? 
        Use that as your bracket entry name and we will confirm after the event who you want that money to go to.
    </p>

    <p>
        Use <a href="http://fantasy.espn.com/tournament-challenge-bracket/2019/en/group?redirect=tcmen%3A%2F%2Fx-callback-url%2FshowGroup%3FgroupID%3D3224759&ex_cid=tcmen2019_email&groupID=3224759&groupp=UGhpbG9pIQ%3D%3D&inviteuser=ezI5NjJFRjVBLTFCMDMtNDQ2Ny05NjUzLTlFOEIxOTVGNjMzRH0%3D&invitesource=email" target="_blank">this link</a> to join.
        Password is: <pre>STE1925!</pre>
    </p>

    <p>
        Use this button to send $5 to the National Fraternity.
        Be sure to include your name in the notes.
    </p>

    <div class="text-center">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
            <input type="hidden" name="cmd" value="_donations" />
            <input type="hidden" name="business" value="XZJV7A2FBC4QE" />
            <input type="hidden" name="item_name" value="March Madness 2019 Financial Gift" />
            <input type="hidden" name="currency_code" value="USD" />
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
            <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
        </form>
    </div>

    <p>
        Entries, including payments, must be submitted by March 21 by 12:00 PM EST. 
        All entries without a payment will be marked as disqualified.

        Thanks for participating. Good luck!
    </p>    
</section>

<div class="media-container cell--span-12">
    <div class="image-container">
        <img src="/images/media/jordan-river_1998x798.jpg" title="Jordan River" />
    </div>
    <p class="caption">Picture of the Jordan River, where Jesus was baptized by John the Baptist. <a href="https://commons.wikimedia.org/wiki/File:Jordan_River_(5418351509).jpg" target="_blank">Image source</a></p>
</div>

<section class='card cell--span-8 cell-center'>
    <h3 class="card-header">About Us</h3>
    <p>
        Sigma Theta Epsilon, National Christian Fraternity, is an organization that works with colleges and universities to help young men grow as a Christian and a member of society. 
        We strive to do this by assigning each member The Task, which is symbolic of the duty that God has laid before each person. 
        Rather than each person trying to figure this out on their own, Sigma Theta Epsilon believes that a fraternal organization can help each member figure out what The Task means to them so members can become more productive members of both the church and society as a whole.
    </p>
    <p>The meaning of the root Greek words of our fraternity mean "Fellow Workers with God." As such, we use the Bible verse 1 Corinthians 3:9 as a reminder of The Task and strive to pursue it together as a brotherhood of Jesus Christ.</p>
</section>
HTML;

        return $html;
    }
}

?>
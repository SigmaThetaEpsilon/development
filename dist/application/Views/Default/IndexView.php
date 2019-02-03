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
    <h3 class="card-header">Conclave 2019</h3>
    <p>Conclave 2019 will be March 22-24, 2019 at Ohio Northern University. Registration is live through <a href="https://www.eventbrite.com/d/oh--ada/spirituality--events/sigma-theta-epsilon/?end_date=2019-03-24&fbclid=IwAR10M6AWQnYrTrXLIIhOL42Ur6U13s-4GCBl7_-zgNKOw3lMNjMUC-Mx-0w&page=1&start_date=2019-03-22" target="_blank">Eventbrite</a>. Registration options:</p>
    <ul>
        <li>Ticket for Conclave</li>
        <li>Ticket for Conclave and room at the Inn at Ohio Northern University</li>
    </ul>

    <p>
        If you will not be able to attend Conclave this year but still want to contribute to the event, we are accepting donations through PayPal to help others attend who wouldn't be able to otherwise. 
        You can donate any amount using a PayPal account or a debit/credit card. 
        You can also add notes if you want to specify how you want your donation to be used.
    </p>
    <div class="text-center">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
            <input type="hidden" name="cmd" value="_donations" />
            <input type="hidden" name="business" value="XZJV7A2FBC4QE" />
            <input type="hidden" name="item_name" value="Conclave 2019 Participant Financial Gift" />
            <input type="hidden" name="currency_code" value="USD" />
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
            <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
        </form>
    </div>
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
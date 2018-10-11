<?php

define('APP_PATH', '../application/');
require(APP_PATH . 'layout.php');

$pageHtml = <<<HTML
<section class="card cell--span-6">
    <h3 class="card-header">Alpha Ohio</h3>
    <div class="columns-2">
        <p>
            Ohio Northern University
            <br />Ada, OH
            <br /><a href="http://www.onu.edu/" target="_blank">http://www.onu.edu/</a>
        </p>
        <iframe width="400" height="300" frameborder="0" style="border:0" allowfullscreen
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.78586413313!2d-83.83113164813406!3d40.76673427922435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883ec73b12b8d799%3A0xbada23aa6f45615b!2sOhio+Northern+University!5e0!3m2!1sen!2sus!4v1539232643264"></iframe>
    </div>
    <div class="columns-2">
        <div class="field">
            <label>Chater Date:</label>
            <p class="value-readonly">March 23, 1975</p>
        </div>
        <div class="field">
            <label>Founding Fathers:</label>
            <p class="value-readonly">Loyal Charles</p>
        </div>
    </div>
</section>

<section class="card cell--span-6">
    <h3 class="card-header">Alpha Texas</h3>
    <div class="columns-2">
        <p>
            Our Lady of the Lake University
            <br />San Antonio, TX
            <br /><a href="http://www.ollusa.edu/" target="_blank">http://www.ollusa.edu/</a>
        </p>
        <iframe width="400" height="300" frameborder="0" style="border:0" allowfullscreen
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3475.081651671736!2d-98.5455594483084!3d29.426409882023442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x865c5ecc39335bc5%3A0xb7ed2070f76424c8!2sOur+Lady+of+the+Lake+University!5e0!3m2!1sen!2sus!4v1539232788406"></iframe>
    </div>
    <div class="columns-2">
        <div class="field">
            <label>Chater Date:</label>
            <p class="value-readonly">March 6, 1999</p>
        </div>
        <div class="field">
            <label>Founding Fathers:</label>
            <p class="value-readonly">
                Joshua Anderson
                <br />Pedro Castillo
                <br />Bryon Cherepes
                <br />Ralph Martin Garza
                <br />Arturo Hernandez
                <br />Juan David Larios
                <br />Arturo Lopez
                <br />Francisco Lozano
                <br />Roger Urrabazo
                <br />Ruben Villalobos
            </p>
        </div>
    </div>
</section>
HTML;

Layout::renderHTML('Chapters', '/chapters.php', $pageHtml);

?>
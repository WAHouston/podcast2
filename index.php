<?php 
require 'head.php';
require 'header.php';
?>
<main>
    <h1 id="main-title">Parker's Podcast</h1>
    <div class="home-carousel">
        <div class="carousel-div"><img class="carousel-image" src="assets/images/willholder.jpg"/></div>
        <div class="carousel-div"><img class="carousel-image" src="assets/images/gpool.jpeg"/></div>
    </div>
    <h1 id="re-title">Recent Episodes</h1>
    <h2 class="home-episode-title">Episode 1</h2>
    <div class="home-episode">
        <audio class="player" controls preload="auto">
            <source src="assets/episodes/epiholder.wav" type="audio/wav"/>
        </audio>
        <a class="download" href="assets/episodes/epitry.zip"  download="Episode1">Download Episode 1</a>
    </div>
    <h2 class="home-episode-title">Episode 2</h2>
    <div class="home-episode">
        <audio class="player" controls preload="auto">
            <source src="assets/episodes/epiholder.wav" type="audio/wav"/>
        </audio>
        <a class="download" href="assets/episodes/epitry.zip"  download="Episode2">Download Episode 2</a>
    </div>
    <h2 class="home-episode-title">Episode 3</h2>
    <div class="home-episode">
        <audio class="player" controls preload="auto">
            <source src="assets/episodes/epiholder.wav" type="audio/wav"/>
        </audio>
        <a class="download" href="assets/episodes/epitry.zip"  download="Episode3">Download Episode 3</a>
    </div>
</main>
<?php
require 'footer.php';
?>

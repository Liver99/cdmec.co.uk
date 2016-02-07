<h1 id="title">Gauge One Layout - TO DO</h1>

<div id="subnav">
    <?php if(isset($subNav) && !empty($subNav)) echo $subNav; ?>
</div>

<div class="content box">
    <div class="content-in box">
        <div class="perex">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas, quam ac fringilla tempor, fes liber.
            Nunc eleifend placerat sapien in commodo. Nullam ornare fringilla purus eget faucibus nulla dapibus nec. varius in
            sapien.</p>
        </div>

        <p><a href="/img/content/image.jpg" data-lightbox="img1" title="My caption"><img src="/img/content/image.jpg" alt="" class="f-right" /></a>Stuff</p>
        <p>more stuff</p>
        <p>more stuff</p>
        <p>more stuff</p>

        <h2>Photogallery</h2>
        <div class="minigallery box">
            <?=$miniGallery?>
        </div>

        <div class="fix"></div>
    </div>
    <div class="content-bottom"></div>
</div>
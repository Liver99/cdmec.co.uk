<h1 id="title">Gallery <?php if (isset($albumInfo['name'])) echo ' - '.$albumInfo['name']; ?></h1>

<div id="subnav">
    <?php if(isset($albumInfo['link'])) {
        echo '<a href="'.base_url('gallery').'">Back to Albums</a><span>|</span><a href="'.$albumInfo['link'].'" target="_blank">Facebook Album</a>';
    } else {
        echo '<a href="https://www.facebook.com/CDMEC/photos_albums" target="_blank">Facebook Albums</a>';
    } ?>
</div>

<div class="content box">
    <div class="content-in box">
        <div class="perex">
            <?php if (isset($albumInfo['description'])) {
                echo $albumInfo['description'];
            } else {
                echo "<p>This is a gallery of some photos of the railway and other club activities. They are organised into the albums shown below.</p>";
            } ?>
        </div>

        <div class="galleryWrapper">
            <?php 
            if (isset($albums)) {
                foreach($albums as $album) {

                    $album['shortName'] = (strlen($album['name']) > 30) ? substr($album['name'],0,27).'...' : $album['name']; ?>
                    <a href="<?=base_url('gallery/'.$album['id']);?>" title="<?=$album['name']?>">
                        <div class="photo" style="background: url(<?=$album['cover_photo']?>); background-size:cover; <?php if (isset($album['shortName'])) { ?>border-radius:5px 5px 0 0;<?php } /* If there is no caption, style.css will add bottom border */?> "></div>

                        <?php if (isset($album['shortName'])) { ?>
                            <span class="itemName"><?=$album['shortName']?></span>
                        <?php } ?>
                    </a>
            <?php } } elseif (isset($photos)) {

                foreach ($photos as $photo) { 
                    $photo['name'] = (isset($photo['name'])) ? $photo['name'] : NULL;

                    $photo['shortName'] = (strlen($photo['name']) > 30) ? substr($photo['name'],0,27).'...' : $photo['name']; ?>

                    <a href="<?=$photo['source']?>" title="<?=$photo['name']?>" data-lightbox="$albumInfo['name']">
                        <div class="photo" style="background: url(<?=$photo['source']?>); background-size:cover; <?php if (isset($photo['shortName'])) { ?>border-radius:5px 5px 0 0;<?php } /* If there is no caption, style.css will add bottom border */?> " ></div>

                        <?php if (isset($photo['shortName'])) { ?>
                            <span class="itemName"><?=$photo['shortName']?></span>
                        <?php } ?>
                    </a>
            <?php } } ?>
        </div>

        <div class="fix"></div>
    </div>
    <div class="content-bottom"></div>
</div>
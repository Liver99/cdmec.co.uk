<div id="promo">
    <ul id="slider">
        <!--<li><img src="img/content/slider/slider-01.jpg" alt="" /><div class="caption left">Cheesy caption  1</div></li>-->
        <?php $files = array_diff(scandir("img/content/slider"), array('..', '.')); 
        shuffle($files);    // randomises order
        foreach ($files as $file) {
            echo '<li><img src="img/content/slider/'.$file.'" alt="" /></li>';
        }
    ?>
    </ul>
</div>

<div class="content box">
    <div class="content-in box">
        <div class="perex">
            <p>Welcome to the Chingford &amp; District Model Engineering Club</p>
        </div>
        <p><!--<a href="/img/content/logo.jpg" data-lightbox="img1" title="C&amp;DMEC Logo"><img src="/img/content/logo.jpg" alt="C&amp;DMEC Logo" width="180" class="f-right" /></a>-->
        <a href="/img/content/logo.svg" data-lightbox="img1" title="C&amp;DMEC Logo"><img src="/img/content/logo.svg" onerror="logo.jpg" alt="C&amp;DMEC Logo" width="180" class="f-right" /></a>

            Chingford is situated on the eastern edge of London (E4) close to both the 'North Circular' Ring Road and the M11 Motorway. Our interests in various forms of Model Engineering, make us a very active club and we also run two-scale railway tracks which are able to carry passengers. A Gauge One layout is also under construction.</p>
        <p>Situated in Ridgeway Park, Chingford E4 6XU, the railways are used to give rides to members of the public on Sunday and Bank Holiday Monday afternoons between April and the end of September from 2pm - 5:30pm.<!-- (Charge 60p for the <a href="<?=base_url('railway/raised-track');?>">Raised Track</a> or &pound;1.20 for the <a href="<?=base_url('railway/ground-level-track');?>">Ground Level Track</a>).--></p>
        <p>The Chingford and District Model Engineering Club is <?php echo date("Y")-1945; ?> years old. Our members come from all walks of life and do not necessarily have an engineering background. Membership is open to either gender (several of our female members are qualified train drivers) and starts at 10 for Apprentices, 14 for Juniors and 18 years for full membership.</p>
    </div>
    <div class="content-bottom"></div>
</div>


<div class="cols3">
    <div class="cols3-content box">
        <div class="col">
            <h2><a href="about">About Us</a></h2>
            <p><a href="about"><img src="img/content/col-01.jpg" class="block" alt="" width="270" height="120" /></a></p>
            <p class="smaller"><strong>C&amp;DMEC is a great club with an amazing history.</strong><br />
            Set in a Green Belt Park in Chingford, C&amp;DMEC was founded in 1945 and is enjoyed by all ages.</p>
            <ul>
                <!--<li><a href="about/history">See the club history</a></li>-->
                <li><a href="about">About us</a></li>
                <li><a href="about/membership">Membership details and benefits</a></li>
                <li><a href="about/membership">How do I join?</a></li>
                <li><a href="about/committee">Our Club Committee and Officials</a></li>
                <li><a href="contact">Where is the railway?</a></li>
            </ul>
        </div>
        
        <div class="col">
            <h2><a href="parties">Hire the Railway</a></h2>
            <p><a href="parties"><img src="img/content/col-02.jpg" class="block" alt="" width="270" height="120" /></a></p>
            <p class="smaller"><strong>You can hire the railway during running season.</strong><br />
            We can cater for both adult and childrens parties. You will have full use of your own minatiure railway &amp; crew!</p>
            <ul>
                <li><a href="parties">What is included?</a></li>
                <li><a href="parties">What are the dates available?</a></li>
                <li><a href="parties">How much does it cost?</a></li>
                <li><a href="contact">How do I contact you to book?</a></li>
                <li><a href="contact">Where is the railway?</a></li>
            </ul>
        </div>

        <div class="col last">
            <h2><a href="meetings">Forthcoming Events</a></h2>
            <p><a href="meetings"><img src="img/content/col-03.jpg" class="block" alt="" width="270" height="120" /></a></p>
            <p class="smaller"><strong>The clubs forthcoming meetings and events.</strong><br />
            The club maintains a full calendar for club members to enjoy. Here are some of the upcoming events.</p>
            <ul>
                <?php
                $i = 0;
                foreach ($events as $event) {
                    if ($i < 5 ) {
                        $event['name'] = (strlen($event['name']) > 35) ? substr($event['name'] , 0, 35).'...' : $event['name']; // truncate name so fits nicely on line
                        echo '<li><a href="http://www.facebook.com/events/'.$event['id'].'/" target="_blank">'.$event['name'].'</a></li>';
                    }
                    $i++;
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="cols3-bottom"></div>
</div>
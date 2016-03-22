<h1 id="title">Contact</h1>

<div id="subnav">
    <?php if(isset($subNav) && !empty($subNav)) echo $subNav; ?>
</div>

<div class="content box">
    <div class="content-in box">
        <div class="perex">
            <p>Questions? Comments? Suggestions? Want to book a party? We'd love to hear from you!</p>
        </div>

        <p>You will be able to contact club members who are to be found working at the club track on Sunday mornings (and Wednesday Evenings between May and the end of August).</p>
        <p>The Club Track &amp; Workshop - Ridgeway Park, Peel Close, Off Old Church Road, Chingford, London, E4 6XU</p>
        <p>Winter Wednesday Meetings - St. Edmunds Church Hall, at the junction of Chingford Mount Road and Larkswood Road, Chingford.</p>

        <a name="form"></a>
        <h2>Contact form</h2>
        <?php if (isset($message)) echo $message; ?>
        <?=form_open(base_url('contact/submit'));?>
            <div class="box-01">
                <p class="nomt"><strong>Your Name:</strong><?php echo form_error('name'); ?><br />
                <input name="name" type="text" size="65" class="input" value="<?=set_value('name')?>" /></p>

                <p><strong>Your E-mail:</strong><?php echo form_error('email'); ?><br />
                <input name="email" type="text" size="65" class="input" value="<?=set_value('email')?>" /></p>

                <p><strong>Subject Line:</strong><?php echo form_error('subject'); ?><br />
                <input name="subject" type="text" size="65" class="input" value="<?=set_value('subject')?>" /></p>

                <p><strong>Your Message:</strong><?php echo form_error('message'); ?><br />
                <textarea name="message" cols="95" rows="10" class="input" style="width:550px; height:150px;"><?=set_value('message')?></textarea></p>

                <p><strong>Spam Protection: 5+2=</strong><?php echo form_error('spam_protection'); ?><br />
                <input name="spam_protection" type="text" size="65" class="input" value="<?=set_value('spam_protection')?>" /></p>

                <p class="nomb"><input type="submit" value="Send message" class="input-submit" /></p>
            </div>
        <?=form_close()?>

        <a name="email"></a>
        <h2>Email</h2>
        <p>If contact forms aren't your thing, feel free to email us direct: <a href="mailto:contact@cdmec.co.uk" target="_top">contact@cdmec.co.uk</a></p>

        <a name="facebook"></a>
        <h2>Facebook</h2>
        <p>Get in contact via our <a href="https://www.facebook.com/CDMEC" target="_blank">Facebook Page</a>.</p>

        <a name="map"></a>
        <h2>Map</h2>
        <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?q=51.624546,-0.009691&amp;num=1&amp;t=h&amp;ie=UTF8&amp;ll=51.624503,-0.009256&amp;spn=0.001534,0.004128&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://www.google.com/maps?q=51.624546,-0.009691&amp;num=1&amp;t=h&amp;ie=UTF8&amp;ll=51.624503,-0.009256&amp;spn=0.001534,0.004128&amp;z=14&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
    </div>
    <div class="content-bottom"></div>
</div>

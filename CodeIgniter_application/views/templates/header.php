<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="Description" content="Interested in learning model engineering or getting involved with a miniature steam railway, then join Chingford &amp; District Model Engineering Club">
    <meta name="Keywords" content="chingford, and, &amp;, district, model, engineering, club, society, web site, miniature railway, steam railway, steam trains, model engineering, london, UK, north nondon, britain, railway, E4, carriage, wagon, historic, vehicle, clocks, trains, public, train rides, traction engines, static engines, stationery engines, stationery, model making, workshop, engineering club, society, cdmec, cadmec, c&amp;dmec, CDMEC,   C&amp;DMEC,  Chingford miniature trains,   Ridgeway park trains">
    <!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="/css/main-ie6.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="/css/reset.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="/css/lightbox.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="/css/timeline.css" />
    <link rel="shortcut icon" href="<?=base_url("favicon.ico")?>" />
    <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/js/lightbox-2.6.min.js"></script>
    <script type="text/javascript" src="/js/jquery.innerfade.js"></script>
    <script type="text/javascript">$(document).ready(function(){$('#slider').innerfade({animationtype: 'fade',speed: 1000,timeout: 3000,type: 'sequence',containerheight: 'auto'});});</script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-68425392-1', 'auto');
        ga('send', 'pageview');
    </script>
    <title><?php if (isset($title)) echo $title; ?> - Chingford &amp; District Model Engineering Club</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <div id="logo"><a href="<?=base_url()?>" title="Chingford &amp; District Model Engineering Club">C<span>hingford</span> &amp; D<span>istrict</span> M.E.C</a></div>
            <div id="nav">
                <a <?php if (strcasecmp('home', $page) == 0) { ?>class="current"<?php } ?>     href="<?=base_url()?>" >Home</a>
                <span>|</span>
                <a <?php if (strcasecmp('about', $page) == 0) { ?>class="current"<?php } ?>    href="<?=base_url('about')?>">About</a>
                <span>|</span>
                <a <?php if (strcasecmp('railway', $page) == 0) { ?>class="current"<?php } ?>  href="<?=base_url('railway')?>">Railway</a>
                <span>|</span>
                <a <?php if (strcasecmp('meetings', $page) == 0) { ?>class="current"<?php } ?> href="<?=base_url('meetings')?>">Meetings</a>
                <span>|</span>
                <a <?php if (strcasecmp('parties', $page) == 0) { ?>class="current"<?php } ?>  href="<?=base_url('parties')?>">Parties</a>
                <span>|</span>
                <a <?php if (strcasecmp('gallery', $page) == 0) { ?>class="current"<?php } ?>  href="<?=base_url('gallery')?>">Gallery</a>
                <span>|</span>
                <a <?php if (strcasecmp('contact', $page) == 0) { ?>class="current"<?php } ?>  href="<?=base_url('contact')?>">Contact</a>
            </div>
        </div>
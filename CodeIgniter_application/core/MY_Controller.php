<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE); // debugging
    }


    // Verifies that a view file exists for the path called.
    public function isPathValid($route) {
        if (file_exists(APPPATH.'views/pages/'.$route.'.php')) {
            return $route;
        }
        return FALSE;
    }

    public function getData($page, $subPage = NULL) {
        $data['page'] = $page;
        $data['title'] = isset($subPage) ? $this->getTitle($subPage) : $this->getTitle($page);
        $nav = $this->navigation->load($page, $subPage);
        $data['mainNav'] = $nav['main'];
        $data['subNav'] = $nav['sub'];
        $data['miniGallery'] = $this->miniGallery($page, $subPage);
        return $data;
    }

    public function getFBEvents() {
        $this->load->library('facebook');

        $fbquery = $this->facebook->api('cdmec/events?limit=999', 'GET');
        $events = array();
        foreach($fbquery['data'] as $event) {
            $start_time = explode('T', $event['start_time']);
            if ($start_time[0] > date('Y-m-d')) {   // if the event isn't occuring in the past
                array_push($events, $event);
            }
        }
        return array_reverse($events);
    }

    private function getTitle($str) {
        $str = str_replace("-", " ", $str);   // replace hyphens with spaces
        $str = ucwords($str);                 // uppercase first letter of each word
        return $str;
    }

    private function miniGallery($page = NULL, $subPage = NULL) {
        // return hmtl for 5 random photos to go at bottom of every page
        // get url of 5 random pictures in /img/content/minigallery/*
        // maybe use filenames and only use ones with keywords matching those in parameters passed to function?
        $files = array_diff(scandir("img/content/minigallery"), array('..', '.'));
        $randKeys = array_rand($files, 5);
        // We use div with background-image rather than img tag to use css to keep
        // aspect ratios. Saves nasty stretches.    
        return '<a href="/img/content/minigallery/'.$files[$randKeys[0]].'" data-lightbox="minigallery"><div style="background-image: url(\'/img/content/minigallery/'.$files[$randKeys[0]].'\');"></div></a>
                <a href="/img/content/minigallery/'.$files[$randKeys[1]].'" data-lightbox="minigallery"><div style="background-image: url(\'/img/content/minigallery/'.$files[$randKeys[1]].'\');"></div></a>
                <a href="/img/content/minigallery/'.$files[$randKeys[2]].'" data-lightbox="minigallery"><div style="background-image: url(\'/img/content/minigallery/'.$files[$randKeys[2]].'\');"></div></a>
                <a href="/img/content/minigallery/'.$files[$randKeys[3]].'" data-lightbox="minigallery"><div style="background-image: url(\'/img/content/minigallery/'.$files[$randKeys[3]].'\');"></div></a>
                <a href="/img/content/minigallery/'.$files[$randKeys[4]].'" data-lightbox="minigallery"><div style="background-image: url(\'/img/content/minigallery/'.$files[$randKeys[4]].'\');"></div></a>';
        
    }
}
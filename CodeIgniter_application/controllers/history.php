<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class History extends MY_Controller {

    public function index() {
        $data = $this->getData('about', 'history');
        $data['extraHeader'] = '<link rel="stylesheet" media="screen,projection" type="text/css" href="/css/timeline.css" />';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/about/history', $data);
        $this->load->view('templates/footer');
    }

}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
    }

    public function index() {
    	/* TEMPOARY REDIRECT */
    	// You have to load url helper before you can use redirect 
	    // function in codeigniter
	    $this->load->helper('url');
	    redirect('http://chingford-model-engineering.com');

        $data = $this->getData('projects');
        $this->load->view('templates/header', $data);
        $this->load->view('pages/projects', $data);
        $this->load->view('templates/footer');
    }
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {
    // spam protection
    protected   $spam_question      =   '5+2';
    protected   $spam_answer        =   '7';

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');    //http://ellislab.com/codeigniter/user-guide/helpers/form_helper.html
    }

    public function index() {
        $data = $this->getData('contact');
        $this->load->view('templates/header', $data);
        $this->load->view('pages/contact', $data);
        $this->load->view('templates/footer');
    }

    public function success() {
        $data = $this->getData('contact');
        $data['message'] = "<span style=\"color:green;\">Your message has been received. We should be in contact shortly!</span>";
        $this->load->view('templates/header', $data);
        $this->load->view('pages/contact', $data);
        $this->load->view('templates/footer');
    }

    public function submit() {
        $this->load->library('form_validation');

        // trim off whitespace from beginning to end
        // Set all fields as required
        // http://ellislab.com/codeigniter%20/user-guide/libraries/form_validation.html
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');

        $this->form_validation->set_rules('name', 'Your Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Your E-mail', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('subject', 'Subject Line', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Your Message', 'trim|required|xss_clean');

        $this->form_validation->set_rules('spam_protection', 'Spam Protection', 'callback_spam_protection');

        if($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            // success! email it, assume it sent, then show contact success view.

            $this->load->library('email');
            $this->email->from($this->input->post('email'), $this->input->post('name'));
            $this->email->to('contact@chingford-model-engineering.com');
            $this->email->subject("Contact form response: ".$this->input->post('subject'));
            $this->email->message($this->input->post('message'));
            $this->email->send();

            $this->success();
        }
    }

    // the callback for checking the spam protection. Only one question/one answer, very basic.
    public function spam_protection($str) {
        // we will assume the user is lazy with their caps lock
        if (strtolower(trim($str)) == strtolower(trim($this->spam_answer))) {
            return true;
        }
        else {
            $this->form_validation->set_message('spam_protection', 'The %s field did not match the correct answer');
            return false;
        }
    }

}
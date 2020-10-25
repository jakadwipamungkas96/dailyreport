<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drn_Controller extends REST_Controller {

    protected $data;

    function __construct()
    {
        parent::__construct();
		
		// print_r('<pre>');
        // print_r($this->session->userdata());
        // print_r(base_url());
        // exit();

        $this->data['users'] = $this->session->userdata('authDRN');

        if($this->uri->segment(1) != 'login' && $this->uri->segment(1) != 'verify' && $this->uri->segment(1) != 'forgot'){
            if(!$this->data['users'])
                redirect(base_url('login'));
        }elseif($this->data['users'] != null){
            redirect(base_url());
        }
    }

}

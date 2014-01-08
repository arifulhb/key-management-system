<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    
    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor
    
    public function index()
    {
            $data=site_data();
            $data['_page_title']='Home';
            //$this->template->home($data);
            redirect('request');
    }        
    
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
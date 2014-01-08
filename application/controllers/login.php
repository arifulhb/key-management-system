<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    
    
    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor
    
	public function index()
	{
            if($this->session->userdata('is_logged_in')==TRUE){            
                redirect('request/index');
            }else{
		$data=site_data();
                $data['_page_title']='Login';
                $this->template->admin_login($data);
            }
            
	}//end index
    public function logout(){
        
        $this->session->sess_destroy();
        $this->session->set_userdata(array('is_logged_in'=>'','user_name'=>''));
        redirect('login');
    }//end function

    public function validation(){
            $data['user']=$this->input->post('user_email');
            $data['pass']=md5($this->input->post('user_pass'));
            
            $this->load->model('login_model');
            $user=$this->login_model->validate($data);
            //print_r($user);
            //exit();
            if(count($user)==1){
                //pass
                //echo ' login pass ';
                //echo 'sn '.$user['user_sn']                    ;
                //exit();
                    $user_ses = array(
                            'user_sn' => $user[0]['usn'],                            
                            'user_name' => $user[0]['user_name'],                            
                            'user_email' => $user[0]['user_email'],
                            'staff_no' => $user[0]['staff_no'],                            
                            'is_logged_in' => true
                    );
                    $this->session->set_userdata($user_ses);
                    
                    redirect('request/index');
                                                        
            }else{
                //not pass
                redirect('login/index');
            }
            
        }//end function
        
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
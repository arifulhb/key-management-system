<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
    
    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor
    
    public function index()
    {
        if($this->session->userdata('is_logged_in')==TRUE){            
                    
            $data=site_data();

            $data['_page_title']='User Index';
            $this->load->library('pagination');

            //set pagination configuration
            $config=  getPaginationConfig();//this function is from helpers/ahb_helper.php file
            $config['base_url'] = base_url().'user/index';
            $this->load->model('user_model');    

            $config['total_rows'] = $this->user_model->getTotalNum();        
            $config['use_page_numbers']=true;
            $config['per_page'] = 10;
            $config['num_links'] = 5;        
            $config['uri_segment'] = 3;                        
            $this->pagination->initialize($config);

           
            $data['_total_rows']=$config['total_rows'];

            if($this->uri->segment(3)!=''){
                //if page number exisit
                $last=$this->uri->segment(3)*$config['per_page']>$config['total_rows']?$config['total_rows']:$this->uri->segment(3)*$config['per_page'];

                $data['_pagi_msg']=  (($this->uri->segment(3)-1)*($config['per_page']+1)).' - '.$last;            
                //echo 'pagi msg: '.$data['_pagi_msg'];
                $data['_list']=$this->user_model->getList($config['per_page'],($config['per_page']*($this->uri->segment(3)-1)+1));
            }else{
                if($config['total_rows']>$config['per_page']){
                    $last=$config['per_page'];      
                }else{
                    $last=$config['total_rows'];      
                }

              $data['_pagi_msg'] = '1 - '.$last;                  
              $data['_list']=$this->user_model->getList($config['per_page'],$this->uri->segment(3));
            }
            $this->template->user_index($data);
            
            
            }else{
                //Not logged in
                redirect('login');
            
            }
    }//end    
    
    public function add(){
            $data=site_data();
            $data['_page_title']='Add User';
            $this->template->user_add($data);
    }//
    
    public function edit(){
        
        $data=site_data();
        $id=$this->uri->segment(3); 

        $this->load->model('user_model');
        
        $data['_record']=$this->user_model->getRecord($id);
        $data['_page_title']='Edit User';
        
        $this->template->user_edit($data);
       
    }//end 

    public function changepassword(){
        $data=site_data();
        
        $id=$this->session->userdata('user_sn'); 
        //echo 'id: '.$id;
        //exit();

        $this->load->model('user_model');
        
        $data['_record']=$this->user_model->getRecord($id);
        $data['_page_title']='Change Password';
        
        $this->template->user_change_pass($data);
    }
    
    public function change_password_validation(){
        
        $id=$this->session->userdata('user_sn'); 
        $new_pass=$this->input->post('new_pass');
        
        $this->load->model('user_model');
        $res=$this->user_model->change_pass($id,$new_pass);
        
        if($res==true){
            redirect('user/index');
        }
    }//end function

    public function save(){
        
        $data['staff_no']=$this->input->post('staff_no');
        $data['user_name']=$this->input->post('user_name');
        $data['pass']=md5($this->input->post('user_email'));
        $data['user_email']=$this->input->post('user_email');        
        
        $action=$this->input->post('action');
        $usn=$this->input->post('usn');        
        
        $this->load->model('user_model');
        if($action=='update'){
            $res=$this->user_model->update($data,$usn);
        }else{
            $res=$this->user_model->insert($data);
        }
        if($res==true){
            redirect('user/index');
        }else{
            
            $data['_page_title']='Add User';
            $data['_record']=$data;
            $data['_message']='Error in Database Save Operation';
            $this->template->contractor_add($data);
        }
        
        
        
    }//end function
    
    public function delete(){
        $id=$this->uri->segment(3); 

        $this->load->model('user_model');
        
        $res=$this->user_model->remove($id);
                
        if($res==true){
            redirect('user/index');
        }else{
            //Show a error message
            redirect('user/index');
        }
    }
        
}//end class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
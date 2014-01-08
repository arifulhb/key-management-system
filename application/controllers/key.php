<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Key extends CI_Controller {
    
    
    public function __construct()
    {
        
            parent::__construct();
            $this->load->library('template');
                    

    }//end constractor
    
    public function index()
    {
        if($this->session->userdata('is_logged_in')==TRUE){            
            $data=site_data();

            $data['_page_title']='Key Index';
            $this->load->library('pagination');

            //set pagination configuration
            $config=  getPaginationConfig();//this function is from helpers/ahb_helper.php file
            $config['base_url'] = base_url().'key/index';
            $this->load->model('key_model');    

            $config['total_rows'] = $this->key_model->getTotalNum();        
            $config['use_page_numbers']=true;
            $config['per_page'] = 20;
            $config['num_links'] = 5;        
            $config['uri_segment'] = 3;                        
            $this->pagination->initialize($config);

           
            $data['_total_rows']=$config['total_rows'];

            if($this->uri->segment(3)!=''){
                //if page number exisit
                $last=$this->uri->segment(3)*$config['per_page']>$config['total_rows']?$config['total_rows']:$this->uri->segment(3)*$config['per_page'];

                $data['_pagi_msg']=  (($this->uri->segment(3)-1)*($config['per_page']+1)).' - '.$last;                            
                $data['_list']=$this->key_model->getList($config['per_page'],($config['per_page']*($this->uri->segment(3)-1)+1));
            }else{
                if($config['total_rows']>$config['per_page']){
                    $last=$config['per_page'];      
                }else{
                    $last=$config['total_rows'];      
                }

              $data['_pagi_msg'] = '1 - '.$last;                  
              $data['_list']=$this->key_model->getList($config['per_page'],$this->uri->segment(3));
            }
            $this->template->key_index($data);
            
        }else{
            redirect('login');
        }
    }   
    
    public function add(){
        if($this->session->userdata('is_logged_in')==TRUE){            
            $data=site_data();
            $data['_page_title']='Add Key';
            $this->template->key_add($data);
            }else{
            redirect('login');
        }
    }//
    
    public function edit(){
        if($this->session->userdata('is_logged_in')==TRUE){            

        $data=site_data();
        $id=$this->uri->segment(3); 

        $this->load->model('key_model');
        
        $data['_record']=$this->key_model->getRecord($id);
        $data['_page_title']='Edit Key';
        
        $this->template->key_edit($data);
        }else{
            redirect('login');
        }
    }//end 


    public function save(){
        
        $data['key_no']=$this->input->post('key_no');
        $data['location']=$this->input->post('location');        
        $data['status']=$this->input->post('status');        
        $data['remarks']=$this->input->post('remark');
        
        $action=$this->input->post('action');
        $ksn=$this->input->post('ksn');        
        
        $this->load->model('key_model');
        if($action=='update'){
            $res=$this->key_model->update($data,$ksn);
        }else{
            $res=$this->key_model->insert($data);
        }
        if($res==true){
            redirect('key/index');
        }else{
            
            $data['_page_title']='Add Key';
            $data['_record']=$data;
            $data['_message']='Error in Database Save Operation';
            $this->template->key_add($data);
        }
        
        
        
    }//end function
    
    public function delete(){    


        $id=$this->uri->segment(3); 

        $this->load->model('key_model');
        
        $res=$this->key_model->remove($id);
                
        if($res==true){
            redirect('key/index');
        }else{
            //Show a error message
            redirect('key/index');
        }
        
    }//end delete
    
}//end class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
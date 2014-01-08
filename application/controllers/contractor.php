<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contractor extends CI_Controller {
    
    
    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor
    
    public function index()
    {
        if($this->session->userdata('is_logged_in')==TRUE){            
                    
            $data=site_data();

            $data['_page_title']='Contractor Index';
            $this->load->library('pagination');

            //set pagination configuration
            $config=  getPaginationConfig();//this function is from helpers/ahb_helper.php file
            $config['base_url'] = base_url().'contractor/index';
            $this->load->model('contractor_model');    

            $config['total_rows'] = $this->contractor_model->getTotalNum();        
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
                $data['_list']=$this->contractor_model->getList($config['per_page'],($config['per_page']*($this->uri->segment(3)-1)+1));
            }else{
                if($config['total_rows']>$config['per_page']){
                    $last=$config['per_page'];      
                }else{
                    $last=$config['total_rows'];      
                }

              $data['_pagi_msg'] = '1 - '.$last;                  
              $data['_list']=$this->contractor_model->getList($config['per_page'],$this->uri->segment(3));
            }
            $this->template->contractor_index($data);
            
            
            }else{
                //Not logged in
                redirect('login');
            
            }
    }//end    
    
    public function addContractor(){
        if($this->session->userdata('is_logged_in')==TRUE){            
            $data=site_data();
            $data['_page_title']='Add Contractor';
            $this->template->contractor_add($data);
        }else{
            redirect('login');
        }
    }//
    
    public function edit(){
        if($this->session->userdata('is_logged_in')==TRUE){            
        $data=site_data();
        $id=$this->uri->segment(3); 

        $this->load->model('contractor_model');
        
        $data['_record']=$this->contractor_model->getRecord($id);
        $data['_page_title']='Edit Contractor';
        
        $this->template->contractor_edit($data);
        }else{
            redirect('login');
        }
    }//end 


    public function saveContractor(){
        if($this->session->userdata('is_logged_in')==TRUE){            
        $data['ic_no']=$this->input->post('ic_no');
        $data['name']=$this->input->post('name');
        $data['company']=$this->input->post('company');
        $data['status']=$this->input->post('status');
        $data['start_date']=date('Y-m-d', strtotime($this->input->post('join_date',TRUE)));        
        $data['end_date']=date('Y-m-d', strtotime($this->input->post('end_date',TRUE)));
        $data['description']=$this->input->post('description');
        
        $action=$this->input->post('action');
        $csn=$this->input->post('csn');        
        
        $this->load->model('contractor_model');
        if($action=='update'){
            $res=$this->contractor_model->update($data,$csn);
        }else{
            $res=$this->contractor_model->insert($data);
        }
        if($res==true){
            redirect('contractor/index');
        }else{
            
            $data['_page_title']='Add Contractor';
            $data['_record']=$data;
            $data['_message']='Error in Database Save Operation';
            $this->template->contractor_add($data);
        }
        
        }else{
            redirect('login');
        }
        
    }//end function
    
    public function delete(){
        if($this->session->userdata('is_logged_in')==TRUE){           
        $id=$this->uri->segment(3); 

        $this->load->model('contractor_model');
        
        $res=$this->contractor_model->remove($id);
                
        if($res==true){
            redirect('contractor/index');
        }else{
            //Show a error message
            redirect('contractor/index');
        }
        
        }else{
            redirect('login');
        }
    }
        
}//end class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
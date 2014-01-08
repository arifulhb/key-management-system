<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request extends CI_Controller {
    
    
    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');
    }//end constractor
    
    public function index()
    {
            if($this->session->userdata('is_logged_in')==TRUE){            
                
            
            
            $data=site_data();

            $data['_page_title']='Request Index';
            $this->load->library('pagination');

            //set pagination configuration
            $config=  getPaginationConfig();//this function is from helpers/ahb_helper.php file
            $config['base_url'] = base_url().'request/index';
            $this->load->model('request_model');    

            $config['total_rows'] = $this->request_model->getTotalNum();        
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
                $data['_list']=$this->request_model->getList($config['per_page'],($config['per_page']*($this->uri->segment(3)-1)+1));
            }else{
                if($config['total_rows']>$config['per_page']){
                    $last=$config['per_page'];      
                }else{
                    $last=$config['total_rows'];      
                }

              $data['_pagi_msg'] = '1 - '.$last;                  
              $data['_list']=$this->request_model->getList($config['per_page'],$this->uri->segment(3));
            }
            $this->template->request_index($data);
            }else{
                redirect('login');
            }
    }   //end index
    
    public function add(){
            $data=site_data();
            $data['_page_title']='Add Request';
            
            $this->load->model('lecturer_model');
            $data['_lecturer']=$this->lecturer_model->listRecord();
            $this->load->model('contractor_model');
            $data['_contractor']=$this->contractor_model->listRecord();
            $this->template->request_add($data);
    }//
    
    public function edit(){
        
        $data=site_data();
        $id=$this->uri->segment(3); 

        $this->load->model('request_model');
        
        $data['_record']=$this->request_model->getRecord($id);
        $this->load->model('lecturer_model');
        $data['_lecturer']=$this->lecturer_model->listRecord();
        $this->load->model('contractor_model');
        $data['_contractor']=$this->contractor_model->listRecord();
        $data['_page_title']='Edit Request';
        
        $this->template->request_edit($data);
       
    }//end 


    public function save(){
                
        $data['request_date']=date('Y-m-d', strtotime($this->input->post('request_date',TRUE)));        
        $data['lsn']=$this->input->post('lsn');        
        $data['csn']=$this->input->post('csn');        
        $data['from_date']=date('Y-m-d', strtotime($this->input->post('from_date',TRUE)));        
        $data['to_date']=date('Y-m-d', strtotime($this->input->post('to_date',TRUE)));
        $data['description']=$this->input->post('description');
        $data['status']=$this->input->post('status');
        
        $action=$this->input->post('action');
        $rsn=$this->input->post('rsn');        
        
        $this->load->model('request_model');
        if($action=='update'){
            $res=$this->request_model->update($data,$rsn);
        }else{
            $res=$this->request_model->insert($data);
        }
        if($res==true){
            redirect('request/index');
        }else{
            
            $data['_page_title']='Add Request';
            $data['_record']=$data;
            $data['_message']='Error in Database Save Operation';
            $this->template->request_add($data);
        }
        
        
        
    }//end function
    
    public function report(){
            $data=site_data();

            $data['_page_title']='Request Report';
            $this->load->library('pagination');

            //set pagination configuration
            $config=  getPaginationConfig();//this function is from helpers/ahb_helper.php file
            $config['base_url'] = base_url().'request/report';
            $this->load->model('request_model');    

            $config['total_rows'] = $this->request_model->getTotalNum();        
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
                $data['_list']=$this->request_model->getReport($config['per_page'],($config['per_page']*($this->uri->segment(3)-1)+1));
            }else{
                if($config['total_rows']>$config['per_page']){
                    $last=$config['per_page'];      
                }else{
                    $last=$config['total_rows'];      
                }

              $data['_pagi_msg'] = '1 - '.$last;                  
              $data['_list']=$this->request_model->getReport($config['per_page'],$this->uri->segment(3));
            }
            $this->template->request_report($data);
    }

    public function delete(){
        $id=$this->uri->segment(3); 

        $this->load->model('request_model');
        
        $res=$this->request_model->remove($id);
                
        if($res==true){
            redirect('request/index');
        }else{
            //Show a error message
            redirect('request/index');
        }
    }
        
}//end class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lecturer extends CI_Controller {
    
    
    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor
    
    public function index()
    {
        if($this->session->userdata('is_logged_in')==TRUE){            
            $data=site_data();

            $data['_page_title']='Lecturer Index';
            $this->load->library('pagination');

            //set pagination configuration
            $config=  getPaginationConfig();//this function is from helpers/ahb_helper.php file
            $config['base_url'] = base_url().'lecturer/index';
            $this->load->model('lecturer_model');    

            $config['total_rows'] = $this->lecturer_model->getTotalNum();        
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
                $data['_list']=$this->lecturer_model->getList($config['per_page'],($config['per_page']*($this->uri->segment(3)-1)+1));
            }else{
                if($config['total_rows']>$config['per_page']){
                    $last=$config['per_page'];      
                }else{
                    $last=$config['total_rows'];      
                }

              $data['_pagi_msg'] = '1 - '.$last;                  
              $data['_list']=$this->lecturer_model->getList($config['per_page'],$this->uri->segment(3));
            }
            $this->template->lecturer_index($data);
            }else{
            redirect('login');
        }
    }   
    
    public function addLecturer(){
        if($this->session->userdata('is_logged_in')==TRUE){            


            $data=site_data();
            $data['_page_title']='Add Lecturer';
            $this->template->lecturer_add($data);
            }else{
            redirect('login');
        }
    }//
    
    public function edit(){
        if($this->session->userdata('is_logged_in')==TRUE){            

        $data=site_data();
        $id=$this->uri->segment(3); 

        $this->load->model('lecturer_model');
        
        $data['_record']=$this->lecturer_model->getRecord($id);
        $data['_page_title']='Edit Lecturer';
        
        $this->template->lecturer_edit($data);
        }else{
            redirect('login');
        }
       
    }//end 


    public function saveLecturer(){
        
        $data['staff_id']=$this->input->post('staff_id');
        $data['staff_name']=$this->input->post('name');
        $data['department']=$this->input->post('department');
        $data['status']=$this->input->post('status');
        $data['start_date']=date('Y-m-d', strtotime($this->input->post('join_date',TRUE)));        
        $data['end_date']=date('Y-m-d', strtotime($this->input->post('end_date',TRUE)));
        $data['remark']=$this->input->post('remark');
        
        $action=$this->input->post('action');
        $lsn=$this->input->post('lsn');
        //echo $action.' '.$lsn;
        //exit();
        
        $this->load->model('lecturer_model');
        if($action=='update'){
            $res=$this->lecturer_model->update($data,$lsn);
        }else{
            $res=$this->lecturer_model->insert($data);
        }
        if($res==true){
            redirect('lecturer/index');
        }else{
            
            $data['_page_title']='Add Lecturer';
            $data['_record']=$data;
            $data['_message']='Error in Database Save Operation';
            $this->template->lecturer_add($data);
        }
        
        
        
    }//end function
    
    public function delete(){
        $id=$this->uri->segment(3); 

        $this->load->model('lecturer_model');
        
        $res=$this->lecturer_model->remove($id);
                
        if($res==true){
            redirect('lecturer/index');
        }else{
            //Show a error message
            redirect('lecturer/index');
        }
    }
        
}//end class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
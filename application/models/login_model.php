<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
    var $photo_path;
    
    public function __construct()
    {
        parent::__construct();
        
    }//end constract           

    public function validate($data){
        
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_email',$data['user']);
        $this->db->where('pass',$data['pass']);
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function

    public function listRecord(){
        
        $this->db->select('csn, name');
        $this->db->from('tbl_contractor');
        $res=$this->db->get();
        
        return $res->result_array();
    }
    
        //Insert Customer Data in aica_customer table
    public function insert($data){                
        
        $this->db->set($data);
        $res=$this->db->insert('tbl_contractor');
        return $res;
        
    }//end function insert
    
    public function update($data,$id){
               
        $this->db->set($data);
        $this->db->where('csn',$id);
        $res=$this->db->update('tbl_contractor');
 
        return $res;
    }//end function update
    
    public function remove($id){
        $res=$this->db->delete('tbl_contractor', array('csn' => $id)); 
        return $res;
    }//end function remove
    
    public function getList($per_page,$offset){
         if($offset==''){
            $offset=0;
        }
        
        $this->db->select('csn, ic_no, name, company,status, description,
            UNIX_TIMESTAMP(start_date) as start_date, UNIX_TIMESTAMP(end_date) as end_date');        
        $this->db->limit($per_page,$offset);
        $this->db->from('tbl_contractor');
        $this->db->order_by('csn','desc');
        $res=$this->db->get();
        //echo $this->db->last_query();
        return $res->result_array();
        
    }//end function getList
    
    public function getRecord($id){
        
        $this->db->select('csn, ic_no, name, company,status, description,
            UNIX_TIMESTAMP(start_date) as start_date, UNIX_TIMESTAMP(end_date) as end_date');                
        $this->db->from('tbl_contractor');        
        $this->db->where('csn',$id);
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function getRecord
    

    public function getTotalNum(){
        
        $this->db->select('csn');
        $this->db->from('tbl_contractor');
        $res=$this->db->get();
        return $res->num_rows();
    }//end function

}//end classs
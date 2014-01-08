<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lecturer_model extends CI_Model
{
    var $photo_path;
    
    public function __construct()
    {
        parent::__construct();
        
    }//end constract           
    
    public function listRecord(){
        
        $this->db->select('lsn, staff_name');
        $this->db->from('tbl_lecturer');
        $res=$this->db->get();
        
        return $res->result_array();
    }

    //Insert Customer Data in aica_customer table
    public function insert($data){                
        
        $this->db->set($data);
        $res=$this->db->insert('tbl_lecturer');
        return $res;
        
    }//end function insert
    
    public function update($data,$id){
               
        $this->db->set($data);
        $this->db->where('lsn',$id);
        $res=$this->db->update('tbl_lecturer');
 
        return $res;
    }//end function update
    
    public function remove($id){
        $res=$this->db->delete('tbl_lecturer', array('lsn' => $id)); 
        return $res;
    }//end function remove
    
    public function getList($per_page,$offset){
         if($offset==''){
            $offset=0;
        }
        
        $this->db->select('lsn, staff_id, staff_name, department,status, remark,
            UNIX_TIMESTAMP(start_date) as start_date, UNIX_TIMESTAMP(end_date) as end_date');        
        $this->db->limit($per_page,$offset);
        $this->db->from('tbl_lecturer');
        $this->db->order_by('lsn','desc');
        $res=$this->db->get();
        //echo $this->db->last_query();
        return $res->result_array();
        
    }//end function getList
    
    public function getRecord($id){
        
        $this->db->select('lsn, staff_id, staff_name, department,status, remark,
            UNIX_TIMESTAMP(start_date) as start_date, UNIX_TIMESTAMP(end_date) as end_date');                
        $this->db->from('tbl_lecturer');        
        $this->db->where('lsn',$id);
        $res=$this->db->get();
        //echo $this->db->last_query();
        //echo $this->db->last_query();
        //exit();
        return $res->result_array();
        
    }//end function getRecord
    

    public function getTotalNum(){
        
        $this->db->select('lsn');
        $this->db->from('tbl_lecturer');
        $res=$this->db->get();
        return $res->num_rows();
    }//end function

}//end classs
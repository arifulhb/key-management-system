<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Key_model extends CI_Model
{
    var $photo_path;
    
    public function __construct()
    {
        parent::__construct();
        
    }//end constract           

        //Insert Customer Data in aica_customer table
    public function insert($data){                
        
        $this->db->set($data);
        $res=$this->db->insert('tbl_key');
        return $res;
        
    }//end function insert
    
    public function update($data,$id){
               
        $this->db->set($data);
        $this->db->where('ksn',$id);
        $res=$this->db->update('tbl_key');
 
        return $res;
    }//end function update
    
    public function remove($id){
        $res=$this->db->delete('tbl_key', array('ksn' => $id)); 
        return $res;
    }//end function remove
    
    public function getList($per_page,$offset){
         if($offset==''){
            $offset=0;
        }
        
        $this->db->select('ksn, key_no, location, status, remarks');        
        $this->db->limit($per_page,$offset);
        $this->db->from('tbl_key');
        $this->db->order_by('ksn','desc');
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function getList
    
    public function getRecord($id){
        
        $this->db->select('ksn, key_no, location, status, remarks');        
        $this->db->from('tbl_key');        
        $this->db->where('ksn',$id);
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function getRecord
    

    public function getTotalNum(){
        
        $this->db->select('ksn');
        $this->db->from('tbl_key');
        $res=$this->db->get();
        return $res->num_rows();
    }//end function

}//end classs
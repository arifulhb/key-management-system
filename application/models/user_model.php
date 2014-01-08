<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{
    var $photo_path;
    
    public function __construct()
    {
        parent::__construct();
        
    }//end constract           
    public function change_pass($id,$new){
        $this->db->set('pass',md5($new));
        $this->db->where('usn',$id);
        $res=$this->db->update('tbl_user');
        return $res;
    }

    public function listRecord(){
        
        $this->db->select('*');
        $this->db->from('tbl_user');
        $res=$this->db->get();
        
        return $res->result_array();
    }
    
        //Insert Customer Data in aica_customer table
    public function insert($data){                
        
        $this->db->set($data);
        $res=$this->db->insert('tbl_user');
        return $res;
        
    }//end function insert
    
    public function update($data,$id){
               
        $this->db->set($data);
        $this->db->where('usn',$id);
        $res=$this->db->update('tbl_user');
 
        return $res;
    }//end function update
    
    public function remove($id){
        $res=$this->db->delete('tbl_user', array('usn' => $id)); 
        return $res;
    }//end function remove
    
    public function getList($per_page,$offset){
         if($offset==''){
            $offset=0;
        }
        
        $this->db->select('*');        
        $this->db->limit($per_page,$offset);
        $this->db->from('tbl_user');
        $this->db->order_by('usn','desc');
        $res=$this->db->get();
        //echo $this->db->last_query();
        return $res->result_array();
        
    }//end function getList
    
    public function getRecord($id){
        
        $this->db->select('*');                
        $this->db->from('tbl_user');        
        $this->db->where('usn',$id);
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function getRecord
    

    public function getTotalNum(){
        
        $this->db->select('usn');
        $this->db->from('tbl_user');
        $res=$this->db->get();
        return $res->num_rows();
    }//end function

}//end classs
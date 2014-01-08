<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Request_model extends CI_Model
{
    var $photo_path;
    
    public function __construct()
    {
        parent::__construct();
        
    }//end constract           

        //Insert Customer Data in aica_customer table
    public function insert($data){                
        
        $this->db->set($data);
        $res=$this->db->insert('tbl_request');
        return $res;
        
    }//end function insert
    
    public function update($data,$id){
               
        $this->db->set($data);
        $this->db->where('rsn',$id);
        $res=$this->db->update('tbl_request');
 
        return $res;
    }//end function update
    
    public function remove($id){
        $res=$this->db->delete('tbl_request', array('rsn' => $id)); 
        return $res;
    }//end function remove
    
    public function getList($per_page,$offset){
         if($offset==''){
            $offset=0;
        }
        
        $this->db->select('r.rsn,r.csn,r.lsn,l.staff_name as lecturer,c.name as contractor, UNIX_TIMESTAMP(r.request_date) as request_date, 
            UNIX_TIMESTAMP(r.from_date) as from_date, UNIX_TIMESTAMP(r.to_date) as to_date, r.status, r.description');        
        $this->db->limit($per_page,$offset);
        $this->db->from('tbl_request as r');
        
        $this->db->join('tbl_lecturer as l','l.lsn=r.lsn','LEFT OUTER');
        $this->db->join('tbl_contractor as c','c.csn=r.csn','LEFT OUTER');
        $this->db->where('r.status','New');
        $this->db->order_by('r.rsn','desc');
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function getList
    
    public function getReport($per_page,$offset){
         if($offset==''){
            $offset=0;
        }
        
        $this->db->select('r.rsn,r.csn,r.lsn,l.staff_name as lecturer,c.name as contractor, UNIX_TIMESTAMP(r.request_date) as request_date, 
            UNIX_TIMESTAMP(r.from_date) as from_date, UNIX_TIMESTAMP(r.to_date) as to_date, r.status, r.description');        
        $this->db->limit($per_page,$offset);
        $this->db->from('tbl_request as r');
        $this->db->join('tbl_lecturer as l','l.lsn=r.lsn','LEFT OUTER');
        $this->db->join('tbl_contractor as c','c.csn=r.csn','LEFT OUTER');
        $this->db->where('r.status !=','New');
        $this->db->order_by('r.rsn','desc');
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function getList
    
    public function getRecord($id){
        
        //$this->db->select('rsn, key_no, location, status, remarks');        
        $this->db->select('rsn,csn,lsn,UNIX_TIMESTAMP(request_date) as request_date, description,
            UNIX_TIMESTAMP(from_date) as from_date, UNIX_TIMESTAMP(to_date) as to_date, status');        
        $this->db->from('tbl_request');        
        $this->db->where('rsn',$id);
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function getRecord    

    public function getTotalNum(){
        
        $this->db->select('rsn');
        $this->db->from('tbl_request');
        $res=$this->db->get();
        return $res->num_rows();
    }//end function

}//end classs
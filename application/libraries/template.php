<?php

class Template
{
    protected $_ci;

    function __construct()
    {
        $this->_ci =&get_instance();
    }//end construct
    
    function access_denied($data){
        
        $data['_content']=$this->_ci->load->view('inc/access',$data,true);

        $data['_page_title']='Access Denied';
        //Page Class Name
        $data['_page_class']='access_denied';
        
        //noindex nofollow
        $data['_noindex_meta']=true;

        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
        
    }//end function

    //Load the Home Page
    function home($data=null)
    {
        
        $data['_content']=$this->_ci->load->view('home/index',$data,true);
        
        //Page Class Name        
        $data['_page_class']='home';

        //Load the page
        $this->_ci->load->view('page_template.php',$data);

    }//end home
    
    public function request_add($data){        
        
        $data['_content']=$this->_ci->load->view('request/form',$data,true);

        //Page Class Name
        $data['_page_class']='request_form';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function

    public function request_index($data){
        
        
        $data['_content']=$this->_ci->load->view('request/index',$data,true);

        //Page Class Name
        $data['_page_class']='lecturer_index';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function

    public function request_edit($data){        
        
        $data['_content']=$this->_ci->load->view('request/form',$data,true);

        //Page Class Name
        $data['_page_class']='request_edit';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function
    
    public function request_report($data){        
        
        $data['_content']=$this->_ci->load->view('request/report',$data,true);

        //Page Class Name
        $data['_page_class']='request_report';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function
    /*----------------------------------------------------------------*/

    public function lecturer_add($data){        
        
        $data['_content']=$this->_ci->load->view('lecturer/form',$data,true);

        //Page Class Name
        $data['_page_class']='lecturer_form';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function

    public function lecturer_index($data){
        
        
        $data['_content']=$this->_ci->load->view('lecturer/index',$data,true);

        //Page Class Name
        $data['_page_class']='lecturer_index';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function

    public function lecturer_edit($data){        
        
        $data['_content']=$this->_ci->load->view('lecturer/form',$data,true);

        //Page Class Name
        $data['_page_class']='lecturer_edit';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function
    
    public function key_add($data){
        
        
        $data['_content']=$this->_ci->load->view('key/form',$data,true);

        //Page Class Name
        $data['_page_class']='key_form';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function

    public function key_index($data){
        
        
        $data['_content']=$this->_ci->load->view('key/index',$data,true);

        //Page Class Name
        $data['_page_class']='key_index';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function

    public function key_edit($data){        
        
        $data['_content']=$this->_ci->load->view('key/form',$data,true);

        //Page Class Name
        $data['_page_class']='key_edit';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function

        public function contractor_add($data){
        
        
        $data['_content']=$this->_ci->load->view('contractor/form',$data,true);

        //Page Class Name
        $data['_page_class']='contractor_form';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function

    public function contractor_index($data){
        
        
        $data['_content']=$this->_ci->load->view('contractor/index',$data,true);

        //Page Class Name
        $data['_page_class']='contractor_index';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function

    public function contractor_edit($data){        
        
        $data['_content']=$this->_ci->load->view('contractor/form',$data,true);

        //Page Class Name
        $data['_page_class']='contractor_edit';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function

    
    /**
     * Signin
     */
    
    /**
     * User Management
     */
    function admin_login($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('login/index',$data,true);

        //Page Class Name
        $data['_page_class']='login_index';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('login_template.php',$data);
                          
    }//end function
    
    function user_profile($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('user/profile',$data,true);

        //Page Class Name
        $data['_page_class']='user_profile';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
                  
        
    }//end function
    
    
    function user_change_pass($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('user/changepass',$data,true);

        //Page Class Name
        $data['_page_class']='user_change_pass';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
            
    }//end function
   function user_index($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('user/index',$data,true);

        //Page Class Name
        $data['_page_class']='user_index';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
            
    }//end function
   
     function user_add($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('user/form',$data,true);

        //Page Class Name
        $data['_page_class']='user_add';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
            
    }//end function
    
    function user_edit($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('user/form',$data,true);

        //Page Class Name
        $data['_page_class']='user_edit';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
            
    }//end function
    


}//end class
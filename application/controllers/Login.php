<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Login Controller for Signup/register activiy of  the user
 * ----------------------------------------------------------------------------------------
 * 
 */

class Login extends CI_Controller{
    
    /*
     **************************************************************************************************
     * This is the __construct function for loading all required library and helpers and models
     * ************************************************************************************************
    */ 
    
        public function __construct() {
            parent::__construct();
            $this->load->helper('html');
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->library('form_validation');
        }
        
        
        
    /*
     **************************************************************************************************
     * This is the  index function for loading the default Login page for users
     * ************************************************************************************************
    */
    
        public function index()
        {
            $this->load->view('pages/user_login');

        }
        
        
    /*
     **************************************************************************************************
     * This is the  user_login function for login activity of the user
     * ************************************************************************************************
    */
    
        public function user_login()
        {
            $this->form_validation->set_rules('useremail','Email','required|valid_email');
            $this->form_validation->set_rules('password','Password','required|trim|min_length[8]|max_length[15]');
            
             if($this->form_validation->run()){
                 // if validation passes
                 $useremail= $this->input->post('useremail');
                 $password= $this->input->post('password');
                 // load the model
                 $this->load->model('Login_model');
                 $dbemail=$this->Login_model->login_valid_user($useremail,$password);
                // echo $dbemail;exit();
                 $user_type=$this->Login_model->fetch_user_type($useremail,$password);
                 $user_status=$this->Login_model->fetch_user_status($useremail,$password);
                 $user_name=$this->Login_model->fetch_user_name($useremail,$password);
                 
                 if($dbemail==$useremail){
                     
                     // For User type : User
                    if($user_type=='User' && $user_status=='Active'){
                    //Setting the session info and sending to the user dashboard
                    $this->session->set_userdata(array('user_email'=>$dbemail,'user_name'=>$user_name));
                    return redirect('UserDashboard/index');
                    }
                    // For User type : Admin
                    elseif($user_type=='Admin' && $user_status=='Active'){
                    //Setting the session info and sending to the admin dashboard
                    $this->session->set_userdata(array('user_email'=>$dbemail,'user_name'=>$user_name));
                    return redirect('AdminDashboard/index');
                    }
                    else{
                        $this->session->set_flashdata('Invalid_Login','Permission Not Granted !');
                        return redirect('Login/index');
                    }
                    
                 }else{
                     $this->session->set_flashdata('Invalid_Login','Invalid Email / Password');
                     return redirect('Login/index');
                    }
                 
             }else{
                 // echo form errors
                   $this->load->view('pages/user_login');
             }
            
          

        }
        
        
    /*
     ***********************************************************************************
     * This is the logout function for logout activity of the user 
     * *********************************************************************************
     */
    public function logout(){
       
        //unsetting the session data from session variable
        $this->session->unset_userdata(array('user_email','user_name'));
        // sending the user back to the login page
        return redirect('Login/index');
    }   
}

<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Register Controller for Signup/register activiy of  the user
 * ----------------------------------------------------------------------------------------
 * 
 */


class Register extends CI_Controller{
    
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
     * This is the  index function for loading the default signup/register page for users
     * ************************************************************************************************
     */
        
        public function index()
        {
            $this->load->view('pages/user_register');

        }
        
     /*
     **************************************************************************************************
     * This is the user_registration function for new users registration
     * ************************************************************************************************
     */
        
        public function user_registration()
        {
            $this->form_validation->set_rules('username','Username','required|alpha');
            $this->form_validation->set_rules('useremail','Email','required|valid_email');
            $this->form_validation->set_rules('password','Password','required|trim|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');
            $this->form_validation->set_rules('terms','Terms & Condition','required');
            
            if($this->form_validation->run()){
                
                // if validation passes suceess
                    $username= $this->input->post('username');
                    $useremail= $this->input->post('useremail');
                    $password= $this->input->post('password');
                    $phone= "";
                    $firstname="";
                    $lastname= "";
                    $user_type="User";
                    $user_plan="";
                    $user_status="Active";
                    $user_category="";
                    $gender="";
                    $dob="";
                    $education="";
                    $occupation="";
                    $address="";
                    $dist="";
                    $state="";
                    $pincode="";
                    $startup_requirement="";
                    $startup_submition="";
                    $work_experience="";
                    $past_enpr_exp="";
                    $user_want="";
                    $user_total_invest="";
                    $user_startup_location="";
                    $user_idea_elaboration="";
                    $user_suggestion="";
                 
              // arranging user data in array as per table fields in db  
                $userArray=array();
                $userArray['user_name']=$username;
                $userArray['user_email']=$useremail;
                $userArray['user_password']=$password;
                $userArray['phone']=$phone;
                $userArray['first_name']=$firstname;
                $userArray['last_name']= $lastname; 
                $userArray['user_type']=$user_type;
                $userArray['user_plan']=$user_plan;
                $userArray['user_status']=$user_status;
                $userArray['user_category']=$user_category;
                $userArray['gender']=$gender;
                $userArray['dob']=$dob;
                $userArray['education']=$education;
                $userArray['occupation']=$occupation;
                $userArray['address']=$address;
                $userArray['dist']=$dist;
                $userArray['state']=$state;
                $userArray['pincode']=$pincode;
                $userArray['startup_requirement']=$startup_requirement;
                $userArray['startup_submition']=$startup_submition;
                $userArray['work_experience']=$work_experience;
                $userArray['past_enpr_exp']=$past_enpr_exp;
                $userArray['user_want']=$user_want;
                $userArray['user_total_invest']=$user_total_invest;
                $userArray['user_startup_location']=$user_startup_location;
                $userArray['user_idea_elaboration']=$user_idea_elaboration;
                $userArray['user_suggestion']=$user_suggestion;
              
                //loading the model
                $this->load->model('Register_model');
                $db_user_email=$this->Register_model->register_valid_user($userArray);
                
              
                if($db_user_email==$useremail){
                    $this->session->set_flashdata('user_exist','User Already Registered !');
                    return redirect('Register/user_registration');
                }else{
                     $this->session->set_flashdata('user_register','User Registered Successfully !');
                    return redirect('Register/user_registration');
                }
                
            }else{
                //echo form errors
                 $this->load->view('pages/user_register');
            }
           

        }    
}

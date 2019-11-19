<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Password Controller for Password Reset  activiy of  the user
 * ----------------------------------------------------------------------------------------
 * 
 */

class Password extends CI_Controller{
    
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
     * This is the  index function for loading the default Password Reset page for users
     * ************************************************************************************************
    */
    
        public function index()
        {
            $this->load->view('user/user_password_reset');

        }
        
        
    /*
     **************************************************************************************************
     * This is the  forgot function for loading the default Forgot Password page for users
     * ************************************************************************************************
    */
    
        public function forgot()
        {
            $this->load->view('pages/user_forgot_password');

        }
        
        
    /*
     **************************************************************************************************
     * This is the  recover_password function for recovering password through email for users
     * ************************************************************************************************
    */
    
        public function recover_password()
        {
            $this->form_validation->set_rules('useremail','Registered Email','required|trim|valid_email');
            
            if($this->form_validation->run()){
                
                $user_email= $this->input->post('useremail');
                
                
                $this->load->model('Password_model');
                $db_user_pass=$this->Password_model->password_recover($user_email);
                
                $this->load->model('Password_model');
                $db_user_email=$this->Password_model->get_user_email($user_email);
                
                
                // echo $db_user_pass.$db_user_email;
                 
                 if($db_user_email == $user_email){
                    // echo 'mail sent';
              // calling send email function
                $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.hostinger.in',
                'smtp_port' => 587,
                'smtp_user' => 'info@billionsvision.com', // change it to yours
                'smtp_pass' => 'hello@1234', // change it to yours
                'mailtype' => 'html',
        //        'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
        //        'smtp_timeout' => '4', //in seconds
        //        'charset' => 'iso-8859-1',
                    
                'wordwrap' => TRUE
              );

                    $message = "Hi User,
                    Thankyou for contacting Billionsvision. Your password is : ".$db_user_pass ."

                    Thanks and Regards
                    Team Bilion Vision. ";
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('info@billionsvision.com'); // change it to yours
                    $this->email->to($user_email);// change it to yours
                    $this->email->subject('Email from Billionsvision.com');
                    $this->email->message($message);
                    if($this->email->send())
                   {
                   //echo 'Email sent.';
                         // show_error($this->email->print_debugger());
                   $this->session->set_flashdata('recovery_success','Password has been sent on your registered email ! ');
                   return redirect('Password/recover_password');
                   
                   
                   }
                  
                 }else{
                    // echo 'mail failed';
                     $this->session->set_flashdata('recovery_failure','Unregistered email for password recovery ! ');
                     return redirect('Password/recover_password');
                 }
//               
            }else{
                
                   //$this->session->set_flashdata('failed','This is not a registerd email please enter registerd email ! ');
                 //  return redirect('Password/recover_password');
                //echo form errors
                $this->load->view('pages/user_forgot_password');
            }
           

        }    
        
    /*
     **************************************************************************************************
     * This is the  update_password function for updating the Password for users
     * ************************************************************************************************
    */
    
        public function update_password()
        {
            $this->form_validation->set_rules('old_password','Old Password','required|trim|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('new_password','New Password','required|trim|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('conf_new_password','Confirm New Password','required|matches[new_password]');
            
            if($this->form_validation->run()){
                
                $old_password= $this->input->post('old_password');
                $new_password= $this->input->post('new_password');
               
                $session_email=$this->session->userdata('user_email');
              
                $this->load->model('Password_model');
                $db_user_pass=$this->Password_model->password_valid($session_email,$old_password);
                 //echo $db_user_pass;exit();
                if($db_user_pass==$old_password){
                    $userArray=array();
                    $userArray['user_password']=$new_password;
                    $this->load->model('Password_model');
                    $db_updated_pass=$this->Password_model->update_password($session_email,$userArray);
                  //  echo $db_updated_pass; exit();
                    if($db_updated_pass==$new_password){
                        $this->session->set_flashdata('update_success','Password Updated Successfully ! ');
                        return redirect('Password/update_password');
                    }else{
                        $this->session->set_flashdata('update_failure','Password Update Failed ! ');
                        return redirect('Password/update_password');
                    }
                }
            }else{
                //echo form errors
                 $this->load->view('user/user_password_reset');
            }
           

        }    
     
}

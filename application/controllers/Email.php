<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Email Controller for Email Sending activiy of  the user
 * ----------------------------------------------------------------------------------------
 * 
 */

class Email extends CI_Controller{
    
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
            // $this->load->library('email');
        }
        
        
        
    /*
     **************************************************************************************************
     * This is the  index function for loading default email  page for users
     * ************************************************************************************************
    */
    
        public function index()
        {
            $this->load->view('pages/user_login');

        }
        
        
     /*
     **************************************************************************************************
     * This is the sendMail function for sending welcome email to the user 
     * ************************************************************************************************
     */
        public function sendMail($user_email){
      
            
            
            $config = Array(
           'protocol' => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
           'smtp_port' => 465,
           'smtp_user' => 'kvmgroupbiz@gmail.com', // change it to yours
           'smtp_pass' => 'kvmgroupbiz@1234', // change it to yours
           'mailtype' => 'html',
           'charset' => 'iso-8859-1',
           'wordwrap' => TRUE
         );

               $message = '';
               $this->load->library('email', $config);
               $this->email->set_newline("\r\n");
               $this->email->from('kvmgroupbiz@gmail.com'); // change it to yours
               $this->email->to($user_email);// change it to yours
               $this->email->subject('Welcome email from ion11.net');
               $this->email->message($message);
               if($this->email->send())
              {
               echo 'Email sent.';
              }
              else
             {
              show_error($this->email->print_debugger());
             }

        }
        
        
        
        public function mail(){
            //session email
            $session_email=$this->session->userdata('user_email');
            
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
                    Welcome to Billion Vision, your registration is successful and confirmed. 

                    Thanks and Regards
                    Team Bilion Vision. ";
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('info@billionsvision.com'); // change it to yours
                    $this->email->to("kvmgroupbiz@gmail.com");// change it to yours
                    $this->email->subject('Welcome Email from Billionsvision.com');
                    $this->email->message($message);
                    if($this->email->send())
                   {
                   echo 'Email sent.';
                   }
                   else
                  {
                   show_error($this->email->print_debugger());
                  }
        
      
}
}
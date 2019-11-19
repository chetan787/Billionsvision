<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Leads Controller for startup leads activity of  the user
 * ----------------------------------------------------------------------------------------
 * 
 */

class Leads extends CI_Controller{
    
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
            //for file upload
            $config['upload_path'] = './uploads/profile_image/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = 2000;
            $config['max_width'] = 1500;
            $config['max_height'] = 1500;

            $this->load->library('upload',$config);
        }

    /*
     **************************************************************************************************
     * This is the  index function for loading the default leads page for users
     * ************************************************************************************************
     */
    
        public function index()
        {
            $user_email="";
            if(isset($_SESSION['user_email'])){
               $user_email= $_SESSION['user_email'];
            }
            $this->load->model('Register_model');
            $db_user_row=$this->Register_model->load_user_by_email($user_email);
            // load users based on conditions
            $db_startup_data="";
            if($db_user_row['startup_requirement']=="Idea"){
                $db_startup_data=$this->Register_model->load_all_users("Idea",$user_email); // for idea
            }
            else if($db_user_row['startup_requirement']=="Fund"){
                $db_startup_data=$this->Register_model->load_all_users("Fund",$user_email); // for Fund
            }
            else if($db_user_row['startup_requirement']=="Mentorship"){
                $db_startup_data=$this->Register_model->load_all_users("Mentorship",$user_email); // for Mentorship
            }
            else{
               if($db_user_row['startup_requirement']=="Others"){
                $db_startup_data=$this->Register_model->load_all_users("Others",$user_email); // for Others
            } 
            }
            
            
            $this->load->model('payment_model');
            
            $data['user_data']=$db_user_row;
            $data['startup_data']=$db_startup_data;
            $this->load->view('user/user_startup_leads',$data);

        } 
       
        
        
    /*
     **************************************************************************************************
     * This is the  get_ajax_all_payment_detail function for ajax  leads payments update for users
     * ************************************************************************************************
     */ 
       public function get_ajax_all_payment_detail(){
           $user_email="";
           $lead_email="";
           if(isset($_POST['user_email'])){
               $user_email=$_POST['user_email'];
           }
           if(isset($_POST['lead_email'])){
               $lead_email=$_POST['lead_email'];
           }
           
           $q= $this->db->where('user_email',$user_email)
                        ->where('lead_email',$lead_email)
                        ->get('payments');
       if($q->num_rows()){
        // returning user_email of user from rows
            $response= $q->row()->user_email."_".$q->row()->lead_email;
            echo json_encode(FALSE);
       }else{
           $paymentsArray=array();
           $paymentsArray['user_email']=$user_email;
           $paymentsArray['lead_email']=$lead_email;
           $paymentsArray['pay_status']="PAID";
          //insert user data into payments table
          $q= $this->db->insert('payments',$paymentsArray);              
         echo json_encode(TRUE);
          
       }
           
           
           
       }
       
       
         /*
     **************************************************************************************************
     * This is the  recover_password function for recovering password through email for users
     * ************************************************************************************************
    */
    
        public function send_ajax_email()
        {
            $lead_email="";
            
            if(isset($_POST['prf_email'])){
              $lead_email = $_POST['prf_email'];
                
            }
            //echo json_encode($lead_email);
            //exit();
                
              
                $user_email="";
                  if(isset($_SESSION['user_email'])){
                   $user_email = $_SESSION['user_email'];
                }
                // getting lead details from db
                $this->load->model('Register_model');
                $db_user_row=$this->Register_model->load_user_by_email($lead_email);
                $data['data']=$db_user_row;
                $html_template=$this->load->view('user/email_template',$data,true);
                
                
               
                
                
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
                    Thankyou for contacting Billionsvision.

                    Thanks and Regards
                    Team Shippingkaro. ";
                    
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('info@billionsvision.com'); // change it to yours
                    $this->email->to($user_email);// change it to yours
                    $this->email->subject('Email from Billionsvision.com');
                    $this->email->message($html_template);
                    if($this->email->send())
                   {
                  // echo 'Email sent.';

                     echo json_encode("Profile has been sent on your registered email !");
                   
                   }
                   else
                  {
                  // show_error($this->email->print_debugger());

                     echo json_encode("Email sending failed !");
                  }

                
            
           

        }    
        

        
}


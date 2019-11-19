<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the AddEmailTemplate Controller for email activiy of  the admin
 * ----------------------------------------------------------------------------------------
 * 
 */

class EmaiMessagelTemplate extends CI_Controller{
    
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
            
            $this->load->view('admin/add_email_template');

        }  
        public function add_email()
        {
          $this->form_validation->set_rules('tname','Template Name','required|trim|alpha');
          $this->form_validation->set_rules('tcategory','Category','required');
          $this->form_validation->set_rules('tsub','Template Subject','required');
          $this->form_validation->set_rules('tmessage','Template Message','required');
//          
          
          if($this->form_validation->run()){
          //if validation success
          //step 1: Read the input fields
         $template_name= $this->input->post('tname');
         $template_category=$this->input->post('tcategory');
         $template_subject=$this->input->post('tsub');
         $template_message=$this->input->post('tmessage');
         
         // getting the form data and arrange it in array form for insert in db
             $adminArray=array();
             $adminArray['template_name']=$template_name;
             $adminArray['template_category']=$template_category;
             $adminArray['template_subject']=$template_subject;
             $adminArray['template_message']=$template_message;
//             $adminArray['user_status']=$user_status;
         
        // Sending this input data to email_varification function in model 
         $this->load->model('Email_template_model');
         $db_template_name=$this->Email_template_model->email_model($adminArray);
         
            if($db_template_name==$template_name)
            {
                $this->session->set_flashdata('email_temp_exist','Email Template Already Exist !');
                return redirect('EmaiMessagelTemplate/add_email');

            } else {
                $this->session->set_flashdata('email_temp_added','Email Template Added Sucessfully !');
                return redirect('EmaiMessagelTemplate/add_email');
            }



           } else 
           {
             // echo validation errors on form  
            $this->load->view('admin/add_email_template');

           }
        }
      
       /*----------------------------------------------------------------------- 
        This is the view_email_template function for loading the view_email template page for admin
        *-----------------------------------------------------------------------         */
        public function view_email_template()
        {
             $this->load->model('Email_template_model');
             $db_template_name=$this->Email_template_model->load_all_email_template();
            // echo '<pre>';
            // print_r($db_template_name);
             $data['email_template']=$db_template_name;
             $this->load->view('admin/view_email_template',$data); 
        }
        
        
        
      
        
        
        /*----------------------------------------------------------------------- 
        This is the delete_email_template function for deleting email template from db
        *-----------------------------------------------------------------------         */
        public function delete_email_template()
        {
            $id="";
            if(isset($_POST['id'])){
                $id=$_POST['id'];
            }
            
            
            //echo json_encode($id);
             $this->load->model('Email_template_model');
             $db_delete_res=$this->Email_template_model->delete_email_template_by_id($id);
              echo json_encode($db_delete_res);
        }
        
       /*----------------------------------------------------------------------- 
        This is the update_email_template function for update email template from db
        *-----------------------------------------------------------------------         */
        public function update_email_template()
        {
//            $id="";
//            if(isset($_POST['id'])){
//                $id=$_POST['id'];
//            }
//         
          $this->form_validation->set_rules('email_temp_id','email_temp_id','required');   
          $this->form_validation->set_rules('email_temp_name','Template Name','required|trim|alpha');
          $this->form_validation->set_rules('email_temp_cat','Category','required|trim');
          $this->form_validation->set_rules('email_temp_sub','Template Subject','required|trim');
          $this->form_validation->set_rules('email_temp_mess','Template Message','required|trim|max_length[160]');
          
          
          if($this->form_validation->run()){
              
                //step 1: Read the input fields
                $id=$this->input->post('email_temp_id');
                $template_name= $this->input->post('email_temp_name');
                $template_category=$this->input->post('email_temp_cat');
                $template_subject=$this->input->post('email_temp_sub');
                $template_message=$this->input->post('email_temp_mess');
                
                
         
              //   echo $id.$template_category.$template_subject.$template_message;
//            // getting the form data and arrange it in array form for insert in db
                $dataArray=array();
                $dataArray['template_name']=$template_name;
                $dataArray['template_category']=$template_category;
                $dataArray['template_subject']=$template_subject;
                $dataArray['template_message']=$template_message;

              // update through modal 
               $this->load->model('Email_template_model');
              $db_update_res=$this->Email_template_model->update_email_template_by_id($id,$dataArray);
              
              if($db_update_res){
                   $this->session->set_flashdata('success','Data updated successfully !');
                   redirect('EmaiMessagelTemplate/view_email_template');

                   
              }else{
                  $this->session->set_flashdata('failure','Update failure. Please try again !');
                   redirect('EmaiMessagelTemplate/view_email_template');

              }
             
          }
          else{
              $this->load->model('Email_template_model');
             $db_template_name=$this->Email_template_model->load_all_email_template();
            // echo '<pre>';
            // print_r($db_template_name);
             $data['email_template']=$db_template_name;
             $this->load->view('admin/view_email_template',$data); 
             // echo 'failed';
              
          }

        } 
         /*----------------------------------------------------------------------- 
        This is the send_email_template function for sending Email Template from db
        *-----------------------------------------------------------------------         */
        public function send_email_template()
        {
            
            
            $this->load->model('Email_template_model');
            $db_all_email_temp=$this->Email_template_model->load_all_email_template();
            $data['email_template']=$db_all_email_temp;
            $this->load->view('admin/send_email_template',$data);
        }
        
        
      
        
         /*----------------------------------------------------------------------- 
        This is the show_email_template_view function for loading email template view in iframe
        *-----------------------------------------------------------------------         */
        public function show_email_template_view()
        {
            $templateName="";
           if(isset($_GET['templateName'])){
               $templateName=$_GET['templateName'];
           }
            $this->load->model('Email_template_model');
           $db_all_email_temp=$this->Email_template_model->load_email_template_by_template_name($templateName);
            $data['view_data']=$db_all_email_temp;
            //loading of template file 
            $this->load->view('admin/template/bv_template',$data);
            
            //echo json_encode($templateSubject);
        } 
        
        
        /*----------------------------------------------------------------------------------------- 
        This is the ajax_load_email_template function for loading email template data using ajax
        *----------------------------------------------------------------------------------------*/
        public function ajax_load_email_template()
        {
           $templateName="DurgapujaOffer";
            
            if(isset($_POST['templateName'])){
              $templateName =  $_POST['templateName'];
            }
            $this->load->model('Email_template_model');
            $db_all_email_temp=$this->Email_template_model->load_email_template_by_template_name($templateName);
           echo json_encode($db_all_email_temp);
        }
        /*----------------------------------------------------------------------------------------- 
        This is the send_custom_email function for sending  email template data using ajax
        *----------------------------------------------------------------------------------------*/
        public function send_custom_email()
        {
            $custom_email="";
            if(isset($_POST['custom_email'])){
              $custom_email =  $_POST['custom_email'];
            }
            
            $selectedtemplate="";
            if(isset($_POST['selectedtemplate'])){
              $selectedtemplate =  $_POST['selectedtemplate'];
            }
          
            
           
           
            $this->load->model('Email_template_model');
            $db_email_temp=$this->Email_template_model->send_custom_template($selectedtemplate);
            $template_category="";
            $template_subject="";
            $template_message="";
                            if(isset($db_email_temp) && is_array($db_email_temp))
                            {
                                foreach ($db_email_temp as $key => $data) {
                                    
                                           $template_category=$data['template_category']; 
                                           $template_subject=$data['template_subject']; 
                                           $template_message=$data['template_message']; 
                                }
                            }
            
            
            //echo json_encode($db_all_email_temp);
           $data['view_data']=$db_email_temp;
          // var_dump($template_subject);
           $html_template=$this->load->view('admin/template/bv_template',$data,TRUE);
           
           $user_email=$custom_email;
//           
//            
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
                    $this->email->to($user_email);// change it to yours
                    $this->email->subject($template_subject);
                    $this->email->message($html_template);
                    if($this->email->send())
                   {
                   echo 'Email sent.';
                   }
                   else
                  {
                   show_error($this->email->print_debugger());
                  }
            
           }
            public function send_user_email()
        {
            $usr_email="";
            if(isset($_POST['user_email'])){
              $usr_email =  $_POST['user_email'];
            }
            
            $selectedtemplate="";
            if(isset($_POST['selectedtemplate'])){
              $selectedtemplate =  $_POST['selectedtemplate'];
            }
            
              $this->load->model('Email_template_model');
            $db_email_temp=$this->Email_template_model->send_custom_template($selectedtemplate);
           // echo json_encode($db_email_temp);
            $template_category="";
            $template_subject="";
            $template_message="";
            
                            if(isset($db_email_temp) && is_array($db_email_temp))
                            {
                                foreach ($db_email_temp as $key => $data) {
                                    
                                           $template_category=$data['template_category']; 
                                           $template_subject=$data['template_subject']; 
                                           $template_message=$data['template_message']; 
                                }
                            }
            
            
            //echo json_encode($db_all_email_temp);
           $data['view_data']=$db_email_temp;
          // var_dump($template_subject);
           $html_template=$this->load->view('admin/template/bv_template',$data,TRUE);
           
           $user_email=$usr_email;
//           
//            
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
                    $this->email->to($user_email);// change it to yours
                    $this->email->subject($template_subject);
                    $this->email->message($html_template);
                    if($this->email->send())
                   {
                   echo 'Email sent.';
                   $i++;
                   }
                   else
                  {
                   show_error($this->email->print_debugger());
                  }
           
           
           
        }
        
        
        
        public function send_user_email_to_all(){
            
            $selectedtemplate="";
            if(isset($_POST['selectedtemplate'])){
              $selectedtemplate =  $_POST['selectedtemplate'];
            }
            
            
           // echo json_encode($selectedtemplate);
            
            
            $this->load->model('Email_template_model');
            $db_email_temp=$this->Email_template_model->send_custom_template($selectedtemplate);
           // echo json_encode($db_email_temp);
            $template_category="";
            $template_subject="";
            $template_message="";
            
                            if(isset($db_email_temp) && is_array($db_email_temp))
                            {
                                foreach ($db_email_temp as $key => $data) {
                                    
                                           $template_category=$data['template_category']; 
                                           $template_subject=$data['template_subject']; 
                                           $template_message=$data['template_message']; 
                                }
                            }
            
            
            //echo json_encode($db_all_email_temp);
           $data['view_data']=$db_email_temp;
          // var_dump($template_subject);
           $html_template=$this->load->view('admin/template/bv_template',$data,TRUE);
           
         //  $user_email=$usr_email;
           // getting emails from user table from db from Admin model
            $this->load->model('Admin_model');
            $db_users_email=$this->Admin_model->load_all_users();
            // feching all user emails in array
            $usr_email_arr=array();
            foreach ($db_users_email as $value) {
                 $usr_email_arr[]= $value['user_email'];
            }
          //  print_r($usr_arr);
          // exit();
           $i=0;
          // sending emails in loop
          foreach ($usr_email_arr as $key => $user_email) {
              // // calling send email function
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
                    $this->email->to($user_email);// change it to yours
                    $this->email->subject($template_subject);
                    $this->email->message($html_template);
                    if($this->email->send())
                   {
                 //  echo 'Email sent.';
                    $i++;
                    echo $i;     
                   }
                   else
                  {
                   show_error($this->email->print_debugger());
                  }
             
          }       
           

            
            
            
            
            
        }
           
        
        
 

}

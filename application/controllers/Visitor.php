<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * -----------------------------------------------------------------
 * Note : This is the Visitor Controller for  admin main activity
 * ------------------------------------------------------------------
 * 
 */

Class Visitor extends CI_Controller{
    
   /*
     **************************************************************************************************
     * This is the __construct function for loading all required library and helpers and models
     * ************************************************************************************************
     */
        public function __construct()
        {
        parent::__construct();
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
       

        }
        
        
        
     /*
     **************************************************************************************************
     * This is the  visitor_list function for loading the list of visitors in admin panel
     * ************************************************************************************************
     */
        public function visitor_list(){
            
            //loading the model
            $this->load->model('Visitor_model');
            $db_visitor_list=$this->Visitor_model->load_all_visitors();
            //print_r($db_user_list);
           $data['visitor_data']=$db_visitor_list;
           $this->load->view('admin/visitor_list',$data);
           
           
            

        }   
        
        
    /*
     **************************************************************************************************
     * This is the  visitor manager function for validation and input data into db 
     * ************************************************************************************************
     */
              
        
         public function visitor_manager(){
            
          $this->form_validation->set_rules('name','Username','required');
          $this->form_validation->set_rules('mob','Mobile','required');
          $this->form_validation->set_rules('email','Email','required|valid_email');
          $this->form_validation->set_rules('sub','Subject','required');
          $this->form_validation->set_rules('message','Message','required|max_length[500]');
          if($this->form_validation->run()){
          //if validation success
          //step 1: Read the input fields
         $visitor_name= $this->input->post('name');
         $visitor_mob=$this->input->post('mob');
         $visitor_email=$this->input->post('email');
         $visitor_sub=$this->input->post('sub');
         $visitor_message=$this->input->post('message');
         
         
       // getting the form data and arrange it in array form for insert in db
             $adminArray=array();
             $adminArray['name']=$visitor_name;
             $adminArray['mobile']=$visitor_mob;
             $adminArray['email']=$visitor_email;
             $adminArray['subject']=$visitor_sub;
             $adminArray['message']=$visitor_message;
         
        // Sending this input data to Manage_visitor function in model 
         $this->load->model('Manage_visitor');
         $db_email=$this->Manage_visitor->visitor($adminArray);
         $this->session->set_flashdata('success','message submitted successfully');
         return redirect('Visitor/visitor_manager');
         $data['view_data']=array();
         $html_template=$this->load->view('user/email_template',$data,TRUE);
           
        
             
             //email integration function
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
                    $this->email->to($visitor_email);// change it to yours
                    $this->email->subject('Email from Billionsvision.com');
                    $this->email->message($html_template);
                    if($this->email->send())
                   {
                  // echo 'Email sent.';
                    // $this->session->set_flashdata('success','message submitted successfully');
                     echo json_encode("Profile has been sent on your registered email !");
                   
                   }
                   else
                  {
                       // show_error($this->email->print_debugger());
                       // $this->session->set_flashdata('error',$this->email->print_debugger());
                     echo json_encode("Email sending failed !");
                  }      
                       
        
               
          } else {
              //form error
              $this->load->view('pages/contact'); 
          }
          
        }
        
           /*----------------------------------------------------------------------- 
        This is the delete_whatsapp_template function for deleting email template from db
        *-----------------------------------------------------------------------         */
        public function delete_visitor_list()
        {
            $id="";
            if(isset($_POST['id'])){
                $id=$_POST['id'];
            }
            
            
            //echo json_encode($id);
             $this->load->model('Visitor_model');
             $db_delete_res=$this->Visitor_model->delete_visitor_list_by_id($id);
             echo json_encode($db_delete_res);
        }
    
}
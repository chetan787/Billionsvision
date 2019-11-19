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

class WhatsappTemplate extends CI_Controller{
    
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
            
            $this->load->view('admin/add_whatsapp_template');

        }  
        public function whatsapp_verification()
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
         $this->load->model('Whatsapp_template_model');
         $db_template_name=$this->Whatsapp_template_model->whatsapp_model($adminArray);
         
            if($db_template_name==$template_name)
            {
                $this->session->set_flashdata('whatsapp_temp_exist','Whatsapp Template Already Exist !');
                return redirect('WhatsappTemplate/whatsapp_verification');

            } else {
                $this->session->set_flashdata('whatsapp_temp_added','Whatsapp Template Added Sucessfully !');
                return redirect('WhatsappTemplate/whatsapp_verification');
            }



           } else 
           {
             // echo validation errors on form  
            $this->load->view('admin/add_whatsapp_template');

           }
        }
      
       /*----------------------------------------------------------------------- 
        This is the view_Whatsapp_template function for loading the view_email template page for admin
        *-----------------------------------------------------------------------         */
        public function view_whatsapp_template()
        {
             $this->load->model('Whatsapp_template_model');
             $db_template_name=$this->Whatsapp_template_model->load_all_whatsapp_template();
//             echo '<pre>';
//             print_r($db_template_name);
             $data['whatsapp_template']=$db_template_name;
             $this->load->view('admin/view_whatsapptemplate',$data); 
        }
        
         /*----------------------------------------------------------------------- 
        This is the delete_whatsapp_template function for deleting email template from db
        *-----------------------------------------------------------------------         */
        public function delete_whatsapp_template()
        {
            $id="";
            if(isset($_POST['id'])){
                $id=$_POST['id'];
            }
            
            
            //echo json_encode($id);
             $this->load->model('Whatsapp_template_model');
             $db_delete_res=$this->Whatsapp_template_model->delete_whatsapp_template_by_id($id);
             echo json_encode($db_delete_res);
        }
         /*----------------------------------------------------------------------- 
        This is the update_email_template function for loading the view_email template page for admin
        *-----------------------------------------------------------------------         */
        
        public function update_whatsapp_template (){
            
           $this->form_validation->set_rules('temp_id','Template id','required');
          $this->form_validation->set_rules('temp_name','Template Name','required');
          $this->form_validation->set_rules('temp_category','Template_category','required|trim');
           $this->form_validation->set_rules('temp_subject','Template_subject','required|trim');
         $this->form_validation->set_rules('temp_message','Template_message','required|trim|max_length[160]');
//           
           
           if($this->form_validation->run()){
               //step 1: Read the input fields
               // reading inupt field
               $id= $this->input->post('temp_id');
               
              // $temp_name= $this->input->post('temp_name');
              $temp_category= $this->input->post('temp_category');
              $temp_subject= $this->input->post('temp_subject');
              $temp_message= $this->input->post('temp_message');
//               
               
              // echo $id.$temp_name.$temp_category.$temp_subject,$temp_message;
//               //setting data in array for update
               $dataArray=array();
              // $dataArray['id']=$user_id;
               $dataArray['template_category']=$temp_category;
               $dataArray['template_subject']=$temp_subject;
               $dataArray['template_message']=$temp_message;
//                
//               //loading the modal and update function from model
                $this->load->model('Whatsapp_template_model');
                $update_res=$this->Whatsapp_template_model->update_whatsapp_template($id,$dataArray);
                
                if($update_res){
                    $this->session->set_flashdata('success','Updated Successfully !');
                    redirect('WhatsappTemplate/view_whatsapp_template');
                }else{
                    $this->session->set_flashdata('failure','Update Failed  !');
                    redirect('WhatsappTemplate/view_whatsapp_template');
                }
                
               
               
               
           }else{
               //echo "failed";
//               //return redirect('Admin/update_user_status');
                $this->load->model('Whatsapp_template_model');
                $db_user_list=$this->Whatsapp_template_model->load_all_whatsapp_template();
                //print_r($db_user_list);
                $data['whatsapp_template']=$db_user_list;
                $this->load->view('admin/view_whatsapptemplate',$data);
             
           }
        }
        
       
        
        
     
        
 }




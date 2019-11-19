<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * -----------------------------------------------------------------
 * Note : This is the Admin Controller for  admin main activity
 * ------------------------------------------------------------------
 * 
 */

Class Admin extends CI_Controller{
    
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
     * This is the  index function for loading the default landing page for admin users
     * ************************************************************************************************
     */
        public function index(){
            
            
           
           
            $this->load->view('admin/admin_login');
            

        }
        
    /*
     **************************************************************************************************
     * This is the  admin_register function for loading admin users registration page
     * ************************************************************************************************
     */
        public function admin_register(){
            
          $this->load->view('admin/admin_register');
       
        }
        
    /*
     **************************************************************************************************
     * This is the  process_admin_register function for processing admin users registration
     * ************************************************************************************************
     */
        public function process_admin_register(){
            
          $this->form_validation->set_rules('username','Username','required|trim|alpha');
          $this->form_validation->set_rules('useremail','Email','required|trim|valid_email');
          $this->form_validation->set_rules('password','Password','required|trim|min_length[8]|max_length[15]');
          $this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[password]');
          $this->form_validation->set_rules('serialkey','Serial Key','required|trim');
          
          if($this->form_validation->run()){
          //if validation success
          //step 1: Read the input fields
         $admin_name= $this->input->post('username');
         $admin_email=$this->input->post('useremail');
         $admin_password=$this->input->post('password');
         $serial_key=$this->input->post('serialkey');
         $user_type="Admin";
         $user_status="Active";
         $db_serial_key="Billionsvision@2019";
         
         if($db_serial_key!=$serial_key){
              $this->session->set_flashdata('invalid_serialkey','Please enter valid Serial Key');
             return redirect('Admin/process_admin_register');
         }
         
       // getting the form data and arrange it in array form for insert in db
             $adminArray=array();
             $adminArray['user_name']=$admin_name;
             $adminArray['user_email']=$admin_email;
             $adminArray['user_password']=$admin_password;
             $adminArray['user_type']=$user_type;
             $adminArray['user_status']=$user_status;
         
        // Sending this input data to reg_validate function in model 
         $this->load->model('Admin_model');
         $db_email=$this->Admin_model->reg_validate($adminArray);
         
         if($db_email == $admin_email){
             $this->session->set_flashdata('user_exist','user allready exist');
             return redirect('Admin/process_admin_register');
         }else{
             $this->session->set_flashdata('user_register','Registered successfully');
             return redirect('Admin/process_admin_register'); 
         }
         
            
          }else{
            //if validation fails echo form error
              // $this->session->set_flashdata('Invalid_Login','Registeration Failed');
               $this->load->view('admin/admin_register'); 
               
          }
          
        }
    /*
     **************************************************************************************************
     * This is the  user_list function for loading the list of users in admin panel
     * ************************************************************************************************
     */
        public function user_list(){
            
            //loading the model
            $this->load->model('Admin_model');
            $db_user_list=$this->Admin_model->load_all_users();
            //print_r($db_user_list);
           $data['user_data']=$db_user_list;
           $this->load->view('admin/user_list',$data);
           
           
            

        }
        
        
        public function update_user_status (){
            
           $this->form_validation->set_rules('user_id','ID','required');
           $this->form_validation->set_rules('status','User_Status','required');
           if($this->form_validation->run()){
               // reading inupt field
               $id= $this->input->post('user_id');
               $status= $this->input->post('status');
               
               //setting data in array for update
               $userArray=array();
               $userArray['user_status']=$status;
                
               //loading the modal and update function from model
                $this->load->model('Admin_model');
                $update_res=$this->Admin_model->user_status_update($id,$userArray);
                
                if($update_res){
                    $this->session->set_flashdata('success','Status Updated Successfully !');
                    return redirect('Admin/update_user_status');
                }else{
                    $this->session->set_flashdata('failure','Status Update Failed  !');
                    return redirect('Admin/update_user_status');
                }
                
               
               
               
           }else{
               //echo form errors
               //return redirect('Admin/update_user_status');
                $this->load->model('Admin_model');
                $db_user_list=$this->Admin_model->load_all_users();
                //print_r($db_user_list);
                $data['user_data']=$db_user_list;
                $this->load->view('admin/user_list',$data);
             
           }
        }
     
          /*
     *****************************************************************************************************
     *  This is the login check function for login activity of the admin 
     * ***************************************************************************************************
     */
        public function login_check(){
            //setting the validaton rules
            $this->form_validation->set_rules('useremail','Email','required|trim|valid_email');
            $this->form_validation->set_rules('password','Password','required|trim|min_length[8]|max_length[15]');

            if($this->form_validation->run()){
                // if validation success
                $useremail=$this->input->post('useremail');
                $password= $this->input->post('password');
               // echo $useremail.$password;

               //loading the model 
                $this->load->model('Admin_model');
               //checking with the model if the admin user is a valid user  
                $dbemail=$this->Admin_model->login_valid_user($useremail,$password);
                $user_type=$this->Admin_model->fetch_user_type($useremail,$password);
                $user_name=$this->Admin_model->fetch_user_name($useremail,$password);
                $user_status=$this->Admin_model->fetch_user_status($useremail,$password);

                if($dbemail){
                    if($user_type=='Admin' && $user_status=='Active'){
                    //echo 'Admin Success';
                    //Setting the session info sending and sending to admin dashboard
                    $this->session->set_userdata(array('user_email'=>$dbemail,'user_name'=>$user_name));    
                    return redirect('AdminDashboard/index');
                    }
                    else{
                       $this->session->set_flashdata('Invalid_Login','Invalid Email / Password');
                        return redirect('Admin/index'); 
                    }

                }
                else{
                     $this->session->set_flashdata('Invalid_Login','Invalid Email / Password');
                     return redirect('Admin/index');
                }

            }
            else{
                //load default login page with errors
                $this->load->view('admin/admin_login');
            }
        }
        
        /*
     ***********************************************************************************
     * This is the logout function for logout activity of the admin user 
     * *********************************************************************************
     */
    public function logout(){
       
        //unsetting the session data from session variable
        $this->session->unset_userdata(array('user_email','user_name'));
        // sending the user back to the login page
        return redirect('Admin/index');
    }
}
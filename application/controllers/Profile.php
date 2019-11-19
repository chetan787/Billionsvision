<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Profile Controller for profile activity of  the user
 * ----------------------------------------------------------------------------------------
 * 
 */

class Profile extends CI_Controller{
    
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
     * This is the  index function for loading the default profile page for users
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
            $data['user_data']=$db_user_row;
            $this->load->view('user/user_update_profile',$data);

        } 
        
    /*
     **************************************************************************************************
     * This is the  update_profile function for updating profile of the user
     * ************************************************************************************************
     */
    
        public function update_profile()
        {
            $this->form_validation->set_rules('user_email','User_email','required|trim');
            $this->form_validation->set_rules('firstname','First Name','required|trim');
            $this->form_validation->set_rules('lastname','Last Name','required|trim');
            $this->form_validation->set_rules('gender','Gender','required|trim');
            $this->form_validation->set_rules('dob','Date of Birth','required|trim');
            $this->form_validation->set_rules('phone','Mobile','required|trim|numeric|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('address','Address','required|trim');
            $this->form_validation->set_rules('dist','District','required|trim');
            $this->form_validation->set_rules('state','State','required|trim');
            $this->form_validation->set_rules('pincode','Pincode','required|trim|numeric|min_length[6]|max_length[6]');
            $this->form_validation->set_rules('education','Education','required|trim');
            $this->form_validation->set_rules('occupation','Occupation','required|trim');
            $this->form_validation->set_rules('work_experience','Work Experience','required|trim');
            $this->form_validation->set_rules('category','Category','required|trim');
            $this->form_validation->set_rules('startup_submition','What you have for Startups','required|trim');
            $this->form_validation->set_rules('startup_requirement','Your Startup Requrement','required|trim');
            $this->form_validation->set_rules('user_want','What do you want','required|trim');
            $this->form_validation->set_rules('past_enpr_exp','Past Enterpreneur Experience','required|trim');
            $this->form_validation->set_rules('user_total_invest','Your Investement','required|trim');
            $this->form_validation->set_rules('user_startup_location','Startup location','required|trim');
            $this->form_validation->set_rules('user_idea_elaboration','Unique Idea ');
            $this->form_validation->set_rules('user_suggestion','Suggstion');
           // $this->form_validation->set_rules('file','File','trim|xss_clean');
            if (empty($_FILES['file']['name']))
            {
                $this->form_validation->set_rules('file', 'Document', '');
            }
            if($this->form_validation->run()){
                // if validation passes suceess
              
               // arranging user data in array as per table fields in db 
                $userArray=array();
                $userArray['user_email']=$this->input->post('user_email');
                $userArray['first_name']=$this->input->post('firstname');
                $userArray['last_name']= $this->input->post('lastname');
                $userArray['user_type']="User";
                $userArray['user_plan']="";
                $userArray['user_status']="Active";
                $userArray['user_category']=$this->input->post('category');
                $userArray['gender']=$this->input->post('gender');
                $userArray['dob']=$this->input->post('dob');
                $userArray['phone']=$this->input->post('phone');
                $userArray['education']=$this->input->post('education');
                $userArray['occupation']=$this->input->post('occupation');
                $userArray['address']=$this->input->post('address');
                $userArray['dist']=$this->input->post('dist');
                $userArray['state']=$this->input->post('state');
                $userArray['pincode']=$this->input->post('pincode');
                $userArray['startup_requirement']=$this->input->post('startup_requirement');
                $userArray['startup_submition']=$this->input->post('startup_submition');
                $userArray['work_experience']=$this->input->post('work_experience');
                $userArray['past_enpr_exp']=$this->input->post('past_enpr_exp');
                $userArray['user_want']=$this->input->post('user_want');
                $userArray['user_total_invest']=$this->input->post('user_total_invest');
                $userArray['user_startup_location']=$this->input->post('user_startup_location');
                $userArray['user_idea_elaboration']=$this->input->post('user_idea_elaboration');
                $userArray['user_suggestion']=$this->input->post('user_suggestion');
                
               //loading the model
                        $this->load->model('Register_model');
                        $user_email=$this->input->post('user_email');
                        $db_user_email=$this->Register_model->update_user_profile($user_email,$userArray);
                        if($db_user_email==$user_email){
                            
                             if (!empty($_FILES['file']['name']))
                            {
                               if (!$this->upload->do_upload('file')) {
                  
                                 $error = $this->upload->display_errors();
                                 $this->session->set_flashdata('error',$error);
                                 return redirect('Profile/update_profile');
                        
                                } else {
                                       $data = $this->upload->data();
                                       $file_name = $data['file_name'];
                                       $userArray['user_image']=$file_name;
                                       $this->load->model('Register_model');
                                       $user_email=$this->input->post('user_email');
                                       $db_user_email=$this->Register_model->update_user_profile($user_email,$userArray);
                                      }
                            }
                             
                            
                            $this->session->set_flashdata('update_success', 'Profile Updated Successfully !');
                            return redirect('Profile/update_profile');
                        }else{
                             $this->session->set_flashdata('update_failure', 'Failed to update !');
                            return redirect('Profile/update_profile');
                        }
                 
                
                
                
                
            }else{
                // echo form validation error
                $user_email="";
                if(isset($_SESSION['user_email'])){
                   $user_email= $_SESSION['user_email'];
                }
                $this->load->model('Register_model');
                $db_user_row=$this->Register_model->load_user_by_email($user_email);
                $data['user_data']=$db_user_row;
                $this->load->view('user/user_update_profile',$data);
            }
                    
                    
            
             
              
            

        }     
        
}


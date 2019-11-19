<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Register Model for user registration process
 * ----------------------------------------------------------------------------------------
 * 
 */

class Manage_visitor extends CI_Model{
    
 /*
  * ----------------------------------------------------------------------------------------
  * This is the register_valid_user function for registration of  the user
  * ----------------------------------------------------------------------------------------
  */
//    public function register_valid_user($userArray){
//         
//       $q= $this->db->insert('')->get('visitor');
//       if($q->num_rows()){
//        // returning user_email of user from rows
//            return $q->row()->user_email;
//       }else{
//        // inserting user data into database if user does not exist
//          $hash_key="default_key";
//          //insert user data into user & configuration table
//          $q= $this->db->insert('user',$userArray);              
//          $q= $this->db->insert('configuration',['user_email'=>$userArray['user_email'],'hash_key'=>$hash_key]);
//          
//          return FALSE;
//          
//       }
////        
//    }
     public function visitor($adminArray){
         
       $this->db->insert('visitor',$adminArray);
                  
//       if($q->num_rows()){
//        // returning user_email of user from rows
//            return $q->result_array();
//       }else{
//           return FALSE;
//       }
        
    }
    
    
    
  /*
  * ----------------------------------------------------------------------------------------
  * This is the load_user_by_email function for loading the details of  the user
  * ----------------------------------------------------------------------------------------
  */
//    public function load_user_by_email($user_email){
//         
//       $q= $this->db->where('user_email',$user_email)->get('user');
//       if($q->num_rows()){
//        // returning user_email of user from rows
//            return $q->row_array();
//       }else{
//          return FALSE;
//       }
//        
//    }
//    
    
   /*
  * ----------------------------------------------------------------------------------------
  * This is the load_all_users function for loading the details of  all the users
  * ----------------------------------------------------------------------------------------
  */
//    public function load_all_users($startup_submition,$user_email){
//         
//       $q= $this->db->where('startup_submition',$startup_submition)
//                     ->where('user_email !=',$user_email)->get('user');
//       if($q->num_rows()){
//        // returning user_email of user from rows
//            return $q->result_array();
//       }else{
//          return FALSE;
//       }
//        
//    }
    
    /*
  * ----------------------------------------------------------------------------------------
  * This is the update_user_profile function for update profile of  the user
  * ----------------------------------------------------------------------------------------
  */
//    public function update_user_profile($user_email,$userArray){
//         
//       $q= $this->db->where('user_email',$user_email)->get('user');
//       if($q->num_rows()){
//           // update the row
//           $this->db->where('user_email',$user_email);
//           $this->db->update('user',$userArray);
//        // returning user_email of user from rows after update
//          return $q->row()->user_email;
//       }else{
//          return FALSE;
//       }
//        
//    }
  
}
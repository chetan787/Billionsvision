<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Visitor Model for admin  visitors process
 * ----------------------------------------------------------------------------------------
 * 
 */

class Visitor_model extends CI_Model{
    
 /* 
  * ----------------------------------------------------------------------------------------
  * This is the load_all_visitors function for loading all visitors form db
  * ----------------------------------------------------------------------------------------
  */
    public function load_all_visitors(){
         
       $q= $this->db->get('visitor');
                  
       if($q->num_rows()){
        // returning all rows from table
            return $q->result_array();
       }else{
           return FALSE;
       }
        
    }
    
    
     /* 
  * ----------------------------------------------------------------------------------------
  * This is the delete the  the user data from admin panel
  * ----------------------------------------------------------------------------------------
  */
     public function delete_visitor_list_by_id($id){
        $q= $this->db->where('id',$id)->get('visitor');
                  
       if($q->num_rows()){
           $this->db->where('id',$id);
           $this->db->delete('visitor'); 
           return TRUE;
        }else{
           return FALSE;
       }
       
    }
    
    
    
    
 

    
    
}

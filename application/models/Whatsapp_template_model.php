<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Whatsapp_template_model extends CI_Model{
    
    public function whatsapp_model($adminArray){
        $q= $this->db->where('template_name',$adminArray['template_name'])->get('whatsapptemplate');
                  
       if($q->num_rows()){
         return  $q->row()->template_name;
        }else{
            $q=$this->db->insert('whatsapptemplate',$adminArray);
       }
       
        
    }
    
    
     public function load_all_whatsapp_template(){
        $q= $this->db->get('whatsapptemplate');
                  
       if($q->num_rows()){
         return  $q->result_array();
        }
        else{
        return   false;
       }
       
        
    }
      /* 
  * ----------------------------------------------------------------------------------------
  * This is the delete the  the user data from admin panel
  * ----------------------------------------------------------------------------------------
  */
     public function delete_whatsapp_template_by_id($id){
        $q= $this->db->where('id',$id)->get('whatsapptemplate');
                  
       if($q->num_rows()){
           $this->db->where('id',$id);
           $this->db->delete('whatsapptemplate'); 
           return TRUE;
        }else{
           return FALSE;
       }
       
    }
    
    /* 
  * ----------------------------------------------------------------------------------------
  * This is the user_status_update function for update the user data from admin panel
  * ----------------------------------------------------------------------------------------
  */
    public function update_whatsapp_template($id,$dataArray){
         
       $q= $this->db->where('id',$id)->get('whatsapptemplate');
                  
       if($q->num_rows()){
           $this->db->where('id',$id);
           $this->db->update('whatsapptemplate',$dataArray);
         
             
             return TRUE; 
         
          
       }else{
           return FALSE;
       }
        
    }
    
    
}

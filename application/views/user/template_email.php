<div class="modal fade" id="profileModal" role="">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h3 style="color:blue;">Lead Profile</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
          <div class="panel-body" style="overflow-x:hidden; overflow-y: scroll; height: 400px;">
              <div class="container">
                  <div class="row">
<!--              <div class="col-md-12">-->
              <h5 class="mt-3 mb-2 ml-3" style="color:red;">Personal Profile</h5>     
                 <div class="container-fluid">
                        
                      <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:">
                            <img id="prf_image" src="<?php if($data['user_image']!=""){echo base_url().'uploads/profile_image/'.$data['user_image'];}else{echo base_url().'uploads/profile_image/m.png';} ?>" height="100" width="100"/>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                            <label style="font-weight: bold;">Name:</label><p id="prf_name"><?php if(isset($data['first_name'])){echo$data['first_name']; } ?> <?php if(isset($data['last_name'])){echo$data['last_name']; } ?></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold;">DOB:</label><p id="prf_dob"><?php if(isset($data['dob'])){echo$data['dob']; } ?></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                              <label style="font-weight: bold;">Email:</label><p id="prf_email"><?php if(isset($data['user_email'])){echo$data['user_email']; } ?></p>
                          </div> 
                          
                     </div>
                        
                     <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                       
                          <div class="col-sm-3 col-md-3" style="background-color:">
                            <label style="font-weight: bold;">Gender:</label><p id="prf_gender"><?php if(isset($data['gender'])){echo$data['gender']; } ?></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold;">Mobile No:</label><p id="prf_phone"><?php if(isset($data['phone'])){echo$data['phone']; } ?></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                             <label style="font-weight: bold;">Address:</label><p id="prf_address"><?php if(isset($data['address'])){echo$data['address']; } ?></p>
                          </div> 
                          
                     </div><br> 
                        
                    <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-3 col-md-3" style="background-color:">
                            <label style="font-weight: bold;">District:</label><p id="prf_dist"><?php if(isset($data['dist'])){echo$data['dist']; } ?></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold;">Region/State:</label><p id="prf_state"><?php if(isset($data['state'])){echo$data['state']; } ?></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                             <label style="font-weight: bold;">Pin Code:</label><p id="prf_pincode"><?php if(isset($data['pincode'])){echo$data['pincode']; } ?></p>
                          </div> 
                          
                    </div>  <br>
                     
                  <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-3 col-md-3" style="background-color:">
                            <label style="font-weight: bold;">Education:</label><p id="prf_education"><?php if(isset($data['education'])){echo$data['education']; } ?></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold;">Occupation:</label><p id="prf_occupation"><?php if(isset($data['occupation'])){echo$data['occupation']; } ?></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                             <label style="font-weight: bold;">Experience (Years):</label><p id="prf_work_experience"><?php if(isset($data['work_experience'])){echo$data['work_experience']; } ?></p>
                          </div> 
                          
                  </div> <br>
                  
                  <h5 class="mt-3 mb-2 ml-3" style="color:red;">Startup Profile</h5>
              
                <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-3 col-md-3" style="background-color:">
                            <label style="font-weight: bold; font-size:13px;">Startup Category:</label><p id="prf_category"><?php if(isset($data['user_category'])){echo$data['user_category']; } ?></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold; font-size:13px;">What is your Requirement?</label><p id="prf_requirement"><?php if(isset($data['startup_requirement'])){echo$data['startup_requirement']; } ?></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                             <label style="font-weight: bold; font-size:13px;">What do you want to do?</label><p id="prf_want"><?php if(isset($data['user_want'])){echo$data['user_want']; } ?></p>
                          </div> 
                          
                </div><br>
              
               <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-3 col-md-3" style="background-color:">
                              <label style="font-weight: bold; font-size:13px;">What you have for your startup?</label><p class="mt3" id="prf_submition"><?php if(isset($data['startup_submition'])){echo$data['startup_submition']; } ?></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold; font-size:13px;">Past experience in Enterpreneurship?</label><p id="prf_enpr_experience"><?php if(isset($data['past_enpr_exp'])){echo$data['past_enpr_exp']; } ?></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                             <label style="font-weight: bold; font-size:13px;">As a Innovator/Investor how much you can invest?</label><p id="prf_total_invest"><?php if(isset($data['user_total_invest'])){echo$data['user_total_invest']; } ?></p>
                          </div> 
                          
               </div><br>
               
               <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-3 col-md-3" style="background-color:">
                              <label style="font-weight: bold; font-size:13px;">Which location you prefer for your startup?</label><p class="mt3" id="prf_startup_location"><?php if(isset($data['user_startup_location'])){echo$data['user_startup_location']; } ?></p>
                          </div>
                          
                        
                          
               </div><br>
               
                <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-5 col-md-5" style="background-color:">
                             <label style="font-weight: bold; font-size:13px;"> Do you have any unique Idea?</label><p id="prf_unique_idea"><?php if(isset($data['user_idea_elaboration'])){echo$data['user_idea_elaboration']; } ?></p> 
                          </div>
                          
                          <div class="col-sm-5 col-md-5" style="background-color:">
                             <label style="font-weight: bold; font-size:13px;">Any suggestion?</label><p id="prf_suggestion"><?php if(isset($data['user_suggestion'])){echo$data['user_suggestion']; } ?></p>
                          </div> 
                          
               </div><br>
                        
          </div><!--container-fluid-->
                      
                      
                    
<!--               </div>  -col-md-12 end- -->
                      
                      <!--                     
<div class="col-md-4"><p>Hello india</p></div>
                      <div class="col-md-4"><p>Hello india</p></div>
                      <div class="col-md-4"><p>Hello india</p></div>-->
                      
                      
                  </div>
              </div>
              </div>
              <div class="modal-footer">
            <a href="#"  class="btn btn-primary"><i class="fa fa-inbox"> </i> Send as Email</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> 
      
          </div>
        
      </div>
    </div>
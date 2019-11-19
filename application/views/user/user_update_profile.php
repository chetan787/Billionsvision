
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Billionsvision || Update Profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Kvmgroupbiz Software Services, Kvmgroupbiz Software  in Kulti, Kvmgroupbiz Software in Asansol, Kvmgroupbiz Software in Kokata, Kvmgroupbiz Software in Delhi" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
     <?= link_tag('Adminasset/fonts/css/bootstrap.css','stylesheet','text/css')?> 

    <?= link_tag('Adminasset/fonts/css/style.css','stylesheet','text/css')?>

    <!-- font-awesome icons -->
    <?= link_tag('Adminasset/fonts/css/font-awesome.min.css','stylesheet','text/css')?>

    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .color{
            color:red;
        }
    </style>

</head>
<?php
 //setting session for invalid entry
if($_SESSION['user_name'] ==null ||$_SESSION['user_name'] =="" ){
    return redirect('Login/index');
}
?>
<body>
    <!-- header -->
    <?php include'header.php'?>
    <!-- //header -->
    <!-- inner banner -->
    <div class="inner-banner-w3ls d-flex flex-column justify-content-center align-items-center">
    </div>
    <!-- //inner banner -->
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>index.php/UserDashboard/index" class="m-0">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- main body content start -->
    <div class="jumbotron">
        <form action="<?php echo base_url()?>index.php/Profile/update_profile" method="post" class="p-sm-3" enctype="Multipart/form-data">
           
            
                    <?php if($error=$this->session->flashdata('update_failure')){
                    ?><div class="alert alert-dismissible alert-danger">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>                       
                    <?php if($error=$this->session->flashdata('update_success')){
                    ?><div class="alert alert-dismissible alert-success">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>
                    <?php if($error=$this->session->flashdata('error')){
                    ?><div class="alert alert-dismissible alert-danger">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>
            
            <?php
             // getting user data for edit 
              $user_email="";
              if(isset($user_data)){
              ?>
               <input type="hidden" name="user_email" id="user_email" value="<?php echo $user_data['user_email'] ?>">
             <?php
              }
            ?>
            
            <div class="row">
                <div class="col">
                    <h5 class="text-primary">Personal Detail</h5> 
                </div>
            </div>
            
        <div class="row">
            
           
       <div class="col-md-4">
           
             <div class="form-group">
                 <label for="firstname" class="col-form-label">First Name<sup class="color">*</sup></label>
                 <input type="text" class="form-control" placeholder="John" name="firstname" id="firstname" required="" value="<?php if(isset($user_data)){echo $user_data['first_name'] ; } ?>">
                <?php echo form_error('firstname',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-form-label">Last Name<sup class="color">*</sup></label>
                <input type="text" class="form-control" placeholder="Doe" name="lastname" id="lastname" required="" value="<?php if(isset($user_data)){echo $user_data['last_name'] ; } ?>">
                <?php echo form_error('lastname',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>    
            </div>   
            <div class="form-group">
                        <label for="gender" class="col-form-label">Gender<sup class="color">*</sup></label>
                        <select class="form-control" name="gender" id="gender">
                          <option><?php if(isset($user_data)){echo $user_data['gender'] ; } ?></option>
                          <option></option>
                          <option>Male</option>
                          <option>Female</option>
                          <option>Other</option> 
                         </select>  
                       
                        <?php echo form_error('gender',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?> 
                     </div>
            <div class="form-group">
                <label for="dob" class="col-form-label">Date of Birth<sup class="color">*</sup></label>
                <input type="date" class="form-control" placeholder="" name="dob" id="dob" required="" value="<?php if(isset($user_data)){echo $user_data['dob'] ; } ?>">
                <?php echo form_error('dob',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>    
            </div>
       
       </div>
            
            
        <div class="col-md-4">
           
                
            <div class="form-group">
                <label for="phone" class="col-form-label">Mobile<sup class="color">*</sup></label>
                <input type="text" class="form-control" placeholder="9999999999" name="phone" id="phone" required="" value="<?php if(isset($user_data)){echo $user_data['phone'] ; } ?>">
                <?php echo form_error('phone',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
            </div>
            <div class="form-group">
                <label for="address" class="col-form-label">Address<sup class="color">*</sup></label>
                <input type="text" class="form-control" placeholder="" name="address" id="address" required="" value="<?php if(isset($user_data)){echo $user_data['address'] ; } ?>">
                <?php echo form_error('address',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>    
            </div>   
            <div class="form-group">
                <label for="dist" class="col-form-label">District<sup class="color">*</sup></label>
                <input type="text" class="form-control" placeholder="" name="dist" id="dist" required=""value="<?php if(isset($user_data)){echo $user_data['dist'] ; } ?>">
                <?php echo form_error('dist',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
            </div>
            <div class="form-group">
                <label for="state" class="col-form-label">Region/State<sup class="color">*</sup></label> 
                            <select name="state" id="state" class="form-control" required="required">
                                <option><?php if(isset($user_data)){echo $user_data['state'] ; } ?></option>
                                <option></option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam ">Assam </option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option vlaue="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                            <?php echo form_error('state',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                              
            </div>
           
            

               
        </div>
            
            
        <div class="col-md-4">

                
            <div class="form-group">
                <label for="pincode" class="col-form-label">Pincode<sup class="color">*</sup></label>
                <input type="text" class="form-control" placeholder="" name="pincode" id="pincode" required="" value="<?php if(isset($user_data)){echo $user_data['pincode'] ; } ?>">
                <?php echo form_error('pincode',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
            </div>
            <div class="form-group">
                <label for="education" class="col-form-label">Education<sup class="color">*</sup></label>
                <input type="text" class="form-control" placeholder="" name="education" id="education" required="" value="<?php if(isset($user_data)){echo $user_data['education'] ; } ?>">
                <?php echo form_error('education',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>    
            </div>   
            <div class="form-group">
                <label for="occupation" class="col-form-label">Occupation<sup class="color">*</sup></label>
                <input type="text" class="form-control" placeholder="" name="occupation" id="occupation" required="" value="<?php if(isset($user_data)){echo $user_data['occupation'] ; } ?>">
                <?php echo form_error('occupation',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
            </div>
            <div class="form-group">
                <label for="work_experience" class="col-form-label">Experience(years)<sup class="color">*</sup></label>
                <select class="form-control"  name="work_experience" id="work_experience">
                          <option><?php if(isset($user_data)){echo $user_data['work_experience'] ; } ?></option>
                          <option></option>
                          <option>0</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>
                        </select>
                <?php echo form_error('work_experience',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>    
            </div>
           
        </div>
            
        
                
        </div> 
             
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="file" class="col-form-label">Profile Image<sup class="color">*</sup></label>
                    <img src="<?php if($user_data['user_image']!=""){echo base_url().'uploads/profile_image/'.$user_data['user_image'];}else{echo base_url().'uploads/profile_image/m.png';} ?>" width="50" height="50" alt="Photo"/>
                    <input type="file" class="form-control" placeholder="" name="file" id="file" >
                    <?php echo form_error('file',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                </div>
           </div>
        </div>     
            
          <!----startup Detail start-------->   
          
            <div class="row mb-2 mt-2">
                <div class="col">
                    <h5 class="text-primary">Startup Detail</h5> 
                </div>
            </div>
           <div class="row mb-2" >
               <div class="col-md-3"> 
                   <p class="mt-2"><span class="fa fa-square-o"></span> <sup class="color">*</sup>Startup Category</p>
                      <div class="form-group">
                        <label for="category">Please Select:</label>
                        <select class="form-control" name="category" id="category">
                          <option><?php if(isset($user_data)){echo $user_data['user_category'] ; } ?></option>
                          <option></option>
                          <option>Automobile</option>
                          <option>Agricultural</option>
                          <option>Architechture</option>
                          <option>Educational</option>
                          <option>E-mobility</option>
                          <option>FoodProcessing</option>
                          <option>FoodDelivery</option>
                          <option>Gardening</option>
                          <option>Hospitality</option>
                          <option>Housing</option>
                          <option>InformationTechnology</option>
                          <option>Logistics</option>
                          <option>Medical</option>
                          <option>Retail</option>
                          <option>RentalService</option>
                          <option>Social</option>
                          <option>Tourism</option>
                          
                          
                          
                          
                        </select>
                        <?php echo form_error('category',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                     </div>
               </div>
                   
               
           </div>
            <div class="row">
               <div class="col-md-4">  
                   <p class="mb-2"><span class="fa fa-square-o"></span> <sup class="color">*</sup> What you have for your Startups?</p>
                  
                
                    <label class="radio-inline">
                        <input type="radio" name="startup_submition" value="Idea" id="Idea" <?php if(isset($user_data)){if($user_data['startup_submition']=="Idea"){?> checked <?php } }  ?> >Idea
                    </label>
                    <label class="radio-inline">
                         <input type="radio" name="startup_submition" value="Fund" id="Fund" <?php if(isset($user_data)){if($user_data['startup_submition']=="Fund"){?> checked <?php } }  ?> >Fund
                    </label>
                    <label class="radio-inline">
                         <input type="radio" name="startup_submition" value="Others" id="Others" <?php if(isset($user_data)){if($user_data['startup_submition']=="Others"){?> checked <?php } }  ?>>Others
                   </label>
               </div>
          
               
           
             <div class="col-md-4">
             
               <p class="mb-2"><span class="fa fa-square-o"></span> <sup class="color">*</sup> What is your Requirement?</p>
                  
                    <label class="radio-inline">
                         <input type="radio" name="startup_requirement" id="Fund" value="Fund" <?php if(isset($user_data)){if($user_data['startup_requirement']=="Fund"){?> checked <?php } }  ?> >Fund   
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="startup_requirement" id="Idea" value="Idea" <?php if(isset($user_data)){if($user_data['startup_requirement']=="Idea"){?> checked <?php } }  ?> >Idea
                    </label>
                    <label class="radio-inline">
                       <input type="radio" name="startup_requirement" id="Mentorship" value="Mentorship" <?php if(isset($user_data)){if($user_data['startup_requirement']=="Mentorship"){?> checked <?php } }  ?> >Mentorship
                    </label>
 
          
                </div>  
                
                
               <div class="col-md-4">
             
                 <p class="mb-2"><span class="fa fa-square-o"></span> <sup class="color">*</sup>What do you want to do?</p>
                  
                    <label class="radio-inline">
                         <input type="radio" name="user_want" id="Bussiness" value="Bussiness" <?php if(isset($user_data)){if($user_data['user_want']=="Bussiness"){?> checked <?php } }  ?> >Bussiness   
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="user_want" id="Job" value="Job" <?php if(isset($user_data)){if($user_data['user_want']=="Job"){?> checked <?php } }  ?> >Job
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="user_want" id="Enterpreneurship" value="Enterpreneurship" <?php if(isset($user_data)){if($user_data['user_want']=="Enterpreneurship"){?> checked <?php } }  ?> >Enterpreneurship
                    </label>
                     <label class="radio-inline">
                        <input type="radio" name="user_want" id="Study" value="Study" <?php if(isset($user_data)){if($user_data['user_want']=="Study"){?> checked <?php } }  ?> >Study
                    </label>
          
              </div>  
                
                
            </div>
           
            <div class="row mt-2 mb-2">
                
                <div class="col-md-4">
                   <p class="mt-2"><span class="fa fa-square-o"></span> <sup class="color">*</sup>Past experience in Enterpreneurship?</p>
                      <div class="form-group">
                        <label for="past_enpr_exp">Please Select:</label>
                        <select class="form-control" name="past_enpr_exp" id="past_enpr_exp">
                          <option><?php if(isset($user_data)){echo $user_data['past_enpr_exp'] ; } ?></option>
                          <option></option>
                          <option>No past experience</option>
                          <option>Less than a year</option>
                          <option>More than a Year</option>
                          <option>Two to Five years</option>
                          <option>More than Five Years</option>
                        </select>
                        <?php echo form_error('past_enpr_exp',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                     </div>
                   
                </div>
                
                 <div class="col-md-4">
                   <p class="mt-2"><span class="fa fa-square-o"></span> <sup class="color">*</sup>As a Innovator/Investor how much you can invest?</p>
                      <div class="form-group">
                        <label for="user_total_invest">Please Select:</label>
                        <select class="form-control" name="user_total_invest" id="user_total_invest">
                          <option><?php if(isset($user_data)){echo $user_data['user_total_invest'] ; } ?></option>
                          <option></option>
                          <option>No Investment</option>
                          <option>5000</option>
                          <option>10000</option>
                          <option>50000</option>
                          <option>100000</option>
                          <option>200000</option>
                          <option>300000</option>
                          <option>400000</option>
                          <option>500000</option>
                          <option>1000000</option>
                          
                        </select>
                        <?php echo form_error('user_total_invest',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                     </div>
                  
                  
                </div>
                
                 <div class="col-md-4">
                   <p class="mt-2"><span class="fa fa-square-o"></span> <sup class="color">*</sup>Which location you prefer for your startup?</p>
                      <div class="form-group">
                            <label for="user_startup_location">Please Mention:</label>
                            <input type="text" class="form-control" placeholder="City / State" name="user_startup_location" id="user_startup_location" required="" value="<?php if(isset($user_data)){echo $user_data['user_startup_location'] ; } ?>">
                            <?php echo form_error('user_startup_location',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                      </div>
                    
                </div>
            </div>
          
            <div class="row mt-2 mb-2">
                
                <div class="col-md-6">
                   <p><span class="fa fa-square-o"></span> Do you have any unique Idea?</p>
                      
                       
                         <div class="form-group">
                            <label for="user_idea_elaboration">Please mention:</label>
                            <textarea class="form-control" rows="3" name="user_idea_elaboration" id="user_idea_elaboration" value=""><?php if(isset($user_data)){echo $user_data['user_idea_elaboration'] ; } ?></textarea>
                            <?php echo form_error('user_idea_elaboration',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                         </div>
                    
                   
                </div>
                
                 <div class="col-md-6">
                   <p><span class="fa fa-square-o"></span> Any suggestion?</p>
                      <div class="form-group">
                            <label for="user_suggestion">Please mention:</label>
                            <textarea class="form-control" rows="3" name="user_suggestion" id="user_suggestion"></textarea>
                            <?php echo form_error('user_suggestion',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                         </div>
                  
                  
                </div>
                
                 
            </div>
          
          
            
             <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"><input type="submit" class="form-control btn btn-success btn-lg" value="Save & Update"></div>
                <div class="col-md-4"></div>
             </div>
        </form>
    </div> 
        
                
            
   
    <!-- //main body content end -->

    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- //footer -->
    
    <!-- move top icon -->
    <a href="#home" class="move-top text-center">
        <span class="fa fa-level-up" aria-hidden="true"></span>
    </a>
    <!-- //move top icon -->

</body>

</html>
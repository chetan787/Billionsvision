
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Billionsvision || Startup Leads </title>
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
 .size{
		min-height: 0px;
		padding: 0 0 40px 0;
		
	}
        
 .form-container{
		background-color: white;
		border: .5px solid #eee;
		border-radius: 5px;
		padding: 20px 10px 20px 30px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
               -moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
                box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
	}

        .edit{
          height:20px;
          width: 64px;
          font-size: 11px;
          padding: 2px 0 2px 0; 


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
            <li class="breadcrumb-item active" aria-current="page">Startup Leads</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- main body content -->
    <div class="row">
         
        <div class="col-md-4">
            
         <div class="jumbotron">
            <h5 class="text-center mb-4">Startup Profile</h5>
            <input type="hidden" name="user_email" id="user_email" value="<?php if(isset($user_data['user_email'])){echo$user_data['user_email']; } ?>">
            <h5 class="text-center mb-2"><img src="<?php if($user_data['user_image']!=""){echo base_url().'uploads/profile_image/'.$user_data['user_image'];}else{echo base_url().'uploads/profile_image/m.png';} ?>" width="50" height="50" alt="Photo"/></h5>
            <h6 class="text-center mb-4"><?php if(isset($user_data['first_name'])){echo$user_data['first_name']; } ?> <?php if(isset($user_data['last_name'])){echo$user_data['last_name']; } ?></h6> 
            <h6 class="text-center mb-4" style="color:blue;">Requirement : <?php if(isset($user_data['startup_requirement'])){echo$user_data['startup_requirement']; } ?>  </h6>
            <h6 class="text-center mb-4">Want to do : <?php if(isset($user_data['user_want'])){echo$user_data['user_want']; } ?></h6> 
             <h6 class="text-center mb-4">Having : <?php if(isset($user_data['startup_submition'])){echo$user_data['startup_submition']; } ?></h6>
            <h6 class="text-center mb-4">Location : <?php if(isset($user_data['user_startup_location'])){echo$user_data['user_startup_location']; } ?></h6> 
         </div>  
         
        </div>
        
        
        <div class="col-md-8">
             <div class="container size"> 
                 <div class="card-title bg-primary py-2">
                  <h5 class="text-center mt-2 mb-2 text-white">Startup Leads</h5>
                </div>
             <div style=" height: 400px; overflow-x:hidden; overflow-y:auto;">     
                 <?php
                                // for fetching extracted mobile
                                
                                 $i=1;
                                
                                if(isset($startup_data) && is_array($startup_data) && count($startup_data))
                                { ?>
                                
                                
                                <?php
                                    foreach ($startup_data as $key => $data) { 
                                ?>  
                   
                 <div class="ofseet-md-1 form-container ml-3" > 
                           
              
                  <div class="card-title bg-warning">
                    <h5 class="text-center py-2 mb-2 text-white">Recomended</h5>
                </div>
                  <div class="row">
                      <div class="col-md-6">
                          <p> <input type="hidden" name="lead_email<?php echo $i ; ?>" id="lead_email<?php echo $i ; ?>" value="<?php echo $data['user_email'] ?>"></p>
                          <img class="mb-2" src="<?php if($data['user_image']!=""){echo base_url().'uploads/profile_image/'.$data['user_image'];}else{echo base_url().'uploads/profile_image/m.png';} ?>" width="50" height="50" > 
                          <h5><?php echo $data['first_name'] ?> <?php echo $data['last_name'] ?> </h5>
                        
                          <span class=" text-lg fa fa-map-marker"> <?php echo $data['user_startup_location'] ?></span> <br>
                        <span class="">Experience : <?php echo $data['past_enpr_exp'] ?></span><br>
                        <span> Having : <?php echo $data['startup_submition'] ?></span><br>
                        <span> Interested to Invest : <?php echo $data['user_total_invest'] ?></span><br>
<!--                        <p>I am looking for service provider for IT Training Services.
                           Kindly send me price and other details.
                        </p>-->
                      
                      </div>
                      <div class="col-md-2">
                            <div class="col-xs-2 v-divider" style="margin-left:5px;
                                                                   margin-right:0px;
                                                                   width:1px;
                                                                   height:100%;
                                                                   border-left:1px solid gray;">
                        </div>
                      </div>
                      
                      <div class="col-md-4">
                          <h5 class="mb-2">Rating</h5>
                          <span class="fa fa-star fa-2x"></span>
                          <span class="fa fa-star fa-2x"></span>
                          <span class="fa fa-star fa-2x"></span>
                          <span class="fa fa-star fa-2x"></span>
                          <span class="fa fa-star fa-2x mb-2"></span><br>
                          
                              <!--                          <a href="" class="btn btn-primary">Contact</a>-->
                              <button onclick="" class="btn btn-primary" name="buy_leads<?php echo $i ; ?>" id="buy_leads<?php echo $i ; ?>">Buy Leads</button>
                              <a href="#" style="display: none" class="btn btn-success" name="profile_visibility<?php echo $i ; ?>" id="profile_visibility<?php echo $i ; ?>"  data-toggle="modal" data-target="#profileModal" data-todo='{"prf_image":"<?php if($data['user_image']!=""){echo base_url().'uploads/profile_image/'.$data['user_image'];}else{echo base_url().'uploads/profile_image/m.png';} ?>",
                                                                                                                                                                                                                                           "prf_name":"<?php echo $data['first_name'] ?> <?php echo $data['last_name'] ?>" ,
                                                                                                                                                                                                                                           "prf_email":"<?php echo $data['user_email'] ?>" ,
                                                                                                                                                                                                                                           "prf_gender":"<?php echo $data['gender'] ?>" ,
                                                                                                                                                                                                                                           "prf_dob":"<?php echo $data['dob'] ?>",
                                                                                                                                                                                                                                           "prf_phone":"<?php echo $data['phone'] ?>",
                                                                                                                                                                                                                                           "prf_address":"<?php echo $data['address'] ?>",
                                                                                                                                                                                                                                           "prf_dist":"<?php echo $data['dist'] ?>",
                                                                                                                                                                                                                                           "prf_state":"<?php echo $data['state'] ?>",
                                                                                                                                                                                                                                           "prf_pincode":"<?php echo $data['pincode'] ?>",
                                                                                                                                                                                                                                           "prf_work_experience":"<?php echo $data['work_experience'] ?>",
                                                                                                                                                                                                                                           "prf_education":"<?php echo $data['education'] ?>",
                                                                                                                                                                                                                                           "prf_occupation":"<?php echo $data['occupation'] ?>",
                                                                                                                                                                                                        
                                                                                                                                                                                                                                          
                                                                                                                                                                                                        
                                                                                                                                                                                                                                           "prf_category":"<?php echo $data['user_category'] ?>",
                                                                                                                                                                                                                                           "prf_requirement":"<?php echo $data['startup_requirement'] ?>",
                                                                                                                                                                                                                                           "prf_submition":"<?php echo $data['startup_submition'] ?>",
                                                                                                                                                                                                                                           "prf_enpr_experience":"<?php echo $data['past_enpr_exp'] ?>",
                                                                                                                                                                                                                                           "prf_want":"<?php echo $data['user_want'] ?>",
                                                                                                                                                                                                                                           "prf_total_invest":"<?php echo $data['user_total_invest'] ?>",
                                                                                                                                                                                                                                           "prf_startup_location":"<?php echo $data['user_startup_location'] ?>",
                                                                                                                                                                                                                                           "prf_unique_idea":"<?php echo $data['user_idea_elaboration'] ?>",
                                                                                                                                                                                                                                           "prf_suggestion":"<?php echo $data['user_suggestion'] ?>" }' >View Profile</a>
                                                                                                                                                                                                        
                                                                                                                                                                                                                                        
                                                                                                                                                                                                        
                                                                                                                                                                                                        
                                                                                                                                                                                                                                        
                              <script>
                                
                                </script>
                              
                              
                              
                              <?php  
                                     $user_email="";
                                     $lead_email="";
                                      if(isset($user_data['user_email'])){
                                          $user_email=$user_data['user_email']; 
                                          
                                      } 
                                      $lead_email=  $data['user_email'];
                                      
                                      $this->load->model('payment_model');
                                      $pay_status=$this->payment_model->leads_payment_status($user_email,$lead_email);
                                      
                              ?>
                             
                              <input type="hidden" name="payment_response<?php echo $i ; ?>" id="payment_response<?php echo $i ; ?>" value="<?php echo $pay_status ; ?>">
                              <!-- Payment Gateway Integration -->
                            <script src="https://js.instamojo.com/v1/checkout.js"></script>
                            <script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>


                            <script>
                               $(document).ready(function(){
                                     
                                  // For Loading data on model
                                     $("#profile_visibility<?php echo $i ;?>").click(function(){
                                       //   alert("<?php echo $i ;?>") ;
                                         var prf_name=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_name;
                                         var prf_email=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_email;
                                         var prf_gender=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_gender;
                                         var prf_dob=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_dob;
                                         var prf_image=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_image;
                                         
                                        var prf_phone=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_phone;
                                        var prf_address=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_address;
                                        var prf_dist=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_dist;
                                        var prf_state=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_state;
                                        var prf_pincode=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_pincode;
                                        var prf_work_experience=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_work_experience;
                                        var prf_education=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_education;
                                        var prf_occupation=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_occupation;
                                        
                                       
                                       
                                        
                                         var prf_category=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_category;
                                         var prf_requirement=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_requirement;
                                         var prf_submition=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_submition;
                                         var prf_enpr_experience=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_enpr_experience;
                                         var prf_want=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_want;
                                         var prf_total_invest=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_total_invest;
                                         var prf_startup_location=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_startup_location;
                                         var prf_unique_idea=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_unique_idea;
                                         var prf_suggestion=$("#profile_visibility<?php echo $i ;?>").data('todo').prf_suggestion;
                                        
                                        //alert(prf_email);
                                            $("#prf_name").html(prf_name);
                                            $("#prf_email").html(prf_email);
                                            $("#prf_dob").html(prf_dob);
                                            $("#prf_gender").html(prf_gender);
                                            $("#prf_image").attr("src",prf_image);
                                            
                                            $("#prf_phone").html(prf_phone);
                                            $("#prf_address").html(prf_address);
                                            $("#prf_dist").html(prf_dist);
                                            $("#prf_state").html(prf_state);
                                            $("#prf_pincode").html(prf_pincode);
                                            $("#prf_work_experience").html(prf_work_experience);
                                            $("#prf_education").html(prf_education);
                                            $("#prf_occupation").html(prf_occupation);
                                            
                                            
                                            
                                            $("#prf_category").html(prf_category);
                                            $("#prf_requirement").html(prf_requirement);
                                            $("#prf_submition").html(prf_submition);
                                            $("#prf_enpr_experience").html(prf_enpr_experience);
                                            $("#prf_want").html(prf_want);
                                            $("#prf_total_invest").html(prf_total_invest);
                                            $("#prf_startup_location").html(prf_startup_location);
                                            $("#prf_unique_idea").html(prf_unique_idea);
                                            $("#prf_suggestion").html(prf_suggestion);
                                            
                                     });


                                  });
                              
                              
                              
                              $(document).ready(function(){
                                 // For Payment status profile visibility
                                 var pay_st= $('#payment_response<?php echo $i ; ?>').val();
                               //  alert(pay_st);
                                 if(pay_st=='PAID'){
                                     $('#buy_leads<?php echo $i ; ?>').hide();
                                     $('#profile_visibility<?php echo $i ; ?>').show();
                                 }
                              });
                              
                              
                              $(document).ready(function(){
                                  // for payment gateway
                                 $('#buy_leads<?php echo $i ; ?>').click(function(){
                                 //   alert("hello");
                                 
                                    
                                     /* Configuring Handlers */
                                        Instamojo.configure({
                                          handlers: {
                                            onOpen: onOpenHandler,
                                            onClose: onCloseHandler,
                                            onSuccess: onPaymentSuccessHandler,
                                            onFailure: onPaymentFailureHandler
                                          }
                                        });
                              
                                        //function onButtonClick() {
                                          Instamojo.open('https://www.instamojo.com/@billionsvision/l5cc94ff4777e4faf865b8aab36568f41');
                                          //  Instamojo.open('https://www.instamojo.com/@vikashjyoti2015/l8485f56bfda44a8b90099c4835547bd9');
                                       // }
                             
                                          
                             
                                            /* Start client-defined Callback Handler Functions */
                                            function onOpenHandler () {
                                             // alert('Payments Modal is Opened');
                                            }

                                            function onCloseHandler () {
                                             // alert('Payments Modal is Closed');
                                            }

                                            function onPaymentSuccessHandler (response) {
                                              //alert('Payment Success');
                                             // console.log('Payment Success Response', response);
                                            // alert('Payment Success', response);
                                            $(document).ready(function(){
                                              var lead_email=$('#lead_email<?php  echo $i ; ?>').val();
                                              var user_email=$('#user_email').val();
                                              
                                                  $.ajax({
                                                              type:'POST',
                                                              url:"<?php echo base_url(); ?>index.php/Leads/get_ajax_all_payment_detail",
                                                              data: {"user_email":user_email,"lead_email":lead_email},
                                                              success:function(result){

                                                             //  $('#myModal_loader').modal('hide');
                                                              // alert(result);
                                                              if(result){
                                                                  $('#myModal').modal();
                                                                  $("#pay_response").html("Success");
                                                              }else{
                                                                  $('#myModal').modal();
                                                                  $("#pay_response").html("Failed"); 
                                                              }
                                                              
                                                             
                                                              },
                                                              error: function(result)
                                                              {
                                                             //  $("#div_result").html("Error"); 
                                                              },
                                                              fail:(function(status) {
                                                             //  $("#div_result").html("Fail");
                                                              }),
                                                              beforeSend:function(d){
                                                              // $('#myModal_loader').modal();
                                                              }

                                                             });
                                               
                                            
                                            
                                            });
                                            }

                                            function onPaymentFailureHandler (response) {
                                              //alert('Payment Failure');
                                              //console.log('Payment Failure Response', response);
                                             // alert('Payment Failure', response);
                                            }
                                            
                                            
                                 });
                                
                                
                               
                              });
                             
                            </script>
                            
                         
      
                      </div>
                      
                  </div>  
                  

            </div>
         
           <?php $i++ ;}?>
                                 
                                  <?php }else{ ?>
                                  <tbody>
                                    <tr>
                                       <td><?php echo ' No Data '; ?></td>
                                    </tr>
                                  </tbody>
                                 <?php } ?>
            
            </div> 
          
         
        </div>
        
         </div>   
        
<!--   <button data-toggle="modal" data-target="#myModal_loader" >Click</button>-->
    <!----start Modal for Ajax loader-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>  
    <div class="modal hide" id="myModal_loader" style="margin-top:250px;">
                    <div class="modal-dialog">                            
                                 <img src="<?php echo base_url();?>Adminasset/images/ajax-loader.gif" style="display: block; margin-left: auto; margin-right: auto;">
                    </div>
   </div>
    <!----end Modal for Ajax loader-->              
    <div class="container">
  
  
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
            <a href="<?php echo base_url();?>index.php/Leads/index" class="close" data-dismiss="">&times;</a>
          
        </div>
        <div class="modal-body">
          <p id="pay_response"></p>
        </div>
        <div class="modal-footer">
            <a href="<?php echo base_url();?>index.php/Leads/index" class="btn btn-primary" data-dismiss="">Close</a>
        </div>
      </div>
    </div>
  </div>
</div> 
 <!-- // Modal -->  
 
 <!-- Modal for Profile -->
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
                            <img id="prf_image" src="" height="100" width="100"/>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                            <label style="font-weight: bold;">Name:</label><p id="prf_name"></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold;">DOB:</label><p id="prf_dob"></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                              <label style="font-weight: bold;">Email:</label><p id="prf_email"></p>
                          </div> 
                          
                     </div>
                        
                     <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                       
                          <div class="col-sm-3 col-md-3" style="background-color:">
                            <label style="font-weight: bold;">Gender:</label><p id="prf_gender"></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold;">Mobile No:</label><p id="prf_phone"></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                             <label style="font-weight: bold;">Address:</label><p id="prf_address"></p>
                          </div> 
                          
                     </div><br> 
                        
                    <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-3 col-md-3" style="background-color:">
                            <label style="font-weight: bold;">District:</label><p id="prf_dist"></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold;">Region/State:</label><p id="prf_state"></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                             <label style="font-weight: bold;">Pin Code:</label><p id="prf_pincode"></p>
                          </div> 
                          
                    </div>  <br>
                     
                  <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-3 col-md-3" style="background-color:">
                            <label style="font-weight: bold;">Education:</label><p id="prf_education"></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold;">Occupation:</label><p id="prf_occupation"></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                             <label style="font-weight: bold;">Experience:</label><p id="prf_work_experience"></p>
                          </div> 
                          
                  </div> <br>
                  
                  <h5 class="mt-3 mb-2 ml-3" style="color:red;">Startup Profile</h5>
              
                <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-3 col-md-3" style="background-color:">
                            <label style="font-weight: bold; font-size:13px;">Startup Category:</label><p id="prf_category"></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold; font-size:13px;">What is your Requirement?</label><p id="prf_requirement"></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                             <label style="font-weight: bold; font-size:13px;">What do you want to do?</label><p id="prf_want"></p>
                          </div> 
                          
                </div><br>
              
               <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-3 col-md-3" style="background-color:">
                              <label style="font-weight: bold; font-size:13px;">What you have for your startup?</label><p class="mt3" id="prf_submition"></p>
                          </div>
                          
                          <div class="col-sm-3 col-md-3" style="background-color:">
                             <label style="font-weight: bold; font-size:13px;">Past experience in Enterpreneurship?</label><p id="prf_enpr_experience"></p> 
                          </div>
                          
                          <div class="col-sm-4 col-md-4" style="background-color:">
                              <label style="font-weight: bold; font-size:13px;">As a Innovator/Investor how much you can invest?</label>
                             
                              
                              <p id="prf_total_invest" class="fa fa-inr"> </p>
                          </div> 
                          
               </div><br>
               
               <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-3 col-md-3" style="background-color:">
                              <label style="font-weight: bold; font-size:13px;">Which location you prefer for your startup?</label><p class="mt3" id="prf_startup_location"></p>
                          </div>
                          
                        
                          
               </div><br>
               
                <div class="row">
                          <div class="col-sm-2 col-md-2" style="background-color:"> </div>
                        
                          <div class="col-sm-5 col-md-5" style="background-color:">
                             <label style="font-weight: bold; font-size:13px;"> Do you have any unique Idea?</label><p id="prf_unique_idea"></p> 
                          </div>
                          
                          <div class="col-sm-5 col-md-5" style="background-color:">
                             <label style="font-weight: bold; font-size:13px;">Any suggestion?</label><p id="prf_suggestion"></p>
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
                  <a href="#" id="Send_email"  class="btn btn-primary"><i class="fa fa-inbox"> </i> Send as Email</a>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div> 
          
          
         
          </div>
        
      </div>
    </div>
  </div>
</div>
<!-- // Modal for Profile --> 
 
 
    
    </div>
    <!-- //login -->
    
       <!---Script for send lead profile data through Email -->
                             <script>
                                $(document).ready(function(){
                                   $("#Send_email").click(function(){
                                       $('#profileModal').modal('hide');
                                     var prf_email = $('#prf_email').html() ;
                                    // alert(prf_email); 
                                     
                                      $.ajax({
                                                              type:'POST',
                                                              url:"<?php echo base_url(); ?>index.php/Leads/send_ajax_email",
                                                              data: {"prf_email":prf_email},
                                                              success:function(result){

                                                               $('#myModal_loader').modal('hide');
                                                              // alert(result);
                                                              if(result){
                                                                 alert(result);
                                                              }else{
                                                                 alert('Email send failed');
                                                              }
                                                              
                                                             
                                                              },
                                                              error: function(result)
                                                              {
                                                             //  $("#div_result").html("Error"); 
                                                              },
                                                              fail:(function(status) {
                                                             //  $("#div_result").html("Fail");
                                                              }),
                                                              beforeSend:function(d){
                                                               $('#myModal_loader').modal();
                                                              }

                                                             });
                                   }); 
                                });
    
                            </script>
    
    

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
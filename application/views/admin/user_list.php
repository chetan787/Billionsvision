<!-- header-->
<?php include 'header.php' ?>
<!-- end header-->
<?php
// setting session for invalid entry
if($_SESSION['user_name'] ==null ||$_SESSION['user_name'] =="" ){
    return redirect('Admin/index');
}
?>

<!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                  <h3 class="page-header"> 
                   <div class="row">
                       <div class="col-lg-2">
                           
                                  <i class="fa fa-users" title="Users"> User List</i>
                       </div>
                    <div class="col-lg-10">
                        <div style="text-align: center;">
                 
<!--                            <div class="btn-group">   
                                <a class="btn btn-default" href="<?php //echo base_url(); ?>index.php/AdminMatchfixture/view_match_fixture">
                                  <i class="fa fa-archive" title="Match Fixture"> </i>
                                </a>
                                <a class="btn btn-default" href="<?php //echo base_url(); ?>index.php/Admin/user_list">
                                  <i class="fa fa-users" title="User List"> </i>
                                </a>
                                <a class="btn btn-default" href="<?php //echo base_url(); ?>index.php/AdminPrediction/view_prediction">
                                  <i class="fa fa-bar-chart" title="User Prediction"> </i>
                                </a>
                                <a class="btn btn-default" href="<?php //echo base_url(); ?>index.php/AdminPointTable/index">
                                  <i class="fa fa-pie-chart" title="Point Table"> </i>
                                </a> 
                            </div>-->
                            
                        </div>
                    </div>
                </div></h3>
                   
                </div>
                
                <!--End Page Header -->
            </div>
           <!-- page body-->
         
       
           
                <div class="jumbotron">
                  <div class="container" style="height: 500px; overflow: auto;">
                     <?php if($error=$this->session->flashdata('failure')){
                    ?><div class="alert alert-dismissible alert-danger">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>                       
                    <?php if($error=$this->session->flashdata('success')){
                    ?><div class="alert alert-dismissible alert-success">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>  
                      
                      
  <h2>Users</h2>
<!--  <p>The .table-striped class adds zebra-stripes to a table:</p>            -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>SL</th>
        <th>Name</th>
        <th> Phone</th>
        <th>User_Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>User_type</th>
        <th>User_Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        
        <?php 
           $i=1;
           if(isset($user_data)  || count($user_data)){
            
           foreach ($user_data as $key => $data) {
               ?>
                    <tr>
                        <td><?php echo   $i;?>  </td>
                        <td><?php echo  $data['first_name']?> <?php echo  $data['last_name']?> </td>
                        <td><?php echo  $data['phone']?></td>
                        <td><?php echo  $data['user_name']?></td>
                        <td><?php echo  $data['user_email']?></td>
                        <td><?php echo  $data['user_password'] ?></td>
                        <td><?php echo  $data['user_type']?></td>
                        <td><?php echo  $data['user_status']?></td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="status_update<?php echo   $i;?>"  id="status_update<?php echo $i;?>" data-todo='{"id":<?php echo  $data['id']?>,"name":"<?php echo  $data['first_name']?> <?php echo  $data['last_name']?> " }'> Update</button>
                            <input type="hidden" name="user_id<?php echo   $i;?>" id="user_id<?php echo   $i;?>" value="<?php echo  $data['first_name']?>">
                            <script>
    $(document).ready(function(){
//       alert('hello'); 
    $('#status_update<?php echo $i;?>').click(function(){
        var id= $("#status_update<?php echo $i;?>").data('todo').id;
       var user_name = $("#status_update<?php echo $i;?>").data('todo').name;
//     
      // setting data on modal input
       $('#user_name').val(user_name);
       $('#user_id').val(id);
        //alert(myBookId) ; 
    });
    });
    
    
    </script>
                        
                        </td>
                        
    
                    
                    </tr>
              
             <?php
             $i++;
           }
        }?>
      
    </tbody>
  </table>
</div>
    </div>
           <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User Update</h4>
        </div>
        <div class="modal-body">
            
             <?php if($error=$this->session->flashdata('failure')){
                    ?><div class="alert alert-dismissible alert-danger">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>                       
                    <?php if($error=$this->session->flashdata('success')){
                    ?><div class="alert alert-dismissible alert-success">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>
<!--          <p>Some text in the modal.</p>-->
            <form action="<?php echo base_url().'index.php/Admin/update_user_status' ?>" method="post">
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="hidden" class="form-control" id="user_id" name="user_id"  value="">
                      <input type="text" class="form-control" id="user_name" name="user_name" readonly="" value="">
                    </div>
                    <div class="form-group">
                      <label for="status">User_Status:</label>
                      <select class="form-control" name="status" id="status" required="" >
                         
                           <option value="Active">Active</option>
                           <option value="Inactive">Inactive</option>
                      </select>
                      <?php echo form_error('status',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>

                    </div>
                    
                    <button type="submit" class="btn btn-primary" i>Update</button>
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
                 


                  
                  
                     
   
            
           <!-- End Page Body-->
        </div>
        <!-- end page-wrapper -->
        
        
<!-- footer-->
    <?php include 'footer.php';?>                
<!-- end footer-->
   
       
    
</body>

</html>

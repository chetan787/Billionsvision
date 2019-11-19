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
                       <div class="col-lg-4">
                           
                                  <i class="fa fa-users" title="Visitor"> Visitor List</i>
                       </div>
                    <div class="col-lg-8">
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
                      
                      
  <h2>Visitor</h2>
<!--  <p>The .table-striped class adds zebra-stripes to a table:</p>            -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>SL</th>
        <th>Name</th>
        <th> Phone</th>
        
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
<!--        <th>Date</th>-->
        <th>Date-Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        
        <?php 
           $i=1;
           if(isset($visitor_data)  || count($visitor_data)){
            
           foreach ($visitor_data as $key => $data) {
               ?>
                    <tr>
                        <td><?php echo   $i;?>  </td>
                        <td><?php echo  $data['name']?> </td>
                        <td><?php echo  $data['mobile']?></td>
                        <td><?php echo  $data['email']?></td>
                        <td><?php echo  $data['subject']?></td>
                        <td><?php echo  $data['message'] ?></td>
<!--                        <td><?php // echo  $data['date']?></td>-->
                        <td><?php echo  $data['time']?></td>
                        
                        
                      <td><button class="btn btn-danger" name="visitor_list_delete<?php echo   $i;?>" id="visitor_list_delete<?php echo   $i;?>" >Delete</button>
                            <input type="hidden" name="id<?php echo   $i;?>" id="id<?php echo   $i;?>" value="<?php echo  $data['id']?>">
   
                    <script>
    $(document).ready(function(){
     //  alert('hello'); 
    $('#visitor_list_delete<?php echo $i;?>').click(function(){
        
           
        var id= $("#id<?php echo   $i;?>").val();
      // alert(id); 
     // run an ajax call for delete row
     $.ajax({
            type:'POST',
            url:"<?php echo base_url(); ?>index.php/Visitor/delete_visitor_list",
            data: {"id":id,},
            success:function(result)
           {
               
               

                var result = confirm("Want to delete?");
             
             if(result){
                
                 alert("Deleted Successfully !");
                 window.location.href='<?php echo base_url(); ?>index.php/Visitor/visitor_list';
             }else{
                 //do nothing
                // alert("Failed to Delete !"); 
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
     });
     
    
    
    </script>
                        
                        
                    </tr>
              
             <?php
             $i++;
           }
        }?>
      
    </tbody>
  </table>
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

<?php
// setting session for invalid entry
if($_SESSION['user_name'] ==null ||$_SESSION['user_name'] =="" ){
    return redirect('Admin/index');
}
?>

<!-- footer-->
                <div class="col-lg-12 text-center">
                    <p> All rights reserved,<?php date_default_timezone_set('Asia/Kolkata'); echo date("Y");?>, Developed by <a href="https://www.kvmgroupbiz.in/" style="color: red;">Kvmgroupbiz.</a></p>
                     
                </div>                
<!-- end footer-->
   
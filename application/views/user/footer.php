<?php
 //setting session for invalid entry
if($_SESSION['user_name'] ==null ||$_SESSION['user_name'] =="" ){
    return redirect('Login/index');
} 
?>  

<footer class="footer py-md-5 pt-md-3 pb-sm-5">
        <div class="container">
            <div class="row p-sm-4 px-3 py-3">
                <div class="col-lg-4 footer-top mt-md-0 mt-sm-5">
                    <h2>
                        <a class="navbar-brand" href="#">
                            Billions Vision
                        </a>
                    </h2>
                 
                </div>
                <div class="col-lg-2  col-md-6 mt-lg-0 mt-4">
                    <div class="footerv2-w3ls">
                        <h3 class="mb-3 w3f_title">Email</h3>
                        <hr>
                        <ul class="list-w3pvtits">
                            <li>
                                <p style="color:white;">
                                    info@billionsvision.com
                                </p>
                            </li>
                          
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2  col-md-6 mt-lg-0 mt-4">
                    <div class="footerv2-w3ls">
                        <h3 class="mb-3 w3f_title">Contact</h3>
                        <hr>
                        <ul class="list-w3pvtits">
                            <li>   
                               <p style="color:white;">+91 6261259949</p>   
                            </li> 
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-2  col-md-6 mt-lg-0 mt-4">
                    <div class="footerv2-w3ls">
                        <h3 class="mb-3 w3f_title">Address</h3>
                        <hr>
                        <ul class="list-w3pvtits">
                            
                            <li class="mb-2">
                                <p style="color:white;">Banglore, India</p>
                            </li>
                          
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- //footer bottom -->
    </footer>

<!-- copyright -->
    <div class="cpy-right text-center">
        <p class="text-wh">© <?php  echo date('Y') ;?> Billions Vision. All rights reserved | Developed by
            <a href="http://www.kvmgroupbiz.in"> Kvmgroupbiz</a>
        </p>
        <p style="font-size: 11px;">Disclaimer: All content rights other than Billions Vision are owned by their respective owners.</p>
    </div>
    <!-- //copyright -->
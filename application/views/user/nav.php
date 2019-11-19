<?php
 //setting session for invalid entry
if($_SESSION['user_name'] ==null ||$_SESSION['user_name'] =="" ){
    return redirect('Login/index');
} 
?>                

<div class="nav_w3ls ml-lg-5">
                    <nav>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            
                            <li><a  class="" href="<?php echo base_url(); ?>index.php/UserDashboard/index">Dashboard</a></li>
                            <li><a  class="" href="#">Guidelines</a></li>
                           
                            <li>
                                <!-- First Tier Drop Down  -->
                                <label for="drop-2" class="toggle toogle-2 active">Profile <span class="fa fa-angle-down"
                                        aria-hidden="true"></span>
                                </label>
                                <a href="#" class="active">Profile <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                                <input type="checkbox" id="drop-2" />
                                <ul>
                                    
                                    <li><a href="<?php echo base_url(); ?>index.php/Profile/index" class="drop-text ">Update Profile</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/Leads/index" class="drop-text">Startup Leads</a></li>
                                   
                                </ul>
                            </li>
                            
                            <li class="nav-right-sty mt-lg-0 mt-sm-4 mt-3">
                                <a><label><i class="fa fa-user"></i> <?php if($user_name=$this->session->userdata('user_name')){ echo $user_name ;} ?></label></a>
                                <input type="checkbox" id="drop-2" />
                                <ul>
                                    
                                    <li><a style="font-size: 10px;" href="<?php echo base_url(); ?>index.php/Password/index" class="drop-text "><i class="fa fa-key"></i> Reset Password</a></li>
                                    
                                   
                                </ul>
                                <a href="<?php echo base_url(); ?>index.php/Login/logout" class="reqe-button text-uppercase">Logout</a>
                               
                            </li>
                        </ul>
                    </nav>
                </div>
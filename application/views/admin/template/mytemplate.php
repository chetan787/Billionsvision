<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<h1>Test</h1>
<?php 
if(isset($view_data) && is_array($view_data))
{
    foreach ($view_data as $key => $data) {
        ?>
                <p><?php echo $data['template_category']; ?></p>
                  <p><?php echo $data['template_subject']; ?></p>
                    <p><?php echo $data['template_message']; ?></p>
                <?php
    }
}


?>
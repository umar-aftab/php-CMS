<?php
	ob_start();
	require_once '../../dbscripts/model/session.php';
	require_once '../../dbscripts/model/database.php';
	require_once '../../dbscripts/model/admin.php';
	require_once '../../dbscripts/model/studentRegistration.php';
    require_once '../../dbscripts/model/studentLogin.php';
    require_once '../../dbscripts/model/students.php';
    require_once '../../dbscripts/model/order.php';
	include_once '../../includesAdmin/header.php';

	if(!$session->is_logged_in()){
 		header('Location: login.php');
 		exit();
 	}
	include '../../includesAdmin/spacer.php';

	if(Admin::find_by_id($session->user_id) != false) {
   		$admin = new Admin();
   		$admin->find_registered_admin_id($session->user_id);
   		echo "<p>Assalamu alaykum Wa rahmatullahi Wa Barakatuhu"." ".$admin->full_name()." !</p>";
    }
?>
	<div class="container">
            <div id="msform">
            	<fieldset>
		            <nav>
		                <h2 class="hidden">Our navigation</h2>
		                    <?php include '../../includesAdmin/nav.php'; ?>
		            </nav>
		        </fieldset>    
            </div>

            <?php
            	
            	$order = new StudentOrder();
            	$order->STUDENT_ID = $_GET['id'];
	         //  echo $order->STUDENT_ID;
	            $order->find_by_student_id();
	            echo $order->student()->STUDENT_FNAME. " ".$order->student()->STUDENT_LNAME;
            ?>
            <table >
   			        <tr>    <td>Formula</td>           <td> <?php echo $order->fees()->FEE_TYPE;	?></td></tr>
			          <tr>    <td>PRIX</td>              <td> <?php echo $order->fees()->PRICE;		?></td></tr>
			          <tr>    <td>HEURES </td>      		 <td> <?php echo $order->fees()->HOURS;	?></td></tr>
			     <form method="post">
			<?php 
			  	  if($order->REVIEWED === '0'){ ?>
                  <tr><td>REVIEWED</td><td><input name="REVIEWED" class="checkbox" type="checkbox" value=<?php echo $order->ID; ?> />
                     <input type="submit" name="submitPay" value="Examiner en charge" onClick="window.location.reload();"></td></tr>
                    
            <?php   }else{     ?>

                   <tr><td>REVIEWED</td><td><input name="REVIEWED" class="checkbox" type="checkbox" value=<?php echo $order->ID; ?> checked>
                     <input type="submit" name="submitUnpay" value="Revoir comme IMPAYÉES" onClick="window.location.reload();"></td></tr>     
            <?php 
            }
            ?>
            </form>

            <?php

                if(isset($_POST['submitPay'])){
                	$order->REVIEWED = 1; 
                	$order->update();   
                }

                if(isset($_POST['submitUnpay'])){
                   	$order->REVIEWED = 0;
                   	$order->update();  
                }  

                ?>        
			</table> 
            <div id="msform">
                <fieldset>
                    <nav>
                        <h2 class="hidden">Our navigation</h2>
                             <a href="previousClasses.php?id=<?php echo $order->STUDENT_ID; ?>" class="button">Classes Payé Précédent
                            <i class="fa fa-book" id="big-icon"></i>   
                        </a> 
                        
                    </nav>
                </fieldset>    
            </div>   

    </div>
</div>

<?php
	ob_end_flush();
?>
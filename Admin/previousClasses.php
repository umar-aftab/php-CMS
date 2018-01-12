<?php
	ob_start();
	require_once '../../dbscripts/model/session.php';
	require_once '../../dbscripts/model/database.php';
	require_once '../../dbscripts/model/admin.php';
	require_once '../../dbscripts/model/studentRegistration.php';
    require_once '../../dbscripts/model/studentLogin.php';
    require_once '../../dbscripts/model/students.php';
    require_once '../../dbscripts/model/fees.php';
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
            	$records = StudentOrder::find_all();
            	
            	$order = new StudentOrder();
            	$order->STUDENT_ID = $_GET['id'];
            	$order->find_by_student_id();
            	//echo $order->STUDENT_ID;
            	$fees = Fees::find_all();

            	echo $order->student()->STUDENT_FNAME. " ".$order->student()->STUDENT_LNAME;

            	foreach( $records as $payments => $data){

            		if($data->STUDENT_ID === $order->STUDENT_ID){

            			foreach($fees as $fee => $parameters){
            				if($parameters->ID === $data->FEE_ID){
            ?>
				            <table style="margin-bottom: 20px;" >
				   			    <tr>    <td>FORMULA</td>  <td><?php echo $parameters->FEE_TYPE; ?></td></tr>
				   			    <tr>    <td>PRIX</td>     <td><?php echo $parameters->PRICE; ?></td></tr>
				   			    <tr>    <td>HEURES</td>   <td><?php echo $parameters->HOURS; ?></td></tr>
				   			    <tr>    <td>REVOIR</td>   <td><?php echo (($data->REVIEWED === '1') ? "Oui" : "Non"); ?></td></tr>  
							      </table>
            <?php
            				}
            			}
            		}
            ?>
               
            
            <?php	
            	} 
            ?>
    </div>
</div>

<?php
    ob_end_flush();
?>            
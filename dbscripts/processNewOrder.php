<?php 
include_once 'model/session.php';
ob_start();
include_once 'formFunctions.php';
include_once 'model/database.php';
include_once 'model/studentRegistration.php';
include_once 'model/studentLogin.php';
include_once 'model/order.php';


if (isset($_POST['select'])) {

	$fees= $_POST['fees'];

	$studentOrder = new StudentOrder();	
	$studentOrder->FEE_ID     = $fees;
	$studentLogin = new StudentLogin();
   	$studentLogin->find_by_login_id($session->user_id);
	$studentOrder->STUDENT_ID = $studentLogin->STUDENT_ID;
	$studentOrder->REVIEWED = 0;
	$studentOrder->create();
	//$studentOrder->last_insert_id();
	header('Location:../public/Student/payment.php');
}


ob_end_flush();

?>
<?php
session_start();
ob_start();
include_once 'formFunctions.php';
include_once '../dbscripts/model/database.php';
include_once '../dbscripts/model/studentRegistration.php';
include_once '../dbscripts/model/studentLogin.php';
include_once '../dbscripts/model/order.php';


if(isset($_POST['submit'])){
	$fname 		= test_field($_POST['fname-form']);
	$lname 		= test_field($_POST['lname-form']);
	$dob   		= $_POST['dob-form'];
	$email 		= test_email($_POST['email-form']);
	$phone 		= test_input($_POST['phone-form']);
	$gender 	= $_POST['gender-form']; 
	$country  	= $_POST['country'];
	$city 		= $_POST['state'];
	$teacher	= $_SESSION['teacher'];
	$level 		= $_POST['level'];
	$test 		= $_POST['test'];
	$fees		= $_POST['fees'];
}else{

	$fname 		= "";
	$lname 		= "";
	$dob   		= "";
	$email 		= "";
	$phone 		= "";
	$gender 	= "";
	$country  	= "";
	$city 		= "";
	$teacher 	= "";
	$level		= "";
	$test 		= "";
	$fees		= "";
}

$dt = date('Y-m-d h-i-s');
//$mysql_time = strftime("%Y-%M-%D %H:%M:%S", $dt);
//echo $mysql_time;
if(StudentRegistration::find_by_email($email) === false){

	$student =  new StudentRegistration();

	$student->STUDENT_FNAME =$fname;
	$student->STUDENT_LNAME =$lname;
	$student->STUDENT_DOB   =$dob;
	$student->CITY			=$city;
	$student->COUNTRY       =$country;
	$student->EMAIL         =$email;
	$student->GENDER        =$gender;
	$student->PHONE		 	=$phone;
	$student->SIGN_IN_DATE	=$dt;
	$student->TEACHER 		=$teacher;
	$student->LEVEL			=$level;
	$student->TEST			=$test;

/*	
	echo $student->STUDENT_FNAME;
	echo $student->STUDENT_LNAME;
	echo $student->STUDENT_DOB ;
	echo $student->CITY;
	echo $student->COUNTRY;
	echo $student->EMAIL;
	echo $student->GENDER;
	echo $student->PHONE;	
	echo $student->TEACHER;
*/
	$student->create();
//	$subject="Markaz Al Isbaah Account";
//	$body="Assalamalaikum Warahmatullah".$student->STUDENT_FNAME." ".$student->STUDENT_LNAME.", <br/> JazakAllahu Khairan for registering to Markaz Al Isbaah Account.<br/>. May Allah give us all Tawfeeq ! Ameen";

//	mail($student->EMAIL,$subject,$body);


	
	$studentOrder = new StudentOrder();
	
	$studentOrder->FEE_ID     = $fees;
	$studentOrder->STUDENT_ID = $student->ID;
	$studentOrder->REVIEWED = 0;
	$studentOrder->create();
	$_SESSION['id'] = $student->ID;
	header('Location:../public/registerCredentials.php');
}else{
	header('Location:../public/selectSchedule.php');
}	
ob_end_flush();
?>
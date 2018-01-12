<?php
	ob_start();
	require_once 'model/session.php';
	if(!$session->is_logged_in()){
 		header('Location: ../public/Student/login.php');
 		exit();
 	}
 	include_once 'formFunctions.php';
	require_once 'model/studentRegistration.php';
	require_once 'model/studentLogin.php';

	if(isset($_POST['submit'])){
		$fname 		= test_field($_POST['STUDENT_FNAME']);
		$lname 		= test_field($_POST['STUDENT_LNAME']);
		$dob   		= $_POST['STUDENT_DOB'];
		$email 		= test_email($_POST['EMAIL']);
		$phone 		= test_input($_POST['PHONE']);
		$uname		= test_field($_POST['USERNAME']);
		$gender 	= $_POST['GENDER']; 
		$country  	= $_POST['COUNTRY'];
		$city 		= $_POST['CITY'];
		$date 		= $_POST['SIGN_IN_DATE'];
	}
/*
	echo $session->user_id;
	echo $fname;
	echo $lname;
	echo $dob;
	echo $email;
	echo $phone;
	echo $uname;
	echo $gender;
	echo $country;
	echo $city;
	echo $date;
*/

	$studentLogin = new StudentLogin();

	$studentLogin->find_by_login_id($session->user_id);
	$studentLogin->USERNAME = $uname;

	$studentLogin->update();		

	$student = new StudentRegistration();

	$student->ID = $studentLogin->STUDENT_ID;
	$student->find_by_student_id($student->ID);
	$student->STUDENT_FNAME =$fname;
	$student->STUDENT_LNAME =$lname;
	$student->STUDENT_DOB   =$dob;
	$student->CITY			=$city;
	$student->COUNTRY       =$country;
	$student->EMAIL         =$email;
	$student->GENDER        =$gender;
	$student->PHONE		 	=$phone;
	$student->SIGN_IN_DATE	=$date;

	$student->update();



			header('Location:../public/Student/personalInfo.php');	



ob_end_flush();
?>
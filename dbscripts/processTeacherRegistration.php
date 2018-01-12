<?php
	ob_start();
	require_once 'model/session.php';
	require_once 'model/database.php';
	require_once 'model/teachers.php';
	require_once 'formFunctions.php';

	if(isset($_POST['submit'])){
		$fname=				test_field($_POST['fname-form']);
		$uname=				test_field($_POST['uname-form']);
		$password=			test_field($_POST['password']);	
		$password=          password_encrypt($password);
		$gender =			$_POST['gender-form'];	
	}else{
			$fname="";
			$uname="";
			$password="";
			$gender ="";

			
	}

	/* 
	This is the new customer registration. 
	It checks if the user with a similar email address exists in the database. 
	 */
	$teacher = new Teachers();
	$result= Teachers::find_by_username($uname);

/*	
	This method checks if the row count returned from the database is 0 and than inserts the
	customer into the database by calling the insert method.
	If further creates a SESSION variable to transfer the session id of the customer being logged in.
*/
	
	if ($result === false){
		$teacher->TEACHER_NAME= $fname;
		$teacher->USERNAME= $uname;
		$teacher->GENDER= $gender;
		$teacher->PASSWORD= $password;
	
		$teacher->create();
		header('Location: ../public/Admin/teachersInfo.php');
	}

	ob_end_flush();
?>
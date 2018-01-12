<?php
	session_start();
	ob_start();
	require_once 'formFunctions.php';
	require_once 'model/database.php';
	require_once 'model/admin.php';
	

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
	$admin = new Admin();
	$result= Admin::find_by_username($uname);

/*	
	This method checks if the row count returned from the database is 0 and than inserts the
	customer into the database by calling the insert method.
	If further creates a SESSION variable to transfer the session id of the customer being logged in.
*/
	
	if ($result === false){
		
		$admin->FULLNAME = $fname;
		$admin->USERNAME = $uname;
		$admin->PASSWORD = $password;
		$admin->GENDER   = $gender;	
		
		$admin->create();
		$_SESSION['id'] = $admin->ID;

		header('Location:../public/Admin/index.php');
	}else{
		header('Location:../public/index.php');
	}
ob_end_flush();
?>
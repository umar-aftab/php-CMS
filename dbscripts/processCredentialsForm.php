<?php
include_once 'model/session.php';
ob_start();
include_once 'formFunctions.php';
include_once 'model/database.php';
include_once 'model/studentRegistration.php';
include_once 'model/studentLogin.php';

if (isset($_POST['submit'])){
		$username = test_field($_POST['uname-form']);
		$password = $_POST['pwd-form'];
		$repassword = $_POST['rpwd-form'];

		if($password != $repassword){
			echo "The passwords don't match ! Try Again";
		}else{
			if(StudentLogin::find_by_username($username) === false){
				$student= new StudentLogin();
				$student->USERNAME 	 = $username;
				$student->STUDENT_ID = $_SESSION['id'];
				$password 			 = password_encrypt($password);
				$student->PASSWORD   = $password;
				$student->create();
				echo $student->ID;
				echo "<br/>";
				echo $_SESSION['id'];
				//$session->user_id	 = $student->ID;
				//header('Location:../public/Student/index.php');	
			}else{
				echo "The username already exists";
			}
		}
	}else{
		echo "Please re-enter the credentials";
	}
ob_end_flush();
?>
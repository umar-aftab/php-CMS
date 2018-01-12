<?php
	ob_start();
	require_once 'model/session.php';
	require_once 'model/database.php';
	require_once 'model/admin.php';
	require_once 'model/studentRegistration.php';
	require_once 'model/studentLogin.php';
	require_once 'model/order.php';

	$studentOrder = new StudentOrder();
	$studentOrder->STUDENT_ID = $_GET['id'];
	$studentOrder->find_by_student_id();

	$student = new StudentRegistration();
	$student->ID= $_GET['id'];
	$student->find_by_student_id($student->ID);

	$studentLogin = new StudentLogin();
	$studentLogin->STUDENT_ID = $_GET['id'];
	$studentLogin->find_by_student_id($studentLogin->STUDENT_ID);

	$studentOrder->delete();
	$studentLogin->delete();
	$student->delete();
	header('Location:../public/Admin/studentInfo.php');

	ob_end_flush();

?>
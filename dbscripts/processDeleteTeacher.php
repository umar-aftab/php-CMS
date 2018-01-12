<?php
	ob_start();
	require_once 'model/session.php';
	require_once 'model/database.php';
	require_once 'model/admin.php';
	require_once 'model/teachers.php';

	$teacher = new Teachers ();
	$teacher->ID= $_GET['id'];
	$teacher->find_registered_teacher_id($teacher->ID);
	$teacher->delete();
	header('Location:../public/Admin/teachersInfo.php');

	ob_end_flush();

?>
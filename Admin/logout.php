<?php
	ob_start();
	require_once '../../dbscripts/model/session.php';
	require_once '../../dbscripts/model/database.php';
	require_once '../../dbscripts/model/admin.php';
	include_once '../../includesAdmin/header.php';

	if(!$session->is_logged_in()){
 		header('Location: login.php');
 		exit();

 	}else{
 		$session->logout();
		$_SESSION=array();
		header('Location: login.php');
		exit();
 	}

?>
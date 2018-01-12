<?php
/*--- QUERIES FOR THE DATABASE TABLE CREATION  ---*/
	/*------------------------------------------------------------------*/
	$student_registration_table= 'CREATE TABLE IF NOT EXISTS student_registration(
		ID INT(10) NOT NULL AUTO_INCREMENT UNIQUE, 
		STUDENT_FNAME VARCHAR(30) NOT NULL, 
		STUDENT_LNAME VARCHAR(30), 
		STUDENT_DOB DATE NOT NULL, 
		CITY VARCHAR(30) NOT NULL,
		COUNTRY VARCHAR(20) NOT NULL,
		EMAIL VARCHAR(50) NOT NULL,
		GENDER VARCHAR(20) NOT NULL,
		PHONE VARCHAR(12) NOT NULL, 
		SIGN_IN_DATE DATETIME NOT NULL,
		TEACHER VARCHAR(30) NOT NULL,
		LEVEL VARCHAR(20) NOT NULL,
		TEST VARCHAR(10) NOT NULL, 
		PRIMARY KEY ( ID ));';

	if($connection->query($student_registration_table) === TRUE){
		printf("Male Student Registration Table has been created.<br/>");
	}
	else{
		die('Error in table creation :'.$connection->error);
	}

	$student_login= 'CREATE TABLE IF NOT EXISTS student_login(
		ID INT(10) NOT NULL AUTO_INCREMENT UNIQUE, 
		STUDENT_ID INT(10), 
		USERNAME VARCHAR(30) NOT NULL, 
		PASSWORD VARCHAR(150) NOT NULL,
		PRIMARY KEY(ID), 
		FOREIGN KEY(STUDENT_ID) REFERENCES student_registration(ID));';

	if($connection->query($student_login) === TRUE){
		printf("Login Table has been created.<br/>");
	}else{
		die('Error in table creation :'.$connection->error);
	}

	$teachers= 'CREATE TABLE IF NOT EXISTS teachers(
		ID INT(10) NOT NULL AUTO_INCREMENT UNIQUE,
		TEACHER_NAME VARCHAR(100) NOT NULL,
		GENDER VARCHAR(20) NOT NULL, 
		USERNAME VARCHAR(30) NOT NULL, 
		PASSWORD VARCHAR(150) NOT NULL,
		PRIMARY KEY(ID));';

	if($connection->query($male_teachers) === TRUE){
		printf("TEACHERS Table has been created.<br/>");
	}else{
		die('Error in table creation :'.$connection->error);
	}


/*
	$female_teachers= 'CREATE TABLE IF NOT EXISTS female_teachers(
		ID INT(10) NOT NULL AUTO_INCREMENT UNIQUE,
		TEACHER_NAME VARCHAR(100) NOT NULL, 
		USERNAME VARCHAR(30) NOT NULL, 
		PASSWORD VARCHAR(150) NOT NULL,
		PRIMARY KEY(TEACHER_ID));';

	if($connection->query($female_teachers) === TRUE){
		printf("FEMALE TEACHERS Table has been created.<br/>");
	}else{
		die('Error in table creation :'.$connection->error);
	}
*/


	$fees= 'CREATE TABLE IF NOT EXISTS fees(
		ID INT(10) NOT NULL AUTO_INCREMENT UNIQUE,
		FEE_TYPE VARCHAR(30) NOT NULL, 
		PRICE DECIMAL(8,2) NOT NULL,
		HOURS INT(10) NOT NULL,
		PRIMARY KEY(ID));';

	if($connection->query($fees) === TRUE){
		printf("FEES Table has been created.<br/>");
	}else{
		die('Error in table creation :'.$connection->error);
	}

	$order= 'CREATE TABLE IF NOT EXISTS order_student(
		ID INT(10) NOT NULL AUTO_INCREMENT UNIQUE,
		FEE_ID INT(10) NOT NULL,
		STUDENT_ID INT(10) NOT NULL,
		REVIEWED TINYINT(2) NOT NULL DEFAULT 0,
		PRIMARY KEY(ID),
		FOREIGN KEY(STUDENT_ID) REFERENCES student_registration(STUDENT_ID),
		FOREIGN KEY(FEE_ID) REFERENCES fees(ID));';

	if($connection->query($order) === TRUE){
		printf("Order Table has been created.<br/>");
	}else{
		die('Error in table creation :'.$connection->error);
	}


	/* ADMIN LOGIN */

	$admin_table= 'CREATE TABLE IF NOT EXISTS admin(
		ID INT(10) NOT NULL AUTO_INCREMENT UNIQUE,
		FULLNAME VARCHAR(100) NOT NULL,
		GENDER VARCHAR(20) NOT NULL, 
		USERNAME VARCHAR(30) NOT NULL, 
		PASSWORD VARCHAR(150) NOT NULL,
		PRIMARY KEY(ID));';

	if($connection->query($admin_table) === TRUE){
		printf("ADMIN Table has been created.<br/>");
	}else{
		die('Error in table creation :'.$connection->error);
	}


	$calendar_table= 'CREATE TABLE IF NOT EXISTS `evenement` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `title` varchar(255) COLLATE utf8_bin NOT NULL,
	  `start` datetime NOT NULL,
	  `end` datetime DEFAULT NULL,
	  `url` varchar(255) COLLATE utf8_bin NOT NULL,
	  `allDay` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT false,
	  PRIMARY KEY (`id`)) 
		ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;';

	if($connection->query($calendar_table) === TRUE){
		printf("CALENDAR Table has been created.<br/>");
	}else{
		die('Error in table creation :'.$connection->error);
	}


	


?>
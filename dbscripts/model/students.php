<?php
require_once 'database.php';
require_once 'databaseObject.php';
require_once 'studentRegistration.php';
require_once 'studentLogin.php';

class Students Extends DatabaseObject{

	protected $studentRegistration;
	protected $studentLogin;

	public function __construct(StudentRegistration $studentRegistration, StudentLogin $studentLogin){
		$this->studentRegistration  = $studentRegistration;
		$this->studentLogin 		= $studentLogin;
	}

	public function student_details(){
		return $this->studentRegistration;

	}

	public function student_login_details(){
		return $this->studentLogin;

	}



}

?>
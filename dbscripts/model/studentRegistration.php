<?php
require_once 'database.php';
require_once 'databaseObject.php';

class StudentRegistration extends DatabaseObject{
	protected static $tablename = "student_registration";
	protected static $dbfields = array('ID','STUDENT_FNAME','STUDENT_LNAME','STUDENT_DOB','CITY','COUNTRY','EMAIL','GENDER','PHONE','SIGN_IN_DATE','TEACHER','LEVEL','TEST');
	public $ID;
	public $STUDENT_FNAME;
	public $STUDENT_LNAME;
	public $STUDENT_DOB;
	public $CITY;
	public $COUNTRY;
	public $EMAIL;
	public $GENDER;
	public $PHONE;
	public $SIGN_IN_DATE;
	public $TEACHER;


	public function find_by_student_id($id){
		global $database;
		$sql= "SELECT * FROM ".self::$tablename." WHERE ID = "."'{$id}'"."LIMIT 1";
		$result_set = $database->run_query($sql);
		$record = $database->fetch_array($result_set);
		$this->begin($record);
	}

	public function find_by_student_email($email){
		global $database;
		$sql= "SELECT * FROM ".self::$tablename." WHERE EMAIL = "."'{$email}'"."LIMIT 1";
		$result_set = $database->run_query($sql);
		$record = $database->fetch_array($result_set);
		$this->begin($record);
	}

	public function begin($record){
		$this->ID 				= $record['ID'];
		$this->STUDENT_FNAME 	= $record['STUDENT_FNAME'];
		$this->STUDENT_LNAME 	= $record['STUDENT_LNAME'];
		$this->STUDENT_DOB 		= $record['STUDENT_DOB'];
		$this->CITY 			= $record['CITY'];
		$this->COUNTRY 			= $record['COUNTRY'];	
		$this->EMAIL 			= $record['EMAIL'];		
		$this->GENDER 			= $record['GENDER'];	
		$this->PHONE 			= $record['PHONE'];
		$this->SIGN_IN_DATE 	= $record['SIGN_IN_DATE'];	

	}




	
}



?>
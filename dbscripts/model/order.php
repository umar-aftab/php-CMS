<?php
require_once 'database.php';
require_once 'databaseObject.php';
require_once 'studentRegistration.php';
require_once 'fees.php';

class StudentOrder extends DatabaseObject{
	protected static $tablename = "order_student";
	protected static $dbfields = array('ID','FEE_ID','STUDENT_ID','REVIEWED');
	public $ID;
	public $FEE_ID;
	public $STUDENT_ID;
	public $REVIEWED;

	
	public function find_by_student_id(){
		global $database;
		$sql= "SELECT * FROM ".self::$tablename." WHERE STUDENT_ID = "."'{$this->STUDENT_ID}'"."LIMIT 1";
		$result_set = $database->run_query($sql);
		$record = $database->fetch_array($result_set);
		$this->begin($record);
	}

	public function find_by_student_id_reviewed(){
		global $database;
		$sql= "SELECT * FROM ".self::$tablename." WHERE STUDENT_ID = "."'{$this->STUDENT_ID}'"." AND REVIEWED = 0 LIMIT 1";
		$result_set = $database->run_query($sql);
		$record = $database->fetch_array($result_set);
		$this->begin($record);
	}


	public function begin($record){
		$this->ID 		  = $record['ID'];
		$this->FEE_ID 	  = $record['FEE_ID'];
		$this->STUDENT_ID = $record['STUDENT_ID'];
		$this->REVIEWED   = $record['REVIEWED'];
	}

	//Gets the Fee Type for the FEE_ID selected by student during registration.	

	public function fees(){
		return Fees::find_by_id($this->FEE_ID);
	
	}

	//Gets the Student who registered for this order.

	public function student(){
		return StudentRegistration::find_by_id($this->STUDENT_ID);

	}


	
}	

?>
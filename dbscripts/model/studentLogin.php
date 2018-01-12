<?php
require_once 'database.php';
require_once 'databaseObject.php';

class StudentLogin extends DatabaseObject{
	protected static $tablename = "student_login";
	protected static $dbfields = array('ID','STUDENT_ID','USERNAME','PASSWORD');
	public $STUDENT_ID;
	public $USERNAME;
	public $PASSWORD;
	public $ID;

	public function find_by_login_id($id){
		global $database;
		$sql= "SELECT * FROM ".self::$tablename." WHERE ID = "."'{$id}'"."LIMIT 1";
		$result_set = $database->run_query($sql);
		$record = $database->fetch_array($result_set);
		$this->begin($record,$id);
	}

	public function find_by_student_id($id){
		global $database;
		$sql= "SELECT * FROM ".self::$tablename." WHERE STUDENT_ID = "."'{$id}'"."LIMIT 1";
		$result_set = $database->run_query($sql);
		$record = $database->fetch_array($result_set);
		$this->begin($record,$record['ID']);
	}

	public function begin($record,$id){
		$this->ID 				= $id;
		$this->STUDENT_ID 		= $record['STUDENT_ID'];
		$this->USERNAME 		= $record['USERNAME'];
		$this->PASSWORD 		= $record['PASSWORD'];
	}

	

}


?>
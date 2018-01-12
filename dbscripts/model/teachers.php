<?php
require_once 'database.php';
require_once 'databaseObject.php';

class Teachers extends DatabaseObject{
	protected static $tablename = "teachers";
	protected static $dbfields = array('ID','TEACHER_NAME','GENDER','USERNAME','PASSWORD');
	public $ID;
	public $TEACHER_NAME;
	public $GENDER;
	public $USERNAME;
	public $PASSWORD;

	public function find_registered_teacher_id($id){
		global $database;
		$sql= "SELECT * FROM ".self::$tablename." WHERE ID = "."'{$id}'"."LIMIT 1";
		$result_set = $database->run_query($sql);
		$record = $database->fetch_array($result_set);
		$this->begin($record);
	}

	public function begin($record){
		$this->ID 			= $record['ID'];
		$this->TEACHER_NAME = $record['TEACHER_NAME'];
		$this->GENDER 		= $record['GENDER'];
		$this->USERNAME 	= $record['USERNAME'];
		$this->PASSWORD 	= $record['PASSWORD'];
	}

	public function full_name(){
		if(isset($this->TEACHER_NAME)){
			return ucfirst($this->TEACHER_NAME);
		}else{
			return "There is nothing here";
		}
	}


}

?>
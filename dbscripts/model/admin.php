<?php
require_once 'database.php';
require_once 'databaseObject.php';


class Admin extends DatabaseObject{
	protected static $tablename = "admin";
	protected static $dbfields = array('ID','FULLNAME','GENDER','USERNAME','PASSWORD');
	public $ID;
	public $FULLNAME;
	public $GENDER;
	public $USERNAME;
	public $PASSWORD;

	public function find_registered_admin_id($id){
		global $database;
		$sql= "SELECT * FROM ".self::$tablename." WHERE ID = "."'{$id}'"."LIMIT 1";
		$result_set = $database->run_query($sql);
		$record = $database->fetch_array($result_set);
		$this->begin($record,$id);
	}

	public function begin($record,$id){
		$this->ID 			= $id;
		$this->FULLNAME 	= $record['FULLNAME'];
		$this->GENDER 		= $record['GENDER'];
		$this->USERNAME 	= $record['USERNAME'];
		$this->PASSWORD 	= $record['PASSWORD'];
	}

	public function full_name(){
		if(isset($this->FULLNAME)){
			return ucfirst($this->FULLNAME);
		}else{
			return "There is nothing here";
		}
	}


}

?>
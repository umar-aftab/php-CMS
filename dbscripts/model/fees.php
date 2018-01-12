<?php
include_once 'databaseObject.php';

class Fees extends DatabaseObject{
	public $ID;
	public $FEE_TYPE;
	public $PRICE;
	public $HOURS;
	protected static $tablename = "fees";
	protected static $dbfields = array('ID','FEE_TYPE','PRICE','HOURS');


	public static function find_by_type($fee_type){
		global $database;
		$result_array = static::find_by_sql("SELECT * FROM ".static::$tablename." WHERE `FEE_TYPE` ="."'{$fee_type}'"."LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

}


?>
<?php
 include_once '../formFunctions.php';
 include_once 'databaseObject.php';

class User extends DatabaseObject{

	private $id;
	private $username;
	private $password;

	public static function find_all(){
		return self::find_by_sql('SELECT * FROM `student_login`');
	}

	public static function find_by_id($id){
		global $database;
		$result = self::find_by_sql("SELECT * FROM `student_login` WHERE `STUDENT_ID`="."'{$id}'"." LIMIT 1");
		return !empty($result) ? array_shift($result) : false;
	}

	public static function find_by_username($username){
		global $database;
		$result = self::find_by_sql("SELECT * FROM `student_login` WHERE `USERNAME`="."'{$username}'"." LIMIT 1");
		return !empty($result) ? array_shift($result) : false;
	}

	public static function find_by_sql($sql=""){
		global $database;
		$result_set = $database->run_query($sql);
		$object_array = array();
		while($row = $database->fetch_array($result_set)){
			$object_array[] = self :: instantiate($row);
		}
		return $object_array;
	}

	public static function instantiate($record){

		$object =  new self();
		foreach ($record as $attribute => $value) {
			$attribute= strtolower($attribute);
			if($object->has_attribute($attribute)){
				$object->$attribute = $value;
			}
		}
		return $object;
	}

	private function has_attribute($attribute){
		$object_array = get_object_vars($this);
		return array_key_exists($attribute, $object_array);
	}

	public static function authenticate($username="",$password=""){
		global $database;
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);

		$result_array = self::find_by_username($username);

		if($result_array){
			if(password_check($password, $result_array->password)){
				return $result_array;
			}
		}else{
			return false;
		}

	}
}

?>
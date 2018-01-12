<?php

class DatabaseObject{

	public static function find_all(){
		return static::find_by_sql("SELECT * FROM ".static::$tablename);
	}

	public static function find_by_email($email=""){
		global $database;
		$result_array = static::find_by_sql("SELECT * FROM ".static::$tablename." WHERE `EMAIL` ="."'{$email}'"."LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_id($id=""){
		global $database;
		$result_array = static::find_by_sql("SELECT * FROM ".static::$tablename." WHERE `ID` ="."'{$id}'"."LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false; 
	}

	/*public static function find_by_admin_id($id=""){
		global $database;
		$result_array = static::find_by_sql("SELECT * FROM ".static::$tablename." WHERE `ADMIN_ID` ="."'{$id}'"."LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false; 
	}

	public static function find_by_teacher_id($id=""){
		global $database;
		$result_array = static::find_by_sql("SELECT * FROM ".static::$tablename." WHERE `TEACHER_ID` ="."'{$id}'"."LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false; 
	}*/

	public static function find_by_username($username=""){
		global $database;
		$result_array = static::find_by_sql("SELECT * FROM ".static::$tablename." WHERE `USERNAME` ="."'{$username}'"."LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_sql($sql=""){
		global $database;
		$result_set   = $database->run_query($sql);
		$object_array = array();
		while($record = $database->fetch_array($result_set)){
			$object_array[] = static::instantiate($record);	
		}
		return $object_array;
	}

	public static function instantiate($record){

		$object = new static();
		foreach ($record as $attribute=>$value) {
			//$attribute = strtolower($attribute);
			if($object->has_attribute($attribute)){
					$object->$attribute = $value;
			}
		}
		return $object;
	}

	public function has_attribute($attribute){
    	$object_vars = $this->attributes();
    	//$object_vars = get_object_vars($this);
    	return array_key_exists($attribute, $object_vars);
    }

    public function attributes(){
    	$attributes = array();
    	foreach (static::$dbfields as $field) {
    		if(property_exists($this,$field)){
    			$attributes[$field] = $this->$field;
    		}
    	}
    	return $attributes;
    }


    protected function sanitized_attributes(){
    	global $database;
    	$clean_attributes = array();
    	foreach ($this->attributes() as $key => $value) {
    		//print_r($this->attributes());
    		$clean_attributes[$key] = $database->escape_value($value);
    	}
    	//var_dump($clean_attributes);
    	return $clean_attributes;
    }

    public function create(){
    	global $database;

		$attributes = $this->sanitized_attributes();
		foreach($attributes as $key=>$value){
			if($key ==='ID'){
				unset($attributes[$key]);
			}
		}
	    //	var_dump($attributes);
		//echo "<br/>";
		$sql  = "INSERT INTO ".static::$tablename."(";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";	
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		
		if($database->run_query($sql)){
			$this->ID = $database->insert_id();
		//	echo $this->ID;
		//	echo "<br/>";
			return true;
		}else{
			return false;
		}
		
	}

	public function update(){
		global $database;

		$attributes = $this->sanitized_attributes();
		
		$attribute_pairs = array();
		foreach ($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}= '{$value}' ";
		}
		/*echo $this->ID;
		echo "<br/>";
		var_dump($attribute_pairs);*/

		$sql  = "UPDATE ".static::$tablename." SET ";
		$sql .= join(",", $attribute_pairs);
		$sql .= " WHERE `ID`="."'{$this->ID}'";


		$database->run_query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete(){
		global $database;

		$sql = "DELETE FROM ".static::$tablename;
		$sql .= " WHERE `ID`="."'{$this->ID}'";

		$database->run_query($sql);
		return ($database->affected_rows()==1) ? true : false;

	}

	public static function authenticate($username="",$password=""){
		global $database;
		$username = $database->escape_value($username);
		$result_array = static::find_by_username($username);
		var_dump($result_array);
		if($result_array){
			if(password_check($password, $result_array->PASSWORD) === true){
				return $result_array;
			}
		}else{
			return false;
		}
	}

	

}

?>
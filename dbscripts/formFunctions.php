<?php


	$nameErr="";
	$emailErr="";

	function test_input($ipdata){
		$ipdata=trim($ipdata);
		$ipdata=stripslashes($ipdata);
		$ipdata=htmlspecialchars($ipdata);

		return $ipdata;
	}

	function test_field($name){
		global $nameErr;
		if(empty($name)){
			 $nameErr= "This is a required field";
		}
		else{
			$name=test_input($name);
			if(!preg_match("/^[a-zA-Z ]*$/",$name)){
				$nameErr="Only Letters and White Space Allowed";
			}
		}
		return $name;
	}

	function test_email($email){
		global $emailErr;
		if(empty($email)){
			$emailErr="Email Address is Required";
		}else{
			$email=test_input($email);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailErr="Invalid Email Format";
			}
			else{
				return $email;
			}
		}
	}

	function password_encrypt($password){
		
		$hash_format 	= "$2y$10$";
		$salt_length 	= 22;
		$salt 			= generate_salt($salt_length);
		$format_and_salt= $hash_format.$salt;
		$hash    		= crypt($password, $format_and_salt);
		return $hash;
	}

	function generate_salt($length){
		$rand_string      = sha1(uniqid(mt_rand(),true));
		$base64_rand_str  = base64_encode($rand_string);
		$mod_base64_str   = str_replace('+', '.', $base64_rand_str);
		$salt 			  = substr($mod_base64_str, $length);

		return $salt;
	}

	function password_check($password,$existing_hash){
		$hash = crypt($password,$existing_hash);
		if($hash === $existing_hash){
			return true;
		}else{
			return false;
		}
	}

?>				
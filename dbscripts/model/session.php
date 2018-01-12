<?php

class Session{
	private $logged_in = false;
	public  $user_id;

	function __construct(){
		session_start();
		$this->check_login();
	}

	private function check_login(){
		if(isset($_SESSION['id'])){
			$this->user_id   = $_SESSION['id'];
			$this->logged_in = true; 
		}else{
			unset($this->user_id);
			$this->logged_in = false;
		}	
	}

	public function login($user){
		if($user){
			$this->user_id   = $_SESSION['id'] = $user->ID;
			$this->logged_in = true;
		}
	}

	public function is_logged_in(){
		return $this->logged_in;
	}

	public function login_by_registration($id){
		if($id){
			$this->user_id   = $_SESSION['id'] = $id;
			$this->logged_in = true;
		}
	}

	public function logout(){
		unset($_SESSION['id']);
		session_destroy();
		unset($this->user_id);
		$this->logged_in = false;
	}
}

$session = new Session();

?>
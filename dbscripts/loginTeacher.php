<?php
	require_once 'model/session.php';
  ob_start();
	require_once 'model/database.php';
	require_once 'model/teachers.php';
  require_once 'formFunctions.php';


  if(isset($_POST['submit'])){
      $username = trim($_POST['admin-username']);
      $password = trim($_POST['admin-password']);
      $found_user = Teachers::authenticate($username,$password);

      if($found_user){
          $session->login($found_user);
          header('Location:../public/Teacher/index.php');
         // var_dump($found_user);
      }else{
         $message= "Username/Password combination is incorrect.";
         header('Location:../public/Teacher/login.php');
         echo $message;
      }
 
  }else{
        $username = "";
        $password = "";
        $message = "No Username or Password was recieved";
        echo $message;
       // header('Refresh:0');
  }



ob_end_flush();
?>
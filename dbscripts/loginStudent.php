<?php
	require_once 'model/session.php';
  ob_start();
	require_once 'model/database.php';
	require_once 'model/studentLogin.php';
  require_once 'formFunctions.php';


  if(isset($_POST['submit'])){
      $username = trim($_POST['admin-username']);
      $password = trim($_POST['admin-password']);
      $found_user = StudentLogin::authenticate($username,$password);

      if($found_user){
          $session->login($found_user);
          header('Location:../public/Student/index.php');
         // var_dump($found_user);
      }else{
         $message= "Username/Password combination is incorrect.";
         header('Location:../public/Student/login.php');
         echo $message;
      }
  }else  if(isset($_POST['forgot'])){
    header('Location:../public/Student/resetPassword.php');

  }else{
        $username = "";
        $password = "";
        $message = "No Username or Password was recieved";
        echo $message;
       // header('Refresh:0');
  }

ob_end_flush();
?>
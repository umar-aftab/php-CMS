<?php
  session_start();
  ob_start();
  include_once 'formFunctions.php';
  require_once 'model/studentRegistration.php';
  require_once 'model/students.php';
  require_once 'model/studentLogin.php';

  if(isset($_POST['submit'])){
    $email  = test_field($_POST['forgot-email']);
    $pwd    = test_field($_POST['pwd-form']);
    $rpwd   = test_field($_POST['rpwd-form']);
  
    if(StudentRegistration::find_by_email($email) != false){
      $studentRegistration = new StudentRegistration();
      $studentRegistration->find_by_student_email($email);
      $studentLogin = new StudentLogin();
      $studentLogin->find_by_student_id($studentRegistration->ID);
    /* 
     var_dump($studentRegistration);
     echo "<br/>";
     var_dump($studentLogin);
    */
      if($pwd === $rpwd){
        $pwd = password_encrypt($pwd);
        $studentLogin->PASSWORD = $pwd;
        $studentLogin->update();

        $_SESSION['id'] = $studentLogin->ID;
        header('Location:../public/Student/index.php');
      }

    }
  }

  ob_flush(); 

?>    
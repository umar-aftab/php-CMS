<!DOCTYPE html>
<?php
  ob_start();
  require_once '../dbscripts/model/session.php';
  require_once '../dbscripts/model/database.php';
  require_once '../dbscripts/model/admin.php';


  if(!$session->is_logged_in()){
    header('Location: ../public/Admin/login.php');
    exit();
  }

  if(Admin::find_by_id($session->user_id) != false) {
      $admin = new Admin();
      $admin->find_registered_admin_id($session->user_id);
      echo "<p>Assalamu alaykum Wa rahmatullahi Wa Barakatuhu"." ".$admin->full_name()." !</p>";
   }
?>
<html>
<head>
<meta charset='utf-8'/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/style.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='js/moment.min.js'></script>
<script type="text/javascript">
  function choose() {
    if (document.getElementById('link-teacher').value == 'male') {
        document.getElementById('div1').style.display = 'block';
        document.getElementById('div2').style.display = 'none';
    } else if(document.getElementById('link-teacher').value == 'female') {
        document.getElementById('div2').style.display = 'block';
        document.getElementById('div1').style.display = 'none';
    }else if(document.getElementById('link-teacher').value == 'base'){
        document.getElementById('div2').style.display = 'none';
        document.getElementById('div1').style.display = 'none';
    }
}
</script>
<script src='js/fullcalendar.min.js'></script>
<script src='js/fr.js'></script>
<script src='js/workcalendar.js'></script>

<style type="text/css">
  body{
    background: beige;
    font-size: 0.8em;
  }
  select{
    border-color: #5988c0;
    border-width: 2px;
    padding: 5px;
    margin-top: 1em;
  }
  a{
    color: #5988c0;
    font-size: 2em;
  }
</style>
</head>
<body>
  
<a href="../public/Admin/index.php">إرجع إلي صفحة الإدارة</a>


        <!--  <div class="link-teacher">
                <select id="link-teacher" name="link-teacher" onclick="choose()">
                    <option selected value="base">----------------</option>
                    <option value="male">Homme</option>
                    <option value="female">Femme</option> 

                </select>
            </div> -->


            <div class="content" id="div1"> 
                 <select class="teacher" id="teachermale" name="teacher">
                    <option selected disabled>الرجال</option>
                    <option value="Mohamed Adil">Mohamed Adil</option>
                    <option value="Sherif Reda">Sherif Reda</option> 
                    <option value="Mohamed Shahban">Mohamed Shahban</option> 
                    <option value="Abdullah al Haiti">Abdullah al Haiti</option>
                    <option value="Salah">Salah</option>
                    <option value="Ahmed Nabil">Ahmed Nabil</option>  
                    <option value="Abdul Tawab">Abdul Tawab</option>
                    <option value="Mahmoud Mahmoud">Mahmoud Mahmoud</option>  
                    <option value="Ahmed Ghanim">Ahmed Ghanim</option>
                    <option  disabled>النساء</option>
                    <option value="Shirine">Shirine</option>
                    <option value="Asma">Asma</option>
                    <option value="Fatima">Fatima</option>
                </select> 
            </div> 
                            
             <!-- <div class="content" id="div2" style="display:none;">
                <select class="teacher" id="teacherfemale" name="teacher">
                    <option selected disabled></option>
                    <option value="Shirine">Shirine</option>
                    <option value="Asma">Asma</option>
                    <option value="Fatima">Fatima</option>
                </select>                     
            </div>  -->

<div id="val"> </div>
	<div id='calendar'></div>

  <ul class="custom-menu">
    <li data-action="red" data-color="red">Red/Rouge</li>
    <li data-action="green" data-color="green">Green/Verg</li>
    <li data-action="blue" data-color="blue">Blue/Bleu</li>       
  </ul>

</body>

<script src="js/colorcalendar.js"></script>

  

</html>


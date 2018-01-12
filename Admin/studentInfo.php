<?php
	ob_start();
	require_once '../../dbscripts/model/session.php';
	require_once '../../dbscripts/model/database.php';
	require_once '../../dbscripts/model/admin.php';
	require_once '../../dbscripts/model/studentRegistration.php';
    require_once '../../dbscripts/model/studentLogin.php';
    require_once '../../dbscripts/model/students.php';
	include_once '../../includesAdmin/header.php';

	if(!$session->is_logged_in()){
 		header('Location: login.php');
 		exit();
 	}
	include '../../includesAdmin/spacer.php';

	if(Admin::find_by_id($session->user_id) != false) {
   		$admin = new Admin();
   		$admin->find_registered_admin_id($session->user_id);
   		echo "<p>Assalamu alaykum Wa rahmatullahi Wa Barakatuhu"." ".$admin->full_name()." !</p>";
    }
?>

	<div class="container">
            <div id="msform">
            	<fieldset>
		            <nav>
		                <h2 class="hidden">Our navigation</h2>
		                    <?php include '../../includesAdmin/nav.php'; ?>
		            </nav>
		        </fieldset>    
            </div>
            <?php
            	$records       = StudentRegistration::find_all();
                $login_rec     = StudentLogin::find_all();
            ?>
            <table id="adminTable" style="text-align:left;">
            <tr><td> Prénom </td> <td> Nom </td> <td> DOB </td> <td> Ville </td> <td> Pays </td> <td> Email </td> <td> Sexe </td> <td> Téléphone </td> <td>Professeur Sélectionné</td> <td> Sign_in_date </td> <td> Vérifier Ordre </td>  </tr>
            
            <?php
            	foreach ($records as $key => $attr) {
                    if((strcmp($admin->GENDER,"Male")) === 0){
                		  if((strcmp($attr->GENDER, "Male")) === 0){
                            echo "<tr><td>'" .$attr->STUDENT_FNAME. "'</td><td>'" .$attr->STUDENT_LNAME. "'</td><td>'" .$attr->STUDENT_DOB. "'</td><td>'" .$attr->CITY. "'</td><td>'" .$attr->COUNTRY. "'</td><td>'" .$attr->EMAIL. "'</td><td>'" . $attr->GENDER . "'</td><td>'" . $attr->PHONE . "'</td><td>'".$attr->TEACHER."'</td><td>'" . $attr->SIGN_IN_DATE . "'</td><td>" . "<a href=\"thisOrder.php?id=".$attr->ID."\"><i class=\"fa fa-shopping-cart\" style=\"font-size:2.2em;\"></i></a>" . "</td> <td>" ."<a href=\"../../dbscripts/processDeleteStudent.php?id=".$attr->ID."\"><i class=\"fa fa-times\" style=\"font-size:2.2em;\"></i></a>" . "</td> </tr>";
                          }
                    }else if((strcmp($admin->GENDER, "Female")) === 0){
                        if((strcmp($attr->GENDER, "Female")) === 0){
                            echo "<tr><td>'" .$attr->STUDENT_FNAME. "'</td><td>'" .$attr->STUDENT_LNAME. "'</td><td>'" .$attr->STUDENT_DOB. "'</td><td>'" .$attr->CITY. "'</td><td>'" .$attr->COUNTRY. "'</td><td>'" .$attr->EMAIL. "'</td><td>'" . $attr->GENDER . "'</td><td>'" . $attr->PHONE . "'</td><td>'".$attr->TEACHER."'</td><td>'" . $attr->SIGN_IN_DATE . "'</td><td>" . "<a href=\"thisOrder.php?id=".$attr->ID."\"><i class=\"fa fa-shopping-cart\" style=\"font-size:2.2em;\"></i></a>" . "'</td> <td>" ."<a href=\"../../dbscripts/processDeleteStudent.php?id=".$attr->ID."\"><i class=\"fa fa-times\" style=\"font-size:2.2em;\"></i></a>" . "</td> </tr>";
                        }
                    }    
            	}
            ?>
            </table> 
    </div>       
</div>
<?php
	ob_end_flush();
?>
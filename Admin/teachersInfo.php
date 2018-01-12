<?php
	ob_start();
	require_once '../../dbscripts/model/session.php';
	require_once '../../dbscripts/model/database.php';
	require_once '../../dbscripts/model/admin.php';
	require_once '../../dbscripts/model/teachers.php';
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
            	$records = Teachers::find_all();
            ?>
            	<table id="adminTable" style="text-align:left;">
            	<tr> <Td> Professeur Nom </td> <td> Nom d'utilisateur </td></tr>
            
            <?php
            	foreach ($records as $key => $attr) {
                    if(strcmp($admin->GENDER,"Male")){
                          if(strcmp($attr->GENDER, "Male")){
            		          echo "<tr><td>'" .$attr->TEACHER_NAME. "'</td><td>'" .$attr->USERNAME. "'</td><td>" ."<a href=\"../../dbscripts/processDeleteTeacher.php?id=".$attr->ID."\"><i class=\"fa fa-times\" style=\"font-size:2.2em;\"></i></a>" . "</td> </tr>";
                          }
                      }else if(strcmp($admin->GENDER, "Female")){
                        if(strcmp($attr->GENDER, "Female")){
                              echo "<tr><td>'" .$attr->TEACHER_NAME. "'</td><td>'" .$attr->USERNAME. "'</td><td>" ."<a href=\"../../dbscripts/processDeleteTeacher.php?id=".$attr->ID."\"><i class=\"fa fa-times\" style=\"font-size:2.2em;\"></i></a>" . "</td> </tr>";
                        }
                    }
            	}  
            ?>
    </div>     </table>

            <div id="msform">
                <fieldset>
                    <nav>
                        <h2 class="hidden">Our navigation</h2>
                             <a href="registerTeacher.php" class="button">Inscription Nouveau Professeur
                            <i class="fa fa-user-secret" id="big-icon"></i>   
                        </a> 
                        
                    </nav>
                </fieldset>    
            </div>   
</div>
<?php
	ob_end_flush();
?>
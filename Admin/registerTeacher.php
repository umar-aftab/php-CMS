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
	<section id="text_columns">
		<form action="../../dbscripts/processTeacherRegistration.php" method="post" id="msform">
			<article class="column1">
				<h3></h3>
				<h3>Enregistrement Professeur</h3>
				
				<p>
				<label>
					Nom complet* :
				</label>
				</p>

				<p>
					<input id="fname-form" type="text" name="fname-form" size="30" maxlength="30" value="<?php if(isset($_POST['fname-form'])) echo htmlspecialchars($_POST['fname-form']); ?>" required placeholder="Enter your first name">
				</p>

				<p>
					<label>
					Sexe
					</label>
					</p>

					<p>
					<input id="gender-form" type="radio" name="gender-form" value="Male" checked>Male <br/>
					<input id="gender-form" type="radio" name="gender-form" value="Female">Female
					</p>

				<p>
				<label>
					Nom d'utilisateur* :
				</label>
				</p>

				<p>
					<input id="uname-form" type="text" name="uname-form" size="30" maxlength="30" value="<?php if(isset($_POST['uname-form'])) echo htmlspecialchars($_POST['uname-form']); ?>" required placeholder="Enter your username">
				</p>

				<p>
				<label>
					Mot de passe* :
				</label>
				</p>

				<p>
					<input id="password" type="password" name="password" size="30" maxlength="30" value="<?php if(isset($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>" required placeholder="Enter your password">
				</p>


				<p>
					<input id="submit" type="submit" name="submit" class="action-button" value="inscrire Professeur">
				</p>
			</article>
		</form>
	</section>
 </div>	
</div>


<?php

	include '../../includesTeacher/footer.php';

	?>
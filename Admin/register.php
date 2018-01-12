<?php
include '../../includesAdmin/header.php';
include '../../includesAdmin/spacer.php';

?>
	<section id="text_columns">
		<form action="../../dbscripts/processAdminRegistrationForm.php" method="post" id="msform">
			<article class="column1">
				<h3></h3>
				<h3>Admin Registration</h3>
				
				<p>
				<label>
					Full Name* :
				</label>
				</p>

				<p>
					<input id="fname-form" type="text" name="fname-form" size="30" maxlength="30" value="<?php if(isset($_POST['fname-form'])) echo htmlspecialchars($_POST['fname-form']); ?>" required placeholder="Enter your first name">
				</p>

				<p>
					<label>
					Gender
					</label>
					</p>

					<p>
					<input id="gender-form" type="radio" name="gender-form" value="Male" checked>Male <br/>
					<input id="gender-form" type="radio" name="gender-form" value="Female">Female
					</p>

				<p>

				<p>
				<label>
					User Name* :
				</label>
				</p>

				<p>
					<input id="uname-form" type="text" name="uname-form" size="30" maxlength="30" value="<?php if(isset($_POST['uname-form'])) echo htmlspecialchars($_POST['uname-form']); ?>" required placeholder="Enter your username">
				</p>

				<p>
				<label>
					Password* :
				</label>
				</p>

				<p>
					<input id="password" type="password" name="password" size="30" maxlength="30" value="<?php if(isset($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>" required placeholder="Enter your password">
				</p>


				<p>
					<input id="submit" type="submit" name="submit" class="action-button">
				</p>
			</article>
		</form>
	</section>
</div>


<?php

	include '../../includesAdmin/footer.php';
?>
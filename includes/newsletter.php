<?php
	/*include 'dbscripts/formFunctions.php';

	if(isset($_POST['submit'])){

		$email = test_email($_POST['email-news'] );
		$admin='info@9alamdevelopments.com';

		$subject="Email from the contact form";
	
		$response="This is a newsletter subscription by $email.";
		mail($admin, $subject, $response);
		exit();
	}*/
?>
<div class="newsLetter">
	<p>
		<input type="text" name="email-news" placeholder="<?php echo $footlang->xlate('news-a');?>" value="<?php if(isset($_POST['email-news'])) echo $_POST['email-news']; ?>">
	</p>
	<p>
		<input type="submit" name="submit" value="<?php echo $footlang->xlate('news-b');?>">
	</p>
</div>	
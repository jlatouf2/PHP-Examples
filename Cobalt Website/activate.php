<?php 
include 'core/init.php'; 
logged_in_redirect();
include 'includes/overall/header.php';
 
 //code works. To activate Jacob use: http://localhost:8888/RegisterNew/activate.php?email=jlatouf2@gmail.com&email_code=2c3b66e4aa46aa4a4ccbc9728a44e263
 
 
 if (isset($_GET['success']) === true && empty($_GET['sucess']) === true) {
 ?>
 		<h2>Thanks, we hae activated your account...</h2>
 		<p> You are free to log in.</p>
 <?php
 }else if (isset($_GET['email'], $_GET['email_code']) === true) {
 	
	 $email 	 = trim($_GET['email']);
	 $email_code = trim($_GET['email_code']);
	 
	 if (email_exists($email) === false) {
	 	$errors[] = 'Oops, something went wrong, and we could not find that email address.';
	 } else if (activate($email, $email_code) === false) {
	 	$errors[] = 'We had problems in activating your account.';
		
	 }
	 
	 if (empty($errors) === false) {
	 ?>
	 	<h2>Oops...</h2>
	 	<?php
	 		echo output_errors($errors);
	 } else {
	 	header('Location: activate.php?success');
		exit();
	 }
	 
 } else {
 	header('Location: index.php');
	exit();
 }
 
include 'includes/overall/footer.php'; 
?>


	
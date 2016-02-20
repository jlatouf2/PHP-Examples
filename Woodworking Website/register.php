<?php
ob_start();
include 'core/init.php';
 ?>
<?php
include 'includes/header.php';

// The link to the database is moved to the top of the PHP code. require ('mysqli_connect.php'); // Connect to the db.
// This query INSERTs a record in the users table.
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array();
	// Initialize an error array.
	// Check for a first name:

	if (empty($_POST['fname'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbcon, trim($_POST['fname']));
	}
	// Check for a last name
	if (empty($_POST['lname'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbcon, trim($_POST['lname']));
	}
	// Check for an email address
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbcon, trim($_POST['email']));
	}
	// Check for a password and match it against the confirmed password
	if (!empty($_POST['psword1'])) {
		if ($_POST['psword1'] != $_POST['psword2']) {
			$errors[] = 'Your two passwords did not match.';
		} else {
			$p = mysqli_real_escape_string($dbcon, trim($_POST['psword1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	if (empty($errors)) {// If it runs
		// Register the user in the database...
		// Make the query:
		$q = "INSERT INTO users (user_id, fname, lname, email, psword, registration_date)
VALUES (' ', '$fn', '$ln', '$e', SHA1('$p'), NOW() )";
		$result = @mysqli_query($dbcon, $q);
		// Run the query.
		if ($result) {// If it runs
			header("location: register-thanks.php");
			exit();
		} else {// If it did not run
			// Message:
			echo '<h2>System Error</h2>
<p class="error">You could not be registered due to a system error. We apologize  for any inconvenience.</p>';
			// Debugging message:
			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
		}// End of if ($result)
		mysqli_close($dbcon);
		// Close the database connection.
		// Include the footer and quit the script:
		include ('footer.php');
		exit();
	} else {
		echo '<h2>Error!</h2>
    <p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) {// Extract the errors from the array and echo them
			echo " - $msg<br>\n";
		}
		echo '</p><h3>Please try again.</h3><p><br></p>';
	}// End of if (empty($errors))
}

//print_r($errors);
//var_dump($_POST);
?>

<div id="contents">
	<div>
		<div class="body" id="contact">
			<div id="sidebar">
				<div class="body">
					<img src="images/chair-small.png" alt="Img">
					<div class="contact">
						<p>
							For Order and Inquiries Please Call: <b>760-962-9541</b> Or you can visit us at: <b>4885 Wilson Street
							<br>
							Victorville, CA 92392</b> Or just Email us instead at: <b class="email">info@carvedcreations.com</b>
						</p>
					</div>
				</div>
			</div>
			<div id="main">
				<h1>Register</h1>

				<p>
					This website template has been designed by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> for you, for free. You can replace all this text with your own text. You can remove any link to our website from this website template, you're free to use this website template without linking back to us. If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forums/">Forum</a>.
				</p>
				<form action="" method="post">
					<p>
						<label class="label" for="fname">First Name:</label>
						<input id="fname" type="text" name="fname" size="30" maxlength="30" value="<?php
						if (isset($_POST['fname']))
							echo $_POST['fname'];
						?>">
					</p>
					<p>
						<label class="label" for="lname">Last Name:</label>
						<input id="lname" type="text" name="lname" size="30" maxlength="40" value="<?php
						if (isset($_POST['lname']))
							echo $_POST['lname'];
						?>">
					</p>
					<p>
						<label class="label" for="email">Email Address:</label>
						<input id="email" type="text" name="email" size="30" maxlength="60" value="<?php
						if (isset($_POST['email']))
							echo $_POST['email'];
						?>" >
					</p>
					<p>
						<label class="label" for="psword1">Password:</label>
						<input id="psword1" type="password" name="psword1" size="12" maxlength="12" value="<?php
						if (isset($_POST['psword1']))
							echo $_POST['psword1'];
						?>" >
					</p>
					<p>
						<label class="label" for="psword2">Confirm Password:</label>
						<input id="psword2" type="password" name="psword2" size="12" maxlength="12" value="<?php
						if (isset($_POST['psword2']))
							echo $_POST['psword2'];
						?>" 
					</p>
					
						<input type="submit" value="Register" class="btn1">
					
				</form>
			</div>
		</div>
	</div>
</div>
<?php

include 'includes/footer.php';
ob_end_flush();
?>
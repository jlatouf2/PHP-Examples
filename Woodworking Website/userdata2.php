<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';
?>
<div id="contents">
	<div>
		<div class="body" id="contact">
			<div id="main">
				<h1>Contact</h1>
				<?php
		/*To simply output data:
		 * 1)use mysqli_query with SELECT whatever you need 
		 * example below:
		 */
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
					echo "</div>
		</div>
	</div>
</div>
		";
		include ('includes/footer.php');
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

					<input type="submit" value="Register" class="btn1">

				</form>

			</div>
		</div>
	</div>
</div>
<?php
include 'includes/footer.php';
ob_flush();
?>


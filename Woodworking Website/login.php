<?php
include 'core/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //connect to database
    
 #1 // Validate the email address
if (!empty($_POST['email'])) {
        $e = mysqli_real_escape_string($dbcon, $_POST['email']);
    } else {
    $e = FALSE;
       // echo '<p class="error">You forgot to enter your email address.</p>';
		$errors[]='You forgot to enter your email address.';
    }
    // Validate the password
    if (!empty($_POST['psword'])) {
            $p = mysqli_real_escape_string($dbcon, $_POST['psword']);
    } else {
    $p = FALSE;
      //  echo '<p class="error">You forgot to enter your password.</p>';
				$errors[]='You forgot to enter your password.';
		
}
if ($e && $p){//if no problems #2 // Retrieve the user_id, first_name and user_level for that email/password combination
$q = "SELECT user_id, fname, user_level, lname FROM users WHERE (email='$e' AND psword=SHA1('$p'))"; // Run the query and assign it to the variable $result
$result = mysqli_query ($dbcon, $q);
// Count the number of rows that match the email/password combination
if (@mysqli_num_rows($result) == 1) {//if one database row (record) matches the input:-
// Start the session, fetch the record and insert the three values in an array 

 $_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
// Ensure that the user level is an integer.
$_SESSION['user_level'] = (int) $_SESSION['user_level'];
// Use a ternary operation to set the URL #4
 $url = ($_SESSION['user_level'] === 1) ? 'admin-page.php' : 'members-page.php'; 
 header('Location: ' . $url); 
 // Make the browser load either the members’ or the admin page
  exit(); // Cancel the rest of the script
    mysqli_free_result($result);
    mysqli_close($dbcon);
    } else { // No match was made.
//echo '<p class="error">The e-mail address and password entered do not match our records  <br>Perhaps you need to register, just click the Register button on the header menu';
   				$errors[]='The e-mail address and password entered do not match our records. <br>Perhaps you need to register, just click the Register button on the header menu';
   
    }
    } else { // If there was a problem.
   // echo '<p class="error">Please try again.</p>';
					$errors[]='Please try again.';
	
    }
    mysqli_close($dbcon);
    } // End of SUBMIT conditional.
    
include 'includes/header.php';

if (empty($e) === false) {
?>
<div id="contents">
		<div>
			<div class="body" id="contact">
				<div id="sidebar">
					<div class="body">
						<img src="images/chair-small.png" alt="Img">
						<div class="contact">
							<p>
								For Order and Inquiries Please Call: <b>760-962-9541</b> Or you can visit us at: <b>4885 Wilson Street<br> Victorville, CA 92392</b> Or just Email us instead at: <b class="email">info@carvedcreations.com</b>
							</p>
						</div>
					</div>
				</div>
				<div id="main">
			<h2>We tried to log you in, but...</h2>
			
			<?php echo output_errors($errors);?>
					<p>
						This website template has been designed by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> for you, for free. You can replace all this text with your own text. You can remove any link to our website from this website template, you're free to use this website template without linking back to us. If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forums/">Forum</a>.
					</p>
					
				</div>
			</div>
		</div>
	</div>

<?php
}

include 'includes/footer.php';
?>
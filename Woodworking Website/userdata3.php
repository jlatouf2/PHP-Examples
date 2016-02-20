<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';

if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0)) {
	 header("Location: protected.php");
//	$color=("You must login to view this page."); 
//	$_SESSION['color']=$color;  
	exit();
}
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
				<?php
				echo '<h2>Welcome to the Members Page ';
				if (isset($_SESSION['fname'])) {
					echo "{$_SESSION['fname']}";
					echo "{$_SESSION['lname']}";
					
				//	(var_dump($_SESSION));
				}
				echo '</h2>';
				?>
				<h3>Member's Events</h3>
				       <li><a href="view-members-page.php">View Members</a></li>
				      <li><a href="admin-view-users.php">Admin-View Members</a></li>
				      <li><a href="search.php">Search Page</a></li>
				      <li><a href="userdata3.php">Userdata3</a></li>


				<p>
										<br>
					The members page  content. The members page content. The members page content.
				</p>
			</div>
			<h1>This is the Members Page</h1>
		</div>
	</div>
</div>
</div>
<?php

include 'includes/footer.php';
ob_end_flush();
?>
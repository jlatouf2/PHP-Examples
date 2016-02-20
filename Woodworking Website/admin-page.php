<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';
?>
<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1)) {
	 header("Location: protected.php");
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
				<h1>Administration Page</h1>

				<?php #2 echo '<h2>Welcome to the Admin Page ';
	if (isset($_SESSION['fname'])) {
		echo "{$_SESSION['fname']}";
	}
	echo '</h2>';
				?>
			</div>
		</div>
	</div>
</div>
<?php

include 'includes/footer.php';
ob_end_flush();
?>
<?php
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
				<h2>Search for a Record</h2>
				<h3 class="red">Both Names are required items</h3>
				<form action="view_found_record.php" method="post">
					
					<p>
						<label class="label" for="fname">First Name:</label>
						<input id="fname" type="text" name="fname" size="30" maxlength="30" value="<?php
							if (isset($_POST['fname']))
								echo $_POST['fname'];?>">
					</p>
					<p>
						<label class="label" for="lname">Last Name:</label>
						<input id="lname" type="text" name="lname" size="30" maxlength="40" value="<?php
							if (isset($_POST['lname']))
								echo $_POST['lname'];?>">
					</p>
					<p>
						<input id="submit" type="submit" name="submit" value="Search">
					</p>
				</form>

			</div>
		</div>
	</div>
</div>
<?php
	include 'includes/footer.php';
 ?>

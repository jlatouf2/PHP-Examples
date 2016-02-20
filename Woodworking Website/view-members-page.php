<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';

if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0)) {
	header("Location: protected.php");
	exit();
}
?>
<div id="contents">
	<div>
		<div class="body" id="contact">
			<div id="main">
				<h1>Contact</h1>
				<?php
				// This script retrieves all the records from the users table
				//require ('mysqli_connect.php'); // Connect to the database
				// Make the query #2
				$q = "SELECT lname, fname, email, DATE_FORMAT(registration_date, '%M %d, %Y') 
AS regdat, user_id FROM users ORDER BY registration_date ASC";
				$result = @mysqli_query($dbcon, $q);
				// Run the query
				if ($result) {// If it ran without a problem, display the records
					// Table headings #3
					
					echo '<table>
<tr>
<td><b>Edit</b></td>
<td><b>Delete</b></td>
<td><b>Last Name</b></td>
<td><b>First Name</b></td>
<td><b>Email</b></td>
<td><b>Date Registered</b></td>
</tr>';
					// Fetch and print all the records #4
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						echo '<tr>                                                                             
    <td><a href="edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>
    <td><a href="delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>
<td>' . $row['lname'] . '</td>  <td>' . $row['fname'] . '</td>
<td>' . $row['email'] . '</td>
<td>' . $row['regdat'] . '</td></tr>';
					}
					echo '</table>';
					// Close the table #7
					mysqli_free_result($result);
					// Free up the resources
				} else {// If it failed to run
					// Error message
					echo '<p class="error">The current users could not be retrieved. We apologize  for any inconvenience.</p>';
					// Debugging message
					echo '<p>' . mysqli_error($dbcon) . '<br><br />Query: ' . $q . '</p>';
				}// End of if ($result)
				mysqli_close($dbcon);
				// Close the database connection
			
				?>
			</div>
		</div>
	</div>
</div>
<?php
include 'includes/footer.php';
ob_flush();
?>


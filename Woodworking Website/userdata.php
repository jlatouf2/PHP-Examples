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
				 * 
				 * PHP I SERVER CODE SO CALLING A FUNCTION WITH BUTTON WILL NOT WORK 
				 * UNLESS: YOU CALL AJAX REQUEST FROM JAVASCRIPT WHICH CALLS THE FUNCTION
				 * FROM THE BACKEND
				 * 
				 *  <button type="button">Click Me!</button>
				 * <button onclick="myFunction()">Click me</button>
				 * 
							 	function functionName() {
								    code to be executed;
								}
				 */
				$q = "SELECT user_id, fname, user_level FROM users ";
				// Run the query and assign it to the variable $result
				$result = mysqli_query($dbcon, $q);
				//  echo $row["first_name"] . "  Is the First Name <br />";
				if ($result) {
					while ($row = $result -> fetch_assoc()) {
						echo "id: " . $row["user_id"] . " - Name: " . $row["fname"] . " " . $row["user_level"] . "<br>";

					}
				}
				
				function functionName() {
				$q = "SELECT lname FROM users WHERE (user_id='2')";
				// Run the query and assign it to the variable $result
				$result = mysqli_query($dbcon, $q);
				//  echo $row["first_name"] . "  Is the First Name <br />";
				if ($result) {
						echo "id: " . $row["user_id"] . "<br>";
//. $_SESSION['fname'] 
				}
								}

				$q = "SELECT user_id FROM users ";
				// Run the query and assign it to the variable $result
				$result = mysqli_query($dbcon, $q);
				//  echo $row["first_name"] . "  Is the First Name <br />";
				if ($result) {
					while ($row = $result -> fetch_assoc()) {
						echo "id: " . $row["user_id"] . "<br>";

					}

				}
				//THIS WORKDS: TO EDIT OUT A SINGLE VALUE......
				//EX: TO MAKE THE FUNCTION USE THE WHERE STATEMENT CORRECTLY!!!!
				$id = 1;
				$q = "SELECT user_id FROM users WHERE (user_id='$id') ";
				// Run the query and assign it to the variable $result
				$result = mysqli_query($dbcon, $q);
				
				//  echo $row["first_name"] . "  Is the First Name <br />";
				if ($result) {
					
					 $_SESSION['black'] = mysqli_fetch_array ($result, MYSQLI_ASSOC);
					// $userid = $_SESSION['stuff'];
				// $row = mysqli_fetch_array($result, MYSQL_ASSOC)
					
					array_push($_SESSION['black'], 'mango');
					//array_push($_SESSION[''], 'black', 'blue');
					
					while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
						echo "EMP ID :{$row['user_id']}  <br> " .
						 "EMP NAME :  <br> " .
						  "EMP SALARY : {} <br> ";
					}
				}
				//var_dump($_SESSION);
				
				/*
						 * <?php
		    $_SESSION['ids'] = array('strawberry', 'banana', 'apple');
		    array_push($_SESSION['ids'], 'mango');
		    var_dump($_SESSION);
		?>
						*/
				?>

				<?php

				/*
				 * TO INSERT DATA:
				 * $sql = "INSERT INTO MyGuests (firstname, lastname, email)
				 VALUES ('John', 'Doe', 'john@example.com')";

				 if ($conn->query($sql) === TRUE) {
				 echo "New record created successfully";
				 } else {
				 echo "Error: " . $sql . "<br>" . $conn->error;
				 }
				 *
				 *
				 *
				 *
				 * // sql to delete a record
				 $sql = "DELETE FROM MyGuests WHERE id=3";

				 if (mysqli_query($conn, $sql)) {
				 echo "Record deleted successfully";
				 } else {
				 echo "Error deleting record: " . mysqli_error($conn);
				 }

				 *
				 */
				?>
				 <button  onclick="functionName()">Click me</button>

			</div>
		</div>
	</div>
</div>
<?php
include 'includes/footer.php';
ob_flush();
?>


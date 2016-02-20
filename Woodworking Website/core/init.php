<?php
session_start();
//error_reporting(0);

require 'database/connect.php'; 
//require 'functions/users.php';
require 'functions/general.php';


function logged_in() {
	//return (isset($_SESSION['user_id'])) ? true : false;
	return (isset($_SESSION['fname'])) ? true : false;
	
}



//To simply use a function to obtain ANY data, use this:
function user_data() {
	global $dbcon;
	//selects first row of data from users table:
	$query =  "SELECT user_id, fname, user_level FROM users ";
	 mysqli_query($dbcon, $query);
	
	//use this: echo "The user_id is  " . $_SESSION['user_id'] ;
}

//To specify what data is to be found, you must add data to the mysql_query:
//THIS requires an imput of a function parameter:
function user_data2($user_id) {
		global $dbcon;
	
	//selects first row of data from users table:
//	$_SESSION['user_id'] = $user_id;
	$query =  "SELECT fname FROM users WHERE `user_id` = '$user_id' ";
	 mysqli_query($dbcon, $query);
	echo "The fname is  " . $_SESSION['fname'] ;
	//use this: echo "The user_id is  " . $_SESSION['user_id'] ;
}



//var_dump($_SESSION);

/*
$errors = array();
*/
?>

<?php
session_start();
//error_reporting(0);

require 'database/connect.php'; 
require 'functions/users.php';
require 'functions/general.php';

//This is here so that I can use : 
//echo $user_data['username']; anywhere on the site to OUTPUT WHATEVER I WANT TO FROM THE DATABASE.....

//ALSO: the funcion logged_in() represents only this: 	return (isset($_SESSION['user_id'])) ? true : false;

if (logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
$user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'small' );
	
	//THis will check if the user has an ACTIVE account...so if they are active, and you want to ban them all you have
	//to do is go to database and change active to 0; then THEY WILL IMMEDIATELY LOG OUT!
	if (user_active($user_data['username']) === false) {
		header('Location: index.php');
		exit();
	}
}


$errors = array();

?>
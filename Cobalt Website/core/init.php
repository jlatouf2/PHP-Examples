<?php
ob_start();
session_start();
error_reporting(0);
require'database/connect.php';
require'functions/users.php';
require'functions/general.php';

if (logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email');
//this part below is simply to deactivate the user:
	if (user_active($user_data['username']) === false) {
		session_destroy();
		header('location: index.php');
		exit();
	}
}
$errors = array();
?>
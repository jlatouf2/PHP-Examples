<?php
//simply takes all data from register form and inputs it all into the database at once
function register_user($register_data){
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`'; 
	$data = '\''.implode('\', \'', $register_data) . '\'';
	//can use this to test:
	//echo "INSERT INTO `users` ($fields) VALUES ($data)";
	//die();
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
}

//Please refer to videos on sanitizing the data in the video tutorials

function user_count() {
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1"), 0);
}


//This is different from the other functions here.
//This is simply to grab the user data.
function user_data($user_id) {
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		
		$fields = ' ` ' . implode('`, `', $func_get_args) . ' ` ';
		 $data = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `user_id` = $user_id "));
		
	
		return $data;
	
	
	}
	
}

function logged_in() {
	//return (isset($_SESSION['user_id'])) ? true : false;
	return (isset($_SESSION['fname'])) ? true : false;
	
}

function user_exists($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` ='$username'");
	//is the query equal to zero or one.
	return (mysql_result($query, 0) == 1) ? true : false;
}

function email_exists($email){
	$email = sanitize($email);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` ='$email'");
	//is the query equal to zero or one.
	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_active($username){
	$username = sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` ='$username' AND `active` = 1"), 0) == 1) ? true : false;
	//is the query equal to zero or one.
}

function user_id_from_username($username) {
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"), 0, `user_id`);
}

function login($username, $password) {
	$user_id = user_id_from_username($username);
	
	$username = sanitize($username);
	$password = md5($password);
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}

?>
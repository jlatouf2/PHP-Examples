<?php

function email($to, $subject, $body) {
	mail($to, $subject, $body, 'From: hello@phpacademy.org');
}

function logged_in_redirect() {
	if(logged_in() === true) {
		header('Location: index.php');
		exit();
	}
}


function protect_page() {
	if(logged_in() === false) {
		header('Location: protected.php');
		exit();
	}
}


function array_sanitize(&$item) {
	$item = mysql_real_escape_string($item);
}

function sanitize($data) {
	return mysql_real_escape_string($data);
}
function output_errors ($errors) {

	return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
}
?>
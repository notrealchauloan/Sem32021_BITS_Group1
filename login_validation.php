<?php
//start session
session_start();
 
// connect to login class to use its function
include_once('classes/login.class.php');
 
// create a User class
$user = new User();
 
// If the form is submitted (by pressing the login button)
if(isset($_POST['login'])){
	// get data from the form and assign it to variables
	$username = $user->escape_string($_POST['username']);
	$password = $user->escape_string($_POST['password']);
	
	// use class function check_login
	$auth = $user->check_login($username, $password);
 
	// if function return false 
	if(!$auth){
		// assign the value (error) to the key message
		$_SESSION['message'] = 'Invalid username or password';
    	header('location:login.php');
	}
	else{
		// assign userid(in db) to the key userid
		$_SESSION['userid'] = $auth;
		header('location:index.php');
	}
}
else{
	$_SESSION['message'] = 'You need to login first';
	header('location:login.php');
}
?>
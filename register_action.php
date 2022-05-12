<?php 
	require_once "header.php"; 
	
	//input data from the register form
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$pass = md5($_POST["pass"]);

	if(!isset($firstname) || !isset($lastname) || !isset($email) || !isset($pass)){
		header("location:index.php");
	} else {
		//register the new user
	addUser($firstname, $lastname, $email, $pass);
	
	header("location:login.php");
	}
	
?>
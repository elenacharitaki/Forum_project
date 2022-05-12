<?php 
    require_once "header.php";

    //input data from login page
    $email = $_POST["email"];
    $pass = md5($_POST["pass"]);

    //login the user
    loginUser($email, $pass);

    //true if there is a user with these data, false if there is not.
   if($_SESSION["loggedIn"] === true){
        header("location:index.php");
    }
    if($_SESSION["loggedIn"] === false){
        header("location:login.php");
    }	
?>
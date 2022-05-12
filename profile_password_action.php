<?php require_once "header.php";

    if(!isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    } else {
        //new password input data
    $newPass = $_POST["newpass"];
    $userID = $_SESSION["loggedInUser"]->id;

    //change the password and logout
    updateUserPass($newPass, $userID);

    session_destroy();

    header("location:login.php");
    }
?>
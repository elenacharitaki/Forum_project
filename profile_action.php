<?php require_once "header.php";
    if(!isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    }

    //users input data
    $newFirstname = $_POST["firstname"];
    $newLastname = $_POST["lastname"];
    $newEmail = $_POST["email"];
    $userID = $_SESSION["loggedInUser"]->id;

    //change user's data
    updateUser($newFirstname, $newLastname, $newEmail, $userID);

    //replace the old user with the new changed user, delete the password
    $sql = "SELECT * FROM users WHERE id=$userID";
    $newUser = selectFromDb($sql);
    $newUser[0]->password = NULL;
    $_SESSION["loggedInUser"] = $newUser[0];

    header("location:index.php");

?>
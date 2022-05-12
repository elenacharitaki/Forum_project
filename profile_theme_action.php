<?php
    require_once "header.php";

    if(!isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    } else {
        $bgcolor = $_GET["backgroundcolor"];

        $activeUserId = $_SESSION['loggedInUser']->id;

        $sql = "UPDATE users SET backgroundcolor='$bgcolor' WHERE id='$activeUserId'";
        updateData($sql);

        $_SESSION["loggedInUser"]->backgroundcolor = $bgcolor;

        header("location:profile.php");
    }
?>
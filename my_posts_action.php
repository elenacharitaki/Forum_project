<?php require_once "header.php";

    if(!isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    } else {
        if(isset($_POST["delete"])){
            $id = $_POST["id"];
            $sql = "DELETE FROM posts WHERE id='$id'";
            deleteFromDb($sql);
            header("location:my_posts.php");
        }
    }
?>
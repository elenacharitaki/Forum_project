<?php 
    require_once "header.php";

    if(!isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    } else {

        if(isset($_SESSION["post_id"])){
            $id = $_SESSION["post_id"];

            if($_POST["category"] !== null){
                $category = $_POST["category"];
            } else {
                $category = 0;
            }
            
            $title = $_POST["title"];
            $description = $_POST["description"];

            updatePost($category, $title, $description, $id);
        }

        if(!isset($_SESSION["post_id"])){
            $category = $_POST["category"];
            $title = $_POST["title"];
            $description = $_POST["description"];
            
            //create the new post
            createNewPost($category, $title, $description);
        }

        //redirect to the new post
        $sql = "SELECT * FROM posts WHERE title='$title'";
        $post = selectFromDb($sql);

        $id = $post[0]->id;

        header("location:show_post.php?post=".$id);
}
?>
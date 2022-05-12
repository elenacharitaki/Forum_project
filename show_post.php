<?php 
    require_once "header.php";

    if(!isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    }

    $post = $_GET["post"]; ?>

<div class="container mt-5 w-75 bg-white">
    <?php
    //select the post from the title in the url. Show the title in the h2 and the description in the p  
    $sql = "SELECT * FROM posts WHERE id='$post'";
    $result = selectFromDb($sql);

    $id = $result[0]->user_id;
    $sql = "SELECT * FROM users WHERE id='$id'";
    $user = selectFromDb($sql);
    ?>
    
    <h2>
        <?php echo $result[0]->title; ?><hr>
    </h2>

    <p>
        <?php echo $result[0]->description; ?> 
    </p>

    <div class="container-fluid d-flex justify-content-end">
        <p><small>
            Δημοσιεύτηκε στις: <?php echo $result[0]->date_created ?> από τον χρήστη: <?php echo $user[0]->firstname ?>
        </small></p>
    </div>
</div>

<?php include "footer.php"; ?>
<?php 
    require_once "header.php";

    if(!isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    }
    
    $category = $_GET["category"]; ?>

<div class="container mt-5">
    <table class="table">
        <thead>
            <?php
            $sql="SELECT * FROM categories WHERE `url`='$category'";
            $result = selectFromDb($sql);
            ?>
            <tr>
                <th><?php echo $result[0]->title; ?> </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql="SELECT * FROM posts WHERE category_id=(SELECT id FROM categories  WHERE `url`='$category')";
                $posts = selectFromDb($sql);
            
                if(count($posts) !== 0){
                    for($i = 0; $i<count($posts); $i++){ ?> 
            <tr>
                <td> <?php
                echo "<a>".$posts[$i]->title."</a>"; ?>
                </td>
            </tr>
            <?php }
                } ?>
        </tbody>
    </table>    
</div>

<div class="container mt-5">
    
</div>
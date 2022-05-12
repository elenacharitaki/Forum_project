<?php 
    require_once "header.php";

    if(!isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    }
    
    $category = $_GET["category"]; ?>

<!--Button add new post-->
<?php if(isset($_SESSION["loggedInUser"])){ ?>
<div class="container d-flex justify-content-end mt-2">
    <button class="btn" onclick="window.location.href='add_new_post.php'"><i class="fas fa-plus"></i> Νέα δημοσίευση</button>
</div>
<?php } ?>
<!--.Button add new post-->

<!--Table with all the posts of one category -->
<div class="container mt-3">

    <table class="table">
        <thead>
            <?php
            //select the category from the title in the url. Show the title in the thead
            $sql="SELECT * FROM categories WHERE id='$category'";
            $result = selectFromDb($sql);
            ?>
            <tr>
                <th><?php echo $result[0]->title; ?> </th>
            </tr>
        </thead>
        <tbody>
            <?php
                //select all the posts from the category. Show the titles in the tbody
                $sql="SELECT * FROM posts WHERE category_id=(SELECT id FROM categories  WHERE id='$category')";
                $posts = selectFromDb($sql);
            
                if(count($posts) !== 0){
                    for($i = 0; $i<count($posts); $i++){ ?> 
            <tr>
                <td> <?php
                echo "<a href='show_post.php?post=".$posts[$i]->id."'>".$posts[$i]->title."</a>"; ?>
                </td>
            </tr>
            <?php }
                } ?>
        </tbody>
    </table>    
    <!--.Table with all the posts of one category -->
</div>

<?php include "footer.php"; ?>
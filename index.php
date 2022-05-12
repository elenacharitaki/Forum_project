<?php require_once "header.php"; ?>

    <!--Button add new post-->
    <?php if(isset($_SESSION["loggedInUser"])){ ?>
    <div class="container d-flex justify-content-end">
        <button class="btn mt-2" onclick="window.location.href='add_new_post.php'"><i class="fas fa-plus"></i> Νέα δημοσίευση</button>
    </div>
    <?php } ?>
    <!--.Button add new post-->

    <!--Table with the 5 most recent posts-->
    <div class="container mt-3">
        <table class="table">
            <thead>
                <?php
                $sql="SELECT * FROM posts";
                $result = selectFromDb($sql);
                ?>
                <tr>
                    <th>Πρόσφατες δημοσιεύσεις</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(count($result) !== 0){
                        $posts = array_reverse($result);
                        if(count($result) > 4){
                            for($i = 0; $i<5; $i++){ ?> 
                                <tr>
                                    <td> <?php
                                    echo "<a href='show_post.php?post=".$posts[$i]->id."'>".$posts[$i]->title."</a><br>";
                                    echo "<small>".$posts[$i]->date_created."</small>" ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php }
                        if(count($result) <= 4){
                            for($i = 0; $i<count($result); $i++){ ?> 
                                <tr>
                                    <td> <?php
                                    echo "<a href='show_post.php?post=".$posts[$i]->id."'>".$posts[$i]->title."</a><br>";
                                    echo "<small>".$posts[$i]->date_created."</small>" ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!--.Table with the 5 most recent posts-->

    <!--Table with all the categories: title, number of posts, latest post -->
    <div class="container mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ΚΑΤΗΓΟΡΙΕΣ</th>
                    <th scope="col">ΔΗΜΟΣΙΕΥΣΕΙΣ</th>
                    <th scope="col">ΠΙΟ ΠΡΟΣΦΑΤΑ</th>
                </tr>
            </thead>
            <tbody>
                <?php //select all the categories
                    $sql = "SELECT * FROM categories";
                    $categories = selectFromDb($sql);

                    //count the number of posts in every category
                    for($id=0; $id<count($categories); $id++){ //start
                        $result = countCatPosts($id);
                    ?>
                <tr>
                    <td> 
                        <?php //category title as url
                            echo "<a href='show_category.php?category=".$categories[$id]->id."'>".$categories[$id]->title."</a>"; ?>
                    </td>

                    <td>
                        <?php //number of posts
                            echo $result; ?>
                    </td>

                    <td>
                        <?php //latest post as url
                            if(count(showPost($id))!== 0){
                                $length = count(showPost($id));
                                echo "<a href='show_post.php?post=".showPost($id)[$length-1]->id."'>".showPost($id)[$length-1]->title."</a>";
                                echo "<br>".showPost($id)[$length-1]->date_created;
                            }
                        ?>
                    </td>

                    <?php } //end
                    ?>

                </tr>
            </tbody>
        </table>
    </div>
    <!--.Table with all the categories -->

<?php include "footer.php"; ?>	
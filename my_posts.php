<?php include "header.php"; 
    if(!isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    }
?>
<div class="container mt-3">
    <h2 style="text-align:center;">Οι Δημοσιεύσεις μου</h2>

    <!--Button add new post-->
    <?php if(isset($_SESSION["loggedInUser"])){ ?>
    <div class="container d-flex justify-content-end">
        <button class="btn mt-2" onclick="window.location.href='add_new_post.php'"><i class="fas fa-plus"></i> Νέα δημοσίευση</button>
    </div>
    <?php } ?>
    <!--.Button add new post-->

    <!--My posts-->
    <div class="container mt-3">
        <table class="table">
            <?php
                $user = $_SESSION["loggedInUser"]->id;
                $sql="SELECT * FROM posts WHERE user_id='$user'";
                $result = selectFromDb($sql);
            ?>
            <thead>
                <tr>
                    <th>Οι δημοσιεύσεις μου</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(count($result) !== 0){
                        for($i = 0; $i<count($result); $i++){ ?> 
                <tr>
                    <td> 
                        <div class="row">
                            <div class = "col-10">
                                <?php
                                    echo "<a href='show_post.php?post=".$result[$i]->id."'>".$result[$i]->title."</a><br>";
                                    echo "<small>".$result[$i]->date_created."</small>" 
                                ?>
                            </div>
                            <div class="col-2">
                                <form method="POST" action="my_posts_action.php">
                                    <input type="hidden" name="id" value="<?php echo $result[$i]->id; ?>">
                                    <input type="submit" name="delete" class="btn" value="Διαγραφή">
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php }
                    } ?>
            </tbody>
        </table>
    </div>
    <!--.My posts-->
</div>
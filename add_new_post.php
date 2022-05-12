<?php 
    require_once "header.php";

    if(!isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    }

    $sql = "SELECT * FROM categories";
    $categories = selectFromDb($sql);
?>

    <div class="container mt-5">
        <h4 class="mb-3">ΝΕΑ ΔΗΜΟΣΙΕΥΣΗ</h4><hr>
        <form method="POST" action="add_new_post_action.php" id="addNewPostForm">
            <div class="row">
                <label>Επιλέξτε κατηγορία</label><br>
                <?php for($i=0; $i<count($categories); $i++){ ?>
                <div class="col-3 mb-3">
                    <input type="radio" name="category" value="<?php echo $categories[$i]->title ?>">
                    <label style="font-weight:400;" for="category"><?php echo $categories[$i]->title ?></label><br>
                </div>
                <?php } ?>
            </div>

            <label for="title">Τίτλος</label>
            <input type="text" name="title" id="title" class="form-control mb-3" placeholder="Τίτλος δημοσίευσης">
            <label for="description">Περιεχόμενο</label>
            <textarea name="description" id="description" rows="5" cols="50" class="form-control mb-3" placeholder="Περιεχόμενο δημοσίεσης"></textarea>

            <button type="submit" class="btn">Δημοσίευση</button>
        </form>
    </div>
<?php include "footer.php"; ?>
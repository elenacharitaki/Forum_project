<?php include "header.php"; 
    if(!isset($_SESSION["loggedInUser"])){
        header("location:index.php");
    }
?>
<div class="container mt-3">
    <h2 style="text-align:center;">Ο Λογαριασμός μου</h2>
    
    <div class="row mt-5">
        <!--Personal data-->
        <h4>Προσωπικά στοιχεία</h4><hr>
        <div class="col-7">
            <form method="POST" action="profile_action.php">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Όνομα</th>
                            <td>
                                <input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $_SESSION["loggedInUser"]->firstname; ?>" >
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Επίθετο</th>
                            <td>
                                <input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $_SESSION["loggedInUser"]->lastname; ?>" >
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>
                                <input type="text" id="email" name="email" class="form-control" value="<?php echo $_SESSION["loggedInUser"]->email; ?>" >
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn">Ενημέρωση στοιχείων</button>
            </form>
        </div>
    </div>
    <!--.Personal data-->
    
    <!--Change password-->
    <div class="row mt-5">
        <h4>Αλλαγή κωδικού</h4><hr>
        <div class="col-7">
            <form method="POST" action="profile_password_action.php" id="changePassForm">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Νέος κωδικός</th>
                            <td>
                                <input type="password" id="newpass" name="newpass" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Επαλήθευση κωδικού</th>
                            <td>
                                <input type="password" id="checknewpass" name="checknewpass" class="form-control">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" onclick="changePass();" class="btn">Αλλαγή κωδικού</button>
            </form>
        </div>
    </div>
    <!--.Change password-->

    <div class="container text-center error" id="changePassError">
        <!--Div for showing input errors-->
    </div>
   
    <!--Choose theme color-->
    <div class="mt-5 mb-5">
        <h4>Επιλογή θέματος</h4><hr>
        <form method="GET" action="profile_theme_action.php">
            <input class="mb-3" id="backgroundcolor" name="backgroundcolor" value="#3399FF80" data-jscolor="{}">
            <button class="btn" type="submit">Ενεργοποίηση</button>
        <form>
    </div>
    <!--.Choose theme color-->

</div>

<?php include "footer.php"; ?>
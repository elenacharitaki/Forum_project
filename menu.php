<div class="container mt-3">
	<ul class="nav menu">

	  <?php  //if no one is logged in: Login/Register
	  	if(!isset($_SESSION["loggedIn"])|| $_SESSION["loggedIn"] === false){ ?>
		<li class="nav-item">
			<a class="nav-link menu" href="login.php">ΣΥΝΔΕΣΗ</a>
		</li>
		<li class="nav-item">
		<a class="nav-link menu" href="register.php">ΕΓΓΡΑΦΗ</a>
	 	</li>
	  <?php } ?>

	  <?php  //if someone is logged in: Profile/Logout
	  	if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true){ ?>
		<li class="nav-item">
			<div class="dropdown">
				<button class="btn dropdown-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
					Ο ΛΟΓΑΡΙΑΣΜΟΣ ΜΟΥ
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="profile.php?user=<?php echo $_SESSION["loggedInUser"]->id; ?> ">ΠΡΟΦΙΛ</a>
					<a class="dropdown-item" href="my_posts.php">ΟΙ ΔΗΜΟΣΙΕΥΣΕΙΣ ΜΟΥ</a>
				</div>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link menu" href="logout.php">ΑΠΟΣΥΝΔΕΣΗ</a>
		</li>
	  <?php } ?>

	</ul>
</div>
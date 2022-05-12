<?php require "header.php"; ?>

<!--Login form-->
<div class="container mt-3">
	<h2> Σύνδεση </h2>
	<form method="POST" action="login_action.php">
	  <div class="form-group mb-2">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" class="form-control" placeholder="Το email σας.">
	  </div>
	  <div class="form-group mb-2">
		<label for="pass">Κωδικός</label>
		<input type="password" name="pass" id="pass" class="form-control" placeholder="Ο κωδικός σας.">
	  </div>
	  <button type="submit" class="btn">Σύνδεση</button>
	</form>
</div>
<!--.Login form-->

<!--Div for input errors-->
<div class="container text-center error" id="loginError">
	<?php if(isset($_SESSION["message"])){
		echo $_SESSION["message"];
	}
	session_destroy();
	?>
</div>
<!--.Div for input errors-->

<?php include "footer.php"; ?>
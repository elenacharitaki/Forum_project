<?php require "header.php"; ?>
 <!--Register form-->
<div class="container mt-3">
	<h2> Εγγραφή </h2>
	<form method="POST" action="register_action.php" id="registerForm">
		<div class="form-group mb-2">
			<label for="firstname">Όνομα</label>
			<input type="text" name="firstname" id="firstname" class="form-control" placeholder="Το όνομά σας.">
		</div>
		<div class="form-group mb-2">
			<label for="lastname">Επίθετο</label>
			<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Το επίθετό σας.">
		</div>
		<div class="form-group mb-2">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" placeholder="Το email σας.">
		</div>
		<div class="form-group mb-2">
			<label for="pass">Κωδικός</label>
			<input type="password" name="pass" id="pass" class="form-control" placeholder="Ο κωδικός σας.">
		</div>
		<div class="form-group mb-2">
			<label for="checkpass">Επαλήθευση κωδικού</label>
			<input type="password" name="checkpass" id="checkpass" class="form-control" placeholder="Εισάγετε ξανά τον κωδικό σας.">
		</div>
		<button type="button" onclick="validate();" class="btn">Εγγραφή</button>
	</form>
</div>
<!--.Register form-->

<div class="container text-center error" id="registerError">
	<!--Div for showing input errors-->
</div>

<?php include "footer.php"; ?>
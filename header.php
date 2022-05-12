<?php 
	session_start();
	require "functions.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Forum </title>
		<meta charset="utf-8">
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link href="css/css/fontawesome.css" rel="stylesheet">
        <link href="css/css/brands.css" rel="stylesheet">
        <link href="css/css/solid.css" rel="stylesheet">
		
        
        <script src="js/jquery-3.6.0.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/jscolor.min.js"></script>
		
	</head>
<?php 
	//if somenone is logged in set the background color from the database
	if(isset($_SESSION["loggedInUser"])){
		$color = $_SESSION["loggedInUser"]->backgroundcolor;
		echo "<body style='background-color:$color'>";
	} else {
		echo "<body>";
	}?>
		<div class="container-fluid">
			<div class="row header">
				<!--Logo-->
				<div class="col-4 logo">
					<div onclick="window.location.href='index.php'" style="cursor:pointer;">
						LOGO
					</div>
				</div>
				<!--.Logo-->

				<!--Menu and search-->
				<div class="col-6">
					<?php require "menu.php"; ?>
				</div>
				<div class="col-2 search-bar">
					<input type="text" name="search" id="search" class="form-control search-input" placeholder="Αναζήτηση..">
					<button class="search-button"><i class="fas fa-search"></i></button>
				</div>
				<!--.Menu and search-->
			</div>
			
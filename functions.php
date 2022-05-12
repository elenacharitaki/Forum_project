<?php
	//connection with the database
	function connectTodB (){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_forum";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		
		return $conn;
	}
	
	//inserts data to database
	function insertToDb($sql){
		$conn = connectToDb();

		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

	//selects data from database
	function selectFromDb($sql){
		$conn = connectTodB();

		$result = $conn->query($sql);
		$tempArray = [];

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_object()) {
				array_push($tempArray,$row);
			}
		}

		$conn->close();

		return $tempArray;
	}

	//updates data 
	function updateData($sql){
		$conn = connectTodB();

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		  } else {
			echo "Error updating record: " . $conn->error;
		  }

		$conn->close();
	}

	//deletes data
	function deleteFromDb($sql){
		$conn = connectTodB();

		if ($conn->query($sql) === TRUE) {
			echo "Record deleted successfully";
		} else {
			echo "Error deleting record: " . $conn->error;
		}

		$conn->close();
	}
	
	//adds a new user to the database (for register)
	function addUser($firstname, $lastname, $email, $pass){
		$sql = "INSERT INTO users(firstname, lastname, email, password) VALUES ('$firstname','$lastname','$email','$pass')";
		insertToDb($sql);
	}

	//for login 
	function loginUser($email, $pass){
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
		$user = selectFromDb($sql);

		if(count($user) > 0){
			$user[0]->password = null;

			$_SESSION["loggedIn"] = true;
			$_SESSION["loggedInUser"] = $user[0];
		} else {
			$_SESSION["loggedIn"] = false;
			$_SESSION["message"] = "Αποτυχία σύνδεσης. Το email ή/και ο κωδικός πρόσβασης δεν είναι σωστός.";
		}

	}

	//updates user's data: firstname, lastname, email
	function updateUser($newFirstname, $newLastname, $newEmail, $userID){
		$sql = "UPDATE users SET firstname='$newFirstname', lastname='$newLastname', email='$newEmail' WHERE id='$userID'";
		updateData($sql);
	}

	//changes user's password
	function updateUserPass($newPass, $userID){
		$newPass = md5($newPass);
		$sql = "UPDATE users SET password='$newPass' WHERE id=$userID";
		updateData($sql);
	}
	
	//counts the number of posts for every category in the database
	function countCatPosts($id){
		$sql = "SELECT * FROM posts WHERE category_id=$id";
		$posts = selectFromDb($sql);
		$num = count($posts);

		return $num;
	}

	//returns the latest post
	function showPost($id){
		$sql = "SELECT * FROM posts WHERE category_id=$id";
		$posts = selectFromDb($sql);
		return $posts;
	}

	//creates new post
	function createNewPost($category, $title, $description){
		$sql = "SELECT * FROM categories WHERE title='$category'"; //select the chosen category
		$id = selectFromDb($sql)[0]->id; //save category's id
		$user = $_SESSION['loggedInUser']->id; //save logged in user's id
		$sql = "INSERT INTO posts (`category_id`, `title`, `description`, `user_id`, `status_id`) VALUES ('$id','$title','$description','$user','1')";
		insertToDb($sql); //insert data
	}

	function updatePost($category, $title, $description, $id){
		$sql = "SELECT * FROM categories WHERE title='$category'"; //select the chosen category
		$catId = selectFromDb($sql)[0]->id; //save category's id
		$sql = "UPDATE posts SET `category_id`='$catId', `title`='$title', `description`='$description' WHERE id='$id'";
		updateData($sql); //update 
	}
?>
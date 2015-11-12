<?php 
	function connect_to_db_as_admin(){
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "Toledo.23";
		$dbname = "library";
		$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		if(mysqli_connect_errno()){
			die("Database connection failed : ".
				mysqli_connect_error().
				" (". mysqli_connect_errno() . ")"
				);
		}

		return $db;

	}

	function getBooksInfo($db){
		$query = "SELECT * FROM books;";
		$result = mysqli_query($db, $query);
		return $result;
	}

	function getAllUsersInfo($db){
		$query = "SELECT * FROM users;";
		$result = mysqli_query($db, $query);
		return $result;
	}

	function getUserInfo($db, $id){
		$query = "SELECT * FROM users ";
		$query .= "WHERE id = {$id}";

		$result = mysqli_query($db, $query);
		return mysqli_fetch_assoc($result);
	}

	function eraseUser($db, $id){
		$query = "DELETE FROM users WHERE id = {$id};";
		$result = mysqli_query($db, $query);

		return $result;
	}

	function createUser($db, $first_name, $last_name, $email){
		$query = "INSERT INTO users (";
		$query .= " first_name, last_name, balance, email";
		$query .= ") VALUES (";
		$query .= " '{$first_name}' , '{$last_name}', 0, '{$email}'";
		$query .= ")";

		$result = mysqli_query($db, $query);

		if($result){
			$ok = true;
		}
		else{
			echo "Valio verga";
			$ok = false;
		}

		return $ok;
	}

	function createBook($db, $title, $author, $isbn){
		$query = "INSERT INTO books (";
		$query .= "users_id, title, author, ISBN ";
		$query .= ") VALUES (";
		$query .= " 0, '{$title}' , '{$author}', {$isbn}";
		$query .= ")";
		$result = mysqli_query($db, $query);
		return $result;
	}

	function borrowBook($db, $bookID, $userID){
		if(getUserIdFromBook($db, $bookID) != 0){
			echo "Book already borrowed";
			return false;

		} else{
			$query = "UPDATE books SET users_id={$userID} WHERE id={$bookID}";
			echo $query;
			$result = mysqli_query($db, $query);
			
			return $result;		
		}
	}

	function returnBackBook($db, $bookID){
		$query = "UPDATE books SET users_id=0 WHERE id={$bookID}";
		return mysqli_query($db, $query);
	}

	function getUserIdFromBook($db, $bookID){
		$query = "SELECT users_id FROM books WHERE id= {$bookID}";
		$result = mysqli_query($db, $query); 
		$array = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		return $array['users_id'];
	}

	function getBooksFromUsers($db, $id){
		$query = "SELECT * FROM books WHERE users_id= {$id}";
		$result = mysqli_query($db, $query);

		return $result;
	}
	
?>
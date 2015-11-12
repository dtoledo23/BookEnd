<?php
	include("db_functions.php");
	$db = connect_to_db_as_admin();

	if(isset($_POST['bookRegister'])){
		if(
			createBook($db, $_POST["title"], $_POST["author"], $_POST["isbn"])
		) echo "Book registered";

	}else if(isset($_POST['userRegister'])){
		if(
			createUser($db, $_POST["first_name"], $_POST["last_name"], $_POST["e-mail"])
		) echo "User registered succesfully";
	}

	for($i=1; $i<100; $i++){
		if(isset($_POST[$i])){
			eraseUser($db, $i);
		}
	}
	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Admin</title>
		<link rel="stylesheet" href="library.css">
	</head>
	<body>

		Book register
		<form action="admin.php" method="post"> 
			Title: <input type="text" name="title" value=""/> <br />
			Author: <input type="text" name="author" value=""/> <br />
			ISBN : <input type="number" name="isbn" value=""/> <br />
			<input type="submit" name="bookRegister" value="Submit"/>
		</form>

		<br />

		User register
		<form action="admin.php" method="post"> 
			First Name: <input type="text" name="first_name" value=""/> <br />
			Last Name: <input type="text" name="last_name" value=""/> <br />
			E-mail : <input type="email" name="e-mail" value=""/> <br />
			<input type="submit" name="userRegister" value="Submit"/>
		</form>

		<br />

		List of books
		 <table style="width:100%">
		 	<tr>
			    <th>Title</th>
			    <th>Author</th>
			    <th>ISBN</th>
			    <th>Available</th>
			 </tr>

			<?php 
			$books = getBooksInfo($db);
			while($array = mysqli_fetch_assoc($books)){
				echo "<tr>";
				echo "<td>" . $array['title'] . "</td>";
				echo "<td>" . $array['author'] . "</td>";
				echo "<td>" . $array['ISBN'] . "</td>";
				
				if($array['status']==1)
					echo "<td> Yes </td>";
				else
					echo "<td> No </td>";

				echo "</tr>";
			}
			?>

		</table> 

		<br />

		List of users
		 <table style="width:100%">
		 	<tr>
			    <th>First Name</th>
			    <th>Last Name</th>
			    <th>Email</th>
			    <th></th>
			 </tr>

			<?php 
			$users = getAllUsersInfo($db);
			while($array = mysqli_fetch_assoc($users)){
				echo "<tr>";
				echo "<td>" . $array['first_name'] . "</td>";
				echo "<td>" . $array['last_name'] . "</td>";
				echo "<td>" . $array['email'] . "</td>";

				$id = $array['id'];
				$buttonHTML = "<input type=\"submit\" name=\"{$id}\" value=\"Erase\" />" ;
				echo "<td>". "<form action=\"admin.php\" method=\"post\"> " . $buttonHTML. "</form></td>";
				echo "</tr>";
			}
			?>

		</table> 

		<a href="booklist.php">Books</a>

		
	</body>
</html>

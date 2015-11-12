<?php
	include("db_functions.php");
	$db = connect_to_db_as_admin();

	if(isset($_POST['submit'])){
		$username = $_POST["username"];
		$password = $_POST["password"];

		if($password == "troko" && $username == "admin"){
			header("Location: admin.php");
		}
		else{

			$query = "SELECT id FROM users WHERE first_name = '{$username}' && last_name = '{$password}';";
			echo $query;
			$result = mysqli_query($db, $query);
			$array = mysqli_fetch_assoc();
			$id = $array['id'];

			session_start();
			
			echo $id;
			$_SESSION['userLogin'] = $id;
			header("Location: userInfo.php");
		}
	}else{
		$loginMessage = "";
	}
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Index</title>
	</head>
	<body>

		<h1> Books Borrowing System </h1>

		<form action="index.php" method="post"> 
			Username: <input type="text" name="username" value=""/> <br />
			Password: <input type="password" name="password" value=""/> <br />
			<?php //echo $loginMessage."<br />"; ?>
			<input type="submit" name="submit" value="Submit"/>
		</form>
		
		<a href="admin.php">Admin</a>
		<a href="first.php">No</a>

	</body>
</html>

<?php
	// 5. Close database connection 
	mysqli_close($db);

?>
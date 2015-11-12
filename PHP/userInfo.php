<?php
	include("db_functions.php");
	$db = connect_to_db_as_admin();

	session_start();
	$id = $_SESSION['userLogin']
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Library</title>
		<link rel="stylesheet" href="library.css">
	</head>
	<body>

			<?php
				$userInfo = getUserInfo($db, $id);
				echo $userInfo['first_name']." ".$userInfo['last_name']."<br/>"; 
				echo $userInfo['email']."<br/>"; 
				echo "Balance : $".$userInfo['balance'].".00"."<br/>"; 
			?>
			<table style="width:100%">
		 	<tr>
			    <th>Title</th>
			    <th>Author</th>
			    <th>ISBN</th>
			 </tr>

			 <?php
				echo "Books borrowed:";

				$books = getBooksFromUsers($db, $id);

				while($array = mysqli_fetch_assoc($books)){
					echo "<tr>";
					echo "<td>" . $array['title'] . "</td>";
					echo "<td>" . $array['author'] . "</td>";
					echo "<td>" . $array['ISBN'] . "</td>";			

					echo "</tr>";
				}
			?>

		</table>

		
	</body>
</html>

<?php
	include("db_functions.php");
	$db = connect_to_db_as_admin();

	for($i=1; $i<100; $i++){
		if(isset($_POST[$i])){
			echo $i;
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

		List of books
		 <table style="width:100%">
		 	<tr>
			    <th>Title</th>
			    <th>Author</th>
			    <th>ISBN</th>
			    <th>Available</th>
			    <th></th>
			 </tr>

			<?php 
			$books = getBooksInfo($db);
			while($array = mysqli_fetch_assoc($books)){
				echo "<tr>";
				echo "<td>" . $array['title'] . "</td>";
				echo "<td>" . $array['author'] . "</td>";
				echo "<td>" . $array['ISBN'] . "</td>";
				$id = $array['id'];
				$buttonHTML = "<input type=\"submit\" name=\"{$id}\" value=\"Return\" />" ;

				if($array['status']==1){
					echo "<td> Yes </td>";
				}
				else{
					echo "<td> No </td>";
					echo "<td>". "<form action=\"booklist.php\" method=\"post\"> " . $buttonHTML. "</form></td>";
				}

				
				

				echo "</tr>";
			}
			?>

		</table> 

		<br />
		
	</body>
</html>

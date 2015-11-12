<?php
	include("db_functions.php");
	$db = connect_to_db_as_admin();
	$msg = " ";
	$msgReg = " ";
	if(isset($_POST['addBook'])){
		$add = true; 
		$book = true;
		$msg = "Add book";

	}else if(isset($_POST['seeBook'])){
		$add = false; 
		$book = true;
		$msg = "List of books";
		
	}else if(isset($_POST['addUser'])){
		$add = true;
		$book = false;
		$msg = "Add user";

	}else if(isset($_POST['seeUser'])){
		$add = false;
		$book = false;
		$msg = "List of users";
	}else{
		header("Location: indexAdmin.php");
	}

	if(isset($_POST['userRegister'])){
		if(createUser($db, $_POST['first_name'], $_POST['last_name'], $_POST['email'])){
			$msgReg = "User registered sucesfully";
			$add = true;
			$book = false;
		}

	}else if(isset($_POST['bookRegister'])){
		if(createBook($db, $_POST['title'], $_POST['author'], $_POST['isbn'])){
			$msgReg = "Book registered sucesfully";
			$add = true;
			$book = true;
		}
		
	}
	

?>

<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Bookend</title>

  <link rel="stylesheet" href="stylesheets/normalize.css" />

  <link rel="stylesheet" href="stylesheets/app.css" />

  <link rel="stylesheet" href="stylesheets/app1.css" /> 

  <script type="text/javascript" src="vendor/script.js"></script>

  <script src="bower_components/modernizr/modernizr.js"></script>

</head>
<body>
<!-- index !-->
  <div class="row" id="doc-topbar">
      <div class="large-12 columns">
        <div class="fixed">
          <nav class="top-bar" data-topbar>
            <ul class="title-area">
              <!-- Title Area -->
              <li class="name">
                <h1><a href="indexAdmin.php">Return to Admin Page</a></h1>
              </li>
              <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
              <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

          <section class="top-bar-section">
              <ul class="right">
                <li class="divider"></li>
     

                  <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">« Back</a></h5></li>
       
                  <li class="divider"></li>
                    <li class="divider"></li>
                  </ul>
                </li>
                <li class="divider"></li>
              </ul>

              </ul>
              <!-- Right Nav Section -->
              <ul class="right">
            </ul>


            </section></nav>
          </div>
        </div>
      </div>
   

   <div class="large-12 columns">
                <div>
                  <p> </p>
                  <p> </p>
                  <h1><?php echo $msg; ?></h1>
                  <p> </p>
                
                 
                  <center><h7></h7></center>
                    <p> </p>
                  <p> </p>
                  <p> </p>
                </div>
  </div>

  <?php
  	if($book){

  		//Add book
  		if($add){
  			echo '

  			 <div class="row">
   				 <div class="small-3 large-3 columns"> 
   				 	<h1>    </h1>
   				 </div>
   				 <div class="small-6 large-6 columns">
					<form action="admin.php" method="post"> 
						Title: <input type="text" name="title" value=""/> <br />
						Author: <input type="text" name="author" value=""/> <br />
						ISBN : <input type="number" name="isbn" value=""/> <br />
						<input type="submit" name="bookRegister" value="Submit"/>
					</form>

				</div>

  			';
  			echo $msgReg;
  		//See books
  		}else{

  			echo '
  			<div class="small-12 large-12 columns">

   <div class="small-8 large-10 columns">
                 <!-- <label><h6>Ubicación</h6></label>!-->
                  <input type="text" placeholder="Look for a book">
                </div>
  <div class="small-4 large-2 columns">
    <button type="button" class="button radius">Search! </button>
  </div>
  </div>
  			<div class="row">
   				 <div class="small-2 large-2 columns"> 
   				 	<h1>    </h1>
   				 </div>

   				 <div class="small-8 large-8 columns">
		 <table style="width:100%">
		 	<tr>
		 		<th>ID</th>
			    <th>Title</th>
			    <th>Author</th>
			    <th>ISBN</th>
			    <th>Available</th>
			 </tr> ';

			$books = getBooksInfo($db);
			while($array = mysqli_fetch_assoc($books)){
				echo "<tr>";
				echo "<td>" . $array['id'] . "</td>";
				echo "<td>" . $array['title'] . "</td>";
				echo "<td>" . $array['author'] . "</td>";
				echo "<td>" . $array['ISBN'] . "</td>";
				
				if($array['status']==1){
					echo "<td> Yes </td>";
					$borrow = "<input type=\"submit\" name=\"{$array['id']}\" value=\"Borrow\" />" ;
					echo "<td>". "<form action=\"admin.php\" method=\"post\"> " . $borrow. "</form></td>";
				}
				else
					echo "<td> No </td>";

				echo "</tr>";
			}
		echo '</table> </div>';
  		}

  	}else{

  		//Add user
  		if($add){	
  			echo '

  				<div class="row">
   				 <div class="small-3 large-3 columns"> 
   				 	<h1>    </h1>
   				 </div>
   				 <div class="small-6 large-6 columns">
					<form action="admin.php" method="post"> 
						First Name: <input type="text" name="first_name" value=""/> <br />
						Last Name: <input type="text" name="last_name" value=""/> <br />
						E-mail : <input type="email" name="e-mail" value=""/> <br />
						<input type="submit" name="userRegister" value="Submit"/>
					</form>

				</div>
  			';
  			echo $msgReg;


  		//See user
  		}else{

  			echo '
  				<div class="small-12 large-12 columns">

			   <div class="small-8 large-10 columns">
			                 <!-- <label><h6>Ubicación</h6></label>!-->
			                  <input type="text" placeholder="Look for a user">
			                </div>
			  <div class="small-4 large-2 columns">
			    <button type="button" class="button radius">Search! </button>
			  </div>
			  </div>
  			<div class="row">
   				 <div class="small-2 large-2 columns"> 
   				 	<h1>    </h1>
   				 </div>

   				 <div class="small-8 large-8 columns">
				 <table style="width:100%">
				 	<tr>
					    <th>First Name</th>
					    <th>Last Name</th>
					    <th>Email</th>
					    <th>Balance</th>
					    <th></th>
					 </tr>';

			$users = getAllUsersInfo($db);
			while($array = mysqli_fetch_assoc($users)){
				echo "<tr>";
				echo "<td>" . $array['first_name'] . "</td>";
				echo "<td>" . $array['last_name'] . "</td>";
				echo "<td>" . $array['email'] . "</td>";
				echo "<td> $" . $array['balance']. ".00</td>";

				$id = $array['id'];
				$erase = "<input type=\"submit\" name=\"{$id}\" value=\"Borrow\" />" ;
				$borrow = "<input type=\"submit\" name=\"{$id}\" value=\"Return\" />" ;
				$return = "<input type=\"submit\" name=\"{$id}\" value=\"Erase\" />" ;
				echo "<td>". "<form action=\"admin.php\" method=\"post\"> " . $borrow. "</form></td>";
				echo "<td>". "<form action=\"admin.php\" method=\"post\"> " . $return. "</form></td>";
				echo "<td>". "<form action=\"admin.php\" method=\"post\"> " . $erase. "</form></td>";
				echo "</tr>";
			}
			echo '</table> </div>';	
  		}
  	}  ?>

  <script src="javascripts/vendor/jquery.js"></script>
  <script src="javascripts/vendor/jquery.cookie.js"></script>

  <script src="bower_components/foundation/js/foundation.min.js"></script>

  <script>

    $(document).foundation();
  </script>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19093680-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60981914-1', 'auto');
  ga('send', 'pageview');

</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62362305-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
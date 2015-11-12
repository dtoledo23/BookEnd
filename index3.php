<?php
  include("db_functions.php");
  $db = connect_to_db_as_admin();
  $userID = $_GET['id'];

  for($i=0; $i<100; $i++){
    if(isset($_POST["{$i}"])){
      borrowBook($db, $i, $userID);

    }
  }
?>

<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
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
<!-- buscar !-->
  <div class="row" id="doc-topbar">
      <div class="large-12 columns">
        <div class="fixed">
          <nav class="top-bar" data-topbar>
            <ul class="title-area">
              <!-- Title Area -->
              <li class="name">
               <form action="index.php?id=<?php echo $userID?>" method="post">
                  <input type="submit" class="button radius" name="islogged" value="Back to Bookend"/> 
                </form>
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
              
              
                <li>
                   <a href="#Inicia" data-reveal-id="myModals">Log in</a>
                    <div name="Inicia">                
                      <div id="myModals" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" name="Inicia">
                        <h2 id="modalTitle">Log in</h2>
                        <p class="lead">Welcome Again.</p>
                        <div>
                          <input type="text" placeholder="Ingresa tu nombre usuario">
                        </div>
                        <div>
                          <input type="text" placeholder="Ingresa tu contraseña">
                        </div>
                         <center> <button type="button" class="button radius">Accept </button></center>
                        <p><a href="#">Can't you remember the user name?</a></p>
                        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                      </div>
                    </div>
                </li>

                <li> 
                  <a href="#IniciaSesion" data-reveal-id="myModal">Sign up</a>
                  <div name="IniciaSesion">               
                  <div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" name="IniciaSesion">
                      <h2 id="modalTitle">Sign up</h2>
                      <p class="lead">A new way to be in a library</p>
                
                    <div>
                      <input type="text" placeholder="First name">
                    </div>
                    <div>
                      <input type="text" placeholder="Last name">
                    </div>
                    <div>
                      <input type="text" placeholder="E-mail">
                    </div>
                    <div>
                      <input type="text" placeholder="Password">
                    </div>
                

                    <a class="close-reveal-modal" aria-label="Close">&#215; </a>
                  
                    <button type="button" class="button radius">Start now! </button>
                    <a class="close-reveal-modal" aria-label="Close">&#215;</a>



                    <p><a href="index.php" data-reveal-id="secondModal">Terms and conditions</a></p>



                    

                    <div id="secondModal" class="reveal-modal" data-reveal aria-labelledby="secondModalTitle" aria-hidden="true" role="dialog">
                      <h2 id="secondModalTitle">Terminos y condiciones</h2>
                      <p>


                      Al aceptar estos términos, el usuario se compromete a hacer un buen uso de la aplicación Bookend. Al mismo tiempo al aceptar, Bookend se deslinda de los problemas que puedan por causa de descuidos del usuario, tales como dejar su cuenta de Bookend en un dispositivo ajeno al suyo y casos similares.
                       
                      Al aceptar, Bookend adquiere derechos para poder usar tu imagen en actividades de la compañía como lo son promoción de la aplicación, entre otras cosas

                    He leído y acepto los terminos y condiciones</p>
                      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                    </div>

                </div>

                

                </div>
                </div>
              </li>
            </ul>


            </section></nav>
          </div>
        </div>
      </div>
   

   <div class="large-12 columns">
                <div>
                  <p></p>
                  <p></p>
                  <p></p>
                  <p></p>
                  <p></p>
                  <h1>SEARCH BOOK</h1>
                </div>
  </div>

  <div class="large-12 columns">
                <div>
                  <h3>A NEW WAY TO READ</h3>
                  <p></p>
                </div>
  </div>

        
<div class="small-12 large-12 columns">

   <div class="small-8 large-10 columns">
                 <!-- <label><h6>Ubicación</h6></label>!-->
                  <input type="text" placeholder="Let the search begin">
                </div>
  <div class="small-4 large-2 columns">
    <button type="button" class="button radius">Search! </button>
  </div>
  </div>
 

   <div class="large-12 columns">
              
        <table>
            <thead>
              <tr>
                <th>ISBN</th>
                <th>TITLE</th>
                <th>LOCATION</th>
                <th>AUTOR</th>
                <th>NCOPIES</th>
                <th>STATUS</th>

              </tr>
            </thead>
            <tbody>
             <?php 
                $books = getBooksInfo($db);
                while($array = mysqli_fetch_assoc($books)){
                  echo "<tr>";
                  echo "<td>" . $array['ISBN'] . "</td>";
                  echo "<td>" . $array['title'] . "</td>";
                  echo "<td>" . $array['location'] . "</td>";
                  echo "<td>" . $array['author'] . "</td>";
                  echo "<td>" . $array['ncopies'] . "</td>";
                 
                  $id = $array['id'];
                  $buttonHTML = "<input type=\"submit\" name=\"{$id}\" value=\"Return\" />" ;

                  if($array['status']==1){
                    echo "<td> Available </td>";
                    $borrow = "<input type=\"submit\" name=\"{$array['id']}\" value=\"Borrow\" />" ;
                     echo "<td>". "<form action=\"index3.php?id=".$userID."\" method=\"post\"> " . $borrow. "</form></td>";
                  }
                  else{
                    echo "<td> Unavailable </td>";
                  }
                  echo "</tr>";
                }
              ?>

            </tbody>
        </table>
    </div>
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

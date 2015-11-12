<?php
  include("db_functions.php");
  $db = connect_to_db_as_admin();
  $loggedIn = false;
  $userID = 0;
  $message = "Log In or Sign Up";

  if(isset($_POST['islogged'])){
    $loggedIn = true;
    $userID = $_GET['id'];
  }
  if(isset($_POST['signUP'])){
        echo createUser($db, $_POST['first_name'], $_POST['last_name'], $_POST['email']);
        $loggedIn = true;
        $message = "Welcome to BookEnd";
  }

  if(isset($_POST['logIn'])){
        if($_POST['user']=="admin" && $_POST['password']=="troko"){
          header("Location: indexAdmin.php");

        }else{
             $query = "SELECT id FROM users WHERE first_name = '{$_POST['user']}' && last_name='{$_POST['password']}'";
              $result = mysqli_query($db, $query);
              $arr = mysqli_fetch_assoc($result);
              $userID = $arr['id'];
              

              if(!is_null($userID)){
                $loggedIn = true;
                $message = "Welcome to BookEnd";
              }else{
                echo "Failed to Log in";
              }

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
                <h1><a href="index.php">Bookend</a></h1>
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

                          <form action="index.php" method="post">
                            <div>
                              <input type="text" name="user" placeholder="Ingresa tu nombre usuario">
                            </div>
                            <div>
                              <input type="password" name="password" placeholder="Ingresa tu contraseña">
                            </div>
                             <center> <input type="submit" name= "logIn" class="button radius" value="Accept"> </input></center>
                          </form>


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
                
                        <form action="index.php" method="post"> 
                          <div>
                            <input type="text" name = "first_name" placeholder="First name">
                          </div>
                          <div>
                            <input type="text" name = "last_name" placeholder="Last name">
                          </div>
                          <div>
                            <input type="email" name = "email" placeholder="E-mail">
                          </div>
                          <div>
                            <input type="password" placeholder="Password">
                          </div>
                          <a class="close-reveal-modal" aria-label="Close">&#215; </a>
                  
                          <input type="submit" name="signUP" class="button radius" value="Start now!"> </input>
                          <a class="close-reveal-modal" aria-label="Close">&#215;</a>

                        </form>

                    

                    <p><a href="index.php" data-reveal-id="secondModal">Terms and conditions</a></p>

                    <div id="secondModal" class="reveal-modal" data-reveal aria-labelledby="secondModalTitle" aria-hidden="true" role="dialog">
                      <h2 id="secondModalTitle">Terminos y condiciones</h2>
                      <p>


                      Terms and conditions are not available in english yet. we are sorry. 
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
                  <h1><?php echo $message; ?></h1>
                </div>
  </div>

  <div class="row">
    <div class="small-3 large-3 columns">  
      <?php 
        if($loggedIn){
          echo '
            <a href="index3.php?id='.$userID.'" > 
            <img class="Iconos" src="images/logo3.png">
            </a>" ';
        }
        else{
          echo "<h1> </h1>";
        }

      ?>

    </div>

    <div class="small-6 large-6 columns">  
        <img class="logo" src="images/logo.jpg">
    </div>

    <div class="small-3 large-3 columns">  
     <?php 
        if($loggedIn){
          echo '
            <a href="index2.php?id='.$userID.'" > 
            <img class="Iconos2" src="images/logo2.jpg">  
            </a>
         ';
        }

      ?>
    </div>

  </div>

  <div class="large-12 columns">
                <div>
                  <h3>A NEW WAY TO READ</h3>
                  <p></p>
                </div>
              
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

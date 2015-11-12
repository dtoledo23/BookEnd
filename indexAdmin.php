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
                  <h1>ADMIN PAGE</h1>
                  <p> </p>
                
                 
                  <center><h7>Welcome to the admin page, if anything happends send an email to diegotoledo@acm.org</h7></center>
                    <p> </p>
                  <p> </p>
                  <p> </p>
                </div>
  </div>
<div class="large-12 columns">
              
        <table>
            <thead>
              <tr>
                <th width=400px><!--1!--></th>
                <th width=200px><!--3!--></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><b>Add a Book</b></td>
                <td> <form action="admin.php" method="post"><input type="submit" name="addBook" value="Add Book"/> </form></td>
               </tr>

                <tr>
                 <td><b>See the book list</b></td>
              <td> <form action="admin.php" method="post"><input type="submit" name="seeBook" value="Book List"/> </td>
                </tr>

                <tr>
                 <td><b>Add a user</b></td>
                  <td> <form action="admin.php" method="post"><input type="submit" name="addUser" value="Add User"/> </td>
                </tr>
                 <tr>
                 <td><b>See the users list</b></td>
              <td> <form action="admin.php" method="post"><input type="submit" name="seeUser" value="Users List"/> </td>
                </tr>

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

<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Admin | Signin</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <link rel="SHORTCUT ICON" href="images/logo.png" />

</head>
<?php
	session_start();
	error_reporting(0);
?>
<body style="background-color:grey" class="">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
	  <div class="text-center">

	  </div>
	  <br>
    <div class="container aside-xl">
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <h3 style="color:white">Sign in</h3>
        </header>
        <form action="login.php" method="post">
			<input type="hidden" name="do" value="login">
          <div class="list-group">
            <div class="list-group-item">
              <input type="text" name="uname" placeholder="Username" class="form-control no-border">
            </div>
            <div class="list-group-item">
               <input type="password" name="upass" placeholder="Password" class="form-control no-border">
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-lg btn-danger btn-block">Sign in</button>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>&copy; 2017</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/app.plugin.js"></script>
</body>
</html>

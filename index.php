<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == 'yes') {
	header('Location: mathgame.php');
}
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" media="screen"/>
	<head>
    <title>Math Game</title>
  </head>
  <body>
  	<div class="container">
    <div class="row">
    <div class="col-md-10">
      <h3>Login to enjoy the math game.</h3>
    </div>
    <div class="col-md-1"></div>
    </div>
    <form action="authenticate.php" method="post" role="form" class="form-horizontal">
		<div class="form-group">
    	<div class="col-md-4">Enter your email: </div>
    	<div class="col-md-3">
      <input type="text" class="form-control" id="email" name="email" placeholder="Email" size="6">
    	</div>
    	<div class="col-md-5"></div>
    	</div>
    <div class="form-group">
      <div class="col-md-4">Enter your password: </div>
      <div class="col-md-3">
      <input type="text" class="form-control" id="password" name="password" placeholder="Password" size="6">
      </div>
      <div class="col-md-5"></div>
      </div>
    <div class="row">
      <div class="col-md-3">
        <button type="submit" class="btn btn-info">Login</button>
      </div>
    </div>
    </form>
    <div class="row">
			<?php
			if(isset($_GET['msg'])) {
			$msg = $_GET['msg'];
			urldecode($msg);
			echo '<p class="col-md-3">' . $msg . '</p>';
			}
			?>
		</div>
    </div>
  </body>
</html>

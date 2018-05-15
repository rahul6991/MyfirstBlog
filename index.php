<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="index.css">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Login  form Documents</title>
</head>		
<body >
	<script>
  			$('.login-page').ready(function() {
    		$('button').addClass("animated bounce");
 			 });
			</script>
	<div class="login-page">
		<?php 'conn.php' ?>
		<div class="form">
			<form class="register-form" action="signup.php" method="post">
				<input type="text" name="name" placeholder="user name" >
				<input type="text" placeholder="password" name="pass">
				
				<button type="submit">Create</button>
				<p class="message">Already ass Registered?<a href="#"> login form</a></p>
			</form>
			<form class="login-form" action="login.php" method="post">
				<input type="text" name="name" placeholder="user name">
				<input type="password" name="pass" placeholder="password">
				<button type="submit">LOGIN</button>
				<p class="message">Not Registered <a href="#">Register</a> </p>
			</form>
			<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
			<script >
				$('.message a').click(function(){
				$('form').animate({height:"toggle", opacity:"toggle"},"slow");
				});
			</script>
			



		</div>
		
	</div>
	
</body>
</html>
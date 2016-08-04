<?php include('assets/header.php'); ?>
     
	<form class="form-signin" role="form" method="post" action="logging_in.php">
		<h2 class="form-signin-heading">Please sign in</h2>
	
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
	
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
	
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="do_login">Sign in</button>
	</form>	
	 
<?php include('assets/footer.php'); ?>
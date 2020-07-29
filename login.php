<?php include('server.php'); ?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Registration system PHP and MySQL</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
      <body>
	    <h3 class="text-info" style="padding-top:30px;">Login here....</h3>
          <div class="text-justify">
              <form method="post" action="login.php" class="col-md-6 ">
  	            <?php include('error.php'); ?>
  	              <div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control col-md-5">
				  </div>
  	              <div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control col-md-5" >
				  </div>
				  <div class="form-group">
					<button class="btn btn-outline-secondary col-md-3" type="submit" name="login">Login</button>
				  </div>
  	             <p style="font-size:25px;margin-right:100px" >
		            Don't have an account?<a href="register.php" class="text-success" style="text-decoration:none;">Sign up..</a>
		        </p>
              </form>
          <div>
      </body>
</html
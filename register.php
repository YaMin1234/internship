<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

   
      <body>
         <h3 class="text-info" style="padding-top: 30px;">Create Account....</h3>
           <div  style="padding-top:50px;" >
              <form method="post" action="register.php"  class="col-md-8 ">
                 <?php include('error.php'); ?>
					<div class="form-group;">
						<label>UserName:</label>
						<input type="text" name="username" class="form-control col-md-4">
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="email" name="email" class="form-control col-md-4">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" name="password1" class="form-control col-md-4">
					</div>
					<div class="form-group">
						<label>Confirm password:</label>
						<input type="password" name="password2" class="form-control col-md-4">
					</div><br>
					<div class="form-group">
					    <button class="btn btn-outline-info col-md-3" type="submit" name="register">Register</button>
					</div>
	                <p style="font-size:25px">Already have Account?<a href="login.php" class="text-success" style="text-decoration: none;">Sign In...</a></p>
             </form>
        </div>
	  
	</body>

</html>
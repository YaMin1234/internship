<?php 
  session_start(); 

  if (!isset($_SESSION['email'])) 
  {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

  if (isset($_GET['logout'])) 
  {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: login.php");
  }

  if(isset($_GET['addNew']))
  {
      header("location: addNew.php");
  }
?>




<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<div>
	<marquee direction="left"><h3 class="text-info" >Welcome From My Home Page</h3></marquee>
</div>
  <div>
  
  	<!-- <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?> -->

    
    <!-- <?php  if (isset($_SESSION['email'])) : ?>
      <p style="color:darkolivegreen">Your email is <strong><?php echo $_SESSION['email']; ?></strong>
      <?php endif ?> -->

      <p class=" text-left col-md-12 " style="font-size:30px">  
      <a href="index.php?addNew='1'" class="badge badge-success font-weight-light">Add New</a>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 
      <a href="index.php?logout='1'"class="badge badge-danger font-weight-light">Log out</a> </p>
      
      
  </div>

    <?php
      $conn=mysqli_connect('localhost', 'root','', 'registration');
      $result = mysqli_query($conn, "
      SELECT employees.*, team.team_name
      FROM employees LEFT JOIN team
      ON employees.team_id = team.team_id");
    

echo "<table class='table table-bordered'>
  <thead class='thead-light'>
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Birthday</th>
      <th>Education</th>
      <th>IT Skill</th>
      <th>Gender</th>
      <th>Department</th>
      <th>Address</th>
      <th>Action</th>
    </tr>
  </thead>";

while($row = mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<th scope='row' >" . $row['id'] . "</td>";
    echo "<td class='text-center'>" . $row['name'] . "</td>";
    echo "<td class='text-center'>" . $row['birthday'] . "</td>";
    echo "<td class='text-center'>" . $row['education'] . "</td>";
    echo "<td class='text-center'>" . $row['ITskill'] . "</td>";
    echo "<td class='text-center'>" . $row['gender'] . "</td>";
    echo "<td class='text-center'>" . $row['team_name'] . "</td>";
    echo "<td class='text-center'>" . $row['address'] . "</td>";
    echo "<td class='text-center'>
    <form method='post' action='server.php'>
      <input type='hidden' name='id' value='$row[id]'>
      <a href='edit.php?id=$row[id]' class='btn btn-success'>Edit</a>
      <button class='btn btn-danger' onclick='return confirm(&quot;are you sure to want to delete? &quot;)' type='submit' name='delete'>Delete</button>
    </form>
    </td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
 
?>




  

    
           
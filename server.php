<?php

session_start();
$username = "";
$email    = "";
$name = "";
$birthday = "";
$education = "";
$ITskill = "";
$gender = "";
$department = "";
$address = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['register'])) 
{
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password1 = $_POST['password1'];
  $password2 =  $_POST['password2'];

  
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password1)) { array_push($errors, "Password is required"); }
  if ($password1 != $password2) 
  {
	 array_push($errors, "The two passwords do not match");
  }

  
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user)
   { 
     if ($user['username'] === $username)
      {
        array_push($errors, "Username already exists");
      }

      if ($user['email'] === $email)
       {
        array_push($errors, "email already exists");
       }
    }

  
  if (count($errors) == 0) 
  {
  	$password = md5($password1);

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  	
  }
}

if (isset($_POST['login'])) 
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email)) 
  {
  	array_push($errors, "Email is required");
  }
  
  if (empty($password)) 
  {
  	array_push($errors, "Password is required");
  }
  
  if (count($errors) == 0)
   {
  	$pwd = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$pwd'";
    $results = mysqli_query($db, $query);
    
    if ($results)
     {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
     }
     else
    {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
  	
if (isset($_POST['insert'])) 
{
  
  $name = $_POST['name'];
  $birthday = $_POST['birthday'];
  $education = $_POST['edu'];
  $checkbox1=$_POST['skill'];  
    
  foreach($checkbox1 as $chk1)  
     {  
        $ITskill .= $chk1.",";  
     } 
  $gender = $_POST['gender'];
  $department = $_POST['department']; 
  $address = $_POST['address'];
 
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($birthday)) { array_push($errors, "Birthday is required"); }
  if (empty($education)) { array_push($errors, "Education is required"); }
  if (empty($ITskill)) { array_push($errors, "IT Skill is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($department)) { array_push($errors, "Department is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }

   if (count($errors) == 0) 
  {
  	$query = "INSERT INTO employees (name,birthday,education,ITskill,gender,address,team_id) 
  			  VALUES('$name', '$birthday', '$education','$ITskill','$gender','$address','$department')";
    mysqli_query($db, $query);
    header('location: index.php');
  	
  }
}

if (isset($_POST['update'])) 
{
  $id = $_POST['id'];
  $name = $_POST['name'];
  $birthday = $_POST['Birthday'];
  $education = $_POST['Edu'];
  $checkbox2=$_POST['SKILL'];  
    
  foreach($checkbox2 as $chk2)  
     {  
        $ITskill .= $chk2.",";  
     } 
  $gender = $_POST['Gender'];
  $department = $_POST['Department']; 
  $address = $_POST['Address'];
  // var_dump($id);
  // var_dump($name);
  // var_dump($birthday);
  // var_dump($education);
  // var_dump($ITskill);
  // var_dump($gender);
  //  var_dump($department);
  // var_dump($address);
  // die();

  

 
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($birthday)) { array_push($errors, "Birthday is required"); }
  if (empty($education)) { array_push($errors, "Education is required"); }
  if (empty($ITskill)) { array_push($errors, "IT Skill is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($department)) { array_push($errors, "Department is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }

  if (count($errors) == 0) 
  {
    $sql = "UPDATE employees SET name='$name', birthday='$birthday',
    education='$education', ITskill='$ITskill', gender='$gender',
    address='$address', team_id='$department' WHERE id = $id";
  }
    mysqli_query($db, $sql);
    header("location: index.php");
  	
  }

  
  
  if(isset($_POST['delete']))
  {
    $id = $_POST['id'];
    // var_dump($id);
    // die;
    $sql = "DELETE FROM employees WHERE id = $id";
    mysqli_query($db, $sql);
    header("location: index.php");
  } 
  
  if(isset($_POST['cancel']))
  {
    header("location: index.php");
  } 

?>


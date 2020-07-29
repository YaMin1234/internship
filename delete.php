<?php
include("server.php");

$id = $_GET['id'];
$result = mysqli_query($db, "SELECT * FROM employees WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
</head>
<body>
    <form method="post" style="text-align:center;padding-top:200px">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <p class="text-primary">Are you sure to delete?</p>
        <button class="btn btn-danger" type="submit" name="delete">Delete</button>
        <button class="btn btn-success" type="cancel" name="cancel">Cancel</button>
    </form>
 </body>
</html>
    
    
    

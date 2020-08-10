<?php
session_start();
$conn = new PDO('mysql:host=localhost;dbname=store',"root","");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$conn->query("INSERT INTO orders(name, email, phone, address, status, created_date, modified_date)
              VALUES ('$name','$email','$phone','$address', 0, now(), now())");
$order_id = $conn->lastInsertId() ;

foreach($_SESSION['cart'] as $id => $qty) 
{
    $conn->query("INSERT INTO order_items(book_id, order_id, qty) VALUES ($id,$order_id,$qty)");
}
unset($_SESSION['cart']);
?>

<!doctype html>
<html>
<head>
<title>Order Submitted</title>
<link rel="stylesheet" href="css/style.css">
</head>
<style>
    html {
    background: #34495E;
    }
    body {
    font-family: Arial, Helvetica, sans-serif;
    width: 900px;
    background: #e5e5e5;
    border: 4px solid #3498DB;
    margin: 20px auto;
    }
    h1 {
    padding: 10px;
    font-size: 21px;
    background: #3498DB;
    margin: 0;
    color: #fff;
    }
    .msg {
    background: #1ABC9C;
    color: #fff;
    text-align: center;
    padding: 10px;
    margin: 50px 20px;
    }
    .msg a {
    color: #eee;
    border-bottom: 1px dotted #fff;
    }
    .footer {
    clear: both;
    background: #95A5A6;
    color: #fff;
    font-size: 13px;
    padding: 8px;
    text-align: center;
    border-top: 1px solid #7F8C8D;
    }
    
</style>
<body>

<h1>Order Submitted</h1>
<div class="msg">
  Your order has been submitted. We'll deliver the items soon.
<a href="index.php" class="done">Book Store Home</a>
</div>

<div class="footer">
&copy; <?php echo date("Y") ?>. All right reserved.
</div>

</body>
</html>

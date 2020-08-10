<?php
    $conn = new PDO('mysql:host=localhost;dbname=store',"root","");

    $id = $_GET['id'];
    $books = $conn->query("SELECT * FROM books WHERE id = $id");
    $row = $books->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    .footer {
    clear: both;
    background: #95A5A6;
    color: #fff;
    font-size: 13px;
    padding: 8px;
    text-align: center;
    border-top: 1px solid #7F8C8D;
    }
    .detail {
    padding: 20px;
    background: #fff;
    }
    .detail .back {
    text-decoration: none;
    float: right;
    }
    .detail a.add-to-cart {
    text-decoration: none;
    margin: 0;
    width: 160px;
    text-align: center;
    padding: 10px 0;
    }
</style>
<body>

<h1>Book Detail</h1>

<div class="detail">
<a href="index.php" class="back">&laquo; Go Back</a>
<img src="covers/<?php echo $row['cover'] ?>">

<h2><?php echo $row['title'] ?></h2>
<i>by <?php echo $row['author'] ?></i>,
<b>$<?php echo $row['price'] ?></b>
<p><?php echo $row['summary'] ?></p>
<a href="add-to-cart.php?id=<?php echo $id ?>" class="add-to-cart">
Add to Cart
</a>
</div>
<div class="footer">
&copy; <?php echo date("Y") ?>. All right reserved.
</div>
</body>
</html>
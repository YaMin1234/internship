<?php

session_start();
$conn = new PDO('mysql:host=localhost;dbname=store',"root","");

$cart = 0;
if(isset($_SESSION['cart']))
{
    foreach($_SESSION['cart'] as $qty) 
    {
     $cart += $qty;
    }
}

if(isset($_GET['cat'])) 
{
    $cat_id = $_GET['cat'];
    $books =  $conn->query("SELECT * FROM books WHERE category_id =$cat_id");
} 
else 
{
   $books = $conn->query("SELECT * FROM books");
}

$cats = $conn->query("SELECT * FROM categories");
?>

<!doctype html>
<html>
<head>
<title>Book Store</title>
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
    a {
    color: #2980B9;
    text-decoration: none;
    }
    a:hover {
    color: #3498DB;
    }
    .info {
    background: #2980B9;
    padding: 8px;
    text-align: right;
    }
    .info a {
    color: #fff;
    font-size: 14px;
    text-decoration: none;
    border-bottom: 1px dotted #fff;
    }
    .info a:hover {
    border-bottom: 1px solid #fff;
    }
    .sidebar {
    float: left;
    width: 240px;
    }
    .cats {
    list-style: none;
    padding: 0;
    }
    .cats li a {
    display: block;
    font-size: 15px;
    padding: 8px 15px;
    border-bottom: 1px solid #ddd;
    }
    .cats li a:hover {
    background: #efefef;
    }
    .main {
    float: right;
    width: 660px;
    background: #fff;
    }
    .books {
    list-style: none;
    margin: 15px;
    padding: 0;
    overflow: hidden;
    }
    .books li {
    width: 190px;
    text-align: center;
    height: 240px;
    float: left;
    margin: 20px 10px;
    font-size: 15px;
    }
    .books b {
    display: block;
    margin: 5px 0;
    font-weight: normal;
    }
    .books i {
    color: #E74C3C;
    }
    a.add-to-cart {
    font-size: 13px;
    display: block;
    background: #1ABC9C;
    color: #fff;
    padding: 5px 0;
    margin: 5px 30px;
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
<h1>Book Store</h1>

<div class="info">
    <a href="view-cart.php">
    (<?php echo $cart ?>) books in your cart
    </a>
</div>

<div class="sidebar">
    <ul class="cats">
        <li>
          <b><a href="index.php">All Categories</a></b>
        </li>
        <?php while($row = $cats->fetch()): ?>
        <li>
          <a href="index.php?cat=<?php echo $row['id'] ?>">
        <?php echo $row['name'] ?>
        </a>
        </li>
        <?php endwhile; ?>
    </ul>
</div>

<div class="main">
    <ul class="books">
        <?php while($row =$books->fetch()): ?>
        <li>
            <img src="covers/<?php echo $row['cover'] ?>" height="150">
            <b>
            <a href="book-detail.php?id=<?php echo $row['id'] ?>">
            <?php echo $row['title'] ?>
            </a>
            </b>
            <i>$<?php echo $row['price'] ?></i>
            <a href="add-to-cart.php?id=<?php echo $row['id'] ?>"
            class="add-to-cart">Add to Cart</a>
        </li>
        <?php endwhile; ?>
     </ul>
</div>
<div class="footer">
&copy; <?php echo date("Y") ?>. All right reserved.
</div>
</body>
</html>
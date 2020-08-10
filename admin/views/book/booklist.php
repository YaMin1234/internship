<?php
include("models/auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    html {
    background: #95A5A6;
    }
    body {
    font-family: Arial, Helvetica, sans-serif;
    width: 900px;
    background: #fff;
    border: 4px solid #2C3E50;
    margin: 20px auto;
    }
    h1 {
    padding: 10px;
    font-size: 21px;
    background: #2C3E50;
    margin: 0;
    color: #fff;
    }
    ul.menu {
    list-style: none;
    overflow: hidden;
    background: #16A085;
    }
    ul.menu li {
    float: left;
    border-right: 1px solid #1ABC9C;
    }
    ul.menu a {
    display: block;
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
    }
    ul.menu a:hover {
    background: #1ABC9C;
    }
    ul.list {
    list-style: none;
    margin: 20px;
    padding: 0;
    }
    ul.list li {
    overflow: hidden;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 20px;
    }
    ul.list b {
    display: block;
    font-size: 18px;
    margin-bottom: 5px;
    color: #2980B9;
    }
    ul.list i, ul.list small {
    color: #888;
    font-size: 12px;
    margin-right: 10px;
    }
    ul.list span {
    color: #8E44AD;
    }
    ul.list div {
    margin: 5px 0;
    font-size: 13px;
    line-height: 1.5em;
    color: #555;
    }
    ul.list img {
    margin-left: 20px;
    }
    ul.list a {
    color: #2980B9;
    }
    ul.list a.del {
    text-decoration:none ;
    color: #D35400;
    }
    ul.list a.edit{
      text-decoration: none;
    }
    a.new {
    padding: 10px 24px;
    margin-right: 10px;
    display: block;
    padding: 8px 0;
    text-align: center;
    width: 160px;
    margin: 10px;
    color: #fff;
    background: #1ABC9C;
    text-decoration: none;
    }
    
</style>

<body>
<h1>Book List</h1>
<ul class="menu">
    <li><a href="http://localhost/BookStore/admin/book/list/">Manage Books</a></li>
    <li><a href="http://localhost/BookStore/admin/category/list">Manage Categories</a></li>
    <li><a href="http://localhost/BookStore/admin/category/order">Manage Orders</a></li>
    <li><a href="http://localhost/BookStore/admin/category/logout">Logout</a></li>
</ul>
<ul class="list">
  <?php foreach($data1 as $row): ?>
   <li>
    <img src="../../../covers/<?php echo $row['cover'] ?>"
    alt="" align="left" height="100">

    <b><?php echo $row['title'] ?></b>
    <i>by <?php echo $row['author'] ?></i>
    <small>(in <?php echo $row['name'] ?>)</small>
    <span>$<?php echo $row['price'] ?></span>
    <div><?php echo $row['summary'] ?></div>
    [<a href="http://localhost/BookStore/admin/book/del/<?php echo $row['id'] ?>" class="del">del</a>]
    [<a href="http://localhost/BookStore/admin/book/edit/<?php echo $row['id'] ?>" class="edit">edit</a>]
  </li>
  <?php endforeach; ?>
</ul>
<a href="http://localhost/BookStore/admin/book/new/" class="new">New Book</a>
</body>
</html>
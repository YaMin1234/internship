<?php
include("models/auth.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <style>
        html {
             background: #95A5A6;
             }
        body {
              font-family: Arial, Helvetica, sans-serif;
              width: 600px;
              background: #fff;
              border: 4px solid #2C3E50;
              margin: 20px auto;
            }
        h2 {
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
        a.new{
            display: block;
            padding: 8px 0;
            text-align: center;
            width: 160px;
            margin: 10px;
            color: #fff;
            background: #1ABC9C;
            text-decoration: none;
        }
        a{
            text-decoration: none;
        }
   </style>

</head>
<body>
<h2>List</h2>

<ul class="menu">
    <li><a href="http://localhost/BookStore/admin/book/list/">Manage Books</a></li>
    <li><a href="http://localhost/BookStore/admin/category/list">Manage Categories</a></li>
    <li><a href="http://localhost/BookStore/admin/category/order">Manage Orders</a></li>
    <li><a href="http://localhost/BookStore/admin/category/logout">Logout</a></li>
</ul>

<ul>
    <?php foreach($data1 as $cat): ?>
    <li>
    [ <a href="http://localhost/BookStore/admin/category/del/<?php echo $cat['id'] ?>">del</a> ]
    [ <a href="http://localhost/BookStore/admin/category/edit/<?php echo $cat['id']?>"> edit</a>]
    <strong><?php echo $cat['name'] ?></strong>

    </li>
    <?php endforeach; ?>
</ul>
<br>
<a href="http://localhost/BookStore/admin/category/new/" class="new">New Category</a>
</body>
</html>
<?php
   include("models/auth.php");
?>

<!doctype html>
<html>
<head>
<title>Order List</title>
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
        a{
            text-decoration: none;
        }
        a:hover{
          color: #1ABC9C;
        }
        

   </style>
</head>
<body>
<h1>Order List</h1>

<ul class="menu">
    <li><a href="http://localhost/BookStore/admin/book/list/">Manage Books</a></li>
    <li><a href="http://localhost/BookStore/admin/category/list">Manage Categories</a></li>
    <li><a href="http://localhost/BookStore/admin/category/order">Manage Orders</a></li>
    <li><a href="http://localhost/BookStore/admin/category/logout">Logout</a></li>
</ul>

<ul class="orders">
<?php foreach($data1 as $order): ?>

<div class="order">
    <?php if($order['status']): ?>
      <strike>
        <b><?php echo $order['name'] ?></b><br>
        <i><?php echo $order['email'] ?></i><br>
        <span><?php echo $order['phone'] ?></span>
        <p><?php echo $order['address'] ?></p>
      </strike>
        *<a href="http://localhost/BookStore/admin/category/orderstatus/<?php echo $order['id'] ?>/0/" class="undo">Undo</a>
   <?php else: ?>
        <b><?php echo $order['name'] ?></b><br>
        <i><?php echo $order['email'] ?></i><br>
        <span><?php echo $order['phone'] ?></span>
        <p><?php echo $order['address'] ?></p>
        * <a href="http://localhost/BookStore/admin/category/orderstatus/<?php echo $order['id'] ?>/1/">
        Mark as Delivered</a>
   <?php endif; ?>
</div>

<div class="items">
<?php foreach($data2 as $item):?>
    <b>
    <a href="http://localhost/BookStore/admin/book/list/<?php echo $item['book_id'] ?>">
    <?php echo $item['title'] ?>
    </a>
    (<?php echo $item['qty'] ?>)
    </b><br>
<?php endforeach; ?><hr>
</div>
</li>
<?php endforeach; ?>
</ul>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
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
        a{
            text-decoration: none;
                }
        form {
                margin: 20px;
                }
        form label {
                display: block;
                margin-top: 10px;
                color: #555;
                }
        input[type=text],textarea{
                font-family: Arial, Helvetica, sans-serif;
                border: 1px solid #ddd;
                padding: 6px;
                width: 300px;
                background: #fff;
                }
        textarea {
                height: 100px;
                }
        input[type=submit] {
                padding: 10px 24px;
                margin-right: 10px;
                display: block;
                padding: 8px 0;
                text-align: center;
                width: 160px;
                margin: 10px;
                color: #fff;
                background: #1ABC9C;
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
</style>

<body>
<h2>Edit</h2>
<ul class="menu">
    <li><a href="http://localhost/BookStore/admin/book/list/">Manage Books</a></li>
    <li><a href="http://localhost/BookStore/admin/category/list">Manage Categories</a></li>
    <li><a href="http://localhost/BookStore/admin/category/order">Manage Orders</a></li>
    <li><a href="http://localhost/BookStore/admin/category/logout">Logout</a></li>
</ul>
<form action="http://localhost/BookStore/admin/category/update/" method="post">
    <?php foreach($data1 as $cat): ?>
   <input type="hidden" name="id" value="<?php echo $cat['id'] ?>">
   <label>Category Name</label>
   <input type="text" name ="name" placeholder="Category name" value="<?php echo $cat['name'] ?>">
   <label>Remark</label>
   <textarea name="remark"><?php echo $cat['remark']?></textarea>
   <br><br>
   <input type="submit" value="Update">
   <?php endforeach; ?>
</form>

</body>
</html>
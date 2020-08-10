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
              width: 900px;
              background: #fff;
              border: 4px solid #2C3E50;
              margin: 20px auto;
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
        input[type=text],textarea,select{
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
</head>
<body>
<h1>New Book</h1>
<ul class="menu">
    <li><a href="http://localhost/BookStore/admin/book/list/">Manage Books</a></li>
    <li><a href="http://localhost/BookStore/admin/category/list">Manage Categories</a></li>
    <li><a href="http://localhost/BookStore/admin/category/order">>Manage Orders</a></li>
    <li><a href="http://localhost/BookStore/admin/category/logout">Logout</a></li>
</ul>
<form action="http://localhost/BookStore/admin/book/add/" method="post" enctype="multipart/form-data">
<label for="title">Book Title</label>
<input type="text" name="title" id="title">
<label for="author">Author</label>
<input type="text" name="author" id="author">
<label for="summary">Summary</label>
<textarea name="summary" id="summary"></textarea>
<label for="price">Price</label>
<input type="text" name="price" id="price">
<label for="categories">Category</label>
<select name="category_id" id="categories">
<option value="0">-- Choose --</option>

<?php foreach($data1 as $row): ?>
<option value="<?php echo $row['id'] ?>">
<?php echo $row['name'] ?>
</option>
<?php endforeach; ?>

</select>
<label for="cover">Cover</label>
<input type="file" name="cover" id="cover">
<br><br>
<input type="submit" value="Add Book"><br><br>
<a href="http://localhost/BookStore/admin/book/list/" class="back">&laquo;Back</a>
</form>
    
</body>
</html>
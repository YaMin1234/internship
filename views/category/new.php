<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   
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
        }
</style>
<body>
<h2>New</h2>
<form action="http://localhost/mvc/category/add/" method="post">
    <label>Category Name</label>
    <input type="text" name="name">
    <label>Remark</label>
    <textarea name="remark"></textarea>
    <br><br>
    <input type="submit" value="Add Category">
</form>
<br>
<a href="http://localhost/mvc/category/list/">Category List</a>
</body>
</html>
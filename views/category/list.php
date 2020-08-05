<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
      
h2 {
    padding: 10px;
    font-size: 21px;
    background: #2C3E50;
    margin: 0;
    color: #fff;
    }
ul{
    list-style: none;
    margin: 20px;
    padding: 0;
    }
li {
    overflow: hidden;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 20px;
    }

a{
    text-decoration: none;
     }   
 </style>

</head>
<body>
<h2>List</h2>
<ul>
<?php foreach($data as $cat): ?>
<li>
[ <a href="http://localhost/mvc/category/del/<?php echo $cat['id'] ?>">del</a> ]
[ <a href="http://localhost/mvc/category/edit/<?php echo $cat['id']?>"> edit</a>]
<strong><?php echo $cat['name'] ?></strong>

</li>
<?php endforeach; ?>
</ul>
<br>
<a href="http://localhost/mvc/category/new/">New Category</a>
</body>
</html>
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
        h1 {
             padding: 10px;
             font-size: 21px;
             background: #2C3E50;
             margin: 0;
             color: #fff;
        }
        form {
                margin: 20px;
                }
        form label {
                display: block;
                margin-top: 10px;
                color: #555;
                }
        input[type=text],input[type=password]{
                font-family: Arial, Helvetica, sans-serif;
                border: 1px solid #ddd;
                padding: 6px;
                width: 300px;
                background: #fff;
                }
        
        input[type=submit] {
                padding: 10px 24px;
                margin-right: 10px;
                }
    </style>
</head>
<body>
<h1>Login to Book Store Administration</h1>
    <form action="http://localhost/BookStore/admin/category/checkInfo/" method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <br><br>
    <input type="submit" value="Admin Login">
</form>
</body>
</html>
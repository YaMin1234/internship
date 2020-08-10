<?php
    session_start();
    if(!isset($_SESSION['cart'])) 
    {
        header("location: index.php");
        exit();
    }
   $conn = new PDO('mysql:host=localhost;dbname=store',"root","");
?>

<!doctype html>
<html>
<head>
<title>View Cart</title>
<style>
        html{
            background: #34495E;
            }
        body{
            font-family: Arial,Helvetica,sans-serif;
            width:900px;
            background: #e5e5e5;
            border: 4px  solid #3498DB;
            margin:20px auto;
            }
        h1{
            padding:10px;
            font-size:21px;
            background: #3498DB;
            margin:0;
            color: #fff;
            }
        .sidebar{
            float:left;
            width:240px;
            }
        .cats{
             list-style: none;  
             padding: 0;     
                }
        .cats li a{
             display:block;
             font-size:15px;
             padding: 8px 15px;
             border-bottom: 1px solid #ddd;
        }
        .cats li a:hover{
            background: #efefef;
        }
        .main{
            float:right;
            width:660px;
            background: #fff;
        }
        table{
            margin:20px;
            border-spacing: 1px;
            background: #16A085;
        }
        td{
            background: white;
            border-collapse: collapse;
            padding:8px;
        }
        th{
            color:white;
            padding: 8px;
        }
        .order-form{
            margin:20px;
        }
        .order-form h2{
            margin:40px 0 10px 0;
            padding: 0 0 5px 0;
            border-bottom: 1px solid #ddd;
            font-size:18px;
            color:#C0392B;
        }
        form label{
            display:block;
            margin-top:10px;
            color:#555;
        }
        input[type=text],textarea{
            font-family: Arial, Helvetica, sans-serif;
            border:1px solid #ddd;
            padding: 6px;
            width:300px;
            background: #fff;
        }
        textarea{
            height: 100px;
        }
        input[type=submit]{
            padding:10px 24px;
        }
        a{
            color:#2980B9;
            text-decoration: none;
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
</head>
<body>
<h1>View Cart</h1>

<div class="sidebar">
    <ul class="cats">
        <li><a href="index.php">&laquo; Continue Shopping</a></li>
        <li><a href="clear-cart.php" class="del">&times; Clear Cart</a></li>
    </ul>
</div>

<div class="main">
    <table>
        <tr>
            <th>Book Title</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Price</th>
        </tr>

        <?php
        $total = 0;
        foreach($_SESSION['cart'] as $id => $qty):
        $result = $conn->query("SELECT title, price FROM books WHERE id=$id");
        $row = $result->fetch();
        $total += $row['price'] * $qty;
        ?>

        <tr>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $qty ?></td>
            <td>$<?php echo $row['price'] ?></td>
            <td>$<?php echo $row['price'] * $qty ?></td>
        </tr>

        <?php endforeach; ?>

        <tr>
            <td colspan="3" align="right"><b>Total:</b></td>
            <td>$<?php echo $total; ?></td>
        </tr>
    </table>

    <div class="order-form">
        <h2>Order Now</h2>
        <form action="submit-order.php" method="post">
            <label for="name">Your Name</label>
            <input type="text" name="name" id="name">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone">
            <label for="address">Address</label>
            <textarea name="address" id="address"></textarea>
            <br><br>
            <input type="submit" value="Submit Order">
            <a href="index.php">Continue Shopping</a>
        </form>
    </div>
</div>
<div class="footer">
&copy; <?php echo date("Y") ?>All right Reserved.
</div>
</body>
</html>
<?php
$conn = new PDO('mysql:host=localhost;dbname=store',"root","");

function get_cats() 
{
    global $conn;
    $result = $conn->query("SELECT * FROM categories");
    $cats = array();
    foreach($result as $row) 
    {
      $cats[] = $row;
    }
return $cats;
}

function insert_cat($name,$remark)
{
    global $conn;
    $sql = "INSERT INTO categories(name, remark, crated_date, modified_date)
    VALUES ('$name','$remark', now(), now())";
    $conn->query($sql);
    return $conn->lastInsertId();
}

function del_cat($id) 
{
    global $conn;
   $sql = $conn->query("DELETE FROM categories WHERE id = $id");
    return $sql->rowCount();
}

function update_cat($id,$name,$remark)
{
    global $conn;
    $sql = $conn->query("UPDATE categories SET name='$name',remark='$remark' WHERE id='$id'");
    return $sql->rowCount();
}

function getCatById($id) 
{
    global $conn;
    $sql = $conn->query("SELECT id,name,remark FROM categories WHERE id='$id'");
    $cats = array();
   foreach($sql as $row)
    {
      $cats[] = $row;
    }
    return $cats;
}
function getOrder()
{
    global $conn;
    $sql = $conn->query("SELECT * FROM orders");
    $orders = array();
    foreach($sql as $row)
    {
        $orders[] = $row;
    }
    return $orders;
}

function getOrderItem($id)
{
    global $conn;
    $sql = $conn->query("SELECT order_items.*, books.title
    FROM order_items LEFT JOIN books ON order_items.book_id = books.id
    WHERE order_items.order_id = $id");
    $items = array();
    foreach($sql as $row)
    {
        $items[] = $row;
    }
    return $items;
}
function update_status($id,$status)
{
   global $conn;
   $sql = $conn->query("UPDATE orders SET status=$status, modified_date=now() WHERE id=$id");
   return $sql->rowCount();

}

?>
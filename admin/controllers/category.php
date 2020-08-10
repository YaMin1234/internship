<?php
switch($action) {
case "list":show_list();break;
case "new":show_new();break;
case "edit":show_edit($id);break;
case "add":add_cat();break;
case "del":rm_cat($id);break;
case "update":edit_cat();break;
case "index":show_login();break;
case "checkInfo":check();break;
case "order":show_order();break;
case "orderstatus":edit_status($id,$status);break;
case "logout":Logout();break;
default:exit("Unknown action -> $action");
}

function Logout()
{
session_start();
unset($_SESSION['auth']);
header("location: http://localhost/BookStore/admin/category/index");

}
function edit_status($id,$status)
{
   
   update_status($id,$status);
   header("location: http://localhost/BookStore/admin/category/order/");

}
function show_order()
{
    $orders = getOrder();
    foreach($orders as $order)
    {
        $order_id = $order['id'];
        $items = getOrderItem($order_id);
    }
    render("order",$orders,$items);
}

function show_login()
{
    render("index");
}
function check()
{
   
    session_start();
    $name = $_POST['name'];
    $password = $_POST['password'];
    if($name == "admin" and $password == "214365")
     {
        $_SESSION['auth'] = true;
        header("location: http://localhost/BookStore/admin/book/list/");
    } 
    else 
    {
        header("location: http://localhost/BookStore/admin/category/index");
    }
    
}

function show_list() 
{
    $cats = get_cats();
    render("catlist", $cats);
}

function show_new() 
{
  render("catnew");
}

function show_edit($id)
{
  $result = getCatById($id);
  render("catedit",$result);
}

function add_cat() 
{
    $name = $_POST['name'];
    $remark = $_POST['remark'];
    $result = insert_cat($name,$remark);
    header("location: http://localhost/BookStore/admin/category/list/");
}

function rm_cat($id)
 {
 $result = del_cat($id);
 header("location: http://localhost/BookStore/admin/category/list/");
 }

 function edit_cat()
 {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $remark = $_POST['remark'];
    $result = update_cat($id,$name,$remark);
    header("location: http://localhost/BookStore/admin/category/list/");
 }

?>
<?php
switch($action) {
case "list":show_list();break;
case "new":show_new();break;
case "edit":show_edit($id);break;
case "add":add_cat();break;
case "del":rm_cat($id);break;
case "update":edit_cat();break;
exit("Unknown action -> $action");
}

function show_list() 
{
    $cats = get_cats();
    render("list", $cats);
}

function show_new() 
{
  render("new");
}

function show_edit($id)
{
  $result = getCatById($id);
  render("edit",$result);
}

function add_cat() 
{
    $name = $_POST['name'];
    $remark = $_POST['remark'];
    $result = insert_cat($name,$remark);
    header("location: http://localhost/mvc/category/list/");
}

function rm_cat($id)
 {
 $result = del_cat($id);
 header("location: http://localhost/mvc/category/list/");
 }

 function edit_cat()
 {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $remark = $_POST['remark'];
    $result = update_cat($id,$name,$remark);
    header("location: http://localhost/mvc/category/list/");
 }

?>
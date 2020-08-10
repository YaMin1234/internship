<?php
switch($action) {
case "list":show_list();break;
case "new":show_new();break;
case "edit":show_edit($id);break;
case "add":add_book();break;
case "del":rm_book($id);break;
case "update":edit_book();break;
exit("Unknown action -> $action");
}


function show_list() 
{
    $books = get_books();
    render("booklist", $books);
}

function show_new() 
{
  $cats = get_cats();
  render("booknew",$cats);
}

function show_edit($id)
{  
  $cats = get_cats();
  $result = getBookById($id);
  render("bookedit",$result,$cats);
}

function add_book() 
{
    
    $title = $_POST['title'];
    $author = $_POST['author'];
    $summary = $_POST['summary'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $cover = $_FILES['cover']['name'];
    $tmp = $_FILES['cover']['tmp_name'];

    $result = insert_book($title,$author,$summary,$price,$category_id,$cover,$tmp);
    header("location: http://localhost/BookStore/admin/book/list/");
}

function rm_book($id)
 {
    $result = del_book($id);
    header("location: http://localhost/BookStore/admin/book/list/");
 }

 function edit_book()
 {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $summary = $_POST['summary'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $cover = $_FILES['cover']['name'];
    $tmp = $_FILES['cover']['tmp_name'];
    $result = update_book($id,$title,$author,$summary,$price,$category_id,$cover,$tmp);
    header("location: http://localhost/BookStore/admin/book/list/");
 }

?>
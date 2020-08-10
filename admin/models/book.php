<?php
$conn = new PDO('mysql:host=localhost;dbname=store',"root","");

function get_books() 
{
    global $conn;
    $result = $conn->query("SELECT books.*, categories.name
                            FROM books LEFT JOIN categories
                            ON books.category_id = categories.id
                            ORDER BY books.created_date DESC");
    $books = array();
    foreach($result as $row) 
    {
      $books[] = $row;
    }
return $books;
}

function insert_book($title,$author,$summary,$price,$category_id,$cover,$tmp)
{
  global $conn;
 if($cover) 
 {
  move_uploaded_file($tmp, "../covers/$cover");
 }
 
    
    $sql = "INSERT INTO books(title,author,summary,price,category_id,cover,created_date,modified_date)
    VALUES ('$title','$author','$summary','$price',$category_id,'$cover',now(),now())";
    $conn->query($sql);
    return $conn->lastInsertId();
}

function del_book($id) 
{
    global $conn;
   $sql = $conn->query("DELETE FROM books WHERE id = $id");
    return $sql->rowCount();
}

function update_book($id,$title,$author,$summary,$price,$category_id,$cover,$tmp)
{
    global $conn;
    if($cover) 
   {
	move_uploaded_file( $tmp, "../covers/$cover");
	$sql = $conn->query( "UPDATE books SET title='$title', author='$author',summary='$summary',price='$price', category_id='$category_id',
	cover='$cover', modified_date=now() WHERE id = $id");
   }
 else 
   {
    $sql = $conn->query( "UPDATE books SET title='$title', author='$author',summary='$summary', price='$price', category_id='$category_id',modified_date=now() WHERE id = $id");
   }
    return $sql->rowCount();
}

function getBookById($id) 
{
    global $conn;
    $sql = $conn->query("SELECT * FROM books WHERE id='$id'");
    $books = array();
   foreach($sql as $row)
    {
      $books[] = $row;
    }
    return $books;
}
function get_cats() 
{
    global $conn;
    $result = $conn->query("SELECT id,name FROM categories");
    $cats = array();
    foreach($result as $row) 
    {
      $cats[] = $row;
    }
return $cats;
}

?>
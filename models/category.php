<?php
$conn = mysqli_connect("localhost", "root", "","store");

function get_cats() 
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM categories");
    $cats = array();
    while($row = mysqli_fetch_assoc($result)) 
    {
      $cats[] = $row;
    }
return $cats;
}

function insert_cat($name,$remark)
{
    global $conn;
    mysqli_query($conn, "INSERT INTO categories(name, remark, crated_date, modified_date)
    VALUES ('$name','$remark', now(), now())");
    return mysqli_insert_id($conn);
}

function del_cat($id) 
{
    global $conn;
    mysqli_query($conn, "DELETE FROM categories WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function update_cat($id,$name,$remark)
{
    global $conn;
    mysqli_query($conn,"UPDATE categories SET name='$name',remark='$remark' WHERE id='$id'");
    return mysqli_affected_rows($conn);
}

function getCatById($id) 
{
    global $conn;
    $sql = mysqli_query($conn, "SELECT id,name,remark FROM categories WHERE id='$id'");
    $cats = array();
    while($row = mysqli_fetch_assoc($sql)) 
    {
      $cats[] = $row;
    }
    return $cats;
}

?>
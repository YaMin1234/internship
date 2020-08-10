<?php 
session_start();
if(!isset($_SESSION['auth']))
{
    header("location:http://localhost/BookStore/category/login/");
    exit();
}
?>
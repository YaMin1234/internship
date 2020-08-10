<?php

function render( $template, $data1 = array(), $data2 = array() ) 
{
    $controller = $_GET['controller'];
    $view_file = "views/${controller}/${template}.php";
    if(file_exists( $view_file ) and !is_dir( $view_file )) 
    {
     include("$view_file");
    } 
    else
     {
       exit("View not found -> $view_file");
    }
}

$controller = $_GET['controller'];
$action = isset($_GET['action']) ? $_GET['action'] : "";
$id = isset($_GET['id']) ? $_GET['id'] : "";
$status = isset($_GET['status']) ? $_GET['status'] : "";


$model_file = "models/${controller}.php";
if(file_exists( $model_file ) and !is_dir( $model_file )) 
{
  include( $model_file );
} 
else 
{
  exit("Model not found -> $model_file");
}

$controller_file = "controllers/${controller}.php";
if(file_exists( $controller_file ) and !is_dir($controller_file)) 
{
   include( $controller_file );
} 
else 
{
   exit("Controller not found -> $controller_file");
}
?>
<?php
include '../classes/class.product.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'newtype':
        create_new_type();
	break;
    case 'newproduct':
        create_new();
	break;
    case 'updateproduct':
        update_product();
	break;
    case 'upload':
        upload();
	break;
}


function create_new(){
	$product = new Product();
    $pname= ucwords($_POST['pname']); 
    $desc= ucwords($_POST['desc']);  
    $price= ucwords($_POST['price']);       
    $type= $_POST['type'];
    $size= ucwords($_POST['size']);
    $pid = $product->new_product($pname,$desc,$price,$type,$size);
    if(is_numeric($pid)){
        header('location: ../index.php?page=settings&subpage=products&action=profile&id='.$pid);
    }
}
<?php
include '../classes/class.order.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'newtype':
        create_new_type();
	break;
    case 'new_order':
        create_new();
	break;
    case 'updateorder':
        update_order();
	break;
    case 'upload':
        upload();
	break;
}


function create_new(){
	$order = new order();
    $oname= ucwords($_POST['oname']); 
    $quant= ucwords($_POST['quant']);         
    $pname= ucwords($_POST['pname']);
    $order_id = $order->new_order($oname,$quant,$pname);
    if(is_numeric($order_id)){
        header('location: ../index.php?subpage=orderview&action=view');
    }
}

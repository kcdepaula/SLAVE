<?php
include_once 'C:\xampp\htdocs\webapplicationdev-main\classes\class.order.php';
?>
<div id="third-submenu">
    <a href="index.php?subpage=orderview&action=view">List of Orders</a> | 
    <a href="index.php?subpage=orderview&action=add_order">New Orders</a>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'add_order':
                    require_once 'order-crud/create-order.php';
                break; 
                case 'new_order':
                    require_once 'create-order.php';
                break; 
                case 'view':
                    require_once 'order-crud/main.php';
                break; 
                default:
                    require_once 'order-crud/index.php';
                break; 
            }
    ?>
  </div>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Customer Name</th>
        <th>Quantity</th>
        <th>Product Name</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($order->list_order() != false){
foreach($order->list_order() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=settings&subpage=order&action=profile&id=<?php echo $order_id;?>"><?php echo $customer_name;?></a></td>
        <td><?php echo $quantity;?></td>
        <td><?php echo $product_name;?></td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>
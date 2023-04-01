<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Type</th>
        <th>Product price</th>
        <th>Size</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($product->list_product() != false){
foreach($product->list_product() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=settings&subpage=products&action=profile&id=<?php echo $product_id;?>"><?php echo $product_name;?></a></td>
        <td><?php echo $product_description;?></td>
        <td><?php echo $product_type;?></td>
        <td><?php echo $product_price;?></td>
        <td><?php echo $product_size;?></td>
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
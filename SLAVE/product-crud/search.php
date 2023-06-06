<?php
include_once '../classes/class.product.php';

$product = new Product();

$q = $_GET["q"];
$count = 1;
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Type</th>
        <th>Product Price</th>
        <th>Size</th>
      </tr>';
$data = $product->list_product_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);

        $hint .= '
        <tr>
        <td>'.$count.'</td>
        <td><a href="index.php?page=settings&subpage=products&action=profile&id'.$product_id.'">'. $product_name.'></a></td>
        <td>'.$product_description.'</td>
        <td>'.$product_type.' </td>
        <td>'.$product_price.' </td>
        <td>'.$product_size.'</td>
      </tr>
      <tr>';
 $count++;
    }
}

$hint .= '</table>';

echo $hint === "" ? "No result(s)" : $hint;
?>
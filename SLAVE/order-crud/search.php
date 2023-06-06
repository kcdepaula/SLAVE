<?php
include_once '../classes/class.order.php';

$order = new Order();

$q = $_GET["q"];
$count = 1;
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
        <th>#</th>
        <th>Customer Name</th>
        <th>Quantity</th>
        <th>Product Name</th>
      </tr>';
$data = $order->list_order_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);

        $hint .= '
        <tr>
        <td>'.$count.'</td>
        <td><a href="index.php?page=settings&subpage=products&action=profile&id'.$order_id.'">'. $customer_name.'</a></td>
        <td>'.$quantity.'</td>
        <td>'.$product_name.'</td>
      </tr>
      <tr>';
 $count++;
    }
}

$hint .= '</table>';

echo $hint === "" ? "No result(s)" : $hint;
?>
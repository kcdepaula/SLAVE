<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($user->list_users() != false){
foreach($user->list_users() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id;?>">
        <?php echo $user_lastname.', '.$user_firstname;?></a></td>
        <td><?php echo $user_email;?></td>
        <td><?php echo $user->get_user_phone($user_id);?></td>
        <td><?php echo $user_address;?></td>
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
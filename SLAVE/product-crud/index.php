<script>
function showResults(str) {
  if (str.length == 0) {
    document.getElementById("search-result").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "product-crud/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
<?php
include_once 'C:\xampp\htdocs\SLAVE\classes\class.product.php';
?>

<div id="third-submenu">
  <div class="third-menu">
    <a href="index.php?subpage=productview&action=view">List of Products</a> |
    <a href="index.php?subpage=productview&action=add_product">New Product</a>
  </div>
  <?php
    ?>
  Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
</div>
<div id="subcontent">
  <?php
  switch($action) {
    case 'add_product':
      require_once 'product-crud/create-product.php';
      break;
    case 'new_product':
      require_once 'create-product.php';
      break;
    case 'view':
      require_once 'product-crud/main.php';
      break;
    case 'profile';
      require_once 'product-crud/view-profile.php';
      break;
    default:
      require_once 'product-crud/index.php';
      break;
  }
  ?>
</div>

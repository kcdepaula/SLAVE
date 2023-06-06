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
    xmlhttp.open("GET", "order-crud/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>

<div id="third-submenu">
    <a href="index.php?subpage=orderview&action=view">List of Orders</a> | 
    <a href="index.php?subpage=orderview&action=add_order">New Orders</a> 
</br>
    Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
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
                    require_once 'order-crud/main.php';
                break; 
            }
    ?>
  </div> 

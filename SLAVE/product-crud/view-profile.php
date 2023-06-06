<h3>Product Details</h3>
<div id="form-block">
    <form method="POST" action="processes/process.product.php?action=updateproduct">  
    <div id="form-block-half">
            <label for="fname">Product Name</label>
            <input type="text" id="pname" class="input" name="pname" value="<?php echo $product->get_product_name($id);?>" placeholder="Product name..">

            <label for="lname">Description</label>
            <textarea id="desc" class="input" name="desc" placeholder="Description.."><?php echo $product->get_product_desc($id);?></textarea>
            </div>
    <div id="form-block-half">
            <label for="type">Product Type</label>
            <textarea id="type" class="input" name="type" placeholder="Product Type.."><?php echo $product->get_product_type($id);?></textarea>

            <label for="price">Price</label>
            <textarea id="price" class="input" name="price" placeholder="Price.."><?php echo $product->get_product_price($id);?></textarea>
        

            <label for="size">Product Size</label>
            <select id="sizes" name="sizes" required>
            <option value="XS">XS</option>
              <option value="S">Small</option>
              <option value="M">Medium</option>
              <option value="L">Large</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
            </select>
            <input type="hidden" id="prodid" name="prodid" value="<?php echo $id;?>"/>  
    </div>
              
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
</div>    
  </form>
</div>
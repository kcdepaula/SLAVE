<h3>Insert Product</h3>
<div id="form-block">
    <form method="POST" action="processes/process.product.php?action=newproduct">
        <div id="form-block-center">
            <label for="pname">Product Name</label> 
            <input type="text" id="pname" class="input" name="pname" placeholder = "Product Name" required>

            <label for="desc">Description</label>
            <textarea id="desc" class="input" name="desc" placeholder="Product Description" required></textarea>
            
            <label for="type">Product Type</label>
            <input type="text"id="type" class="input" name="type" required/>
            <label for="price">Price </label>
            <input type="text"id="price" class="input" name="price" required/>
            <label for="size">Product Size</label>
            <select id="sizes" name="sizes" required>
            <option value="XS">XS</option>
              <option value="S">Small</option>
              <option value="M">Medium</option>
              <option value="L">Large</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
</select>
</div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>
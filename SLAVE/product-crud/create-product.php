<h3>Insert Product</h3>
<div id="form-block">
    <form method="POST" action="processes/process.product.php?action=newproduct">
        <div id="form-block-center">
            <label for="pname">Product Name</label>
            <input type="text" id="pname" class="input" name="pname" placeholder = "Product Name">

            <label for="desc">Description</label>
            <textarea id="desc" class="input" name="desc" placeholder="Product Description"></textarea>
            
            <label for="type">Product Type</label>
            <input type="text"id="type" class="input" name="type" />
            <label for="price">Price</label>
            <input type="text"id="price" class="input" name="price" />
            <label for="size">Product Size</label>
            <input type="text"id="size" class="input" name="size" />
              </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>
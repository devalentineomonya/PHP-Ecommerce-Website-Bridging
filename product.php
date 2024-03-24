<?php
include('partials/menu.php');
include('config/constants.php');
?>
<!-- All Products -->
<title>All PRODUCTS IN OUR SHOP</title>
<section class="section all-products" id="products">
  <div class="btn_add_product">
    <a class="add_product" href="add_product.php">New Products</a>
  </div>
  <div class="top container">
    <h1>All Products</h1>
    <form>
      <select>
        <option value="1">Default Sorting</option>
        <option value="2">Sort By Price</option>
        <option value="3">Sort By Popularity</option>
        <option value="4">Sort By Sale</option>
        <option value="5">Sort By Rating</option>
      </select>
      <span><i class="bx bx-chevron-down"></i></span>
    </form>
  </div>
  <div class="product-center container">


    <?php
    $sql = "SELECT*FROM tbl_products";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {

      while ($rows = mysqli_fetch_assoc($res)) {
        $id=$rows['Id'];
        $discount = $rows['discount'];
        $category = $rows['Category'];
        $item_name = $rows['item_name'];
        $price = $rows['price'];
        $image_name = $rows['image_name'];
    ?>
        <div class="product-item">
          <div class="overlay">
            <a href="productDetails.php" class="product-thumb">

              <img src="./images/products/<?php echo $image_name?>" alt="" />
            </a>
            <span class="discount"><?php echo $discount?>%</span>
          </div>
          <div class="product-info">
            <span><?php echo $category?></span>
            <a href="productDetails.php?Id=<?php echo $id?>"><?php echo $item_name?></a>
            <h4>$<?php echo $price?></h4>
          </div>
          <ul class="icons">
            <li><button class="product_btn"><i class="bx bx-heart"></i></button></li>
            <li><button class="product_btn"><i class="bx bx-search"></i></button></li>
            <li><button class="product_btn"><i class="bx bx-cart"></i></button></li>
          </ul>
        </div>
    <?php

      }
    }

    ?>


  </div>
</section>
<section class="pagination">
  <div class="container">
    <span>1</span> <span>2</span> <span>3</span> <span>4</span>
    <span><i class="bx bx-right-arrow-alt"></i></span>
  </div>
</section>
<?php include('partials/footer.php'); ?>
<script src="js/index.js"></script>

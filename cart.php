<?php
include('partials/menu.php');
include('config/constants.php');
?>
<title>Product Cart</title>
<!-- Cart Items -->
<div class="container cart">
  <table>
    <tr>
      <th>Product</th>
      <th>Quantity</th>
      <th>Subtotal</th>
    </tr>

    <?php
    $user_id = $_SESSION['valid'];

    $sql = "SELECT*FROM tbl_cart WHERE user_id='$user_id' ";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    $total = 0;
    $discount = 0;
    $sub_total2 = 0;
    while ($rows = mysqli_fetch_assoc($res)) {
      $discount = $discount + $rows['discount'];
      $sub_total2 = $sub_total2 + $rows['sub_total'];
      $total = $total + $rows['total'];
      $Id = $rows['Id'];
      $product_name = $rows['item_name'];
      $price = $rows['price'];
      $quantity = $rows['quantity'];
      $image_name = $rows['image_name'];
      $sub_total = $rows['sub_total'];


    ?>
      <tr>
        <td>
          <div class="cart-info">
            <img src="./images/products/<?php echo $image_name ?>" alt="" />
            <div>
              <p><?php echo $product_name; ?></p>
              <span>Price: $<?php echo $price ?></span> <br />
              <a href="delete_cart.php?Id=<?php echo $Id ?>">remove</a>
            </div>
          </div>
        </td>
        <td><input type="number" value="<?php echo $quantity; ?>" min="1" disabled /></td>
        <td>$<?php echo $sub_total ?></td>
      </tr>

    <?php
    }
    ?>
  </table>
  <div class="total-price">
    <table>
      <tr>
        <td>Subtotal</td>
        <td>$<?php echo $sub_total2 ?></td>
      </tr>
      <tr>
        <td>Discount</td>
        <td><?php echo $discount ?>%</td>
      </tr>
      <tr>
        <td>Total</td>
        <td>$<?php echo $total ?></td>
      </tr>
    </table>
    <a href="#" class="checkout btn">Proceed To Checkout</a>
  </div>
  <?php
  ?>
</div>

<!-- Latest Products -->
<section class="section featured">
  <div class="top container">
    <h1>Latest Products</h1>
    <a href="product.php" class="view-more">View more</a>
  </div>
  <div class="product-center container">
    <?php
    $sql = "SELECT*FROM tbl_products LIMIT 4";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {

      while ($rows = mysqli_fetch_assoc($res)) {
        $id = $rows['Id'];
        $discount = $rows['discount'];
        $category = $rows['Category'];
        $item_name = $rows['item_name'];
        $price = $rows['price'];
        $image_name = $rows['image_name'];
    ?>
        <div class="product-item">
          <div class="overlay">
            <a href="productDetails.php" class="product-thumb">

              <img src="./images/products/<?php echo $image_name ?>" alt="" />
            </a>
            <span class="discount"><?php echo $discount ?>%</span>
          </div>
          <div class="product-info">
            <span><?php echo $category ?></span>
            <a href="productDetails.php?Id=<?php echo $id ?>"><?php echo $item_name ?></a>
            <h4>$<?php echo $price ?></h4>
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

<?php include('partials/footer.php'); ?>
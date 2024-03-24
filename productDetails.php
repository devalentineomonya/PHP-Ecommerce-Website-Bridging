<?php
include('partials/menu.php');
include('config/constants.php');
?>
<title>SINGLE PRODUCT DETAILS </title>
<!-- Product Details -->
<?php
$Id = $_GET['Id'];
$sql =  "SELECT * FROM tbl_products WHERE Id=$Id";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if ($count > 0) {
  $rows = mysqli_fetch_assoc($res);
  $item_image = $rows['image_name'];
  $Category = $rows['Category'];
  $item_name = $rows['item_name'];
  $price = $rows['price'];
  $discount = $rows['discount'];
  $description = $rows['description'];
?>
  <section class="section product-detail">
    <div class="details container">
      <div class="left image-container">
        <div class="main">
          <img src="./images/products/<?php echo $item_image; ?>" id="zoom" alt="" />
        </div>
      </div>
      <div class="right">
        <span>Home/<?php echo $Category; ?></span>
        <h1><?php echo $item_name ?></h1>
        <div class="price">$<?php echo $price; ?></div>
        <form method="post" class="form">
          <div>
            <select>
              <option value="Select Size" selected disabled>
                Select Size
              </option>
              <option value="1">32</option>
              <option value="2">42</option>
              <option value="3">52</option>
              <option value="4">62</option>
            </select>
            <span><i class="bx bx-chevron-down"></i></span>
          </div>

          <input type="number" value="1" name="quantity" min=1 />
          <br><br>
          <button type="submit" name="submit" class="addCart">Add To Cart</button>
        </form>
        <h3>Product Detail</h3>
        <p>
          <?php
          echo $description;
          ?>
        </p>
        <?php
        if (isset($_POST['submit'])) {
          $quantity = $_POST['quantity'];
          if (empty($quantity) || $quantity < 0) {
            echo $_SESSION['add'] = "
            <div class='error'>
            Product Quantity is Required
            <div class='btn_close'>
            <a href='productDetails.php'
            >X</a></div>
            </div>";
          } else {
            $sub_total = $quantity * $price;
            $discount2 = $discount / 100;
            $total = $sub_total - ($sub_total * $discount2);
            $user_id = $_SESSION['valid'];
            $sql0 = "SELECT * FROM tbl_cart WHERE item_name = '$item_name' ";
            $res0 = mysqli_query($conn, $sql0);
            $count = mysqli_num_rows($res0);
            $rows0 = mysqli_fetch_assoc($res0);
            if ($count > 0) {
              $current_quantity = $rows0['quantity'];
              $new_quantity = $current_quantity + $quantity;
              $sub_total = $new_quantity * $price;
              $total = $sub_total - ($sub_total * $discount2);
              $sql01 = "UPDATE tbl_cart SET 
              quantity = '$new_quantity',
              sub_total='$sub_total',
              total ='$total' WHERE item_name = '$item_name'";
              $res01 = mysqli_query($conn,$sql01);
              if($res01>0){
                echo $_SESSION['add'] = "
                <div class='success'>
                Cart Updated Successfully
                <div class='btn_close'>
                <a href='productDetails.php'
                >X</a></div>
                </div>";
              }
            } else {
              $sql2 = "INSERT INTO tbl_cart SET
          item_name ='$item_name',
          price = '$price',
          quantity ='$quantity',
          sub_total='$sub_total',
          discount = '$discount',
          total = '$total',
          user_id = '$user_id',
          image_name = '$item_image'
          ";
              $res = mysqli_query($conn, $sql2);
              if ($res > 0) {
                echo $_SESSION['add'] = "
              <div class='success'>
              Added To Cart Successfully
              <div class='btn_close'>
              <a href='productDetails.php'
              >X</a></div>
              </div>";
              }
            }
          }
        }
        ?>
      </div>
    </div>
  </section>
<?php
}

?>


<!-- Related -->
<section class="section featured">
  <div class="top container">
    <h1>Related Products</h1>
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
            <li><i class="bx bx-heart"></i></li>
            <li><i class="bx bx-search"></i></li>
            <li><i class="bx bx-cart"></i></li>
          </ul>
        </div>
    <?php
      }
    }

    ?>

  </div>
</section>
<?php include('partials/footer.php'); ?>
<script src="js/zoomsl.min.js"></script>    <script>
      $(function () {
        console.log("hello");
        $("#zoom").imagezoomsl({
          zoomrange: [4, 4],
        });
      });
    </script>

<script src="js/index.js"></script>
<script src="js/slider.js"></script>
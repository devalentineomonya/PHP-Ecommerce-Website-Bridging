<?php
include('config/constants.php');
?>
<?php include('partials/menu.php'); ?>
<title>Welcome to Our Shop</title>
<div class="hero">
  <div class="glide" id="glide_1">
    <div class="glide__track" data-glide-el="track">
      <ul class="glide__slides">
        <li class="glide__slide">
          <div class="center">
            <div class="left">
              <span class="">New Inspiration 2020</span>
              <h1 class="">NEW COLLECTION!</h1>
              <p>Trending from men's and women's style collection</p>
              <a href="#" class="hero-btn">`SHOP NOW</a>
            </div>
            <div class="right">
              <img class="img1" src="./images/hero-1.png" alt="">
            </div>
          </div>
        </li>
        <li class="glide__slide">
          <div class="center">
            <div class="left">
              <span>New Inspiration 2020</span>
              <h1>THE PERFECT MATCH!</h1>
              <p>Trending from men's and women's style collection</p>
              <a href="#" class="hero-btn">SHOP NOW</a>
            </div>
            <div class="right">
              <img class="img2" src="./images/hero-2.png" alt="">
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
</header>

<!-- Categories Section -->
<section class="section category">
  <div class="cat-center">
    <div class="cat">
      <img src="./images/cat3.jpg" alt="" />
      <div>
        <p>WOMEN'S WEAR</p>
      </div>
    </div>
    <div class="cat">
      <img src="./images/cat2.jpg" alt="" />
      <div>
        <p>ACCESSORIES</p>
      </div>
    </div>
    <div class="cat">
      <img src="./images/cat1.jpg" alt="" />
      <div>
        <p>MEN'S WEAR</p>
      </div>
    </div>
  </div>
</section>
<section class="section new-arrival">

  <!-- New Arrivals -->

  <section class="section all-products" id="products">
    <div class="title">
      <h1>NEW ARRIVALS</h1>
      <p>All the latest picked from designer of our store</p>
    </div>
    <div class="product-center container">


      <?php
      $sql = "SELECT*FROM tbl_products";
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
  <!-- Promo -->

  <section class="section banner">
    <div class="left">
      <span class="trend">Trend Design</span>
      <h1>New Collection 2021</h1>
      <p>New Arrival <span class="color">Sale 50% OFF</span> Limited Time Offer</p>
      <a href="#" class="btn btn-1">Discover Now</a>
    </div>
    <div class="right">
      <img src="./images/banner.png" alt="">
    </div>
  </section>




  <!-- Featured -->

  <section class="section new-arrival">
    <div class="title">
      <h1>Featured</h1>
      <p>All the latest picked from designer of our store</p>
    </div>

    <div class="product-center">
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

  <!-- Contact -->
  <section class="section contact">
    <div class="row">
      <div class="col">
        <h2>EXCELLENT SUPPORT</h2>
        <p>We love our customers and they can reach us any time
          of day we will be at your service 24/7</p>
        <a href="" class="btn btn-1">Contact</a>
      </div>
      <div class="col">
        <form action="">
          <div>
            <input type="email" placeholder="Email Address">
            <a href="">Send</a>
          </div>
        </form>
      </div>
    </div>
  </section>
<?php include('partials/footer.php'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>

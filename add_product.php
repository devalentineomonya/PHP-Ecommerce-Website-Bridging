<?php
include("partials/menu.php");
include('config/constants.php');
?>
    <title>Add Products To Shop</title>
<div class="container">
   <div class="login-form">
      <form action="" method="post" enctype="multipart/form-data">

         <h1>Add Product</h1>

         <label for="product_name">Product Name</label>
         <input type="text" name="product_name" />


         <label for="price">price</label>
         <input type="number" name="price" id="">

         <label for="discount">Discount</label>
         <input type="number" name="discount" id="">

         <label for="Category">Category</label>
         <select name="category" id="">
            <?php
            $sql = "SELECT *FROM tbl_category WHERE active= 'Yes' ";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
            ?>
               <option value="choose">--Choose Product Category--</option>
               <?php
               $sn = 0;

               while ($data = mysqli_fetch_assoc($res)) {
                  $Id = $data['Id'];
                  $cat_name = $data['category_name'];
                  $sn++;
               ?>
                  <option value="<?php echo $cat_name; ?>"> <?php echo $sn; ?>.<?php echo $cat_name; ?></option>
               <?php
               }
            } else {

               ?>
               <option value="choose">--Choose Product Category--</option>
               <option value="choose">--No Category Found--</option>

            <?php
            }
            ?>
         </select>
         <label for="description">Description</label>
         <input class="input_description" type="message" name="description" id="">
         <label for="image">Product Image</label>
         <input type="file" class="upload_img" name="image">

         <div class="buttons">


            <a href="product.php"> <button type="button" class="cancelbtn">See Item</button></a>
            <button name="submit" type="submit" class="signupbtn">Add Item</button>
         </div>
      </form>
      <?php
      if (isset($_POST['submit'])) {
         if (empty($_POST['product_name'])) {
            echo $_SESSION['add'] = "
            <div class='error'>
            Product Name Is Required
            <div class='btn_close'>
            <a href='add_product.php'
            >X</a></div>
            </div>";
         } else if (empty($_POST['category'] || $_POST['category'] == 'choose')) {
            echo $_SESSION['add'] = "
            <div class='error'>
            Category Is Required
            <div class='btn_close'>
            <a href='add_product.php'
            >X</a></div>
            </div>";
         } else if (empty($_POST['price'])) {
            echo $_SESSION['add'] = "
               <div class='error'>
               Price Is Required
               <div class='btn_close'>
               <a href='add_product.php'
               >X</a></div>
               </div>";
         } else if (!isset($_FILES['image'])) {
            echo $_SESSION['add'] = "
            <div class='error'>
            Image Is Required
            <div class='btn_close'>
            <a href='add_product.php'
            >X</a></div>
            </div>";
         } else {
            $description = $_POST['description'];
            $product_name = $_POST['product_name'];
            $discount = $_POST['discount'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $image_name = $_FILES['image']['name'];

            $ext = end(explode('.', $image_name));

            $image_name = "Product" . rand(-9999, 9999) . '.' . $ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "images/products/$image_name";

            $upload = move_uploaded_file($source_path, $destination_path);
            $sql = "INSERT INTO tbl_products SET
            Category = '$category',
            item_name = '$product_name',
            price = '$price',
            image_name = '$image_name',
            discount = '$discount',
            description ='$description'
            ";
            $res = mysqli_query($conn, $sql);
            if ($res > 0) {
               echo $_SESSION['add'] = "
            <div class='success'>
            Product Added Successfully
            <div class='btn_close'>
            <a href='add_product.php'
            >X</a></div>
            </div>";
            } else {
               echo $_SESSION['add'] = "
          <div class='error'>
          FAILED TO ADD PRODUCT
          <div class='btn_close'>
          <a href='add_product.php'
          >X</a></div>
          </div>";
            }
         }
      }
      ?>
   </div>
</div>
<?php include("partials/footer.php"); ?>
<script src="js/index.js"></script>
<script src="js/slider.js"></script>
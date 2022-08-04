<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
};

if (isset($_POST['update_product'])) {

   $update_p_id = $_POST['update_p_id'];
   $name = mysqli_real_escape_string($conn, $_POST['product_name']);
   $details = mysqli_real_escape_string($conn, $_POST['product_description']);
   $product_category = $_POST['product_category'];
   $quantity = mysqli_real_escape_string($conn, $_POST['product_quantity']);
   $price = mysqli_real_escape_string($conn, $_POST['price']);

   mysqli_query($conn, "UPDATE `products` SET product_title = '$name', product_description= '$details', category_id= '$product_category', quantity = '$quantity', product_price = '$price' WHERE product_id = '$update_p_id'") or die('query failed');

   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folter = 'uploaded_img/' . $image;
   $old_image = $_POST['update_p_image'];

   if (!empty($image)) {
      if ($image_size > 2000000) {
         $message[] = 'Image File Size is too Large!';
      } else {
         mysqli_query($conn, "UPDATE `products` SET product_image = '$image' WHERE product_id = '$update_p_id'") or die('query failed');
         move_uploaded_file($image_tmp_name, $image_folter);
         unlink('uploaded_img/' . $old_image);
         $message[] = 'Image Updated Successfully!';
      }
   }

   $message[] = 'Product Updated Successfully!';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Product</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

   <?php @include 'admin_header.php'; ?>

   <section class="update-product">

      <?php

      $update_id = $_GET['update'];
      $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id = '$update_id'") or die('query failed');
      if (mysqli_num_rows($select_products) > 0) {
         while ($fetch_products = mysqli_fetch_assoc($select_products)) {
      ?>

            <form action="" method="post" enctype="multipart/form-data">
               <img src="uploaded_img/<?php echo $fetch_products['product_image']; ?>" class="image" alt="">
               <input type="hidden" value="<?php echo $fetch_products['product_id']; ?>" name="update_p_id">
               <input type="hidden" value="<?php echo $fetch_products['product_image']; ?>" name="update_p_image">
               <input type="text" class="box" value="<?php echo $fetch_products['product_title']; ?>" required placeholder="update product name" name="product_name">
               <textarea name="product_description" class="box" required placeholder="update product details" cols="30" rows="10"><?php echo $fetch_products['product_description']; ?></textarea>


               <select name="product_category" id="" class="box">
                  <option value="">Select Category</option>

                  <!---Fetch Data from DB -->

                  <?php

                  $select_query = "Select * from `categories`";
                  $result_query = mysqli_query($conn, $select_query);
                  while ($row = mysqli_fetch_assoc($result_query)) {
                     $category_title = $row['category_title'];
                     $category_id = $row['category_id'];
                     echo "<option value='$category_id'> $category_title </option>";
                  }

                  ?>
               </select>

               <input type="number" min="0" value="<?php echo $fetch_products['quantity']; ?>" placeholder="Enter Product Quantity" class="box" name="product_quantity">

               <input type="number" min="0" class="box" value="<?php echo $fetch_products['product_price']; ?>" required placeholder="update product price" name="price">

               <input type="file" accept="image/jpg, image/jpeg, image/png" class="box" name="image">
               <input type="submit" value="update product" name="update_product" class="btn">
               <a href="admin_products.php" class="option-btn">Go Back</a>
            </form>

      <?php
         }
      } else {
         echo '<p class="empty">No Products Selected!</p>';
      }
      ?>

   </section>













   <script src="js/admin_script.js"></script>

</body>

</html>
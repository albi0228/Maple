<?php

@include 'config.php';
@include './admin_function/admin_common_function.php';

if (isset($_POST['insert_product'])) {

   $product_title = $_POST['product_title'];
   $description = $_POST['description'];
   $product_keywords = $_POST['product_keywords'];
   $product_category = $_POST['product_category'];
   $product_price = $_POST['product_price'];
   $quantity = $_POST['quantity'];
   $product_status = 'true';

   //accessing images
   $product_image = $_FILES['product_image']['name'];



   //accessing image tmp name
   $temp_image = $_FILES['product_image']['tmp_name'];


   //checking empty condition
   if (
      $product_title == '' or $description == '' or
      $product_keywords == '' or $product_category == '' or
      $product_price == '' or $quantity == '' or $product_image == ''
   ) {
      echo "<script>alert('Please fill all the available fields.</script>";
      exit();
   } else {
      move_uploaded_file($temp_image, "uploaded_img/$product_image");

      //insert query

      $insert_products = "insert into `products` (product_title, product_description, product_keywords, category_id, 
       product_image, product_price, quantity, date, status) 
       values ('$product_title', '$description', '$product_keywords', 
       '$product_category', '$product_image',
   '$product_price', '$quantity', NOW(), '$product_status')";
      $result_query = mysqli_query($conn, $insert_products);
      if ($result_query) {
         echo "<script>alert('Successfully inserted the products')</script>";
      }
   }
}

if (isset($_GET['delete'])) {

   $delete_id = $_GET['delete'];
   $select_delete_image = mysqli_query($conn, "SELECT product_image FROM `products` WHERE product_id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
   unlink('uploaded_img/' . $fetch_delete_image['product_image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE product_id = '$delete_id'") or die('query failed');
   mysqli_query($conn, "DELETE FROM `wishlist` WHERE pid = '$delete_id'") or die('query failed');
   mysqli_query($conn, "DELETE FROM `cart` WHERE pid = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

   <?php @include 'admin_header.php'; ?>

   <section class="add-products">

      <form action="" method="POST" enctype="multipart/form-data">
         <h3>Add New Product</h3>
         <input type="text" id="product_title" class="box" required placeholder="Enter Product Name" name="product_title">

         <textarea name="description" class="box" required placeholder="Enter Product Details" cols="30" rows="10" id="description"></textarea>

         <input type="text" name="product_keywords" id="product_keywords" class="box" placeholder="Enter Product Keywords" required>


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

         <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="product_image" id="product_image">

         <input type="number" min="0" value="quantity" placeholder="Enter Product Quantity" class="box" name="quantity" class="qty">

         <input type="text" name="product_price" id="product_price" class="box" placeholder="Enter Product Price" required>

         <input type="submit" value="Insert Products" name="insert_product" class="btn">
      </form>

   </section>

   <section class="show-products">

      <div class="box-container">

         <?php
         //calling 
         get_admin_all_products();

         ?>


   </section>












   <script src="js/admin_script.js"></script>

</body>

</html>
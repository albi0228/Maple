<?php


function getproducts()
{
    global $conn;

    $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 3") or die('query failed');
    if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
?>
            <form action="" method="POST" class="box">
                <a href="view_page.php?pid=<?php echo $fetch_products['product_id']; ?>" class="fas fa-eye"></a>
                <div class="price">रू<?php echo $fetch_products['product_price']; ?>/-</div>
                <img src="uploaded_img/<?php echo $fetch_products['product_image']; ?>" alt="" class="image">
                <div class="name"><?php echo $fetch_products['product_title']; ?></div>
                <input type="number" name="product_quantity" value="1" min="0" class="qty">
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['product_id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['product_title']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['product_price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['product_image']; ?>">
                <input type="submit" value="add to wishlist" name="add_to_wishlist" class="option-btn">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
<?php
        }
    } else {
        echo '<p class="empty">no products added yet!</p>';
    }
}
?>


<?php

//getting all products for Furnitures
function get_all_products()
{
    global $conn;

    $select_products = mysqli_query($conn, "SELECT * FROM `products` order by rand()") or die('query failed');
    if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
?>
            <form action="" method="POST" class="box">
                <a href="view_page.php?pid=<?php echo $fetch_products['product_id']; ?>" class="fas fa-eye"></a>
                <div class="price">रू <?php echo $fetch_products['product_price']; ?>/-</div>
                <img src="uploaded_img/<?php echo $fetch_products['product_image']; ?>" alt="" class="image">
                <div class="name"><?php echo $fetch_products['product_title']; ?></div>
                <input type="number" name="product_quantity" value="1" min="0" class="qty">
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['product_id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['product_title']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['product_price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['product_image']; ?>">
                <input type="submit" value="add to wishlist" name="add_to_wishlist" class="option-btn">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
<?php
        }
    } else {
        echo '<p class="empty">no products added yet!</p>';
    }
}
?>


<!-- //getting unique categories -->



<!-- displaying categories in second topnav -->

<?php
function getcategories()
{
    global $conn;
    $select_categories = "Select * from `categories`";
    $result_categories = mysqli_query($conn, $select_categories);
    $data = mysqli_fetch_assoc($result_categories);
    // echo $row_data['category_title'];
    while ($data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $data['category_title'];
        $category_id = $data['category_id'];
        echo "<div class='nav-item'>
        <a href='products.php?category=$category_id' class='nav-link text-dark text-center' style='font-size: 15px;'> $category_title </a>
    </div>";
    }
}
?>



<!-- getting unique categories -->
<?php
function get_unique_categories()
{
    global $conn;

    if (isset($_GET['category'])) {

        $category_id = $_GET['category'];
        $select_query = "Select * from `products` where category_id = $category_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo '<p class="empty">no products added yet!</p>';
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            // $product_keywords = $row['product_keywords'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo "<form action='' method='POST' class='box'>
                    <a href='view_page.php?pid=$product_id' class='fas fa-eye'></a>
                    <div class='price'>रू $product_price/-</div>
                    <img src='uploaded_img/$product_image' alt='' class='image'>
                    <div class='name'>$product_title</div>
                    <input type='number' name='product_quantity' value='1' min='0' class='qty'>
                    <input type='hidden' name='product_id' value='$product_id'>
                    <input type='hidden' name='product_name' value='$product_title'>
                    <input type='hidden' name='product_price' value='$product_price'>
                    <input type='hidden' name='product_image' value='$product_image'>
                    <input type='submit' value='add to wishlist' name='add_to_wishlist' class='option-btn'>
                    <input type='submit' value='add to cart' name='add_to_cart' class='btn'>
                </form>";
        }
    }
}

function checkProductAvailabilityByProductId()
{
}

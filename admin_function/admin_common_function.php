<?php

//getting all products for Furnitures
function get_admin_all_products()
{

    global $conn;

    $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
    if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
?>
            <div class="box">
                <div class="price">रू<?php echo $fetch_products['product_price']; ?>/-</div>
                <img class="image" src="uploaded_img/<?php echo $fetch_products['product_image']; ?>" alt="">
                <div class="name"><?php echo $fetch_products['product_title']; ?></div>
                <div class="description"><?php echo $fetch_products['product_description']; ?></div>
                <a href="admin_update_product.php?update=<?php echo $fetch_products['product_id']; ?>" class="option-btn">Update</a>
                <a href="admin_products.php?delete=<?php echo $fetch_products['product_id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">Delete</a>
            </div>
<?php
        }
    } else {
        echo '<p class="empty">no products added yet!</p>';
    }
}
?>
</div>
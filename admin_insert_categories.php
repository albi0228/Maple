<?php

@include 'config.php';

if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    //select data from the database
    $select_query = "Select * from `categories` where category_title = '$category_title'";
    $result_select = mysqli_query($conn, $select_query);

    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This Category is present inside the Database.')</script>";
    } else {

        $insert_query = "insert into `categories` (category_title) values ('$category_title')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('Category has been inserted successfully.')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="css/admin_style.css">




    <style>
        h3 {
            font-size: 30px;
        }
    </style>

</head>


<body>

    <?php @include 'admin_header.php'; ?>

    <section class="add-categories">

        <h3 class="text-center">Insert Categories</h3>
        <form action="" method="POST" class="mb-2">
            <div class="input-group w-90 mb-2">
                <!--mb- margin bottom-->
                <!-- <span class="input-group-text bg-secondary" id="basic-addon1">
                    <i class="fa-solid fa-receipt"></i> -->
                </span>
                <input type="text" class="box" name="cat_title" placeholder="Insert categories" aria-label="username" aria-describedby="basic-addon1">
            </div>



            <input type="submit" class="btn" name="insert_cat" value="Insert Categories">

            <!-- <button class="bg-secondary p-2 my-3 border-0">Insert Categories</button> -->
            </div>



    </section>



    <script src="js/admin_script.js"></script>

</body>

</html>
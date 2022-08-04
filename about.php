<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php @include 'header.php'; ?>

    <section class="heading">
        <h3>About us</h3>
    </section>

    <section class="about">

        <div class="flex">

            <div class="image">
                <img src="images/1.jpg" alt="">
            </div>

            <div class="content">
                <h3>why choose us?</h3>
                <p>You can choose from different remarkable themes that you would want your home to have.</p>
                <a href="shop.php" class="btn">shop now</a>
            </div>

        </div>

        <div class="flex">

            <div class="content">
                <h3>what we provide?</h3>
                <p>We provide high quality furnitures at an affordable price here!</p>
                <a href="contact.php" class="btn">contact us</a>
            </div>

            <div class="image">
                <img src="images/8.jpg" alt="">
            </div>

        </div>

        <div class="flex">

            <div class="image">
                <img src="images/9.jpg" alt="">
            </div>

            <div class="content">
                <h3>who we are?</h3>
                <p>Maples Meubles continuously expands its market in Nepal making the brand more accessible to its customers.We cater to both condominium
                    and residential markets selling quality and space saving furniture that will satisfy and fit any lifestyle.All items
                    went through and passed an international quality inspection making the brand known for its European Class Standard which
                    indicates a low formaldehyde emission. Meaning, there is a guarantee that each piece of furniture is safe for you and your family's
                    health.Being the pioneer furniture brand to offer free furniture layout design for your condo and any kind of house, Maples Meubles
                    aims to create added value for its customers. This service is made easy with the help of skilled in-house interior design specialists
                    that shares their professional experience and expertise to every customer in need of a designed home.</p>
                <a href="#reviews" class="btn">clients reviews</a>
            </div>

        </div>

    </section>

    <section class="reviews" id="reviews">

        <h1 class="title">client's reviews</h1>

        <div class="box-container">

            <div class="box">
                <img src="images/pic-1.png" alt="">
                <p>I love the furnitures here.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Agust D</h3>
            </div>

            <div class="box">
                <img src="images/pic-2.png" alt="">
                <p>this is the best site ever!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>j-HOPE</h3>
            </div>

            <div class="box">
                <img src="images/pic-3.png" alt="">
                <p>the customer service is so good.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Jaykay</h3>
            </div>


        </div>

    </section>











    <?php @include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>
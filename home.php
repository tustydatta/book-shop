<?php

include 'config.php';

if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}

if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart!';
    }else{
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id','$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'product added to cart!';
    }
    header('location: home.php');
}
?>

<?php include 'header.php'; ?>

<section class="home">
    <div class="content">
        <div id="carouselExampleIndicators" class="carousel slide h-50" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100 h-50" src="image/uploaded_img/stall/s1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="caption">HAND PICKED BOOK TO YOUR DOOR.</h2>
                        <p class="caption_p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <a href="about.php" class="white-btn">discover more</a>
                    </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 h-50" src="image/uploaded_img/stall/s2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="caption">HAND PICKED BOOK TO YOUR DOOR.</h2>
                        <p class="caption_p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <a href="about.php" class="white-btn">discover more</a>
                    </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 h-50" src="image/uploaded_img/stall/s3.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="caption">HAND PICKED BOOK TO YOUR DOOR.</h2>
                        <p class="caption_p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <a href="about.php" class="white-btn">discover more</a>
                    </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 h-50" src="image/uploaded_img/stall/s4.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="caption">HAND PICKED BOOK TO YOUR DOOR.</h2>
                        <p class="caption_p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <a href="about.php" class="white-btn">discover more</a>
                    </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 h-50" src="image/uploaded_img/stall/s5.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="caption">HAND PICKED BOOK TO YOUR DOOR.</h2>
                        <p class="caption_p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <a href="about.php" class="white-btn">discover more</a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<section>
    
</section>

<section class="products">

    <h1 class="title">latest products</h1>

    <div class="box-container">
        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){

        ?>
        <form action="" method="post" class="box">
            <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
            <input type="number" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
        </form>
        <?php
                }

            }else{
                echo '<p class="empty">no products added yet!</p>';
            }
        ?>
    </div>
    <div class="load-more" style="margin-top:2rem; text-align:center">
        <a href="shop.php" class="option-btn">load more</a>
    </div>

</section>

<section class="about">
    <div class="flex">
        <div class="image">
            <img src="image/uploaded_img/stall/09.jpg" alt="">
        </div>
        <div class="content">
            <h3>about us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque laboriosam eveniet aspernatur inventore voluptatem mollitia veritatis ipsum aliquam earum necessitatibus quasi, obcaecati debitis officia rerum!</p>
            <a href="about.php" class="btn">read more</a>
        </div>
    </div>
</section>

<section class="home-contact">
    <div class="content">
        <h3>have any questions?</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro aspernatur quaerat voluptate qui distinctio provident accusamus, dolorum rerum amet aut.</p>
        <a href="contact.php" class="white-btn">contact us</a>
    </div>
</section>


<?php include 'footer.php'?>





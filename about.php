<?php
include 'config.php';

$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
}
include 'header.php';
?>

<div class="heading">
    <h3>about us</h3>
    <p><a href="home.php">home</a> / about</p>
</div>

<section class="about">
    <div class="flex">
        <div class="image">
            <img src="image/uploaded_img/stall/09.jpg" alt="">
        </div>
        <div class="content">
            <h3>why choose us</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam fuga maiores culpa sint facere! Iure quis maiores ab incidunt veritatis illo ducimus et iusto, voluptatum voluptas ratione, id possimus ipsum enim facilis. Et, sint doloribus.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque laboriosam eveniet aspernatur inventore voluptatem mollitia veritatis ipsum aliquam earum necessitatibus quasi, obcaecati debitis officia rerum!</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>
    </div>
</section>

<section class="reviews">
    <h1 class="title">client's reviews</h1>
    <div class="box-container">

        <?php
            $name = ['john deo', 'mili', 'shmita', 'jeni', 'jerry', 'Janbhi'];
            $img = ['07', '02', '03', '04', '05', '06'];

            // for ($i=0; $i <6 ; $i++) { 

            foreach ($name as $key => $person_name) {
        ?>

        <div class="box">
            <!-- <img src="image/uploaded_img/people/<?= $img[$i] ?>.jpg" alt=""> -->
            <img src="image/uploaded_img/people/<?= $img[$key] ?>.jpg" alt="">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. At, quaerat labore. Blanditiis, accusamus. Qui saepe porro odit quod nam? Illo.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <!-- <h3><?= $name[$i] ?></h3> -->
            <h3><?= $person_name ?></h3>
        </div>
        <?php } ?>
        
    </div>
</section>

<section class="authors">
    <h1 class="title">greate authors</h1>
    <div class="box-container">

        <?php
            $arr = [
                ['john deo', 'Virat', 'Zeniliya', 'Alexa', 'Xenifa', 'Fardin'],
                ['02','03','04','05','06','07']
            ];

            // foreach ($arr[0] as $key => $value) {
                // echo $value;
                // echo $arr[0][$key];            
                // echo $arr[1][$key];    

            for ($i=0; $i <6; $i++) { 
                     
        ?>

        <div class="box">
            <!-- <img src="image/uploaded_img/people/author_<?= $arr[1][$key] ?>.jpg" alt=""> -->
            <img src="image/uploaded_img/people/author_<?= $arr[1][$i] ?>.jpg" alt="">
            <div class="share">
                <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
            </div>
            <!-- <h3><?= $arr[0][$key] ?></h3> -->
            <h3><?= $arr[0][$i] ?></h3>
        </div>

        <?php
            }
        ?>

    </div>
</section>

<?php include 'footer.php'?>



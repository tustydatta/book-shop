<?php

include 'config.php';

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('localtion:login.php');
}
?>

<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
            <span>'.$message.'</span>
            <i class="fa fa-times" onclick = "this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" type="text/css" href="fontawesome2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<header class="header">
    <div class="header-1">
        <div class="flex">
            <div class="share">

                <?php
                $select_icon = mysqli_query($conn, "SELECT * FROM `header_icon`") or die('query failed');
                if(mysqli_num_rows($select_icon) > 0) 
                {
                    while($data = mysqli_fetch_assoc($select_icon))
                    {
                ?>

                    <a href="https://www.<?= $data['icon_url'] ?>"><i class="fab fa-<?= $data['icon_name']?>"></i></a>

                <?php     
                    }
                }
                ?>
                <!-- <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a> -->
            </div>

            <p><a href="logout.php">logout</a></p>
            <!-- <p> new <a href="login.php">login</a> | <a href="register.php">register</a></p> -->
        </div>
    </div>

    <div class="header-2">
        <div class="flex">
            <a href="home.php" class="logo">Bookly.</a>
            <?php
                $url = $_SERVER['REQUEST_URI'];
                $str1 = explode("/",$url);
                $str2 = explode(".",$str1[2]);
                $active_menu = $str2[0];
            ?>
            <nav class="navbar">

                <?php
                $select_data = mysqli_query($conn, "SELECT * FROM `header_menu` WHERE `status`= '1' ") or die('query failed');
                if(mysqli_num_rows($select_data) > 0) 
                {
                    while($data = mysqli_fetch_assoc($select_data))
                    {
                ?>

                    <a href="<?= $data['url'] ?>" class="<?= ($active_menu == $data['menu_name'])? 'activeMenu' : '' ?>"><?= $data['menu_name'] ?></a>

                <?php     
                    }
                }
                ?>
                <!-- <a href="about.php" class="<?= ($active_menu == 'about')? 'activeMenu' : '' ?>">about</a>
                <a href="shop.php" class="<?= ($active_menu == 'shop')? 'activeMenu' : '' ?>">shop</a>
                <a href="contact.php" class="<?= ($active_menu == 'contact')? 'activeMenu' : '' ?>">contact</a>
                <a href="orders.php" class="<?= ($active_menu == 'orders')? 'activeMenu' : '' ?>">orders</a> -->
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <a href="search_page.php" class="fas fa-search"></a>
                <div id="user-btn" class="fas fa-user"></div>
                <?php
                    $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                    $cart_rows_number = mysqli_num_rows($select_cart_number);
                ?>
                <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_rows_number; ?>)</span></a>
            </div>
            <div class="user-box">
                <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                <a href="logout.php" class="delete-btn">logout</a>
            </div>
        </div>
    </div>
</header>
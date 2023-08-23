<?php
include 'config.php';

$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
    header('location:login.php');
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

    // Title dynamic
    $url = $_SERVER['REQUEST_URI'];
    $str1 = explode("/",$url);
    $str2 = explode(".",$str1[2]);
    $str3 = str_replace('_', ' ', $str2[0]);
    $page_name = ucwords($str3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_name)? $page_name : 'Admin Dynamic' ?></title>
    <link rel="stylesheet" type="text/css" href="fontawesome2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome2/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<header class="header">
    <div class="flex">
        <a href="admin_page.php" class="logo">Admin<span>panel</span></a>
        
        <nav class="navbar">
            <a href="admin_page.php">home</a>
            <a href="admin_products.php">products</a>
            <a href="admin_orders.php">orders</a>
            <a href="admin_users.php">users</a>
            <a href="admin_contacts.php">messages</a>
            <a href="admin_page_dynamic.php">Dynamic</a>
        </nav>

        <div class="icons">
            <div id="menu-btn"><i class="fa fa-bars"></i></div>
            <div id="user-btn"><i class="fa fa-user"></i></div>
        </div>

        <div class="account-box">
            <p>username : <span><?php echo $_SESSION['admin_name'];?></span></p>
            <p>email : <span><?php echo $_SESSION['admin_email'];?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
        </div>

    </div>
</header>
<?php
include 'config.php';

$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_users.php');
}

?>

    <?php include 'admin_header.php';?>

    <section class="users">
        <h1 class="title">user accounts</h1>
        <div class="box-container">
            <?php
                $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                while($fetch_users = mysqli_fetch_assoc($select_users)){
            ?>
            <div class="box">
                <p>username : <span><?php echo $fetch_users['name']; ?></span></p>
                <p>email : <span><?php echo $fetch_users['email']; ?></span></p>
                <p>user type : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['user_type']; ?></span></p>
                <a href="admin_users.php?delete=<?php echo $fetch_users['id'];?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>

            </div>
            <?php
                };
            ?>
        </div>
    </section>

   <?php include 'admin_footer.php';?>
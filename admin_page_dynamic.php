<?php 
include 'admin_header.php';
include 'admin_left_side.php';

if(isset($_POST['menu_add'])){
	$menu_name = mysqli_real_escape_string($conn, $_POST['menu_name']);
	$url = $_POST['url'];
	$status = $_POST['status'];
    
    $add_query = mysqli_query($conn, "INSERT INTO `header_menu`(menu_name, url, status) VALUES('$menu_name', '$url', '$status')") or die('query failed');

    if ($add_query) {
        $_SESSION['message'] = 'New Menu added!';
    } else {
        $_SESSION['message'] = 'New Menu could not be added!';
    }
}

if(isset($_POST['menu_edit'])){
	$menu_name = mysqli_real_escape_string($conn, $_POST['menu_name']);
	$url = $_POST['url'];
	$status = $_POST['status'];
	$menu_id = $_POST['id'];
	//$menu_id = 2;


    $update_query = mysqli_query($conn, "UPDATE `header_menu` SET menu_name = '$menu_name', url = '$url', status = '$status' WHERE id = '$menu_id'") or die('query failed');

    if ($update_query) {
        $_SESSION['message'] = 'New Menu Updated!';
    } else {
        $_SESSION['message'] = 'New Menu could not be Updated!';
    }
}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    mysqli_query($conn, "DELETE FROM `header_menu` WHERE id = '$id'") or die('query failed');
    header('location:admin_page_dynamic.php');
}

?>


  <div class="col-sm-9">
  	
  	<div class="card mr-4">
	  <div class="card-header bg-info text-white font-weight-bold">User menu list</div>
	  <div class="card-body">

	  	<?php
	  		if(isset($_SESSION['message'])){
	  	?>
	  		<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <?= $_SESSION['message'] ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
	  	<?php
			}
	  	?>
	  	

	  	<div class="text-right">
	  		<a href="admin_page_dynamic_user_menu.php" type="button" class="btn btn-lg btn-info m-2">Add Menu</a>
	  	</div>
	  	
	  	<table class="table table-hover">
		    <thead>
		      <tr>
		        <th>Menu Name</th>
		        <th>URL</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>

		    	<?php
                $select_data = mysqli_query($conn, "SELECT * FROM `header_menu`") or die('query failed');
                if(mysqli_num_rows($select_data) > 0){
                    while($data = mysqli_fetch_assoc($select_data)){
            	?>

		      <tr>
		        <td><?= $data['menu_name'] ?></td>
		        <td><?= $data['url'] ?></td>
		        <td>
		        	<span class="text-<?= ($data['status'] == 1)? 'success' : 'danger' ?>">
		        		<?= ($data['status'] == 1)? 'Active' : 'Inactive' ?>
		        	</span>
		        </td>
		        <td>
		        	<a href="admin_page_dynamic_user_menu_edit.php?id=<?= $data['id'] ?>" class="btn btn-outline-secondary">Edit</a>
		        	<a href="admin_page_dynamic.php?delete_id=<?= $data['id'] ?>" class="btn btn-outline-danger">Delete</a>
		        </td>
		      </tr>

		      <?php     
                	}
	            }else{
	                echo '<p class="empty">no product added yet</p>';
	            }
	            ?>
		      
		    </tbody>
		  </table>
	  </div>
	</div>
  </div>
</div>

<?php include 'admin_footer.php';?>
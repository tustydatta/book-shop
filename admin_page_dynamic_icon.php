<?php 
include 'admin_header.php';
include 'admin_left_side.php';

if(isset($_POST['icon_add'])){
	$icon_name = mysqli_real_escape_string($conn, $_POST['icon_name']);
	$icon_url = $_POST['icon_url'];
	$class_name = $_POST['class_name'];
    
    $add_icon = mysqli_query($conn, "INSERT INTO `header_icon`(icon_name, icon_url, class_name) VALUES('$icon_name', '$icon_url', '$class_name')") or die('query failed');


    if ($add_icon) {
        $_SESSION['message'] = 'New icon added!';
    } else {
        $_SESSION['message'] = 'New icon could not be added!';
    }
}

if(isset($_POST['icon_edit'])){
	$icon_name = mysqli_real_escape_string($conn, $_POST['icon_name']);
	$icon_url = $_POST['icon_url'];
	$class_name = $_POST['class_name'];
	$icon_id = $_POST['id'];
	//$menu_id = 2;


    $update_icon = mysqli_query($conn, "UPDATE `header_icon` SET icon_name = '$icon_name', icon_url = '$icon_url', class_name = '$class_name' WHERE id = '$icon_id'") or die('query failed');

    if ($update_icon) {
        $_SESSION['message'] = 'New Menu Updated!';
    } else {
        $_SESSION['message'] = 'New Menu could not be Updated!';
    }
}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    mysqli_query($conn, "DELETE FROM `header_icon` WHERE id = '$id'") or die('query failed');
    header('location:admin_page_dynamic_icon.php');
}

?>


  <div class="col-sm-9">
  	
  	<div class="card mr-4">
	  <div class="card-header bg-info text-white font-weight-bold">Header icon list</div>
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
	  		<a href="admin_page_dynamic_icon_add.php" type="button" class="btn btn-lg btn-info m-2">Add Icon</a>
	  	</div>
	  	
	  	<table class="table table-hover">
		    <thead>
		      <tr>
		        <th>Icon Name</th>
		        <th>URL</th>
		        <th>Class</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>

		    	<?php
                $select_data = mysqli_query($conn, "SELECT * FROM `header_icon`") or die('query failed');
                if(mysqli_num_rows($select_data) > 0){
                    while($data = mysqli_fetch_assoc($select_data)){
            	?>

		      <tr>
		        <td><?= $data['icon_name'] ?></td>
		        <td><?= $data['icon_url'] ?></td>
		        <td><?= $data['class_name'] ?></td>
		        <td>
		        	<a href="admin_page_dynamic_icon_edit.php?id=<?= $data['id'] ?>" class="btn btn-outline-secondary">Edit</a>
		        	<a href="admin_page_dynamic_icon.php?delete_id=<?= $data['id'] ?>" class="btn btn-outline-danger">Delete</a>
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
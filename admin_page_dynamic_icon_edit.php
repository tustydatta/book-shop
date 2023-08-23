<?php 
include 'admin_header.php';
include 'admin_left_side.php';

$id = $_GET['id'];
$select_data = mysqli_query($conn, "SELECT * FROM `header_icon` WHERE `id`= '$id' ") or die('query failed');
if(mysqli_num_rows($select_data) > 0){

	$data = mysqli_fetch_row($select_data);

}

?>

  <div class="col-sm-9">
  	
  	<div class="card mr-4">
	  <div class="card-header bg-info text-white font-weight-bold">Header icon Edit</div>
	  <div class="card-body">

	  	
	  	<form action="admin_page_dynamic_icon.php" method="post">
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Icon Name</label>
			    <input type="text" name="icon_name" class="form-control form-control-lg" value="<?= $data[1] ?>">
			  </div>

			  <div class="form-group">
			    <label for="exampleFormControlInput1">URL</label>
			    <input type="text" name="icon_url" class="form-control form-control-lg" value="<?= $data[2] ?>">
			  </div>

			  <div class="form-group">
			    <label for="exampleFormControlInput1">Class Name</label>
			    <input type="text" name="class_name" class="form-control form-control-lg" value="<?= $data[3] ?>">
			  </div>

			  <input type="hidden" name="id" value="<?= $data[0] ?>">

			  <input type="submit" class="btn btn-lg btn-info m-2" value="Save" name="icon_edit">
			  
			</form>
	  </div>
	</div>
  </div>
</div>

<?php include 'admin_footer.php';?>
<?php 
include 'admin_header.php';
include 'admin_left_side.php';

$id = $_GET['id'];
$select_data = mysqli_query($conn, "SELECT * FROM `header_menu` WHERE `id`= '$id' ") or die('query failed');
if(mysqli_num_rows($select_data) > 0){

	$data = mysqli_fetch_row($select_data);

}

?>

  <div class="col-sm-9">
  	
  	<div class="card mr-4">
	  <div class="card-header bg-info text-white font-weight-bold">User menu Edit</div>
	  <div class="card-body">

	  	
	  	<form action="admin_page_dynamic.php" method="post">
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Menu Name</label>
			    <input type="text" name="menu_name" class="form-control form-control-lg" value="<?= $data[1] ?>">
			  </div>

			  <div class="form-group">
			    <label for="exampleFormControlInput1">URL</label>
			    <input type="text" name="url" class="form-control form-control-lg" value="<?= $data[2] ?>">
			  </div>

			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Status</label>
			    <select class="form-control" name="status">
			      <option value="1" <?= ($data[3] == '1')? 'selected' : '' ?>>Active</option>
			      <option value="0" <?= ($data[3] == '0')? 'selected' : '' ?>>Inactive</option>
			    </select>
			  </div>

			  <input type="hidden" name="id" value="<?= $data[0] ?>">

			  <input type="submit" class="btn btn-lg btn-info m-2" value="Save" name="menu_edit">
			  
			</form>
	  </div>
	</div>
  </div>
</div>

<?php include 'admin_footer.php';?>
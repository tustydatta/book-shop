<?php 
include 'admin_header.php';
include 'admin_left_side.php';


?>

  <div class="col-sm-9">
  	
  	<div class="card mr-4">
	  <div class="card-header bg-info text-white font-weight-bold">User menu list</div>
	  <div class="card-body">

	  	
	  	<form action="admin_page_dynamic.php" method="post">
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Menu Name</label>
			    <input type="text" name="menu_name" class="form-control form-control-lg">
			  </div>

			  <div class="form-group">
			    <label for="exampleFormControlInput1">URL</label>
			    <input type="text" name="url" class="form-control form-control-lg">
			  </div>

			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Status</label>
			    <select class="form-control" name="status">
			      <option value="1">Active</option>
			      <option value="0">Inactive</option>
			    </select>
			  </div>

			  <input type="submit" class="btn btn-lg btn-info m-2" value="Save" name="menu_add">
			  
			</form>
	  </div>
	</div>
  </div>
</div>

<?php include 'admin_footer.php';?>
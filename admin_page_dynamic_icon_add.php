<?php 
include 'admin_header.php';
include 'admin_left_side.php';


?>

  <div class="col-sm-9">
  	
  	<div class="card mr-4">
	  <div class="card-header bg-info text-white font-weight-bold">Header icon add</div>
	  <div class="card-body">

	  	
	  	<form action="admin_page_dynamic_icon.php" method="post">
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Icon Name</label>
			    <input type="text" name="icon_name" class="form-control form-control-lg">
			  </div>

			  <div class="form-group">
			    <label for="exampleFormControlInput1">URL</label>
			    <input type="text" name="icon_url" class="form-control form-control-lg">
			  </div>

			  <div class="form-group">
			    <label for="exampleFormControlInput1">Class name</label>
			    <input type="text" name="class_name" class="form-control form-control-lg">
			  </div>


			  <input type="submit" class="btn btn-lg btn-info m-2" value="Save" name="icon_add">
			  
			</form>
	  </div>
	</div>
  </div>
</div>

<?php include 'admin_footer.php';?>
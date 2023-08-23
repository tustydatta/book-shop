<div class="row mt-4" style="font-size: 1.6rem;">
  <div class="col-sm-3">
  	<ul class="list-group">
  		<?php
        $url = $_SERVER['REQUEST_URI'];
        $str1 = explode("/",$url);
        $str2 = explode(".",$str1[2]);
        $active_menu = $str2[0];

        $menu_list = [
        		["admin_page_dynamic","admin_page_dynamic_user_menu", "admin_page_dynamic_user_menu_edit"],
        		["admin_page_dynamic_icon", "admin_page_dynamic_icon_add", "admin_page_dynamic_icon_edit"]
        ];
      ?>



	  <a href="admin_page_dynamic.php"><li class="list-group-item <?= (in_array($active_menu, $menu_list[0]))? 'active' : '' ?>">User Menu</li></a>
	  <a href="admin_page_dynamic_icon.php"><li class="list-group-item <?= (in_array($active_menu, $menu_list[1]))? 'active' : '' ?>">Header Icon</li></a>
	</ul>
  </div>
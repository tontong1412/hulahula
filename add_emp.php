<?php
	  //add employee
	  $new_id =mysql_result(mysql_query("Select Max(ID)+1 as MaxID from  std"),0,"MaxID");
	  $addEmpQuery ="Insert into employee
	  ?>
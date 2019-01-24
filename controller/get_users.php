<?php
        include '../model/get_users.inc.php';
        $getUserObject= new GetUserTable();
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'name';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	$offset = ($page-1)*$rows;
       
	

            
        
        $result=$getUserObject->getUser($rows,$sort,$order,$offset);
        echo $result;
	
	
	

?>
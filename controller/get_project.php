<?php
        include '../model/get_project.inc.php';
        $getProjectObject= new GetProjectDetails();
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	$offset = ($page-1)*$rows;
       
	

            
        
        $result=$getProjectObject->getProject($rows,$sort,$order,$offset);
        echo $result;
	
	
	

?>
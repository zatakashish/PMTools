<?php

include 'conn.php';

class ProjectVersion extends Connection{
    
    public function getProjectVersion($page,$rows,$projectid ){
        $conn=$this->connect();
        $offset = ($page-1)*$rows;
	$result = array();
	$rs = mysqli_query($conn,"select count(*) from project_version where project_id='$projectid'");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysqli_query($conn,"select * from project_version where project_id='$projectid' limit $offset,$rows  ");
	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);
                
    }
    
    
    
    
    
}
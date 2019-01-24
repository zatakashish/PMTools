<?php
	
        //THIS CLASS IS REPONSIBLE FOR GETTING Project details on project.PHP
        include 'conn.php';
	class GetProjectDetails extends Connection{
	
         public function getProject($rows,$sort,$order,$offset){
        $conn=$this->connect();
        $result = array();            
	$rs = mysqli_query($conn,"select count(*) from project_details");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$rs1 = mysqli_query($conn,"select * from project_details ORDER BY $sort $order limit $offset,$rows");
	
	$items = array();
	while($row = mysqli_fetch_assoc($rs1)){
            
                $id=$row['id'];
                $name=$row['name'];
                
                //$row['name']= '<a  target="_blank" href=projectdashboard.php?projectid='.$id.">".$name."</a>" ;
                
                
		array_push($items, $row);
	}
          $result["rows"] = $items;

        return json_encode($result);
        
        
        }
        }

?>
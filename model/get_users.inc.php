<?php
	
        //THIS CLASS IS REPONSIBLE FOR GETTING USER TABLE ON ADMINDASHBOARD.PHP
        include 'conn.php';
	class GetUserTable extends Connection{
	
         public function getUser($rows,$sort,$order,$offset){
        $conn=$this->connect();
        $result = array();            
	$rs = mysqli_query($conn,"select count(*) from users");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$rs1 = mysqli_query($conn,"select * from users ORDER BY $sort $order limit $offset,$rows");
	
	$items = array();
	while($row = mysqli_fetch_assoc($rs1)){
            $projectmanager= $row['projectmanager'];
            $projectmanager;
            $ssql="SELECT * FROM USERS WHERE id='$projectmanager' ";
            $resultsql= mysqli_query($conn, $ssql);
            $data2=mysqli_fetch_assoc($resultsql);
            $managername=$data2['name'];
            $row['projectmanager']=$managername;
             array_push($items, $row);
	}
	$result["rows"] = $items;

        return json_encode($result);
        
        
        }
        }

?>
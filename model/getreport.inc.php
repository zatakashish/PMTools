<?php 

include 'conn.php';

class UserReport extends Connection{
    
    public function getUserReport($empid,$startdate,$enddate){
        $conn=$this->connect();




$sql=" SELECT * FROM attendance  WHERE  employee_id ='$empid' AND date>='$startdate' AND date<='$enddate' ORDER BY date";
$data = mysqli_query($conn,$sql);



$json=array();

while($row=mysqli_fetch_assoc($data)){
	$json[]=$row;
}



	
if($json){
echo json_encode($json);

}

else{
    $nodata=array();
    $nodata['nodata']="nodata";
    echo json_encode($nodata);
}
    }

}

?>
<?php
include 'conn.php';


class GetUserAttendance extends Connection{
    

public function getAttendance($id){
    $conn=$this->connect();
    $day = date('l');

switch ($day) {
    case "Sunday":
        $dayofweek=1;
        break;
    case "Monday":
        $dayofweek=2;
        break;
    case "Tuesday":
       $dayofweek=3;
        break;
    case "Wednesday":
        $dayofweek=4;
        break;
    case "Thursday":
        $dayofweek=5;
        break;
    case "Friday":
        $dayofweek=6;
        break;
    case "Saturday":
        $dayofweek=7;
        break;
}

$datehigh=date("Y-m-d");
$datelow=date("Y-m-d",strtotime("-".$dayofweek."days"));

    
$sql="SELECT * FROM attendance where employee_id='$id' AND date<='$datehigh' AND date>='$datelow'    ORDER BY date DESC LIMIT 0,$dayofweek";
$result=mysqli_query($conn,$sql);
$json=array();
$nodata=array();



while($row=mysqli_fetch_assoc($result)){
	$json[]=$row;

}

if($json){
echo json_encode($json);
}





else{
	
	$nodata['nodata']="nodata";
	echo json_encode($nodata);
}










}
}
?>
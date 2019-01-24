<?php
include 'conn.php';
class PunchUserOut extends Connection{

    public function punchOut($id,$remarks2){
        $conn=$this->connect();
        $timenow=date('H:i:s', strtotime('+285minutes'));
$date=date("Y-m-d");
$query=" SELECT * FROM attendance WHERE employee_id ='$id' AND date='$date' ";
$result=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($result);
$punchin_time=$data['punchin_time'];
$oldremarks=$data['pout_remarks'];
$starttime=$data['punchin_time'];
$hourworked=strtotime($timenow)-strtotime($starttime);
$finalremark=$oldremarks." - ".$remarks2;
$workinghour=$data['workhour'];
$workinghourinseconds=$workinghour*3600-900;//15 Minutes of threshold applied for all user type
$overtimeinseconds=$hourworked-$workinghourinseconds;
$overtimeseconds=max($overtimeinseconds,0);//If a user goes before 15 Minutes, overtime is Zero




//CONVERT UNIX TIME INTO WORKING TIME
$hours= floor($hourworked/3600);
if($hours=0){
	$minutes=floor($hoursworked/60);
	$seconds=$hoursworked%60;
}
else{
	$hours= floor($hourworked/3600);
	$minutes=floor(($hourworked-$hours*3600)/60);
	$seconds=($hourworked-$hours*3600-$minutes*60);

}
if($hours<10){
	$hours="0".$hours;
}
if($minutes<10){
	$minutes="0".$minutes;
}
if($seconds<10){
	$seconds="0".$seconds;
}
$timeworked= $hours.":".$minutes.":".$seconds;



if($overtimeseconds!=0){


$sql="UPDATE attendance SET punchout_time='$timenow', pout_remarks='$finalremark',workingtime='$timeworked', ";
$sql.= " overtime='$overtimeseconds'         WHERE ";
$sql.= " employee_id='$id' AND  date='$date' AND punchin_time='$punchin_time' ";
mysqli_query($conn,$sql);
$success=array();
$success['success']="success";
echo json_encode($success);


}


elseif($remarks2){
	$sql="UPDATE attendance SET punchout_time='$timenow', pout_remarks='$finalremark',workingtime='$timeworked', ";
$sql.= " overtime='$overtimeseconds'         WHERE ";
$sql.= " employee_id='$id' AND  date='$date' AND punchin_time='$punchin_time' ";
mysqli_query($conn,$sql);

$success=array();
$success['success']="success";
echo json_encode($success);


}

else{
	$error=array();
	$error['false']="false";
	echo json_encode($error);

}












    }



}

?>
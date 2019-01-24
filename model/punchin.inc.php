<?php

include 'conn.php';


class PunchIn extends Connection{
    
    
    public function punchInUser($id,$remarks1,$type){
        $conn=$this->connect();
  

        
        $temporarysql="SELECT * FROM users WHERE id='$id' ";
        $data=mysqli_query($conn,$temporarysql);
        $result=mysqli_fetch_assoc($data);
        $workhour=$result['workhour'];
        $workhour= intval($workhour);


$timenow=date('H:i:s', strtotime('+285minutes'));
$day = date('l');
$date=date("Y-m-d");
$sqlcheck=" SELECT * FROM attendance WHERE employee_id='$id' AND date='$date' ";
$result=mysqli_query($conn,$sqlcheck);
$numrows=intval( mysqli_num_rows($result));





if($numrows == 0){


$sql="INSERT INTO attendance (date,day, punchin_time, remarks, employee_id,workhour ) ";
$sql.=" VALUES ('$date','$day','$timenow','$remarks1','$id', $workhour )";
mysqli_query($conn,$sql);
echo ["success"=>"success"];




    }
    
    else {
        $alreadypunchedin=array();
        $alreadypunchedin['already']="alreadypunchedin";
        echo "ALREADY PUNCHED IN FOR TODAY";
    }
    }


}






?>
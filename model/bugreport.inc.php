<?php

include 'conn.php';

class BugReportClass extends Connection{
    
    
    public function getBugReport($startdate,$enddate,$searchtype){
        $randomstring=explode("_", $searchtype);
       $searchtype=$randomstring[0];
       $searchgroup=$randomstring[1];
        $conn= $this->connect();
        $sql="SELECT * FROM bugtracker WHERE property='$searchtype' AND date>='$startdate' AND date<='$enddate' ";
        $data=mysqli_query($conn,$sql);
        
        $array=array();
        $result= mysqli_num_rows($data);
        $array['searchtype']=$searchtype;
        $array['searchgroup']=$searchgroup;
        $array['rowcount']=$result;
        $array['startdate']=$startdate;
        $array['enddate']=$enddate;
       echo json_encode($array);
       
      
       
       }
        
        
    }
?>
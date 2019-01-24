<?php

class Buglog{
    
    public function createBugRecord($conn,$property){
        $date=date("Y-m-d");
   
        $sql="INSERT INTO bugtracker(date,property) VALUES ('$date','$property')";
        mysqli_query($conn,$sql);
    }
}
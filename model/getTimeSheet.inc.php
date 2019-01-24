<?php

include 'conn.php';

class TimeSheet extends Connection{
    
    
    
    public function getTimeSheet($date){
        session_start();
        $id=$_SESSION['id'];
        
       $conn=$this->connect();
       $sql="SELECT * FROM timesheet WHERE date='$date' AND userid='$id' ";
       $result=mysqli_query($conn,$sql);
       $item=array();
       while($row=mysqli_fetch_assoc($result)){
           array_push($item,$row);
           
         
           
       }
       if($item){
           echo json_encode($item);
       }
       
       else{
           $nodata=array();
           $nodata['nodata']="NO DATA FOUND";
           echo json_encode($nodata);
           
       }
        
    }
}
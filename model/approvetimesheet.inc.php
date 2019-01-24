<?php


include 'conn.php';


class TimeSheetApproval extends Connection{
     
    public function approvetimesheet($id){
        $conn =$this->connect();
        $sql="Update timesheet  SET status='Approved' WHERE id='$id' ";
        $result=mysqli_query($conn,$sql);
        
        if($result){
            echo json_encode(array("success"=>$id));
        }
        
         else{
            
             echo json_encode(array("error"=>"error"));
        }
        
    }
    
    
    
    
    
}
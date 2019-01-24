<?php

include 'conn.php';
session_start();

  class IssueUpdate extends Connection{
    
    public function updateIssue($issueid,$description,$priority,$status,$module,$assignedto,$sprint,$version,$estimate,$timespent,$comment){
        
        $conn=$this->connect();
        
        if($_SESSION['role']==admin){
        $sql="UPDATE issue_management SET "
                . "description='$description',priority='$priority',"
                . "status='$status',module='$module',assignedto='$assignedto',"
                . "sprint='$sprint',version='$version',estimate='$estimate',"
        . "timespent='$timespent',comment='$comment' WHERE id='$issueid' ";}
        
        else{
            $sql="UPDATE issue_management SET "
                . "description='$description',priority='$priority',"
                . "status='$status',module='$module',"
                . "sprint='$sprint',version='$version',estimate='$estimate',"
        . "timespent='$timespent',comment='$comment' WHERE id='$issueid' ";
            
        }
        
        
        
          $result= mysqli_query($conn,$sql);
              
          if($result){
              
              include("buglog.php");
    $bugreportobject=new Buglog();
    $bugreportobject->createBugRecord($conn, $status);
    //$bugreportobject->createBugRecord($conn, $priority);
    
              echo json_encode(array(
		'id' => $issueid,
		'description' => $description,
                  'priority'=>$priority,
                   'status'=>$status,
                  'module'=>$module,
                  'assignedto'=>$assignedto,
                  'sprint'=>$sprint,
                  'version'=>$version,
                  'estimate'=>$estimate,
                  'timespent'=>$timespent,
                  'comment'=>$comment
                                
	));
          }
        
        
    }
    
    
     public function getName($id){
       
       $conn=$this->connect();
       $sql="SELECT * FROM users WHERE id='$id' ";
       $result= mysqli_query($conn, $sql);
       $data=mysqli_fetch_assoc($result);
       $name=$data['name'];
       return $name;
       
   }
    
    
    
}
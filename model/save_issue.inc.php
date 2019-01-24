<?php
//summary description priority status module createdby assignedto sprint version estimate timespent comment
include 'conn.php';


class NewIssue extends Connection{

   public function createIssue($summary,$description,$priority,$status,$module,$createdby,$assignedto,$sprint,$version,$estimate,$timespent,$comment,$project_name,$projectid){
       $conn=$this->connect();


$createdby=$this->getName($createdby);
$sql= "INSERT INTO issue_management(summary,description,priority,status,module,createdby,assignedto,sprint,version,estimate,timespent,comment,project_name,projectid) ";
$sql.=" VALUES ('$summary','$description','$priority','$status','$module','$createdby','$assignedto','$sprint','$version','$estimate','$timespent','$comment','$project_name','$projectid')";


$result=mysqli_query($conn,$sql);
if(!$result){
    echo "SOMES WRONG";
    echo "<br>";
    
    echo $sql;
}

if($result){
    include("buglog.php");
    $bugreportobject=new Buglog();
    $bugreportobject->createBugRecord($conn, $status);
    $bugreportobject->createBugRecord($conn, $priority);
    
    
    
    
    echo json_encode(array(
		
		  'summary' => $summary,
		  'description' => $description,
                  'priority'=>$priority,
                  'status'=>$status,
                  'module'=>$module,
                  'createdby'=>$createdby,
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





?>
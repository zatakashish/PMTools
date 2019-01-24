<?php


include 'conn.php';



class Issues extends Connection{

 public function getIssues($userid,$role,$rows,$sort,$order,$offset){
     
     
     
$conn=$this->connect();
$username=$this->getName($userid);

//GET ASSIGNED PROJECTS
$sql="SELECT * FROM project_members WHERE project_member='$userid' ";

$result=mysqli_query($conn,$sql);
$projectassigned="";
while($row=mysqli_fetch_assoc($result)){
   $projectassigned.=$row['project_id'].",";
}
$projectassigned=rtrim($projectassigned,',');
if(strlen($projectassigned)==0){
  $projectassigned="0";
}








if($role=="admin"){
    
        $result = array();            
	$rs = mysqli_query($conn,"select count(*) from issue_management");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$sql = "select * from issue_management ORDER BY $sort $order limit $offset,$rows";
       
}
else{
    
    
        $result = array();            
	$rs = mysqli_query($conn,"select count(*) from issue_management WHERE createdby='$username' OR assignedto='$username' OR projectid IN ($projectassigned)");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
    
$sql="SELECT * FROM issue_management WHERE createdby='$username' OR assignedto='$username' OR projectid IN ($projectassigned)"  ;



}

$data= mysqli_query($conn, $sql);



$item=array();
while($row=mysqli_fetch_assoc($data)){
  //$createdby=intval($row['createdby']);
    //$assignedto=intval($row['assignedto']);
   
    
    
    //$createdbyname= $this->getName($createdby);
    //$assignedtoname= $this->getName($assignedto);
    
    //$row['createdby']=$createdbyname;
    //$row['assignedto']=$assignedtoname;
    
    
    array_push($item,$row);
}

$result["rows"]=$item;
echo json_encode($result);
 }






function getName($id){
    
    $conn=$this->connect();
    $sql="Select * FROM users where id='$id' ";
    $result= mysqli_query($conn, $sql);
    $data= mysqli_fetch_assoc($result);
    $name=$data['name'];
    return $name;
    
}

}
?>
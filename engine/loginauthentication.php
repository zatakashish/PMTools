<?php
 //THIS CLASS HAS TO TAKE THE DECISION IF WHAT IS TO BE DONE AFTER ALL THE PARAMETERS HAVE BEEN GOTTEN 
      class FinalLoginAuthentication {
      public function finalloginvalidation($row_count,$data,$fetchrole,$fetchtype){
     if($row_count>0 & $fetchrole=="admin"){
	session_start();
	$_SESSION['id']=$data['id'];
	$_SESSION['name']=$data['name'];
	$_SESSION["loggedin"]=true;
	$_SESSION['role']=$data['role'];
	$_SESSION['type']=$data['type'];
	echo json_encode(array('success'=>'timeentry.php'));

}

elseif($row_count>0 & $fetchrole=="user"){
	session_start();
	$_SESSION["name"]=$data['name'];
	$_SESSION["loggedin"]=true;
	$_SESSION['role']=$data['role'];
	$_SESSION['id']=$data['id'];
	$_SESSION['role']=$fetchrole;
	$_SESSION['type']=$fetchtype;

	echo json_encode(array('success'=>'timeentry.php'));

}


else{
	echo json_encode(array('error' =>'There has been an Error'));


}
      
      
      
      
  }






  }







?>

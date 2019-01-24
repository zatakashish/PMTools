<?php



$id=$_POST['id'];


include '../model/declinetimesheet.inc.php';


 $approvetimesheetobj=new TimeSheetApproval();
 $approvetimesheetobj->approvetimesheet($id);
 


?>
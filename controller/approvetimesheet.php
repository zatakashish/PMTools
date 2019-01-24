<?php



$id=$_POST['id'];


include '../model/approvetimesheet.inc.php';


 $approvetimesheetobj=new TimeSheetApproval();
 $approvetimesheetobj->approvetimesheet($id);
 


?>
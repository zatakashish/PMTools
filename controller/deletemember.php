<?php
$memberid=$_POST['memberid'];
$projectid=$_POST['projectid'];


include '../model/deletemember.inc.php';
$delmemberobject=new DelMember();
$delmemberobject->deleteMember($memberid, $projectid);





?>
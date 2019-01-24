<?php

$projectmember=$_POST['projectmember'];
$projectid=$_POST['projectid'];


include '../model/addprojectmember.inc.php';

$addnewprojectmemberobject=new NewProjectMember();
$addnewprojectmemberobject->addProjectMember($projectid, $projectmember);

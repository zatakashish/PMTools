<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $projectid=$_GET['projectid'];
       
	

        include '../model/get_version.inc.php';
        $getversionobject=new ProjectVersion();
        $getversionobject->getProjectVersion($page,$rows,$projectid);

?>
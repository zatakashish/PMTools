<?php

$id = intval($_REQUEST['id']);
include '../model/destroy_user.inc.php';


$destroyObject =new DestroyUser();
$destroyObject->deleteUser($id);
        



?>
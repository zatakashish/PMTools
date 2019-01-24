<?php


$id=$_POST["id"];

include '../model/delfile.php';
$delfileobj =new FileDelete();
$delfileobj->delFile($id);


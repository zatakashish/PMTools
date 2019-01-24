<?php


session_start();

if($_SESSION['role']!=="admin"){
    header("location:index.php");
}



?>


<!DOCTYPE html>

		<html>
			<head>
				<meta charset = "UTF8-">
					<title></title>
                                        
                                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="jquery,ui,easy,easyui,web">
	<meta name="description" content="easyui help you build your web page easily!">
	<title>Time Sheet Approval</title>
	<link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="easyui/demo/demo.css">
        <link rel="stylesheet" type="text/css" href="easyui/themes/color.css">
	<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="easyui/datagrid-detailview.js"></script>
        <script type="text/javascript" src="js/timesheetapproval.js"></script>
         <script src="js/sweetalert.min.js"></script>
         
     
         
         <link rel="stylesheet" href="css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         <style>
 th, td {
  border: 1px solid black;
}
</style>                              
         
         
				</head>
                                
                                <body>
                                    <?php if($_SESSION['role']=="admin"){
                                        include 'navbar.php';
                                    }
                                    
                                    ?>
                                    <br>
                                    
                                    <label>Select User:</label>
                                    <select id="select" class="easyui-combobox" name="dept" style="width:200px;"> 
                                        <option value="">SELECT</option>
                                        <?php
                                        
                                        include 'model/conn.php';
                                        $connectionobject= new Connection();
                                        $conn=$connectionobject->connect();
                                        $userid=$_SESSION['id'];
                                        $sql="SELECT * FROM project_details WHERE project_managerid='$userid' ";
                                        
                                        $result=mysqli_query($conn,$sql);
                                        $item=array();
                                         $string ="(";
                                        while($row=mysqli_fetch_assoc($result)){
                                           $string.=$row['id'].",";
                                        }
                                       $string=rtrim($string,",");
                                       $string.=")";
                                       
                                        
                                        $sql2 ="SELECT * FROM project_members WHERE project_id IN $string ";
                                       $result2=mysqli_query($conn,$sql2);
                                       $item2=array();
                                       while($row2=mysqli_fetch_assoc($result2)){
                                           array_push($item2, $row2['project_member']);
                                       }
                                        $item2= array_unique($item2);
                                        foreach ($item2 as $key => $value) {
                                            $sql="SELECT * FROM users WHERE id= '$value'";
                                            $data=mysqli_query($conn,$sql);
                                            $row=mysqli_fetch_assoc($data);
                                            $name=$row['name'];
                                            $userid=$row['id'];
                                            echo '<option value="'.$userid.'">'.$name.'</option>'; 
                                            
                                            
                                            
                                        }
    

                                        
                                        
                                      
                                        
                                        
                                        ?>
                                       
                                        
                                        
                                   </select>     
                                    <button type="button" class="btn btn-primary" id="getbutton" hidden onclick="getTimeSheet()">Get TimeSheet</button>
                                    <br><br>
                                    <div class ="container" >
                                        
                                        
                                        <table style="width:70%;" id="table" hidden>

</table>
                                        
                                        
                                        
                                    </div>
                                   
                                    
                                    <script type="text/javascript">
                                    $('#select').combobox({
	onChange: function(){
		$("#getbutton").removeAttr("hidden");
                $("#table").html("");
            
    }})
	

                                    </script>
                                            
                                   
                                    
                                </body>
                                
                                
                </html>
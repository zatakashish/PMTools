<?php

session_start();
$id=$_SESSION['id'];
if($_SESSION["loggedin"]!=(true)){
    header("Location:index.php");
    
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
	<title>Project Management</title>
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
        <link rel="stylesheet" type="text/css" href="easyui/themes/color.css">
        <link rel="stylesheet" type="text/css" href="css/timesheet.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-detailview.js"></script>
        
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         <script type="text/javascript" src="js/timesheet.js"></script>
         <script type="text/javascript">
            
             $.ajax({
                 type:"POST",
                 url:"controller/getTimeSheet.php",
                 dataType:"json",
                 success:function(response){
                    $.each(response,function(key,value){
                        $('#project'+value.row).val(value.projectname);
                        $('#project'+value.row).attr("disabled","disabled");
                        $('#area'+value.row).val(value.projectarea);
                        $('#area'+value.row).attr("disabled","disabled");
                        $('#time'+value.row).val(value.time);
                        $('#time'+value.row).attr("disabled","disabled");
                        $('#status'+value.row).html(value.status);
                    });
                    if(!response.nodata){
                    $('#editbutton').removeAttr("hidden","hidden");
                    $('#submitbutton').hide();
                }
                     
                 }
             });
         
         </script>
         
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                                        
				</head>
				<body> 
                                    <?php if($_SESSION["role"]=="admin"){include 'navbar.php';} 
                                    else{include 'navbaruser.php';}
                                    ?>
                                    <input type="hidden" id="userid" name="id" value="<?php echo $id ?>">
                                    
                                    <div class="container" id="datecontainer">
                                        <span> <label id="datelabel" >Date: </label> </span>
                                        
                                        <input id="datebox" type="text" class="easyui-datebox" value=<?php echo date("Y-m-d"); ?> >
                                        <button type="button" class="btn btn-warning" hidden id="editbutton" onclick="editTimeSheet()">Edit </button>
                                    </div>
                                    
                                    <div class="container" style="margin-top: 20px;">
                                        <div class="row">
                                            <div class="col-lg-4"><label>Project:</label></div> 
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-4"><label>Area:</label></div>
                                            <div class="col-lg-1"><label>Time:</label></div>
                                           
                                        </div>
                                    </div>  
                                    <div class="container" id="timesheet" style="margin-top: 5px;">
                                       
                                        
                                        
                                        <?php
                                        include 'model/conn.php';
                                        $connectionobject=new Connection();
                                        $conn=$connectionobject->connect();
                                        for($i=1;$i<=5;$i++){
                                            include 'timesheetskeleton.php';?>
                                        <script>
                                            $("#project").attr("id","project<?php echo $i ?>");
                                            $("#area").attr("id","area<?php echo $i ?>");
                                            $("#time").attr("id","time<?php echo $i ?>");
                                            $("#status").attr("id","status<?php echo $i ?>");
                                            
                                        </script>
                                        
                                          <?php 
                                        }
                                        ?>
                                        
                                        
                                        <br><br>
                                        <button  id="submitbutton" type="button" class="btn btn-primary" style="margin-left: 750px" onclick=submit()
                                                >Submit</button>
                                       <button id="editbutton2" type="button" class="btn btn-primary" hidden style="margin-left: 750px" onclick=edit()
                                                >Update</button>
                                        <button id="cancelbutton" type="button" class="btn btn-info" hidden style="margin-left: 30px" onclick=window.location.reload()
                                                >Cancel</button>
                                       
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                    <div>
 <?php if($_SESSION['role']=="admin"){echo '<a target="_blank" href="approvetimesheet.php" style="position:absolute;right:30px">Approve Time Sheets</a>';} ?>

                                    <script>$('#datebox').datebox({
	onSelect: function(date){
		var selecteddate=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
                var userid=$("#userid").val();
                $.ajax({
                    url:'controller/getTimeSheet.php',
                    type:"POST",
                    data:{"date":selecteddate, "userid":userid},
                    dataType:"json",
                    success:function(response){
                        
                        
                        if(response.nodata){
swal({
  title: "No records found !",
  text: "Would you like to update the records!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      $("#submitbutton").show();
      $("#editbutton2").hide();
      $("#cancelbutton").hide();
    for(var i=1;i <6;i++){
        $('#project'+i).val("");
        $('#area'+i).val("");
        $('#time'+i).val("");
        $('#project'+i).removeAttr("disabled","disabled");
        $('#area'+i).removeAttr("disabled","disabled");
        $('#time'+i).removeAttr("disabled","disabled");
        $('#status'+i).html("");
        $("#editbutton").hide();
    }
  } else {
    swal("Record update cancelled !");
     for(var i=1;i <6;i++){
        $('#project'+i).val("");
        $('#area'+i).val("");
        $('#time'+i).val("");
        $('#project'+i).removeAttr("disabled","disabled");
        $('#area'+i).removeAttr("disabled","disabled");
        $('#time'+i).removeAttr("disabled","disabled");
        $('#status'+i).html("");
        $("#editbutton").hide();
    }
    
  }
});
                        }
                       
                        
                        $("#editbutton").removeAttr("hidden","hidden");
                        $.each(response,function(key,value){
                        $('#project'+value.row).val(value.projectname);
                        $('#project'+value.row).attr("disabled","disabled");
                        $('#area'+value.row).val(value.projectarea);
                        $('#area'+value.row).attr("disabled","disabled");
                        $('#time'+value.row).val(value.time);
                        $('#time'+value.row).attr("disabled","disabled");
                        $('#status'+value.row).html(value.status);
                        $('#status'+value.row).attr("disabled","disabled");
                        
                        
                    }); 
                    }
                   
                })
                
	}
});</script>
                                    
                                    <div>
                                    
                                    </div>
				</body>
			</html>

<?php
session_start();
if($_SESSION['loggedin']!=1){
   header("location:index.php");
}
$projectid=$_GET['projectid'];
include ('model/conn.php'); 
 $connectionobject =new Connection();
 $conn=$connectionobject->connect();
 $sql="SELECT * FROM project_details WHERE id='$projectid' ";
 $result=mysqli_query($conn,$sql);
 $noprojectexists=0;
 if(mysqli_num_rows($result)==0){
     $noprojectexists=1;
 }
 


?>




<html>
    <head>
        <title>Project Dashboard</title>
        

        <link rel="stylesheet" href="css/projectdashboardstyle.css">
        
	<link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="easyui/themes/color.css">
	<link rel="stylesheet" type="text/css" href="easyui/demo/demo.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
              <script src="js/sweetalert.min.js"></script>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        
        
        
        <input type="hidden" id="projectid" value=<?php echo $projectid ?>>
        <a href="project.php" id="home">Home</a>
        <h2 id="heading" >Project Name : <span id="projectname"></span></h2>
        <br>
        
        <div class="container">
        <div class="row">
            <div class="col-md-4">
                <label>Project Manager:
                </label>
                <label id="projectmanager"></label>
                
               

                
                
                
            </div>
            <div class=" col-md-4">
                <label> Start Date :</label>
                <label id="startdate"></label>
            </div>
  
  
            <div class=" col-md-4">
                <label> Release Date :</label>
                <label id="releasedate"></label>
            </div>
            
</div>
            
        </div>
        
        
        <div class="container" id="container">
            <div class="row">
               <!-- <div class=" col-lg-1"></div>-->
                <div class=" col-lg-12">
                    
                    
                    
                    
	
	<table id="dg" title="Version Management" class="easyui-datagrid" style="width:100%;height:350px"
			url="controller/get_version.php?projectid=<?php echo $projectid ?>"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="version" width="50">Version/Sprint</th>
				<th field="startdate" width="50">Start Date</th>
				<th field="enddate" width="50">End Date</th>
				
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New Version/Sprint</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit Version/Sprint</a>
		<!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>-->
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle"></div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>Version/Sprint:</label>
				<input name="version" id="version" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>Start Date:</label>
				<input name="startdate"  id="startdate" type="text" class="easyui-datebox" required="required">
			</div>
			<div class="fitem">
				<label>Release Date:</label>
				<input name="enddate"  id="enddate" type="text" class="easyui-datebox" required="required">
			</div>
                    
                             
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
	</div>
	<script type="text/javascript">
		var url;
		function newUser(){
			$('#dlg').dialog('open').dialog('setTitle','New Version/Sprint');
			$('#fm').form('clear');
			url = 'controller/save_version.php?projectid='+"<?php echo $projectid?>";
		}
		function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Version/Sprint');
				$('#fm').form('load',row);
                                $("#_easyui_textbox_input2").val(row.startdate);
                                $("#_easyui_textbox_input3").val(row.enddate);
                                $("input[name=startdate]").val(row.startdate);
                                $("input[name=enddate]").val(row.enddate);
                         	url = 'controller/update_version.php?id='+row.id;
			}
		}
		function saveUser(){
                    
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
						});
					} else {
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		function destroyUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
					if (r){
						$.post('destroy_user.php',{id:row.id},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
		}
	</script>
	<style rel="stylesheet">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
		.fitem input{
			width:160px;
		}
	</style>
                    
                    
                    
                    
                </div>    
             <!--   <div class=" col-lg-1"></div>   --> 
                
            </div>
        </div>  
        
        
        <div class="container">
        <div class="row">
            <div class="col-lg-3    ">
               <h4 style="text-align: center;border: 1px solid black">Team Members:</h4>
               <div id="listmem">
                   <ul id="list">
                       
                   </ul>
                     
               </div>
              
                <br>
                <div class="form-group">
    
    <select class="btn btn-outline-info"  style ="width: 70%" onchange=showfun(); id="selectuserbutton">
                       <option hidden>SELECT USER</option>
                        <?php 
                        
                        $sql="SELECT * FROM users ORDER BY name ASC";
                     	$data=mysqli_query($conn,$sql);
                     	while($row=mysqli_fetch_assoc($data)){
                        ?>
                        <option value=<?php echo $row['id'] ?> ><?php echo $row['name'] ?></option>
                     	 <?php } ?>
                     	 </select>
                </div>
                    <div>
                        <button type="button" class="btn btn-outline-info" id="addbutton" onclick=addmember();>Add</button>
                        <button type="button" class="btn btn-outline-danger" id="delbutton" onclick=delmember();>DELETE</button>
                    
                    </div>
  
       
            </div>
            
            <div class=" col-lg-6">
                <h4 style="text-align: center;border: 1px solid black">Project Details:</h4>
                <p id ="projectdetails">
                   
                </p>
                <br>
                <div class="form-group">
    
                    <textarea placeholder="Click to Edit"
                              class="form-control" id="textarea" rows="3" readonly onclick="edittext()" spellcheck="false"></textarea>
  </div>
                <button type="button" class="btn btn-outline-info" id="addinfo" onclick="updateinfo()">UPDATE</button>
                
            </div>
  
  
            
            
            <div class=" col-lg-3">
                 <h4 style="text-align: center;border: 1px solid black">Project Uploads</h4>
                 <br><br>
                 <ol id="filelist">
                     
                     
                     
                     
                     
                     
                     
                 </ol>
                
  <div class="form-group">
      <form action="#" method="post" enctype="multipart/form-data">
    <!--<label for="exampleFormControlFile1">Example file input</label>-->
    <input type="file" name ="file" class="form-control-file" id="filebutton" onclick=showupload()>
    <a onclick=showfilebutton()  id="uploadfiletag">Upload a file</a>
    <br><label style="color:red" id="uploaderror"></label><br>
    <input type="submit" class="btn btn-primary" name="submit" value="UPLOAD" id="uploadbutton" > 
    <br>
    
    
    
    <br>
    
      </form>
  </div>

            </div>
            
            
</div>
            
        </div>
        
           
           
        
        
      
               
                                 <script src="js/projectdashboard.js">
                               
                                 </script>
                                 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous"></script>
        <script >
            
            var projectexists='<?php echo $noprojectexists ?>';
            if(projectexists==1){
      swal("Couldn't find the project ! Please try again !", {
  buttons: {
   
    catch: {
      text: "OK!",
      value: "catch",
    },
    
  },
})
.then((value) => {
  switch (value) {
 
    
 
    case "catch":
      window.location.assign("project.php");
      break;
 
    
  }
});
            ;}
            
        
        </script>
            
           
    
    </body>
           
</html>


<?php


//FILE UPLOAD PHP

if(isset($_POST['submit'])){
    $type=$_FILES['file']['type'];
    $name=$_FILES['file']['name'];
    $temp_name=$_FILES['file']['tmp_name'];
    $size=$_FILES['file']['size'];
    
    
    if(!empty($name)){
       
           
           
           if($size<5000000){
               $location="uploads/";
               move_uploaded_file($temp_name, $location.$name);
               echo "<script>$('#uploaderror').css('color', 'green')</script>";
                echo "<script>$('#uploaderror').css('text-align', 'center')</script>";
               echo "<script>$('#uploaderror').html('<h4 style=>Uploaded Succesfully!</h4>')</script>";
               
               
               
               include 'model/newfileupload.php';
               $fileuploadobject=new NewFile();
               $fileuploadobject->uploadNewFile($conn,$projectid, $name);
              
           }
           
           else{
               
               echo "<script>$('#uploaderror').html('<strong>Please select a smaller file upto 5MB</strong>')</script>";
           }
      
       
        
    }
    
    else{
        echo "<script>$('#uploaderror').html('<strong>PLEASE CHOOSE A PDF FILE TO UPLOAD</strong>')</script>";
        
    }
}





?>




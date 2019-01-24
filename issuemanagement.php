<?php
session_start();
if(!$_SESSION["loggedin"]){
    header("location:index.php");
}
if($_SESSION['role']=="admin"){
include 'navbar.php';}
else{
    include 'navbaruser.php';
}
$userid=$_SESSION['id'];






?>


<html>
<head>
   
   
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="jquery,ui,easy,easyui,web">
	<meta name="description" content="easyui help you build your web page easily!">
	<title>Project Management</title>
	<link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="easyui/demo/demo.css">
        <link rel="stylesheet" type="text/css" href="easyui/themes/color.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="easyui/datagrid-detailview.js"></script>
        <script type="text/javascript" src="js/issue.js"></script>
         <script src="js/sweetalert.min.js"></script>
        
        
        
        
	
        
         <link rel="stylesheet" href="css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <br>
    
    <div  id="container">
            <div class="row">
               <!-- <div class=" col-lg-1"></div>-->
                <div class=" col-lg-12">
                    
                    
                    
                    
	
	<table id="dg" title="Issue Management" class="easyui-datagrid" style="width:100%;height:50%"
			url="controller/get_issue.php?userid=<?php echo $userid ?>"
                        
    
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="summary" width="50" sortable="true">Date</th>
				<th field="version" width="200">Summary</th>
                                <th field="project_name" width="50" sortable="true">Project</th>
				<th field="priority" width="50" sortable="true">Priority</th>
                                <th field="status" width="50" sortable="true">Status</th>
                                <th field="module" width="50">Module</th>
                                <th field="createdby" width="70">Created by</th>
                                <th field="assignedto" width="70">Assigned to</th>
                                <th field="sprint" width="60">Sprint/Version</th>
                                <!--<th field="version" width="50">Version</th>-->
                                <th field="comment" width="50">Comment</th>
                                <th field="estimate" width="50" sortable="true">Estimate (Hrs)</th>
                                <th field="timespent" width="50" sortable="true">Time Spent (Hrs)</th>
                                
                                
                                
                                
				
			</tr>
		</thead>
	</table>
                    
              
                    
                  
                    
                    
	<div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New Issue</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit Issue</a>
              <?php if($_SESSION['role']=="admin") {echo ' <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyIssue()">Remove Issue</a>';}?>
	</div>
                    
                    <div id="window"></div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:480px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Issue Creation</div>
		<form id="fm" method="post" novalidate>
			<!--<div class="fitem">
				<label>Summary:</label>
				<input name="summary" id="summary" class="easyui-textbox" required="true">
			</div>-->
                    
                        
                        <div class="fitem">
                            <label>Project :</label>
                            <select id="project_name" class="easyui-combobox"    name="project_name" style="width:180px;" required="true" >
                                   
     
            
    
                                <?php
                                include ('model/conn.php'); 
                        $connectionobject =new Connection();
                        $conn=$connectionobject->connect();
                                $sql="SELECT * FROM project_details ORDER BY name ASC";
                                $data=mysqli_query($conn,$sql);
                                
                                while($row=mysqli_fetch_assoc($data)){
                        ?>
                        <option value=<?php echo $row['name'].",".$row['id'] ?> ><?php echo $row['name'] ?></option>
                     	 <?php } ?>
                              </select>
                        
                        </div>
                        
                        
                        <div class="fitem">
				<label>Summary:</label>
                                <input name="version" id="version" class="easyui-textbox" >
                                
                              	
			</div>
                        
                        
                        <div class="fitem">   
            <input class="easyui-textbox" name="description" id="description" label="Description:"  multiline="true" labelPosition="top" value="" style="width:100%;height:180px">
                    </div>
                        <br>
                        <br>
                        
			<div class="fitem">
                        <label>Priority:</label>
                        <select id="cc" class="easyui-combobox" name="priority" style="width:180px;" required="true">
                        <option value="major">Major</option>
                        <option value="minor">Minor</option>
                        <option value="critical">Critical</option>
                        <option value="blocker">Blocker</option>
                        <option value="cosmetic">Cosmetic</option>
                        <option value="futurescope">Future Scope</option>
                        
                              </select>
                            </div>
                    
                    <div class="fitem">
                        <label>Status:</label>
                        <select id="cc" class="easyui-combobox" name="status" style="width:180px;" required="true">
                        <option value="open">Open</option>
                        <option value="inprogress">In progress</option>
                        <option value="closed">Closed</option>
                        <option value="reopened">Reopened</option>
                              </select>
                            </div>
                    
                    <div class="fitem">
                        <label>Module:</label>
                        <select id="module" class="easyui-combobox" name="module" style="width:180px;" >
                        <?php 
                        
                        $sql="SELECT * FROM module ORDER BY property ASC";
                     	$data=mysqli_query($conn,$sql);
                     	while($row=mysqli_fetch_assoc($data)){
                        ?>
                        <option value=<?php echo $row['property'] ?> ><?php echo $row['property'] ?></option>
                     	 <?php } ?>
                              </select>
                            </div>
                    
                   
                    <div class="fitem" id="assignto">
                      <!-- <label>Assign to:</label>
                        <select id="cc" class="easyui-combobox" name="assignedto"  style="width:180px;" required="true">
                        
                            </select>-->
                            </div>
                    
                    
                        
                    
                    <div class="fitem" id="sprint">
				<label>Sprint/Version</label>
                                
                                
                              	
			</div>
                        
                    
                    
                    
                    
                    
                    
                    <div class="fitem">
                        <label>Estimate(Hrs)</label>
                        <input class="easyui-numberspinner" style="width:180px;" id ="estimate" name="estimate">
                    
                    </div>
                    
                    <div class="fitem">
                        <label>Spent(Hrs)</label>
                        <input class="easyui-numberspinner" style="width:180px;" id =estimate name="timespent">                    
                    </div>
           
                    
                   
                    <div class="fitem">   
            <input class="easyui-textbox" name="comment" label="Comment:"  multiline="true" labelPosition="top" value="" style="width:100%;height:180px">
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
                        
			$('#dlg').dialog('open').dialog('setTitle','New User');
			$('#fm').form('clear');
			url = 'controller/save_issue.php?userid=<?php echo $userid ?>';
		}
		function editUser(){
			var row = $('#dg').datagrid('getSelected');
                        <?php if($_SESSION['role']=="user"){
                            echo "$('#fm div:nth-child(5)').hide()"; 
                        } ?>
                        
                        
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
                                $("#_easyui_textbox_input2").val(row.startdate);
                                $("#_easyui_textbox_input3").val(row.enddate);
                                $("input[name=startdate]").val(row.startdate);
                                $("input[name=enddate]").val(row.enddate);
                         	url = 'controller/update_issue.php?id='+row.id;
			}
		}
		function saveUser(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
                                    location.reload();
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
		function destroyIssue(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to destroy this issue?',function(r){
					if (r){
						$.post('controller/destroy_issue.php',{id:row.id},function(result){
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
			width:180px;
                        margin-left: 20px;
		}
	</style>
                    
                    
                    
                    
                </div>    
             
                
            </div>
        </div>  
        
        
        
   
    
    
    
    <script>
        $('#dg').datagrid({
            
	  onDblClickRow: function(index,row){
          
           
        swal({
  title: "Description:",
  text: row.description+'\n'+'\n'+"COMMENT:"+row.comment,
 

})
        
            
         
              
              
            
		
	}
});
    </script>
    
    <script>
        $('#dg').datagrid({
	rowStyler: function(index,row){
            var timespent=parseInt(row.timespent);
            var estimate= parseInt(row.estimate);
		if (timespent>estimate){
                    
			return 'background-color:red;color:black;'; // return inline style
				
		}
                
                
                 
                
                else if(row.status=="reopened")
                    {
			return 'background-color:yellow;color:black;'; // return inline style
				
		}
                else if(timespent < estimate){
                    return 'background-color:green;color:black;'; // return inline style
                }
                
                
	}
});
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous"></script>
        
        <script>
      $('#project_name').combobox({
       onChange:function(newValue,oldValue){
       
       $.ajax({
           
           url:"controller/getProjectMembers2.php",
           data:{"projectid":newValue},
           dataType:"json",
           type:"POST",
           success:function(response){
               var username='<label>Assign to:</label>';
               username+='<span><select id="cc" class="form-control-sm" name="assignedto"  style="width:66%;margin-left:3px" required="true">';
               $.each(response,function(key,value){
                
                   
                   
                   
                   
                   username+="<option value='" +value.name+"'>"+value.name+"</option>";
                 
               });
               
               username+='</select></span>';
              $("#assignto").html(username);
               
           }
       
        
           
       });
       
       
       
       $.ajax({
           
           url:"controller/getProjectVersion.php",
           data:{"projectid":newValue},
           dataType:"json",
           type:"POST",
           success:function(response){
               var username='<label>Sprint/Version:</label>';
               username+='<span><select id="" class="form-control-sm" name="sprint"  style="width:66%;margin-left:3px" required="true">';
               $.each(response,function(key,value){
                   username+="<option value="+value.version+">"+value.version+"</option>";
                 
               });
               
               username+='</select></span>';
              $("#sprint").html(username);
               
           }
       
        
           
       });
       
       
        
        
        
    
    }
});
        </script>
        
        
        
        
        
        
        
</body>

</html>
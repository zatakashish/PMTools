<?php
session_start();
if(!$_SESSION["loggedin"]){
    header("location:index.php");
}


include 'navbar.php';
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
	<script type="text/javascript">

		$(function(){
			$('#dg').datagrid({
				view: detailview,
				detailFormatter:function(index,row){
					return '<div style="padding:2px"><table id="ddv-' + index + '"></table></div>';
				},
				onExpandRow: function(index,row){
					window.open("projectdashboard.php?projectid="+row.id) ;
				}
			});
		});
	</script>
        
         <link rel="stylesheet" href="css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
               <?php 
               
                include 'model/conn.php';
                $connectionobject=new Connection();
                $conn=$connectionobject->connect();
                
                ?>
    
    <br>
    
    
    
	
	
	<table id="dg" class="easyui-datagrid" style="width:100%;height:63%"
			url="controller/get_project.php" 
			title="Project Management"
                        toolbar="#toolbar" pagination="true"
			singleSelect="true" fitColumns="true">
            
		
	
            
		<thead>
                    
                    
			<tr>
				<th field="id" width="50">Project ID</th>
				<th field="name" width="100">Project Name</th>
				<th field="project_manager" width="100">Project Manager</th>
				<th field="start_date"  width="80">Start Date</th>
				<th field="release_date"  width="80">Release Date</th>
				<th field="status" width="60" >Status</th>
			</tr>
		</thead>
	</table>
    
    <div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New Project</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit Project</a>
	<!--	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="destroyUser()">Destroy Project</a>
-->	</div>
    
    
    <div id="dlg" class="easyui-dialog" style="width:400px;height:480px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Project Information</div>
		<form id="fm" method="post" novalidate>

			<div class="fitem">
				<label>Project Name:</label>
				<input name="name" class="easyui-textbox" required="true">
			</div>			
			<div class="fitem">
				<label>Project Manager:</label>                    	
                       <select id="project_managerid" class="easyui-combobox" name="project_managerid" style="width:158px;">
                        <?php 
                        $sql="SELECT * FROM users ORDER BY name ASC";
                     	$data=mysqli_query($conn,$sql);
                     	while($row=mysqli_fetch_assoc($data)){
                        ?>
                        <option value=<?php echo $row['id'] ?> ><?php echo $row['name'] ?></option>
                     	 <?php } ?>
                     	 </select>
                                
                     	 	
			</div>
                    
                    <br>
                         <div class="fitem">
				<label>Start:</label>
				<input id="start_date" name="start_date" type="text" class="easyui-datebox" required="required">
			</div>
                    <br>
                        <div class="fitem">
				<label>End:</label>
				<input id="release_date" name="release_date" type="text" class="easyui-datebox" required="required">
			</div>
                    
                    <br>
                        <div class="fitem">
		        <label>Status:</label>
                        <select id="status" class="easyui-combobox" name="status" style="width:160px;">
                        <option value="active">ACTIVE</option>
                        <option value="inactive">INACTIVE</option>
                            </select>		
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
			url = 'controller/save_project.php';
                        
                        
                        
		}
		function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
      				url = 'controller/update_project.php?id='+row.id;
			}
		}
		function saveUser(){
                     
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval("result");
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
				$.messager.confirm('Confirm','Are you sure you want to delete this user?',function(r){
					if (r){
						$.post('controller/destroy_user.php',{id:row.id},function(result){
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
        
         <script>
        $('#dg').datagrid({
            
	  onDblClickRow: function(index,row){
              window.open("projectdashboard.php?projectid="+row.id);
              
              
            
		
	}
});
    </script>
        
	
	
</body>
</html>
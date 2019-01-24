<?php 
session_start();
if($_SESSION["loggedin"]!=true || $_SESSION['role']!="admin"){
	header('Location:index.php');
}

		


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ADMIN DASHBOARD</title>
	<link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="easyui/themes/color.css">
	<link rel="stylesheet" type="text/css" href="easyui/demo/demo.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
</head>
<body>

    
	
		<?php include ('navbar.php'); ?>		<br/>

	<div id="hide">
	<table id="dg" title="EMPLOYEE LIST" class="easyui-datagrid" style="width:100%;height:350px"
			url="controller/get_users.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="id" width="15" sortable ="true">ID</th>
				<th field="name" width="50" sortable ="true">Name</th>
				<th field="address" width="80" sortable ="true">Address</th>
				<th field="contact" width="50">Contact</th>
				<th field="alt_contact" width="50">Alt Contact</th>
                                <th field="projectmanager" width="50">Project Manager</th>
				<th field="type" width="30">TYPE</th>
                                <th field="workhour" width="30">WORKHOUR</th>
                                <th field="status" width="30">Status</th>
                                <th field="email" width="60">Email</th>
                               <!-- <th field="password" width="50">Password</th>-->
                                <th field="role" width="0">Role</th>
                       	</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New User</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:480px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">User Information</div>
		<form id="fm" method="post" novalidate>

			<div class="fitem">
				<label>Name:</label>
				<input name="name" class="easyui-textbox" required="true">
			</div>			
			<div class="fitem">
				<label>Address:</label>
				<input name="address" class="easyui-textbox"  required="true">
			</div>
                         <div class="fitem">
				<label>Contact:</label>
				<input name="contact" class="easyui-textbox"  required="true">
			</div>
                    
                        <div class="fitem">
				<label>Alt Contact:</label>
				<input name="alt_contact" class="easyui-textbox" required="true">
			</div>
                         <div class="fitem">
                             <label>Manager:</label>
                      <select class="easyui-combobox"  name="projectmanager" style="width:160px;" required="true">
                       
                        <?php 
                        include ('model/conn.php'); 
                        $connectionobject =new Connection();
                        $conn=$connectionobject->connect();
                        $sql="SELECT * FROM users ORDER BY name ASC";
                     	$data=mysqli_query($conn,$sql);
                     	while($row=mysqli_fetch_assoc($data)){
                        ?>
                        <option value=<?php echo $row['id'] ?> ><?php echo $row['name'] ?></option>
                     	 <?php } ?>
                     	 </select>
                             
                             </div>
                    
                         <div class="fitem">
				<label>Work Hours:</label>
				<input name="workhour" class="easyui-numberbox" required="true">
			</div>
                    
                        <div class="fitem">
                        <label>Type:</label>
                        <select id="cc" class="easyui-combobox" name="type" style="width:160px;" required="true">
                        <option value="intern">INTERN</option>
                        <option value="parttimer">PART-TIMER</option>
                        <option value="fulltimer">FULL_TIMER</option>
                              </select>
                            </div>
                    
                    
                    
                        <div class="fitem">
		        <label>Status:</label>
                        <select id="cc" class="easyui-combobox" name="status" style="width:160px;" required="true">
                        <option value="active">ACTIVE</option>
                        <option value="inactive">INACTIVE</option>
                            </select>		
			</div>
                    
			<div class="fitem">
				<label>Email:</label>
				<input name="email" class="easyui-textbox" data-options="required:true,validType:'email'" >
			</div>
                    
                        <div class="fitem">
				<label>Password:</label>
				<input id="pass1" name="password" class="easyui-passwordbox" required="true"  >
			</div>
                    
                       <div class="fitem">
				<label>Confirm Password:</label>
				<input  id="pass2" name="password" validType="confirmPass['#pass']" class="easyui-passwordbox" required="true" >
			</div>
                    
                    <div     class="fitem" style="margin-bottom:10px">
                    <br>
                    <input  class="easyui-radiobutton"  name="role" value="admin" label="Admin:" >
                    <span><img src="images/blank.jpg"</span>
                    <input class="easyui-radiobutton" name="role" value="user" label="User:" >
                    </div>
                    
                    <a id="btn" onclick="changePassword()" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Change Password</a>
                    
                    
                                            
                    
			

		</form>
	</div>
        
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="validate()" style="width:90px">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
	</div>


	
	<script type="text/javascript">
		var url;
		function newUser(){
			$('#dlg').dialog('open').dialog('setTitle','New User');
			$('#fm').form('clear');
			url = 'controller/save_user.php';
                        $("#fm div:nth-child(11)").show();
                        $("#fm div:nth-child(10)").show();
                        $("#fm div:nth-child(9)").show();
                        $("#fm div:nth-child(8)").show();
                        $("#btn").hide();
                       
                        
		}
		function editUser(){
                       
                        $("#btn").show();
			var row = $('#dg').datagrid('getSelected');
			if (row){
                               
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
                              
                              
                                
                                $("#fm div:nth-child(11)").hide();
                                $("#fm div:nth-child(10)").hide();
                             $("#fm div:nth-child(9)").hide();
                              // $("#fm div:nth-child(8)").hide();
                              
                              
                        
                               url = 'controller/update_user.php?id='+row.id;
			
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
        
     
        
       
    
 
        
        
        
       
        
        </div>
        
        <!-- ALL THIS ABOVE WILL BE SHOWN TO ADMIN AND HIDDEN FOR USER -->
        
 
        <script>
            
            function changePassword(){
				 $("#fm div:nth-child(11)").show();
                 $("#fm div:nth-child(10)").show();
                 $("#fm div:nth-child(9)").show();
                 $('input[name=password]').val('');
                 $("#btn").hide();
                             
            }
             </script>
              <script>
            function validate(){
               var pass1= $("#pass1").val();
               var pass2= $("#pass2").val();
               if(pass1!==pass2){
                   swal("Passwords dont match");
                   
               }
               else{
                   saveUser();
               }
            }
            </script>
        
        
        
       
        
        
        
</body>
</html>


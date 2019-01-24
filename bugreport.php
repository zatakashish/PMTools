<?php
session_start();
if($_SESSION['role']=="admin"){
    include 'navbar.php';
}
else{
    header('Location:index.php');
}


$date= date("m/d/Y", strtotime("-6 days"));


?>
<!DOCTYPE html>

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
         <script type="text/javascript" src="js/bugreport.js"></script>
         
         <link rel="stylesheet" href="css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                                        
                                        
				</head>
				<body>
                                    <form validate="true">
                                    <div class="container">
                                        <div class="row">
         <div style="margin-bottom:20px" class="col-lg-3">
            <input class="easyui-datebox" id="startdate" label="From:" labelPosition="top" style="width:100%;" value="<?php echo $date;  ?>" required>
        </div>
                                            <div style="margin-bottom:20px" class="col-lg-3">
            <input class="easyui-datebox"  id="enddate" label="Till   :" labelPosition="top" style="width:100%;" required value="<?php echo date("m/d/Y");  ?>">
        </div>
                                   
    
    
    <div class="col-lg-3" style="width:100%">
        <div style="margin-bottom:20px">
            <input id="searchtype" required="true"class="easyui-combobox"  name="browser" id="browser" style="width:100%;" data-options="
                    url: 'json/combobox_data2.json',
                    method: 'get',
                    valueField:'value',
                    textField:'text',
                    groupField:'group',
                    label: 'Search By:',
                    labelPosition: 'top'
                    " >
        </div>
    </div>
                                            <div class="col-lg-3" style="margin-top: 20px">
                                                
                                                <button type="button" class="btn btn-primary" onclick=animation()>Search</button>
                                            </div>
                                            
                                            
                                             </div></div>
                                    </form>
                                    
                                    
                                    
                                    <div class="container"  id="animation" hidden >
                                        
                                        
 <img src="images/loader-alt2.gif" style="width: 400px;position: absolute;left: 600px; top:280px;">
                                    </div>
                                    
                                    
                                    
                                    <script>
                                        function animation(){
                                            
                                            var startdate=$("#startdate").val();
                                            var enddate=$("#enddate").val();
                                            var searchtype=$("#searchtype").val();
                                           if(startdate && enddate &&searchtype){
                                              $("#animation").removeAttr("hidden","hidden");
                                              $("#animation").show();
                                              myfun();
                                              
                                           }
                                           else{
                                               swal("Please check all the fields and try again ")
                                           }
                                        }
                                    </script>
                                        
</body>
			</html>

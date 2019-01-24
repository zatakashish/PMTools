<?php 


session_start();
if(!$_SESSION['role']){
	header('Location:index.php');
}








?>

<!DOCTYPE html>

		<html>
			<head>
				<meta charset="UTF8-">
                                <link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="easyui/themes/color.css">
	<link rel="stylesheet" type="text/css" href="easyui/demo/demo.css">
	
	<link rel="stylesheet" href="css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
      <script src="js/sweetalert.min.js"></script>
       <link rel="stylesheet" type="text/css" href="css/print.css" media="print">

				
        
					<title>
									</title>
				</head>
				
				<body>
				


				
				<div style="padding:20px 20px" id="ybody"> 
					
                                        <?php if($_SESSION['role']=="admin"){include 'navbar.php';}
                                        else {include 'navbaruser.php';}
					      
					                            ?>
				<div class="container">
					
				<table>
					<tr>
						<div class="form-group">
                    	<br>
                        
                        <?php if($_SESSION['role']=="admin"){
                        echo '<select class="btm-small  form-control"  style ="width: 15%" onchange=myfun(); id="username">';
                      echo ' <option hidden>SELECT USER</option>';
                        
                        include ('model/conn.php'); 
                        $connectionobject =new Connection();
                        $conn=$connectionobject->connect();
                        $sql="SELECT * FROM users ORDER BY name ASC";
                        $data=mysqli_query($conn,$sql);
                     	while($row=mysqli_fetch_assoc($data)){?>
                       
                        <option value=<?php echo $row['id'] ?> ><?php echo $row['name'] ?></option>
                        <?php } }?>
                     	 </select>
                         
                       <?php if($_SESSION['role']=="user"){
                           $userid=$_SESSION['id'];
                          echo '<input type="hidden" value='.$userid.' id="username">'; 
                           
                           
                       }
                       
                       ?>
                     	 		</div>
                     	 
                     	 	</tr>
                     	 		

                     	 	<tr >
                     	 		
                     	 		<div class="form-group">
                                 <div class="row">
                                  <div class="col-lg-3 box" id="dateselect" >
                                   <label id="label1">From:</label>
<input type="date" class="form-control" placeholder="Date" id="startdate" value="<?php echo date("Y-m-d",strtotime("-7 days"));?>">
                               </div>


                               <div class="col-lg-3 box" id="dateselect2">
                                   <label id="label2">Till:</label>
                                     <input type="date" class="form-control" placeholder="Date"  id="enddate" value="<?php echo date('Y-m-d');?>">
                               </div>
                           </div>
                               <div class="row">

                               	<div class="col-lg-2 box" id="dateselect3" >
                               		<br>
                                   <button type="button" class="btn btn-secondary" onclick="getreport()" id="reportbutton">View Report</button>
                                   <button type="button" class="btn btn-secondary" onclick=location.reload() id="reportbutton2">New Report</button>
                                   <br><br> <button type="button" hidden class="btn btn-primary" onclick="window.print()" id="reportbutton3">Print</button>
                    	
                               </div>
                          </div>
                           	 	</tr>
    			
    		   
				</table>
                                    <div  id="animation"><img src="images/loader-alt3.gif" style="position: absolute;left:40%;top:35%;object-fit: fill"; width="350px"></div>
                                    
                                    
                                    
                                    
                                    <div>
                                                <table border="3" width="100%"
                                                        id ="timetable" class="table table-striped table-hover">
                                                    <thead style="background-color: azure">
                                                    <tr>
                                                    <th scope="col">Date</th>
                                                    <th  scope="col">Day</th>
                                                    <th scope="col">PUNCH IN</th>
                                                    <th scope="col">PUNCH OUT</th>
                                                    <th scope="col">TIME WORKED</th>
                                                    <th scope="col">Remarks</th>
                                                    
                                                    
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-striped" >
                                                    
                                                    </tbody>
                                                   
                                                    
                                                </table>
                                                
                                                
                                            </div>
				     </div>

                                              

		
				
				
				<script type="text/javascript">
              
                                        
 					x=document.getElementById("dateselect");
					y=document.getElementById("dateselect2");
					z=document.getElementById("dateselect3");
                                        a=document.getElementById("timetable");
                                        b=document.getElementById("animation");
                                        c=document.getElementById("reportbutton2");
					x.style.display='none';
					y.style.display='none';
					//z.style.display='none';
                                        a.style.display='none';
                                        b.style.display='none';
                                        c.style.display='none';
                                        
				</script>
                                
                                
                                
                               
                                
				<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
				<script type="text/javascript" src="js/timereport.js"></script>
                              
                                    
                                
                                
                             <?php if($_SESSION['role']=="user"){ echo  ' <script>
                                    $("#dateselect").show();
                                    $("#dateselect2").show();
                                </script>';
                             } ?>
                                
                              

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
			</body>
			</html>

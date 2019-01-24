<?php
session_start();



?>


  
<!DOCTYPE html>

		<html>
			<head>
				<meta charset="UTF8-">
					<title>ATTENDANCE MANAGEMENT SYSTEM</title>
                                        <link rel="stylesheet" href="css/bootstrap.min.css"
                                          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                                        <link rel="stylesheet" href="css/timeentry.css"> 
                                        <script src="js/sweetalert.min.js"></script>
                                       				</head>
        
				<body style="padding:20px 20px" id="body"> 
          <div  id="animation"><img src="images/loader-alt2.gif" style="position: absolute;left:35%;top:20%;object-fit: fill"; width="500px"></div>
                                <div id="ybody">
					<?php  
                                        
                                        if($_SESSION["loggedin"]!=true){
	                                    header('Location:index.php');
                                              }
                                             if($_SESSION['role']!="user"){
                                              
                                              include 'navbar.php';
                                             }
                                             else{
                                              include 'navbaruser.php';
                                             }
                                        
                                        
                                        
                                        ?>
                                       
				                                    	
					
                                        
                                        <div class="container" id="test">
                                   
                                            <div class="row">
                                                <div class ="col-lg-6" >
                                                    
                                                    <button id="button1" onclick="button1clicked()">Punch <br> In</button>
                                                    <br><br>
                                                    <div class="form-group" id=hidefortoday>
                                                     <label for="remarks1">Punchin remarks:</label>
                                                  <textarea class="form-control" rows="2" id="remarks1"></textarea>
                                                   </div>
                                                    
                                                </div>
                                                <div class ="col-lg-6">
                                                    <button id="button2" onclick="button2clicked()">Punch <br> Out</button>
                                                    <br><br>
                                                    <div class="form-group">
                                                     <label for="remarks2">Punchout remarks:</label>
                                                  <textarea class="form-control" rows="2" id="remarks2"></textarea>
                                                   </div>
                                                    
                                                    
                                                   
                                                   
                                                    
                                                </div>
                                            </div>
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
                                        
                   <script  >
                     var text = ["Hello,<?php echo $_SESSION['name']?>"];
                     var counter = 0;
                     var elem = document.getElementById("changeText");
                     var inst = setInterval(change,5000); 
                     function change() {  
                     elem.textContent = text[counter];
                     counter++;
                    if(counter%2!==0){
                       elem.style.color="black";
                        }
                        else{
                       elem.style.color="black";
                                          }
                
                        if (counter >= text.length) {
               counter = 0;
    // clearInterval(inst); // uncomment this if you want to stop refreshing after one cycle
  }
}
</script> 
             
                <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
                 <script > $("#ybody").hide()</script>
                    
              <script type="text/javascript" src="js/timeentry.js"></script>
              <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
              <script >
           


                                        
             
                </div>
				</body>
        <div class="se-pre-con"></div>

			</html>

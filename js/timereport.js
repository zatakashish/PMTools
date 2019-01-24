

function myfun(){

	$("#dateselect").show();
	$("#dateselect2").show();
         $("#dateselect3").show();
}



function getreport(){
        $("#animation").show();
	var empid = $("#username").val();
	var startdate =$("#startdate").val();
	var enddate=$("#enddate").val();
        var employee ="";
	$.ajax({
		type:"POST",
		url:"controller/getreport.php",
		data:{'empid':empid,'startdate':startdate,'enddate':enddate},
		dataType:"json",
		success:function(response){
                    if(response.nodata){
                        $("#timetable").hide();
                        $("#animation").hide();
                    $("#timetable").append(employee);
                  
                    $("#reportbutton2").show();
                    
                     $("#username").hide(); 
                     $("#startdate").hide();
                     $("#enddate").hide();
                     $("#label1").hide();
                     $("#label2").hide();
                   swal("No records have been found!");
                   
                     
                        
                        
                    }
                    if(!response.nodata){
                    	var sumhour=0;
                    	var summinutes=0;
                    	var sumseconds=0;
                    $.each(response,function(key,value){ 
                 var overtime=parseInt(value.overtime);
                 if(overtime==0){
                 employee+= '<tr class="bg-danger">';
               
                 
             }
             else if(overtime>1800){
                 employee+= '<tr class="bg-success">';
                  
             }
             else if (overtime<900){
                 employee+= '<tr class="bg-warning">';
                 
                 
             }
             else{
                   employee+= '<tr class="bg-light">';}
               
               
                employee+='<td>'+value.date+'</td>';
  		        employee+='<td>'+value.day+'</td>';
  		        employee+='<td>'+value.punchin_time+'</td>';
  		        employee+='<td>'+value.punchout_time+'</td>';
                employee+='<td>'+value.workingtime+'</td>';
  		        employee+='<td>'+value.remarks+"-"+value.pout_remarks+'</td>';

  		        employee+='</tr>';
  		         var time=value.workingtime.slice(0,8);
  		          var hour=parseInt(time.slice(0,2)); 
  		          var minutes=parseInt(time.slice(3,5));
  		          var seconds=parseInt(time.slice(6,8));
  		          sumhour += hour;
  		          summinutes+=minutes;
  		          sumseconds+=seconds;

  		
  		          
  		
  	     
  		
                
                
                    });
                    var totalsumseconds= sumhour*3600+summinutes*60+sumseconds;
                    var finalhours=Math.floor(totalsumseconds/3600);
                    var finalminutes=  Math.floor((totalsumseconds%3600)/60);
                    var finalseconds= ((totalsumseconds%3600)%60);
                    var total=finalhours+" Hours "+finalminutes+" Minutes "+finalseconds+" Seconds";


                    
                    employee+= '<tr class="bg-light">';
                    employee+='<td colspan="6" style="text-align:center">Total      : '+total+'</td>';
                    employee+='</tr>';
                    $("#animation").hide();
                    $("#timetable").append(employee);
                    $("#timetable").show();
                    $("#reportbutton2").show();
                    $("#reportbutton3").removeAttr("hidden");
                     $("#username").hide(); 
                     $("#startdate").hide();
                     $("#enddate").hide();
                     $("#label1").hide();
                     $("#label2").hide();
                    
                }
            }
            });
            $("#reportbutton").hide();
            
            
            }
                
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                   


          
           
                    



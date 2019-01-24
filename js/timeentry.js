
//AFTER PRESSING THE PUNCH IN BUTTON
 function button1clicked(){
  $("#ybody").hide();
  $("#animation").show();
  $("#button1").attr("disabled","disabled");

    var remarks1=$("#remarks1").val();
     jQuery.ajax({
  type:"POST",
  url:'controller/punchin.php',
  data:{ 'remarks1':remarks1},
  success:function(response){
  	location.reload();
              }});}
     
//AFTER PRESSING THE PUNCH OUT    
function button2clicked(){
  $("#ybody").hide();
  $("#animation").show();
  var remarks2=$("#remarks2").val();
  
  jQuery.ajax({
  type:"POST",
  url:'controller/punchout.php',
  dataType:"json",
   data:{ 'remarks2':remarks2},

    success:function(response){
        if(response.false){
          $("#animation").hide();
          $("#ybody").show();
          swal("Please enter a remark for leaving early");
        }


        if(response.success){
          
          location.reload();

        }
   

  
     
  }});}

  	
//GET THE USERS TABLE

function showbutton1(){
    $("#disabled").removeAttr("disabled");
    $("#disabled").attr("id","button1");



   }






$(document).ready(myfunction()); 

  
   function myfunction(){


   


   $("#button2").attr("disabled","disabled");
   $("#button2").attr("id","disabled2");
   $("#button1").attr("disabled","disabled");
   $("#button1").attr("id","disabled");
  


        //date finder
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10) {
      dd = '0'+dd
} 
     if(mm<10) {
     mm = '0'+mm
} 
      today = yyyy+'-'+mm+'-'+dd;
      //date finder ends


	     var employee ="";
  
	jQuery.ajax({
        type:"POST",
        url:'controller/get_users.attendance.php',
        dataType:"json",

        success:function(response){
          if(response.nodata){
         
            showbutton1();
          }
          if(!response.nodata){
            
           var punchedin=0;
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
               

                     
                if(value.date==today){
                	var hidethediv='<h2 style="color:green; text-align:center">Punched in for today <br>at '+value.punchin_time+'  </h2>';
                    $("#hidefortoday").html(hidethediv);	
                    $("#button1").attr("disabled","disabled");
                    $("#button1").attr("id","disabled");
                    $("#disabled2").removeAttr("disabled");
                    $("#disabled2").attr("id","button2");
                    punchedin++;


                }
                if(punchedin==0){
                	$("#timetable").hide();
                	showbutton1();

                }




                


                        
  	});
    }


  	$("#timetable").append(employee);
        $("#animation").hide();
        $("#ybody").show();
    
       }
});

};

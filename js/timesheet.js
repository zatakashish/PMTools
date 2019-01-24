function submit(){
    for(var i=1; i<=5;i++){
        var projectname=$("#project"+i).val();
        var projectarea=$("#area"+i).val();
        var time=$("#time"+i).val();
        var userid=$("#userid").val();
        var date=$("#datebox").val();
        
      
        
       
     
        
        $.ajax({
            type:'Post',
            url:'controller/saveTimeSheet.php',
            dataType:'json',
            data:{"projectname":projectname,"projectarea":projectarea,"time":time,"userid":userid,"date":date,"row":i},
            success:function (response){
                       // $('#project'+response.row).val(response.projectname);
                        $('#project'+response.row).attr("disabled","disabled");
                       // $('#area'+response.row).val(response.projectarea);
                        $('#area'+response.row).attr("disabled","disabled");
                       // $('#time'+response.row).val(response.time);
                        $('#time'+response.row).attr("disabled","disabled");
                        $('#status'+response.row).html("Submitted");
                        $('#editbutton').removeAttr("hidden","hidden");
                        $("#editbutton").show();
                
               
                
                
                
               if(response.row){
                   $('#submitbutton').hide();
                   
                    swal({
  title: "Success!",
  text: "Timesheet successfully submitted !",
  icon: "success",
  button: "OK",
});


            }}
       
        });
        
        
 
       
        
        
    }
}

function editTimeSheet(){
    
    $("#submitbutton").hide();
    $("#editbutton2").removeAttr("hidden");
    $("#cancelbutton").removeAttr("hidden");
    $("#editbutton2").show();
    $("#cancelbutton").show();
  
    for(var i=1; i<=5;i++){
       $("#project"+i).removeAttr("disabled","disabled");
       $("#area"+i).removeAttr("disabled","disabled");
       $("#time"+i).removeAttr("disabled","disabled");
       $("#status"+i).hide();
   }};
       
       
       
     
     function edit(){ 
        for(var i=1; i<=5;i++){
        var projectname=$("#project"+i).val();
        var projectarea=$("#area"+i).val();
        var time=$("#time"+i).val();
        var userid=$("#userid").val();
        var date=$("#datebox").val();
        $.ajax({
            type:'Post',
            url:'controller/updateTimeSheet.php',
            dataType:'json',
            data:{"projectname":projectname,"projectarea":projectarea,"time":time,"userid":userid,"date":date,"row":i},
            success:function (response){
                       // $('#project'+response.row).val(response.projectname);
                        $('#project'+response.row).attr("disabled","disabled");
                       // $('#area'+response.row).val(response.projectarea);
                        $('#area'+response.row).attr("disabled","disabled");
                       // $('#time'+response.row).val(response.time);
                        $('#time'+response.row).attr("disabled","disabled");
                        $('#status'+response.row).html("Submitted");
                        $('#editbutton').removeAttr("hidden","hidden");
                        $("#editbutton").show();
                        $("#status"+response.row).show();
                       
                
               
                
                
                
               if(response.row){
                        $("#editbutton2").hide();
                        $("#cancelbutton").hide();
                    swal({
  title: "Success!",
  text: "Timesheet successfully updated !",
  icon: "success",
  button: "OK",
});


            }}
       
        });
        
        
 
       
        
        
    
       
       
        
    }
     }



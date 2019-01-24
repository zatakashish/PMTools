

function myfun(){
    
    
   
    var startdate=$("#startdate").val();
    var enddate=$("#enddate").val();
    var searchtype=$("#searchtype").val();
    //alert(searchtype);
    
    $.ajax({
        type:"POST",
        url:"controller/bugreport.php",
        data:{"startdate":startdate,"enddate":enddate,"searchtype":searchtype},
        dataType:"json",
        success:function(response){
            $("#animation").hide();
  swal(response.rowcount+" Issues have been reported", "Between "+response.startdate +" and "+ response.enddate +" \n  \n with "+response.searchgroup+" '"+ response.searchtype+" '", "success");
            
        }
        
        
    });
}
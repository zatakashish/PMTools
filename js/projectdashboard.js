

$( document ).ready(function myfun(){
    $('#addbutton').hide();
    $('#delbutton').hide();
    $("#addinfo").hide();
    $("#uploadbutton").hide();
    $("#filebutton").hide();
    
    
    
   
   
    var projectid=$('#projectid').val();
     var projectmember=$("#selectuserbutton").val();
    $.ajax({
        
        type:"POST",
        url:"controller/getprojectdetails.php",
        data:{'projectid':projectid},
        
        dataType:"json",
        
        success:function(response){
            var projectname=response[0].name;
            var projectmanager=response[0].project_manager;
            var startdate=response[0].start_date;
            var releasedate=response[0].release_date;
            
            
            
            
            $("#projectname").text(projectname);
            $("#projectmanager").text(projectmanager);
            $("#startdate").text(startdate);
            $("#releasedate").text(releasedate);
            
           
           
        }
        
        
        
        
        
    });
    
    
   $.ajax({
       
       type:"POST",
       url:"controller/getprojectmembers.php",
       data:{'projectid':projectid},
       dataType:"json",
       success:function(response){
           $.each(response, function (key,value){
              $("#list").append("<label>"+" * "+value.name+"</label><br>");
           });
        
        
       
       }
       
       
       
   });
   
   
   $.ajax({
       
       type:"POST",
       url:"controller/getprojectinfo.php",
       data:{'projectid':projectid},
       dataType:"json",
       success:function(response){
           var projectinfo=response[0].project_info;
         // $("#projectdetails").text(projectinfo);
         $("#textarea").text(projectinfo);
         
        
        
       
       }
       
       
       
   });
   
   
   $.ajax({
       type:"POST",
       url:"controller/getprojectfiles.php",
       data:{'projectid':projectid},
       dataType:"JSON",
       success:function(response)
       {
           $.each(response,function(key,value){

         var filename=value.filename;
$("#filelist").append("<li id=file"+value.id+"><a target='_blank' href=uploads/"+value.filename+">"+value.filename+"</a><div><button class='btn btn-s' onclick=delfile("+value.id+")><i class='fa fa-trash'></i></button></div></li>");      
              
           });
       }
      
       
       
       
   });
   
    
    
    
    
    
    
    
    
    
    
    
    
});




function addmember(){
   
    
    var projectid=$('#projectid').val();
    var projectmember=$("#selectuserbutton").val();
    $.ajax({
        
        type:"post",
        url:"controller/addprojectmember.php",
        data:{"projectid":projectid,"projectmember":projectmember},
        success:function(response){
            
            location.reload();
           
            
            
        }
    });
}



function delmember(){
    var projectmember=$("#selectuserbutton").val();
    var projectid=$('#projectid').val();
    $.ajax({
        url:"controller/deletemember.php",
        type:"POST",
        data:{"memberid":projectmember,"projectid":projectid},
        success:function(response){
            location.reload();
        }
        
        
        
        
    });
}

function showfun(){
     $('#addbutton').show();
    $('#delbutton').show();

}

function updateinfo(){
  var projectinfo= $("#textarea").val();
  var projectid=$('#projectid').val();
  $.ajax({
        url:"controller/updateinfo.php",
        type:"POST",
        data:{"projectid":projectid,"projectinfo":projectinfo},
        success:function(response){
            swal("Success!", "Project details updated successfully !", "success");
             $('#textarea').attr("readonly","readonly");
             $("#addinfo").hide();
             
            
        }
        
        
        
        
    });
  

  
}

function edittext(){
    $('#textarea').removeAttr("readonly");
    $("#addinfo").show();
    
}

function showupload(){
    $("#uploadbutton").show();
     
}

function showfilebutton(){
    $("#filebutton").show();
    $("#uploadfiletag").hide();
    $("#uploaderror").hide();
    
    }
    
    
    
    
    function delfile(id){
              
        swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      
      $.ajax({
          
          url:"controller/delfile.php",
          type:"Post",
          data:{"id":id},
          dataType:"json",
          success:function(response){
              if(response.success){
                   swal("Your file has been deleted!", {
           icon: "success",
    });
    
    $("#file"+response.success).hide();
    
                  
              }
              
          }
      });
      
      
   
    
    
    
  } else {
    swal("Your  file is safe!");
  }
});
       
       
       
       
       
       
    }


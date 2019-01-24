

function getTimeSheet()
{
    var userid=$("#select").val();
    $("#table").html(""); 
    $.ajax({
        
        url:"controller/getTimeRecords.php",
        data:{"userid":userid},
        dataType:"json",
        type:"post",
        success:function(response){
            if(response.nodata){
                swal("No records found");
            }
            
            
            else{
                
                  var tablehead="<tr>"
                         tablehead+= " <th>Date</th>";
                        tablehead+="<th>Projectname</th>";
                     tablehead+="<th>Projectarea</th>";
                      tablehead+= "<th>Time Spent</th>";
                          tablehead+= "</tr>";
                           $('#table').append(tablehead);
                          
                $.each(response,function(key,value){
                  
                    tabledata ="<tr style='border:none' id=row"+value.id+">";
                    tabledata+="<td>"
                    tabledata+=value.date
                    tabledata+="</td>"
                    tabledata+="<td>";
                    tabledata+=value.projectname;
                    tabledata+="</td>";
                    tabledata+="<td>";
                    tabledata+=value.projectarea;
                    tabledata+="</td>";
                    tabledata+="<td>";
                    tabledata+=value.time;
                    tabledata+="</td>";
                    
                   tabledata+="<td style='border:none'>";
  tabledata+='<button style="margin-left:10px" type="button" class="btn btn-success" onclick=approve('+value.id+')>Approve</button>';
  tabledata+='<button style="margin-left:20px" type="button" class="btn btn-danger" onclick=decline('+value.id+')>Decline</button>';
                    tabledata+="</td>";
                    tabledata+="</tr>";
                    $('#table').append(tabledata);
                });
                
                $("table").removeAttr("hidden");
                
                
                
                
                
            }
            
        }
    });
    
    
    
    
    
}


function approve(id){
    var id= id;
    $.ajax({
        url:"controller/approvetimesheet.php",
        data:{"id":id},
        type:"post",
        dataType:"json",
        success:function (response){
            $("#row"+response.success).remove();
            
        }
    });
    
    
}


function decline(id){
    var id= id;
    $.ajax({
        url:"controller/declinetimesheet.php",
        data:{"id":id},
        type:"post",
        dataType:"json",
        success:function (response){
             $("#row"+response.success).remove();
            
        }
    });
   
}



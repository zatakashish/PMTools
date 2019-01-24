
function center(){
        var row = $('#dg').datagrid('getSelected');
          $.messager.show({
                title:'Description',
                msg:row.description,
                style:{
                    
                    right:'',
                    bottom:''
                }
            });
            
            
            
            
            }
            
            
            
           
                   function myfun(){
                       
                       $('#dg').datagrid({
                  rowStyler:function(index,row){
               if (row.timespent>1){
            return 'background-color:pink;color:blue;font-weight:bold;';
        }
    }
});

                   }
                       
                       
                   
                   
        
        
        
        
        
           
            
            
            
          
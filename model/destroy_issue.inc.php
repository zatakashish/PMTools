<?php


        include 'conn.php';
        
        class IssueDestroyer extends Connection{
            
            
            
            
            
            public function destroyIssue($id){
                
                $conn=$this->connect();
                $sql="DELETE FROM issue_management WHERE id='$id' ";
                $result=mysqli_query($conn,$sql);
                if($result){
                    echo json_encode(array(
                        
                        'success'=>"succesfully deleted"
                        
                        
                    ));
                }
            }
        }
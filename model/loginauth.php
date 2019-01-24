<?php


       include 'conn.php';
       class LoginAuthentication extends Connection{
            
           public function loginCheck($email,$password){
           $conn=$this->connect();
           $sql="SELECT * FROM users WHERE email='$email' AND password ='$password' ";
           $result=mysqli_query($conn,$sql);
           //$row_count=mysqli_num_rows($runQuery);
           //$data=mysqli_fetch_assoc($runQuery);
           return $result;
       
           }
           
           public function loginValidation($result){
               $row_count=mysqli_num_rows($result);
               return $row_count;
               
           }
           
           public function fetchUserData($result){
               $data=mysqli_fetch_assoc($result);
               return $data;
           }
           
           
           public function fetchRole($data){
               $fetchrole=$data['role'];
               return $fetchrole;
           }
           
           
           public function fetchType($data){
               $fetchtype=$data['type'];
               return $fetchtype;
           }
           
   }

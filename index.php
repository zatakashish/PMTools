
<html>
<title>PROJECT MANAGEMENT</title>
  <head>

  <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="easyui/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet">
<script src="js/sweetalert.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">


  <div class="container" id="animation"></div>


<div class="container">

<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>User Login</h2>
   <p>Please enter your email and password</p>
   </div>
 
    <div>
    	

        <div class="form-group">
            <input type="text" class="form-control" id="inputEmail" placeholder="Email Address" required name="email">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" required name="password">
        </div>
		<br/>
        <div>
        	<span id ="loader"></span>
        </div>
        <div class="form-group">
        <button  type="submit" class="btn btn-primary" onclick="logincheck()" id="loginbutton">Login</button>
        </div>
    
      </div>









   
    </div>
    <p class="botto-text" id="footer">&copy; Copyright <a style ="color: white" href ="http://www.infoxit.com/">2018 by InfoxIT</a> </p>
</div></div></div>


<script type="text/javascript" src="js/ajaxlogin.js">
</script>

 <script type="text/javascript">
             $(document).keypress(function (e) {
                 
                            if ((e.keyCode || e.which) ==13) {
                                // Enter key pressed
                                $('#loginbutton').trigger('click');
                            }
                        });

                        $('#loginbutton').click(function (e) {
                            e.preventDefault();
                            // Link clicked
                        });
            </script>
</body>
<script>
function logincheck(){
    var email=$("#inputEmail").val();
    var password=$("#inputPassword").val();
    if(email && password){
        ajaxloader();
    }
    else if(email && !password){
        swal("Please enter a password !");
    }
    else if( !email && password){
        swal("Please enter an Email");
    }
}</script>
</html>

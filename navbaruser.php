
<?php 
echo '
	

<div >
     

     <h4 style="text-align: center" id=changeText>Hello,'. $_SESSION["name"].'</h4>



	<a style="position: absolute;right: 1.4%;top:30px" href="logout.php">LOGOUT</a>
        


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link " href="timeentry.php" >Punch In/Out <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="timereport.php" >Time Report</a>
            <a class="nav-item nav-link" href="issuemanagement.php" >Issue Management</a>
            <a class="nav-item nav-link" href="timesheet.php" >Timesheet</a>
    </div>
  </div>
</nav>
</div>


' ;
?>
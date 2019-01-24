//Display Animation on Login Button Click
function ajaxloader(){
        $("#LoginForm").css('background-image','url(images/white.jpg)');
	    $("#footer").hide();
	    $(".main-div").hide();
	    $("#animation").show();
	    $("#animation").html('<img src="images/loader-alt.gif" style="display: block;margin-left: auto;margin-right: auto; width: 40%; margin-top:15%">');
  		var inputEmail=$("#inputEmail").val();
		var inputPassword=$("#inputPassword").val();
		jQuery.ajax({

			type:"POST",
			url:"controller/login.php",
			data:{'email':inputEmail,'password':inputPassword},
			dataType:"json",

			success:function(response){
			if (response.success){
				window.location=response.success;
				
			}
			if(response.error){
				$("#loader").html('<h6 style="color:red">Incorrect Username/Password</h6><br/>');
				$("#loginbutton").show();
				$(".main-div").show();
				$("#animation").hide();
				$("#footer").show();
				$("#LoginForm").css('background-image','url(images/blue.jpg)');
			}
		}
		});
	}
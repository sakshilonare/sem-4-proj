<?php 

	session_start();
	
	if(isset($_SESSION['crud3'])){
		header("Location: ind.php");
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title> Login</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="login.css">
    <link rel="shortcut icon" type="image/ico" content="favicon.ico"  />
</head>
<body>
	<form method="POST">
        <div class="headingsContainer">
            <h1>Login</h1>
            <p>Sign in with your email and password</p>
        </div>

        <!-- Main container for all inputs -->
        <div class="mainContainer">
            <!-- Username -->
			<div class="first">
            <label for="email">Your Email</label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>
			<span id="email_error" class="field_error"></span>
			</div>
            <!-- Password -->
			<div class="first">
            <label for="pswrd">Your password</label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>
			<span id="email_error" class="field_error"></span>	
			</div>

			<!-- <div class="first">
			<button type="button" name="button" id="otp" class="btn" onclick="send_otp()">Send OTP</button>
			</div> -->

            <!-- sub container for the checkbox and forgot password link -->

			<!-- <div class="second">
            <label for="otp">Enter your OTP</label>
            <input type="text" placeholder="Enter OTP" name="otp" id="otp" required>
			<span id="otp_error" class="field_error"></span>
			</div> -->
            <!-- sub container for the checkbox and forgot password link -->
			<div class="subcontainer">
                <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                <p class="forgotpsd"> <a href="#">Forgot Password?</a></p>
            </div>

			<!-- <div class="second">
            <button type="button" class="btn" onclick="submit_otp()">Login</button>
        	</div> -->
			<button type="button" name="button" id="login">Login</button>
            <!-- Sign up link -->
            <p class="register">Not a member? <a href="http://localhost/crud3/php/registration.php">Register here!</a></p>
           <p class="back"><a href="http://localhost/crud3/"><- Back to PomoDone</a></p> 
        </div>
	</form>

<!-- <script>
function send_otp(){
    var email=jQuery('#email').val();
    var password = $('#password').val();
    jQuery.ajax({
        url:'send_otp.php',
        type:'post',
        data:{email: email, password: password},
        success:function(result){
            if(result=='yes'){
                jQuery('.mainContainer .second').show();
                jQuery('.mainContainer .first').hide();
            }
            if(result=='not_exist'){
                jQuery('#email_error').html('Please enter valid email or password');
            }
        }
    });
}
//After making this change, the AJAX request should execute properly, and you should be able to see the output of the send_otp.php script in the browser console or network tab.
	
	function submit_otp(){
	var otp=jQuery('#otp').val();
	jQuery.ajax({
		url:'check_otp.php',
		type:'post',
		data:'otp='+otp,
		success:function(result){
			if(result=='yes'){
				window.location='ind.php';
			}
			if(result=='not_exist'){
				jQuery('#otp_error').html('Please enter valid otp');
			}
		}
	});
}
</script> -->

<script src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
	$(function(){
		$('#login').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){
				var email = $('#email').val();
				var password = $('#password').val();
			}

			e.preventDefault();

			$.ajax({
				type: 'POST',
				url: 'jslogin.php',
				data:  {email: email, password: password},
				success: function(data){
					//alert(data);
					if($.trim(data) === "1"){
						setTimeout(' window.location.href =  "ind.php"', 2000);
					}
				},
				error: function(data){
					alert('there were erros while doing the operation.');
				}
			});

		});
	});
</script> 
</body>
</html>
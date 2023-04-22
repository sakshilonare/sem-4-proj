<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="reg.css">
    <link rel="shortcut icon" type="image/x-icon" content="favicon.ico"  />
</head>
<body onload="document.form1.email.focus()">
<div>
	<form name="form1" action="registration.php" method="post">
    <div class="headingsContainer">
            <h1>Register</h1>
            <p>Kindly fill in the details</p>
        </div>

          <label for="username"><b>Username</b></label>
          <input
            type="text"
            placeholder="Enter username"
            name="uname"
            id="uname"
            required
          />
          <label for="email"><b>Email</b></label>
          <input
            type="text"
            placeholder="Enter Email"
            name="email"
            id="email"
            required
          />

          <label for="pwd"><b>Password</b></label>
          <input
            type="password"
            placeholder="Enter Password"
            name="password"
            id="password"
            required
          />
  
          <label for="pwd-repeat"><b>Repeat Password</b></label>
          <input
            type="password"
            placeholder="Repeat Password"
            name="cpassword"
            id="cpassword"
            required
          />

          <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" class="input" name="phonenumber" id="phonenumber">
           </div>
            <button type="submit" name="create" id="register">Register</button>
            <div >
          <p class="login">Already have an account? <a href="http://localhost/crud3/php/login.php">Log in</a>.</p>
          <p class="back"><a href="http://localhost/crud3/"><- Back to PomoDone</a></p> 
        </div>
        </div>
       <!-- wrapping the text inside the p tag with a tag for routing to the login page URL-->
        <!-- the # must ideally be replaced by the login page URL -->
    </div>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){


			var uname 	= $('#uname').val();
			var email 		= $('#email').val();
			var phonenumber = $('#phonenumber').val();
			var password 	= $('#password').val();
       var cpassword 	= $('#cpassword').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {uname: uname,email: email,phonenumber: phonenumber,password: password,cpassword: cpassword},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
                //setTimeout(' window.location.href =  "login.php"', 2000);
								}).then(function(){
                    window.location.href = "login.php";
                  });		
					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}

				});

				
			}else{
				
			}

			



		});		

		
	});
  </script>
</body>
</html>
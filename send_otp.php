<?php
session_start();
$con=mysqli_connect('localhost','root','','useraccounts');
$email=$_POST['email'];
$password = $_POST['password'];
$stmt = mysqli_prepare($con, "SELECT * FROM users WHERE email=? AND password=? LIMIT 1");
mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$count = mysqli_num_rows($res);
if($count>0){
	 $otp=rand(11111,99999);
	$stmt2 = mysqli_prepare($con, "UPDATE users SET otp=? WHERE email=? AND password=?");
	mysqli_stmt_bind_param($stmt2, "sss", $otp, $email, $password);
	mysqli_stmt_execute($stmt2);
	// $html="Your otp verification code is ".$otp;
	// $_SESSION['EMAIL']=$email;
	// smtp_mailer($email,'OTP Verification',$html);
	echo "yes";
}else{
	echo "not_exist";
}

// function smtp_mailer($to,$subject, $msg){
// 	require_once("php/smtp/class.phpmailer.php");
// 	$mail = new PHPMailer(); 
// 	$mail->IsSMTP(); 
// 	$mail->SMTPDebug = 1; 
// 	$mail->SMTPAuth = true; 
// 	$mail->SMTPSecure = 'TLS'; 
// 	$mail->Host = "smtp.sendgrid.net";
// 	$mail->Port = 587; 
// 	$mail->IsHTML(true);
// 	$mail->CharSet = 'UTF-8';
// 	$mail->Username = "keash.ntensified@gmail.com";
// 	$mail->Password = "i hate myself 123";
// 	$mail->SetFrom("keash.ntensified@gmail.com");
// 	$mail->Subject = $subject;
// 	$mail->Body =$msg;
// 	$mail->AddAddress($to);
// 	if(!$mail->Send()){
// 		return 0;
// 	}else{
// 		return 1;
// 	}
// }
?>
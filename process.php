<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$uname 		= $_POST['uname'];
	$email 			= $_POST['email'];
	$phonenumber	= $_POST['phonenumber'];
	$password 		= $_POST['password'];
    $cpassword 		= $_POST['cpassword'];

		$sql = "INSERT INTO users (uname, email, phonenumber, password, cpassword) VALUES(?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$uname,$email, $phonenumber, $password,$cpassword]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}
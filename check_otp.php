<?php
session_start();
$con=mysqli_connect('localhost','root','','useraccounts');
$otp=$_POST['otp'];
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $password = $_POST['password'];
    $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE email=? AND password=? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($res);
    if($count>0){
        $stmt2 = mysqli_prepare($con, "UPDATE users SET otp=? WHERE email=? AND password=?");
        mysqli_stmt_bind_param($stmt2, "sss", $otp, $email, $password);
        mysqli_stmt_execute($stmt2);
        $_SESSION['IS_LOGIN']=$email;
        echo "yes";
    }else{
        echo "not_exist";
    }
}else{
    echo "session_expired";
}
?>
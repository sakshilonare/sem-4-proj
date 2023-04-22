<?php
session_start();
unset($_SESSION['IS_LOGIN']);
unset($_SESSION['EMAIL']);
header('location:http://localhost/crud3/');
die();
?>
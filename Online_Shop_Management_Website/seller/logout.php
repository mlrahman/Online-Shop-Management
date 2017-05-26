<?php
	include("session_check.php"); 
	session_start();
	unset($_SESSION['acc_type']);
	unset($_SESSION['session_username']);
	unset($_SESSION['session_password']);
	unset($_SESSION['session_id']);
	session_write_close();
	header("location: ../index.php");
?>
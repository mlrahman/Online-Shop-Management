<?php
	session_start();
	if(isset($_SESSION['acc_type']) && isset($_SESSION['session_username']) && isset($_SESSION['session_password']) && isset($_SESSION['session_id']))
	{
		//OK
	}
	else
	{
		header("location: ../index.php");
	}
	session_write_close();
?>
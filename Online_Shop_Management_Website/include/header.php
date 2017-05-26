<!DOCTYPE html>
<html>
	<head>
		<title>দৈনিক বাজার</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
     
	    <div id='main_container'>
			
			<div id="header_panel"></br>
				<h1 style="font-size:120px;margin-top:70px;color:#222;" title="দৈনিক বাজার">দৈনিক বাজার</h1>
				<?php include("include/connection.php"); ?>
				<?php include("include/function.php"); ?>
				<?php
					session_start();
					if(isset($_SESSION['acc_type']) && isset($_SESSION['session_username']) && isset($_SESSION['session_password']) && isset($_SESSION['session_id']))
					{
						if($_SESSION['acc_type']=="admin")
							header("location: admin/index.php");
						else if($_SESSION['acc_type']=="seller")
							header("location: seller/index.php");
						else if($_SESSION['acc_type']=="customer")
							header("location: customer/index.php");
					}
					else
					{
						unset($_SESSION['acc_type']);
						unset($_SESSION['session_username']);
						unset($_SESSION['session_password']);
						unset($_SESSION['session_id']);
					}
					session_write_close();
				?>
			</div> 
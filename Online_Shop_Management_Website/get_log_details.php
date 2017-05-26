<?php
if(isset($_GET['username']) && isset($_GET['password']))
{
	include("include/connection.php");
	$username=$_GET['username'];
	$password=$_GET['password'];
	$password=sha1($password);
	
	
	
	$query1="select * from customer_information where username='$username' and password='$password' and status='active' ";
	$result1=mysql_query($query1);
	
	$query2="select * from seller_information where username='$username' and password='$password' and status='active' ";
	$result2=mysql_query($query2);
	
	$query3="select * from admin_information where username='$username' and password='$password' and status='active' ";
	$result3=mysql_query($query3);
	
	if(mysql_num_rows($result3)>=1)
	{
		$data3=mysql_fetch_array($result3);
		session_start();
		$_SESSION['welcome']="welcome";
		$_SESSION['acc_type']="admin";
		$_SESSION['session_username']=$username;
		$_SESSION['session_password']=$password;
		$_SESSION['session_id']=$data3['admin_id'];
		session_write_close();
?>
		<h1 style="text-align:center;color:green;"> Admin Account</h1>
		<hr style="height:10px;width:250px;">
		<h2 style="color:blue;margin-top:10px;margin-left:10px;">Welcome,</h2>
		<h3 style="color:purple;text-align:center;"><?php echo $data3['name']; ?></h3>
		<a href="admin/index.php" class="myButton" title="Click here to enter your account" style="margin:25px 0px 0px 50px;">Enter Your Account</a>
<?php

	}
	else if(mysql_num_rows($result2)>=1)
	{
		$data2=mysql_fetch_array($result2);
		session_start();
		$_SESSION['welcome']="welcome";
		$_SESSION['acc_type']="seller";
		$_SESSION['session_username']=$username;
		$_SESSION['session_password']=$password;
		$_SESSION['session_id']=$data2['seller_id'];
		session_write_close();
?>
		<h1 style="text-align:center;color:green;"> Seller Account</h1>
		<hr style="height:10px;width:250px;">
		<h2 style="color:blue;margin-top:10px;margin-left:10px;">Welcome,</h2>
		<h3 style="color:purple;text-align:center;"><?php echo $data2['name']; ?></h3>
		<a href="seller/index.php" class="myButton" title="Click here to enter your account" style="margin:25px 0px 0px 50px;">Enter Your Account</a>
<?php
	}
	else if(mysql_num_rows($result1)>=1)
	{
		$data1=mysql_fetch_array($result1);
		session_start();
		$_SESSION['welcome']="welcome";
		$_SESSION['acc_type']="customer";
		$_SESSION['session_username']=$username;
		$_SESSION['session_password']=$password;
		$_SESSION['session_id']=$data1['customer_id'];
		session_write_close();
?>
		<h1 style="text-align:center;color:green;"> Customer Account</h1>
		<hr style="height:10px;width:250px;">
		<h2 style="color:blue;margin-top:10px;margin-left:10px;">Welcome,</h2>
		<h3 style="color:purple;text-align:center;"><?php echo $data1['name']; ?></h3>
		<a href="customer/index.php" class="myButton" title="Click here to enter your account" style="margin:25px 0px 0px 50px;">Enter Your Account</a>
<?php
	}
	else
	{
?>
	
		<img src="images/system/close.ico" title="Close log in window." style="height:20px;width:20px;margin: 0px 0px 0px 280px;" onclick="close_log_in()">
		<h1 style="text-align:center;"> Log In Now</h1>
		<hr style="height:10px;width:250px;">
		<table style="margin:10px 0px 0px 30px;">
			<tr>
				<td colspan="2" align="center"> <p id="msg" style="color:red;margin:0px;"> Invalid username or password !!!</p>  </td>
			</tr>
				
			<tr>
				<td>Username: </td>
				<td><input type="text" autocomplete="off" placeholder="  Username" title="Enter your username" id="username" style="border-radius:5px;" required></td>
			</tr>
			
			<tr>
				<td colspan="2"> </td>
			</tr>
			
			<tr>
				<td>Password: </td>
				<td><input type="password" autocomplete="off" placeholder="  Password" title="Enter your password" id="password" style="border-radius:5px;" required></td>
			</tr>
			
			<tr>
				<td colspan="2"> &nbsp </td>
			</tr>
			
			<tr>
				<td colspan="2" align="center"> 
					<input type="submit" name="signup" value="Sign Up" title="Click to register"  style="width:60px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;">
					<input type="submit" onclick="log_exec()" title="Click to login" name="login" value="Log In"  style="margin-left:30px;width:60px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;">
				</td>
			</tr>
		</table>
	

	
<?php
	}
?>

<?php
	}
else
	{
		header("location: index.php");
	}
?>
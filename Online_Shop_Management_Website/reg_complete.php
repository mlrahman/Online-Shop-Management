<?php
if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['acc_type']))
{
	include("include/connection.php");
	$name=$_GET['name'];
	$email=$_GET['email'];
	$acc_type=$_GET['acc_type'];
	$sq3="select * from ".$acc_type."_information where email='$email' ";
	$res3=mysql_query($sq3);
	if(mysql_num_rows($res3)==0)
	{
	
		$sq="select * from customer_information ";
		$res=mysql_query($sq);
		if($acc_type=='customer')
			$username='cusacc'.date("his").(mysql_num_rows($res)+1);
		else
			$username='selacc'.date("his").(mysql_num_rows($res)+1);
		$password=date("Ymdhis");
		$password=$password+rand(000000,999999);
		$new_password=sha1($password);
		$sql="insert into ".$acc_type."_information(name,email,username,password,status) values('$name','$email','$username','$new_password','active')";
		mysql_query($sql);
		$to      = $email;
		$subject = '** noreply ** DAILY BAZAR';
		$message = 'Dear user you requested for open an account in www.dailybazar.com'.  "\r\n" . 'and we approved your request now you can log in to our site.' . "\r\n". 'Our site is still under construction so you can\'t access properly but very soon'. "\r\n" .'it will be activate. We will confirm you after activation. Stay with us thank you.'. "\r\n\n\n" .'Username: '.$username. "\r\n" .'Password: '.$new_password. "\r\n\n\n\n" .'Log in now at: '. "\r\n\n" .'http://dailybazar.com';
		$headers = 'From: dailybazar@gmail.com' . "\r\n" .'Reply-To: dailybazar@gmail.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $headers);
	}
	?>



<img src="images/system/close.ico" title="Close log in window." style="height:20px;width:20px;margin: 0px 0px 0px 280px;" onclick="close_log_in()">
	<h1 style="text-align:center;"> Register Now</h1>
	<hr style="height:10px;width:250px;">
	<table style="margin:10px 0px 0px 30px;">
		
		<tr>
			<td colspan="2" align="center"> <?php if(mysql_num_rows($res3)==0){ ?><p id="msg" style="color:green;margin:0px;"> Registration Successfull.</br> <font color="blue"> Please check your email for confirmation. </font> </p><?php }else { ?><p id="msg" style="color:red;margin:0px;"> Oops!! Email is already in use. </font> </p><?php } ?></td>
		</tr>
		
		<tr>
			<td>Account Type: </td>
			<td>
				<select id="acc_type" required>
					<option value="">Select..</option>
					<option value="customer">Customer</option>
					<option value="seller">Seller</option>
				</select>
			</td>
		</tr>
		
		
		<tr>
			<td colspan="2"> </td>
		</tr>
		
		
		<tr>
			<td>Name: </td>
			<td><input type="text" autocomplete="off" placeholder="  Your name" title="Enter your Full Name." id="name" style="border-radius:5px;" required></td>
		</tr>
		
				
		<tr>
			<td colspan="2"> </td>
		</tr>
		
		<tr>
			<td>Email: </td>
			<td><input type="text" autocomplete="off" placeholder=" Your Email address" title="Enter your email address." id="email" style="border-radius:5px;" required></td>
		</tr>
		
		<tr>
			<td colspan="2">  </td>
		</tr>
		
		<tr>
			<td colspan="2" align="right"> 
				<input type="submit" onclick="log_form()" title="Click to login" name="login" value="Log In"  style="margin-left:30px;width:60px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;">
				<input type="submit" onclick="reg_exec()" title="Click to register now." name="signup" value="Sign Up"  style="margin-left:30px;width:60px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;">
			</td>
		</tr>
	</table>
	
	
<?php
	}
else
	{
		header("location: index.php");
	}
?>
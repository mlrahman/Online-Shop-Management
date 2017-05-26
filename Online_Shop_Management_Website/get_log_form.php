
	<img src="images/system/close.ico" title="Close log in window." style="height:20px;width:20px;margin: 0px 0px 0px 280px;" onclick="close_log_in()">
	<h1 style="text-align:center;"> Log In Now</h1>
	<hr style="height:10px;width:250px;">
	<table style="margin:10px 0px 0px 30px;">
		<tr>
			<td colspan="2" align="center"> <p id="msg" style="display:none;color:red;margin:0px;"> Please fill up perfectly !!!</p>  </td>
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
				<input type="submit" onclick="sign_up()" name="signup" value="Sign Up" title="Click to register"  style="width:60px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;">
				<input type="submit" onclick="log_exec()" title="Click to login" name="login" value="Log In"  style="margin-left:30px;width:60px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;">
			</td>
		</tr>
	</table>


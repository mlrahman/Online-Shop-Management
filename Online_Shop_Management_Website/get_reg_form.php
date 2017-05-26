<img src="images/system/close.ico" title="Close log in window." style="height:20px;width:20px;margin: 0px 0px 0px 280px;" onclick="close_log_in()">
	<h1 style="text-align:center;"> Register Now</h1>
	<hr style="height:10px;width:250px;">
	<table style="margin:10px 0px 0px 30px;">
		
		<tr>
			<td colspan="2" align="center"> <p id="msg" style="display:none;color:red;margin:0px;"> Please fill up perfectly !!!</p>  </td>
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
			<td colspan="2" align="center"> 
				<input type="submit" onclick="log_form()" title="Click to login" name="login" value="Log In"  style="margin-left:30px;width:60px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;">
				<input type="submit" onclick="reg_exec()" title="Click to register now." name="signup" value="Sign Up"  style="margin-left:30px;width:60px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;">
			</td>
		</tr>
	</table>
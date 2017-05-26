<script>				
	function log_in()
	{
		document.getElementById('log_in').style.display = 'block';
	}

	function close_log_in()
	{
		//alert("yess");
		document.getElementById('log_in').style.display = 'none';
		document.getElementById('msg').style.display = 'none';
		document.getElementById('username').value = '';
		document.getElementById('password').value = '';
	}
	function log_exec()
	{
		var username = document.getElementById('username').value.trim();
		var password = document.getElementById('password').value.trim();
		if(username=="")
		{
			document.getElementById('msg').style.display = 'block';
			document.getElementById('username').value = '';
		}
		else if(password=="")
		{
			document.getElementById('msg').style.display = 'block';
			document.getElementById('password').value = '';
		}
		else
		{
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("log_in").innerHTML = xmlhttp.responseText;
				}
			};
			document.getElementById('log_in').style.display = 'block';
			document.getElementById('log_in').innerHTML = '<img src="images/system/close.ico" title="Close Log In window." style="height:20px;width:20px;margin: 0px 0px 0px 280px;" onclick="close_log_in()"><img src="images/system/loader.gif" style="margin:0px 0px 0px 35px;" title="Loading...." alt="Loading.." height="230" width="230" />';
			xmlhttp.open("GET","get_log_details.php?username="+username+"&password="+password,true);
			xmlhttp.send();
		}
	}
	function sign_up()
	{
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("log_in").innerHTML = xmlhttp.responseText;
			}
		};
		document.getElementById('log_in').style.display = 'block';
		document.getElementById('log_in').innerHTML = '<img src="images/system/close.ico" title="Close Log In window." style="height:20px;width:20px;margin: 0px 0px 0px 280px;" onclick="close_log_in()"><img src="images/system/loader.gif" style="margin:0px 0px 0px 35px;" title="Loading...." alt="Loading.." height="230" width="230" />';
		xmlhttp.open("GET","get_reg_form.php",true);
		xmlhttp.send();
	
	}
	
	function log_form()
	{
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("log_in").innerHTML = xmlhttp.responseText;
			}
		};
		document.getElementById('log_in').style.display = 'block';
		document.getElementById('log_in').innerHTML = '<img src="images/system/close.ico" title="Close Log In window." style="height:20px;width:20px;margin: 0px 0px 0px 280px;" onclick="close_log_in()"><img src="images/system/loader.gif" style="margin:0px 0px 0px 35px;" title="Loading...." alt="Loading.." height="230" width="230" />';
		xmlhttp.open("GET","get_log_form.php",true);
		xmlhttp.send();
	
	
	}
	
	function reg_exec()
	{
		var name = document.getElementById('name').value.trim();
		var email = document.getElementById('email').value.trim();
		var acc_type = document.getElementById('acc_type').value.trim();
		if(acc_type=="")
		{
			document.getElementById('msg').style.display = 'block';
			document.getElementById('acc_type').value = '';
		}
		else if(name=="")
		{
			document.getElementById('msg').style.display = 'block';
			document.getElementById('name').value = '';
		}
		else if(email=="")
		{
			document.getElementById('msg').style.display = 'block';
			document.getElementById('email').value = '';
		}
		else
		{
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("log_in").innerHTML = xmlhttp.responseText;
				}
			};
			document.getElementById('log_in').style.display = 'block';
			document.getElementById('log_in').innerHTML = '<img src="images/system/close.ico" title="Close Log In window." style="height:20px;width:20px;margin: 0px 0px 0px 280px;" onclick="close_log_in()"><img src="images/system/loader.gif" style="margin:0px 0px 0px 35px;" title="Loading...." alt="Loading.." height="230" width="230" />';
			xmlhttp.open("GET","reg_complete.php?name="+name+"&email="+email+"&acc_type="+acc_type,true);
			xmlhttp.send();
		}
	}
	
</script>



<div id="log_in">
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
</div>

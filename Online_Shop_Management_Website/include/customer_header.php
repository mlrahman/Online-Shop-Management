<!DOCTYPE html>
<html>
	<head>
		<title>দৈনিক বাজার</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
		</script>
		
	</head>
	<body>
     
	    <div id='main_container'>
			
			<div id="header_panel"></br>
				<h1 style="font-size:120px;margin-top:70px;color:#222;" title="দৈনিক বাজার">দৈনিক বাজার</h1>
				<?php include("../include/connection.php"); ?>
				<?php include("../include/function.php"); ?>
				<?php include("session_check.php"); ?>
				<?php
					session_start();
					$customer_id=$_SESSION['session_id'];
					//session_write_close();
					$f_qry="select * from cart_information where  customer_id='$customer_id' and status='initial' ";
					$f_res=mysql_query($f_qry);
					$cart_tot=0;
					while($f_arr=mysql_fetch_array($f_res))
					{
						$cart_tot+=$f_arr['quantity'];
					}
					
					$c_qry="select * from customer_information where customer_id='$customer_id' ";
					$c_res=mysql_query($c_qry);
					$c_arr=mysql_fetch_array($c_res);
					$customer_name=$c_arr['name'];
				?>
				<script>
				
					
					function checkout()
					{
						document.getElementById('my_cart').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_my_cart()"><h1><u>My Cart Details</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
							
							if (window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									document.getElementById("my_cart").innerHTML = xmlhttp.responseText;
									document.getElementById("cart_msg").innerHTML='My Cart';
								}
							};
							xmlhttp.open("GET","get_my_cart_details.php?customer_id="+<?php echo $customer_id; ?>+"&checkout=yes",true);
							xmlhttp.send();
					}
					
					function get_discount()
					{
						var coupon_code = document.getElementById('coupon_code').value.trim();
						//alert(coupon_code); 
						if(coupon_code == "")
						{
							document.getElementById('coupon_msg').style.display = 'block';
						}          
						else
						{
					
							document.getElementById('my_cart').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_my_cart()"><h1><u>My Cart Details</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
							
							if (window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									document.getElementById("my_cart").innerHTML = xmlhttp.responseText;
									count_my_cart(cart_id);
								}
							};
							xmlhttp.open("GET","get_my_cart_details.php?customer_id="+<?php echo $customer_id; ?>+"&discount=check&coupon_code="+coupon_code,true);
							xmlhttp.send();
						}
					}
					
					function product_remove(cart_id)
					{
						
						document.getElementById('my_cart').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_my_cart()"><h1><u>My Cart Details</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("my_cart").innerHTML = xmlhttp.responseText;
								count_my_cart(cart_id);
							}
						};
						xmlhttp.open("GET","get_my_cart_details.php?customer_id="+<?php echo $customer_id; ?>+"&cart_id="+cart_id,true);
						xmlhttp.send();
						
					}
					
					function product_plus(cart_id)
					{
						
						document.getElementById('my_cart').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_my_cart()"><h1><u>My Cart Details</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("my_cart").innerHTML = xmlhttp.responseText;
								count_my_cart_plus(cart_id);
							}
						};
						xmlhttp.open("GET","get_my_cart_details.php?customer_id="+<?php echo $customer_id; ?>+"&cart_id="+cart_id+"&product_plus=yes",true);
						xmlhttp.send();
						
					}
					
					
					function count_my_cart_plus(cart_id)
					{
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("cart_msg").innerHTML = xmlhttp.responseText;
							}
						};
						xmlhttp.open("GET","count_cart_details_plus.php?customer_id="+<?php echo $customer_id; ?>+"&cart_id="+cart_id,true);
						xmlhttp.send();
					}
					
					function product_minus(cart_id)
					{
						
						document.getElementById('my_cart').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_my_cart()"><h1><u>My Cart Details</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("my_cart").innerHTML = xmlhttp.responseText;
								count_my_cart_minus(cart_id);
							}
						};
						xmlhttp.open("GET","get_my_cart_details.php?customer_id="+<?php echo $customer_id; ?>+"&cart_id="+cart_id+"&product_minus=yes",true);
						xmlhttp.send();
						
					}
					
					
					function count_my_cart_minus(cart_id)
					{
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("cart_msg").innerHTML = xmlhttp.responseText;
							}
						};
						xmlhttp.open("GET","count_cart_details_minus.php?customer_id="+<?php echo $customer_id; ?>+"&cart_id="+cart_id,true);
						xmlhttp.send();
					}
					
					
					function count_my_cart(cart_id)
					{
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("cart_msg").innerHTML = xmlhttp.responseText;
							}
						};
						xmlhttp.open("GET","count_cart_details.php?customer_id="+<?php echo $customer_id; ?>+"&cart_id="+cart_id,true);
						xmlhttp.send();
					}
					
					function open_cart()
					{
						document.getElementById('my_cart').style.display = 'block';
						document.getElementById('my_cart').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_my_cart()"><h1><u>My Cart Details</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("my_cart").innerHTML = xmlhttp.responseText;
							}
						};
						xmlhttp.open("GET","get_my_cart_details.php?customer_id="+<?php echo $customer_id; ?>,true);
						xmlhttp.send();
					}
					
					function close_my_cart()
					{
						document.getElementById('my_cart').style.display='none';
					
					}
					
					function show_name()
					{
						document.getElementById('customer_profile').style.background = 'brown';
						document.getElementById('profile_menu_item').style.background = 'brown';
						document.getElementById('customer_name').style.display = 'block';
					}
					function hide_name()
					{
						document.getElementById('customer_profile').style.background = '#472400';
						document.getElementById('profile_menu_item').style.background = '#472400';
						document.getElementById('customer_name').style.display = 'none';
						
					}
					function close_welcome_message()
					{
						document.getElementById('welcome_message').style.display = 'none';
					
					}
					
					jQuery(document).ready(function(){
						jQuery('#customer_profile').on('click', function(event) {        
							 jQuery('#profile_menu_item').toggle('show');
						});
					});
					
					
					
					function update_profile()
					{
						var name=document.getElementById('name').value.trim();
						var username=document.getElementById('username').value.trim();
						var contact=document.getElementById('contact').value.trim();
						var address=document.getElementById('address').value.trim();
						var birthdate=document.getElementById('birthdate').value.trim();
						var gender=document.getElementById('gender').value.trim();
						var email=document.getElementById('email').value.trim();
						var npas=document.getElementById('n_pass').value.trim();
						var cnpas=document.getElementById('c_n_pass').value.trim();
						if(name=="" || username=="" || email=="")
						{
							var div=document.getElementById("edit_profile").innerHTML;
							document.getElementById('edit_profile').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_edit_profile()"><h1><u>Edit Profile Details</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
							document.getElementById("edit_profile").innerHTML=div;
							document.getElementById('blank_msg').style.display='block';
							document.getElementById('blank_msg1').style.display='block';
							document.getElementById('blank_msg2').style.display='block';
							document.getElementById('blank_msg3').style.display='block';
							document.getElementById('pass_msg').style.display='none';
						}
						else if(npas==cnpas)
						{
							document.getElementById('edit_profile').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_edit_profile()"><h1><u>Edit Profile Details</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
							if (window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									document.getElementById("edit_profile").innerHTML = xmlhttp.responseText;
								}
							};
							xmlhttp.open("GET","get_update_profile_details.php?customer_id="+<?php echo $customer_id; ?>+"&name="+name+"&username="+username+"&contact="+contact+"&address="+address+"&contact="+contact+"&gender="+gender+"&email="+email+"&npass="+npas+"&birthdate="+birthdate,true);
							xmlhttp.send();
						}
						else
						{
							document.getElementById('blank_msg').style.display='none';
							document.getElementById('blank_msg1').style.display='none';
							document.getElementById('blank_msg2').style.display='none';
							document.getElementById('blank_msg3').style.display='none';
							document.getElementById('pass_msg').style.display='block';
							document.getElementById('n_pass').value='';
							document.getElementById('c_n_pass').value='';
						}
					
					
					
					
					}
					
					
					function edit_profile()
					{
						document.getElementById('edit_profile').style.display = 'block';
						document.getElementById('edit_profile').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_edit_profile()"><h1><u>Edit Profile Details</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("edit_profile").innerHTML = xmlhttp.responseText;
							}
						};
						xmlhttp.open("GET","get_edit_profile_details.php?customer_id="+<?php echo $customer_id; ?>,true);
						xmlhttp.send();
					}
					
					function close_edit_profile()
					{
						document.getElementById('edit_profile').style.display='none';
					
					}
					
					
					
					function get_order_details(trx_id,cus_id,ord_no)
					{
						document.getElementById('my_orders').style.display = 'block';
						document.getElementById('my_orders').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_my_orders()"><h1><u>My Order Details</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("my_orders").innerHTML = xmlhttp.responseText;
							}
						};
						xmlhttp.open("GET","get_my_orders_details.php?customer_id="+cus_id+"&order_no="+ord_no+"&transaction_id="+trx_id+"&view_order=yes",true);
						xmlhttp.send();
					}
					
					
					function my_orders()
					{
						document.getElementById('my_orders').style.display = 'block';
						document.getElementById('my_orders').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_my_orders()"><h1><u>My Order Details</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("my_orders").innerHTML = xmlhttp.responseText;
							}
						};
						xmlhttp.open("GET","get_my_orders_details.php?customer_id="+<?php echo $customer_id; ?>,true);
						xmlhttp.send();
					}
					
					function close_my_orders()
					{
						document.getElementById('my_orders').style.display='none';
					
					}
					
				</script>
				<div id="customer_profile" value="hide/show" onmouseover="show_name()" onmouseout="hide_name()" title="Click Me" >
					
					<?php echo '<h2 style="color:white;margin:20px 0px 0px 0px;font-size:30px;">'.strtoupper($customer_name[0]).'</h2>'; ?>
					
				</div>
				<div id="customer_name">
					<?php echo '<h2 style="color:white;margin: 10px 0px 0px 0px;font-size:14px;">'.$customer_name.'</h2>'; ?>
				</div>
				<?php
				
					//session_start();
					if(isset($_SESSION['welcome']))
					{
				?>
						<div id="welcome_message" onmouseover="this.style.background=' brown '" onmouseout="this.style.background='#472400'">
							<img src="../images/system/close.ico" title="Close." style="height:20px;width:20px;margin: 2px 0px 0px 482px;" onclick="close_welcome_message()">
							<h1 style="color:white;font-size:50px;">Welcome Back !!!</h1>
						</div>
				<?php
				
					}
					unset($_SESSION['welcome']);
					session_write_close();
					
				
				?>
				<div id="profile_menu_item" onmouseover="show_name()" onmouseout="hide_name()">
					<ul>
						<li onmouseover="this.style.background=' #fad7a0 '" onmouseout="this.style.background='white'"><p style="padding:3px 0px 0px 0px;font-size:15px;font-weight:bold;" onclick="edit_profile()" > Edit Profile </p></li>
						<li onmouseover="this.style.background=' #fad7a0 '" onmouseout="this.style.background='white'"><p style="padding:3px 0px 0px 0px;font-size:15px;font-weight:bold;" onclick="my_orders()"> My Orders </p></li>
					</ul>
				</div>
				
				<div id="my_cart">
					
				</div>
				
				<div id="edit_profile">
					
				</div>
				
				<div id="my_orders">
					
				</div>
			</div> 
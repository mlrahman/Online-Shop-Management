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
				<?php include("session_check.php"); 
				
				session_start();
				$seller_id=$_SESSION['session_id'];
				$c_qry="select * from seller_information where seller_id='$seller_id' ";
					$c_res=mysql_query($c_qry);
					$c_arr=mysql_fetch_array($c_res);
					$seller_name=$c_arr['name'];
				
				
				?>
				
				<script>
				
					function close_welcome_message()
					{
						document.getElementById('welcome_message').style.display = 'none';
					
					}
					
					jQuery(document).ready(function(){
						jQuery('#customer_profile').on('click', function(event) {        
							 jQuery('#profile_menu_item_seller').toggle('show');
						});
					});
					
					function show_name()
					{
						document.getElementById('customer_profile').style.background = 'brown';
						document.getElementById('profile_menu_item_seller').style.background = 'brown';
						document.getElementById('customer_name').style.display = 'block';
					}
					function hide_name()
					{
						document.getElementById('customer_profile').style.background = '#472400';
						document.getElementById('profile_menu_item_seller').style.background = '#472400';
						document.getElementById('customer_name').style.display = 'none';
						
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
						xmlhttp.open("GET","get_edit_profile_details.php?seller_id="+<?php echo $seller_id; ?>,true);
						xmlhttp.send();
					}
					
					function close_edit_profile()
					{
						document.getElementById('edit_profile').style.display='none';
					
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
						xmlhttp.open("GET","get_your_order_details.php?seller_id="+<?php echo $seller_id; ?>,true);
						xmlhttp.send();
					
					
					
					}
					
					function add_products()
					{
					
						document.getElementById('my_orders').style.display = 'block';
						document.getElementById('my_orders').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_my_orders()"><h1><u>Add Your Product</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
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
						xmlhttp.open("GET","get_add_your_product.php?seller_id="+<?php echo $seller_id; ?>,true);
						xmlhttp.send();
					
					
					}
					
					function update_products()
					{
					
						document.getElementById('my_orders').style.display = 'block';
						document.getElementById('my_orders').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_my_orders()"><h1><u>Update Your Product</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
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
						xmlhttp.open("GET","get_update_product.php?seller_id="+<?php echo $seller_id; ?>,true);
						xmlhttp.send();
					
					
					}
					
					function review_products()
					{
					
						document.getElementById('my_orders').style.display = 'block';
						document.getElementById('my_orders').innerHTML = '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 0px 652px;" onclick="close_my_orders()"><h1><u>Product Review Result</u></h1><img src="../images/system/loader.gif" style="margin:5px 0px 0px 0px;" title="Loading...." alt="Loading.." height="200" width="200" />';
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
						xmlhttp.open("GET","get_review_product.php?seller_id="+<?php echo $seller_id; ?>,true);
						xmlhttp.send();
					
					
					}
					
					
					function previewFile(){
						document.getElementById('show_product').style.display='block';
					   var preview = document.getElementById('show_product'); //selects the query named img
					   var file    = document.querySelector('input[type=file]').files[0]; //sames as here
					   var reader  = new FileReader();

					   reader.onloadend = function () {
						   preview.src = reader.result;
					   }

					   if (file) {
						   reader.readAsDataURL(file); //reads the data as a URL
					   } else {
						   preview.src = "";
					   }
					}

					function close_my_orders()
					{
						document.getElementById('my_orders').style.display='none';
					
					}
					
					function update_profile()
					{
						var name=document.getElementById('name').value.trim();
						var username=document.getElementById('username').value.trim();
						var contact=document.getElementById('contact').value.trim();
						var address=document.getElementById('address').value.trim();
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
							xmlhttp.open("GET","get_update_profile_details.php?seller_id="+<?php echo $seller_id; ?>+"&name="+name+"&username="+username+"&contact="+contact+"&address="+address+"&contact="+contact+"&email="+email+"&npass="+npas,true);
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
					
				var prod_id=0;	
				function show_details()
				{
					//alert("sdf c");
					var product_id=document.getElementById('prev_product_id').value;
					//alert("sdf c");
					if(product_id!="")
					{
						if(prod_id!=0)
						{
							document.getElementById('f0'+prod_id).style.display='none';
							document.getElementById('show_product'+prod_id).style.display='none';
						
							document.getElementById('f1'+prod_id).style.display='none';
							document.getElementById('name'+prod_id).style.display='none';
							
							document.getElementById('f2'+prod_id).style.display='none';
							document.getElementById('category_id'+prod_id).style.display='none';
							
							document.getElementById('f3'+prod_id).style.display='none';
							document.getElementById('price'+prod_id).style.display='none';
							
							document.getElementById('f4'+prod_id).style.display='none'; 
							document.getElementById('quantity'+prod_id).style.display='none';
							
							document.getElementById('f5'+prod_id).style.display='none'; 
							document.getElementById('ph'+prod_id).style.display='none';

							document.getElementById('f6'+prod_id).style.display='none'; 
							document.getElementById('reason'+prod_id).style.display='none';
						
						
						}
						
						prod_id=product_id;
						document.getElementById('f0'+product_id).style.display='block';
						document.getElementById('show_product'+product_id).style.display='block';
					
						document.getElementById('f1'+product_id).style.display='block';
						document.getElementById('name'+product_id).style.display='block';
						
						document.getElementById('f2'+product_id).style.display='block';
						document.getElementById('category_id'+product_id).style.display='block';
						
						document.getElementById('f3'+product_id).style.display='block';
						document.getElementById('price'+product_id).style.display='block';
						
						document.getElementById('f4'+product_id).style.display='block'; 
						document.getElementById('quantity'+product_id).style.display='block';
						
						document.getElementById('f5'+product_id).style.display='block'; 
						document.getElementById('ph'+product_id).style.display='block';
						
						document.getElementById('f6'+product_id).style.display='block'; 
						document.getElementById('reason'+product_id).style.display='block';
					}
					
				}
				
				</script>
				
				
				
				<div id="customer_profile" value="hide/show" onmouseover="show_name()" onmouseout="hide_name()" title="Click Me" >
					
					<?php echo '<h2 style="color:white;margin:20px 0px 0px 0px;font-size:30px;">'.strtoupper($seller_name[0]).'</h2>'; ?>
					
				</div>
				<div id="customer_name">
					<?php echo '<h2 style="color:white;margin: 10px 0px 0px 0px;font-size:14px;">'.$seller_name.'</h2>'; ?>
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
					
				
				
					if(isset($_REQUEST['add_product']) && isset($_SESSION['add_product']))
					{
						$name=$_REQUEST['name'];
						$price=$_REQUEST['price'];
						$quantity=$_REQUEST['quantity'];
						$category_id=$_REQUEST['category_id'];
						$admin_id='not yet';
						$status='waiting';
						$rank='0';
						$adding_date=date("d M Y");
						
						$cc="select * from product where seller_id='$seller_id' and name='$name' ";
						$rc=mysql_query($cc);
						
						function photo_upload($file,$i,$max_foto_size,$photo_extention,$folder_name,$path='')
						{


								if($file['tmp_name'][$i]=="")
								{
										
										
										return "";
								}
								if($file['tmp_name'][$i]!="")
								{
										$p=$file['name'][$i];
										$pos=strrpos($p,".");
										$ph=strtolower(substr($p,$pos+1,strlen($p)-$pos));
										$im_size =  round($file['size'][$i]/1024,2);

										if($im_size > $max_foto_size)
										   {
												//echo "Image is Too Large";
												return;
										   }
										$photo_extention = explode(",",$photo_extention);
										if(!in_array($ph,$photo_extention ))
										   {
												//echo "Upload Correct Image";

												return;
										   }
								}
										$ran=date(time());
										$c=$ran.rand(1,10000);
										$ran.=$c.".".$ph;



										if(isset($file['tmp_name'][$i]) && is_uploaded_file($file['tmp_name'][$i]))
										{
										$ff = $path."../images/".$folder_name."/".$ran;
										move_uploaded_file($file['tmp_name'][$i], $ff );
										chmod($ff, 0777);
										}
							   return  $ran;
						}
						if(mysql_num_rows($rc)==0)
						{
							$file=$_FILES['photo'];
							$image_name=photo_upload($file,0,100000,"jpg,gif,png",'products',$path='');
						
							$sql="insert into product(`name`, `category_id`, `seller_id`, `admin_id`, `adding_date`, `price`, `quantity`, `status`, `rank`) 
							values('$name','$category_id','$seller_id','$admin_id','$adding_date','$price','$quantity','$status','$rank')";
							mysql_query($sql);
							
							$ss="select * from product where seller_id='$seller_id' order by product_id desc ";
							$rr=mysql_query($ss);
							
							if($image_name!="")
							{
								$aa=mysql_fetch_array($rr);
								$sql="insert into product_picture(product_id,image_name) values('$aa[product_id]','$image_name') ";
								mysql_query($sql);
							}
							
						?>
						
						<div id="welcome_message" onmouseover="this.style.background=' brown '" onmouseout="this.style.background='#472400'">
							<img src="../images/system/close.ico" title="Close." style="height:20px;width:20px;margin: 2px 0px 0px 482px;" onclick="close_welcome_message()">
							<h2 style="color:white;font-size:18px;">Product successfully submitted for review.</h2>
						</div>
						<?php
							}
							else
							{
						?>
							<div id="welcome_message" onmouseover="this.style.background=' brown '" onmouseout="this.style.background='#472400'">
							<img src="../images/system/close.ico" title="Close." style="height:20px;width:20px;margin: 2px 0px 0px 482px;" onclick="close_welcome_message()">
							<h2 style="color:white;font-size:18px;">Product title already exists !!!!</h2>
						</div>
						
						
						<?php
							}
						
					}
					unset($_SESSION['add_product']);
					session_write_close();
				
			
				
				?>
				<div id="profile_menu_item_seller" onmouseover="show_name()" onmouseout="hide_name()">
					<ul>
						<li onmouseover="this.style.background=' #fad7a0 '" onmouseout="this.style.background='white'"><p style="padding:3px 0px 0px 0px;font-size:15px;font-weight:bold;" onclick="edit_profile()" > Edit Profile </p></li>
						<li onmouseover="this.style.background=' #fad7a0 '" onmouseout="this.style.background='white'"><p style="padding:3px 0px 0px 0px;font-size:15px;font-weight:bold;" onclick="my_orders()"> My Orders </p></li>
						<li onmouseover="this.style.background=' #fad7a0 '" onmouseout="this.style.background='white'"><p style="padding:3px 0px 0px 0px;font-size:15px;font-weight:bold;" onclick="add_products()"> Add Products </p></li>
						<li onmouseover="this.style.background=' #fad7a0 '" onmouseout="this.style.background='white'"><p style="padding:3px 0px 0px 0px;font-size:15px;font-weight:bold;" onclick="update_products()"> Update Products </p></li>
						<li onmouseover="this.style.background=' #fad7a0 '" onmouseout="this.style.background='white'"><p style="padding:3px 0px 0px 0px;font-size:15px;font-weight:bold;" onclick="review_products()"> Product Reviews </p></li>
					</ul>
				</div>
				
				
				<div id="edit_profile">
					
				</div>
				
				<div id="my_orders">
					
				</div>
				
				
				
				
			</div> 
			
			
			
			
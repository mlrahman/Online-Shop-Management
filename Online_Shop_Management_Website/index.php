<?php include("include/header.php"); ?>
			
			<div id="menu_panel">
				<div id="menu_section">
					<ul>
						<li><a href="index.php" class="current" title="You are currently in this page.">Home</a></li>
						<li><a href="products.php" title="Go to products page.">Products</a></li>
						<li><a onclick="log_in()" title="Go to login page.">Log In</a></li>
						<li><a href="contact_us.php" title="Go to contact us page.">Contact Us</a></li>
					</ul>  
				</div>					 
			</div>
		
			<div id="content_container">
				<h1 style="margin-top:30px;"><u>Featured Products</u>: </h1>
				
				<script>
					
					function open_details(elem) {
						//alert(elem);
						if(elem!="")
						{
							if (window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									document.getElementById("product_details").innerHTML = xmlhttp.responseText;
								}
							};
							document.getElementById('product_details').style.display = 'block';
							document.getElementById('product_details').innerHTML = '<img src="images/system/close.ico" title="Close product preview." style="height:20px;width:20px;margin: 0px 0px 0px 380px;" onclick="close_view()"><img src="images/system/loader.gif" style="margin:50px 0px 0px 75px;" title="Loading...." alt="Loading.." height="250" width="250" />';
							xmlhttp.open("GET","get_product_details.php?product_id="+elem,true);
							xmlhttp.send();
						}
					}
					function close_view()
					{
						//alert("yess");
						document.getElementById('product_details').style.display = 'none';
					}
					
					
					function show_warning()
					{
						document.getElementById('message').style.display = 'block';
					}
					
				</script>
				
				<?php include("include/sign_in.php"); ?>
				
				<div id="product_details">
					
				</div>
				
				<div id="product_area">
					<?php
						$cou=0;
						$month=date('M');
						$year=date('Y');
						$query="select * from product where status='active' order by rank desc ";
						$result=mysql_query($query);
						while($data=mysql_fetch_array($result))
						{
							$temp_month=month_convert($data['adding_date']);
							$temp_year=year_convert($data['adding_date']);
							if($temp_month==$month && $temp_year==$year)
							{
							
								
								$cou++;
					?>
								<div id="product_view" onclick="open_details(<?php echo $data['product_id']; ?>)" title="Click for details of this product.">
									<?php 
										$query2="select * from product_picture where product_id='$data[product_id]' ";
										$result2=mysql_query($query2);
										$arr=mysql_fetch_array($result2);
									?>
									<img src="images/products/<?php if(mysql_num_rows($result2)!=0){ echo $arr['image_name']; } else { echo 'null.jpg';  }?>" title="<?php echo $data['name']; ?>" style="height:100px;width:140px;border-radius:5px;">
									<h3 style="color:brown;margin-top:5px;margin-bottom:0px;"> <?php echo $data['name']; ?> </h3>
									<h4 style="color:black;margin:5px 0px 0px 0px;"> Total: <?php echo $data['quantity']; ?> pcs </h4>
									<h4 style="color:blue;margin:5px 0px 0px 0px;"> Price: <?php echo $data['price']; ?> Taka. </h4>								
								</div>
								
					<?php
							}
							if($cou==30)
								break;
						}
						
						$query1="select * from product where status='active' order by rank desc ";
						$result1=mysql_query($query1);
						while($data=mysql_fetch_array($result1))
						{
							$temp_month=month_convert($data['adding_date']);
							$temp_year=year_convert($data['adding_date']);
							if($temp_month!=$month && $temp_year==$year)
							{
								
								$cou++;
					?>
								<div id="product_view" onclick="open_details(<?php echo $data['product_id']; ?>)" title="Click for details of this product.">
									<?php 
										$query2="select * from product_picture where product_id='$data[product_id]' ";
										$result2=mysql_query($query2);
										$arr=mysql_fetch_array($result2);
									?>
									<img src="images/products/<?php if(mysql_num_rows($result2)!=0){ echo $arr['image_name']; } else { echo 'null.jpg';  }?>" title="<?php echo $data['name']; ?>" style="height:100px;width:140px;border-radius:5px;">
									<h3 style="color:brown;margin-top:5px;margin-bottom:0px;"> <?php echo $data['name']; ?> </h3>
									<h4 style="color:black;margin:5px 0px 0px 0px;"> Total: <?php echo $data['quantity']; ?> pcs </h4>
									<h4 style="color:blue;margin:5px 0px 0px 0px;"> Price: <?php echo $data['price']; ?> Taka. </h4>								
								</div>
								
					<?php
							}
							if($cou==30)
								break;
						}
						
						$query33="select * from product where status='active' order by rank desc ";
						$result33=mysql_query($query33);
						while($data=mysql_fetch_array($result33))
						{
							$temp_month=month_convert($data['adding_date']);
							$temp_year=year_convert($data['adding_date']);
							if($temp_year!=$year) 
							{
								//echo $month.'    '.$year;
								$cou++;
					?>
								<div id="product_view" onclick="open_details(<?php echo $data['product_id']; ?>)" title="Click for details of this product.">
									<?php 
										$query2="select * from product_picture where product_id='$data[product_id]' ";
										$result2=mysql_query($query2);
										$arr=mysql_fetch_array($result2);
									?>
									<img src="images/products/<?php if(mysql_num_rows($result2)!=0){ echo $arr['image_name']; } else { echo 'null.jpg';  }?>" title="<?php echo $data['name']; ?>" style="height:100px;width:140px;border-radius:5px;">
									<h3 style="color:brown;margin-top:5px;margin-bottom:0px;"> <?php echo $data['name']; ?> </h3>
									<h4 style="color:black;margin:5px 0px 0px 0px;"> Total: <?php echo $data['quantity']; ?> pcs </h4>
									<h4 style="color:blue;margin:5px 0px 0px 0px;"> Price: <?php echo $data['price']; ?> Taka. </h4>								
								</div>
								
					<?php
							}
							if($cou==30)
								break;
						}
						if($cou==0)
						{
							echo '<h1 style="color:red;text-align:center;font-size:60px;margin-top:180px;">Oops no products available!!!</h1>';
						}
					?>
					
				</div>
			</div> 

			
<?php include("include/footer.php"); ?>
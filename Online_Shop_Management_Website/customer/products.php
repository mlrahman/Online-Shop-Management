<?php include("../include/customer_header.php"); ?>
			
			<div id="menu_panel">
				<div id="menu_section">
					<ul>
						<li><a href="index.php"  title="Go to home page.">Home</a></li>
						<li><a href="products.php" class="current" title="You are currently in this page.">Products</a></li>
						<li><a href="#" onclick="open_cart()" title="Go to cart for checkout" id="cart_msg">My Cart <?php if($cart_tot!=0){ echo '('.$cart_tot.')'; } ?></a></li>
						<li><a href="logout.php" title="Click to log out from your account.">Log Out</a></li>
					</ul>  
				</div>					 
			</div>
		
			<div id="content_container">
			<h1 style="margin-top:30px;margin-bottom:0px;"><p style="float:left;"><u>Browse Products: </u></p>
			<input type="text"  oninput="suggestion()" id="search_value" name="search_value" placeholder=" search Products" style="margin:25px 0px 0px 145px;border-radius:5px;width:250px;float:left;" required>
			<input type="submit" onclick="search_exec()"  value="Search" title="Click to search products...." style="height:24px;margin:22px 0px 0px 5px;width:60px;border-radius:5px;background:#ffab23;float:left;color:#333333;font-weight:bold;"/>
			<p onclick="show_categories()" title="Click to show product categories." style="background:white;width:95px;text-align:center;height:22px;color:#fa8072;float:left;font-size:20px;margin:25px 0px 0px 205px;">Category</p><img src="../images/system/menu.jpg" onclick="show_categories()" style="height:20px;width:20px;margin:25px 0px 0px 0px;border-radius:5px;"  title="Click to show product categories."></h1>
			
			<style>
				#search_suggestion{
					height:auto;
					max-height:250px;
					width:240px;
					position:absolute;
					background:white;
					z-index:9999999;
					margin:3px 0px 0px 350px;
					border-radius:5px;
					overflow-y:scroll;
					padding:5px;
					display: none;
					border:1px solid black;
				}
			</style>
			<div id="search_suggestion" >
				
			</div>
				<script>
				
					function suggestion()
					{
						
						var search_value=document.getElementById('search_value').value.trim();
						if(search_value!="")
						{
							if (window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									document.getElementById("search_suggestion").innerHTML = xmlhttp.responseText;
								}
							};
							document.getElementById('search_suggestion').style.display='block';
							document.getElementById('search_suggestion').innerHTML = '<img src="../images/system/loader.gif" style="margin:5px 0px 0px 15px;" title="Loading...." alt="Loading.." height="200" width="200" />';
							xmlhttp.open("GET","get_search_suggestion.php?search_value="+search_value,true);
							xmlhttp.send();
							
						}
						else
						{
							document.getElementById('search_suggestion').style.display='none';
						}
					}
					
					
					function search_exec()
					{
					
						var search_value=document.getElementById('search_value').value.trim();
						if(search_value=="")
						{
							document.getElementById('search_value').value='';
						}
						else
						{
							document.getElementById('search_suggestion').style.display='none';
							if (window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function() {
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
									document.getElementById("product_area").innerHTML = xmlhttp.responseText;
								}
							};
							document.getElementById('product_area').innerHTML = '<img src="../images/system/loader.gif" style="margin:50px 0px 0px 275px;" title="Loading...." alt="Loading.." height="300" width="300" />';
							xmlhttp.open("GET","get_search_product.php?search_value="+search_value,true);
							xmlhttp.send();
						}
					}
				
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
							document.getElementById('product_details').innerHTML = '<img src="../images/system/close.ico" title="Close product preview." style="height:20px;width:20px;margin: 0px 0px 0px 380px;" onclick="close_view()"><img src="../images/system/loader.gif" style="margin:50px 0px 0px 75px;" title="Loading...." alt="Loading.." height="250" width="250" />';
							xmlhttp.open("GET","get_product_details.php?product_id="+elem,true);
							xmlhttp.send();
						}
					}
					function close_view()
					{
						//alert("yess");
						document.getElementById('product_details').style.display = 'none';
					}
				
					function add_to_cart(elem)
					{
						//alert(elem);
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								document.getElementById("cart_msg").innerHTML = 'My Cart ('+xmlhttp.responseText+')';
								document.getElementById('message').style.display = 'block';
							}
						};
						xmlhttp.open("GET","get_cart_details.php?product_id="+elem,true);
						xmlhttp.send();
						
					}
					
					function show_categories()
					{
						document.getElementById('categories').style.display = 'block';
					
					}
					function close_categories()
					{
						//alert("yess");
						document.getElementById('categories').style.display = 'none';
					}
					function show_products(elem)
					{
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
									document.getElementById("product_area").innerHTML = xmlhttp.responseText;
								}
							};
							document.getElementById('product_area').innerHTML = '<img src="../images/system/loader.gif" style="margin:50px 0px 0px 275px;" title="Loading...." alt="Loading.." height="300" width="300" />';
							xmlhttp.open("GET","get_category_product.php?category_id="+elem,true);
							xmlhttp.send();
						}
					}
					
				</script>
				
				<div id="product_details">
					
				</div>
				<div id="categories">
					<p style="float:left;font-weight:bold;font-size:18px;margin:5px 0px 0px 0px;"><u> Product Categories </u></p> <img src="../images/system/close.ico" title="Close product preview." style="height:20px;width:20px;margin: 0px 0px 0px 95px;" onclick="close_categories()">
					<ul style="margin:10px 0px 0px 10px;font-size:14px;">
					<?php
						$query0="select * from category order by name asc ";
						$result0=mysql_query($query0);
						while($data0=mysql_fetch_array($result0))
						{
					?>
						<li style="margin-top:5px;" onclick="show_products(<?php echo $data0['category_id']; ?>)" title="Click to veiew all the products under this category."><?php echo $data0['name']; ?></li>	
					<?php
						}
					?>
					</ul>
				</div>
				<div id="product_area">
					<?php
						$cou=0;
						$query0="select * from category order by category_id asc ";
						$result0=mysql_query($query0);
						while($data0=mysql_fetch_array($result0))
						{
							$ele=0;
							
							$query_c="select * from product where category_id='$data0[category_id]' AND status='active' order by product_id desc ";
							$result_c=mysql_query($query_c);
							if(mysql_num_rows($result_c)>0)
							{
								echo '<div id="product_raw">';
								echo '<h2 title="Category Name" style="margin: 5px 0px 0px 10px;"><u>'.$data0['name'].'</u></h2>';
								
							}
							
							$query="select * from product where category_id='$data0[category_id]' AND status='active' order by rank desc ";
							$result=mysql_query($query);
							while($data=mysql_fetch_array($result))
							{
								$cou=1;
								if($ele==5)
									break;
								$ele++;
						
					?>
								<div id="product_view" onclick="open_details(<?php echo $data['product_id']; ?>)" title="Click for details of this product.">
									<?php 
										$query2="select * from product_picture where product_id='$data[product_id]' ";
										$result2=mysql_query($query2);
										$arr=mysql_fetch_array($result2);
									?>
									<img src="../images/products/<?php if(mysql_num_rows($result2)!=0){ echo $arr['image_name']; } else { echo 'null.jpg';  }?>" title="<?php echo $data['name']; ?>" style="height:100px;width:140px;border-radius:5px;">
									<h3 style="color:brown;margin-top:5px;margin-bottom:0px;"> <?php echo $data['name']; ?> </h3>
									<h4 style="color:black;margin:5px 0px 0px 0px;"> Total: <?php echo $data['quantity']; ?> pcs </h4>
									<h4 style="color:blue;margin:5px 0px 0px 0px;"> Price: <?php echo $data['price']; ?> Taka. </h4>								
								</div>
								
					<?php
								
					
							}
							
							$query_c="select * from product where category_id='$data0[category_id]' AND status='active' order by product_id desc ";
							$result_c=mysql_query($query);
							if(mysql_num_rows($result_c)>5)
							{
								echo '<button onclick="show_products('.$data0['category_id'].')" style="height:24px;margin:0px 0px 0px 790px;width:100px;border-radius:5px;background:#ffab23;float:left;color:#333333;font-weight:bold;"> See More </button>';
								echo '</div>';
							}
							else if(mysql_num_rows($result_c)>0)
							{
								echo '</div>';
							}
							
						}	
						if($cou==0)
						{
							echo '<h1 style="color:red;text-align:center;font-size:60px;margin-top:180px;">Oops no products available!!!</h1>';
						}
					?>
					
				</div>
			</div> 

			
<?php include("../include/footer.php"); ?>
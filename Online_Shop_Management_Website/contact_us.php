<?php include("include/header.php"); ?>
			
			<div id="menu_panel">
				<div id="menu_section">
					<ul>
						<li><a href="index.php" title="Go to contact us page.">Home</a></li>
						<li><a href="products.php" title="Go to products page.">Products</a></li>
						<li><a onclick="log_in()" title="Go to login page.">Log In</a></li>
						<li><a href="contact_us.php" class="current" title="You are currently in this page.">Contact Us</a></li>
					</ul>  
				</div>					 
			</div>
		
			<div id="content_container">
			
				
				
				<h2>Contact:</h2>

				<table style="margin-left:100px;font-size:14px;float:left;margin-right:100px;" >
				<tr><td valign="top" style="width:70px;font-weight:bold;">Address:</td>
					<td style="width:200px;">9-Paharika, North Peer Moholla, Housing Estate, Sylhet-3100.</td>
				<tr>
				<td valign="top" style="font-weight:bold;">Email: </td>
				   <td> <a href="mailto:info@neic.com" style="text-decoration:none;color:#37B5E2;"  onmouseover="this.style.color='#333' "   onmouseout="this.style.color='#37B5E2' ">dailybazar@gmail.com</a></td>
				</tr>	
				<tr>
				<td valign="top" style="font-weight:bold;">Phone:</td>
				  <td>+8201293920</td> 
				</tr>
				<tr>
				<td valign="top" style="font-weight:bold;">Fax:</td>
				 <td>795236847</td>
				</tr>
				<tr> 
				<td valign="top" style="font-weight:bold;">Mobile:</td>
					<td>+8801725698740</td>
				</tr>
				<tr>
				<td>
				</td>
				<td> 
					<a href="index.php" style="text-decoration:none;color:#37B5E2;"  onmouseover="this.style.color='#333' "   onmouseout="this.style.color='#37B5E2' ">http://www.dailybazar.com </a>
				</td>
				</tr>
				</table>
				
				<?php include("include/sign_in.php"); ?>
				
				<div style="border:2px solid #FA8072;width:500px;max-width:100%;overflow:hidden;height:220px;color:red;border-radius:15px;"><div id="gmap-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Gohorpur+Road,+Sylhet+3100,+Bangladesh.&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" rel="nofollow" href="https://www.interserver-coupons.com" id="grab-map-data">InterserverCoupons</a><style>#gmap-display img{max-width:none!important;background:none!important;font-size: inherit;}</style></div><script src="https://www.interserver-coupons.com/google-maps-authorization.js?id=0e00c7b5-f803-c1e7-66b1-39239096f501&c=google-map-html&u=1476358051" defer="defer" async="async"></script>

				<style>
				textarea {
				   resize: none;
				}
				</style>

				<h2>Contact US!</h2>

				<form action="contact_us.php" method="post" style="margin-left:50px;font-weight:bold;margin-bottom:50px;">
					<table>
						<tr><td style="height:35px;">Name: </td><td><input type="text" name="name" placeholder=" Your fullname." style="border-radius:5px;width:200px;" autocomplete="off" required/></td>
						<td> &nbsp </td></tr>

						<tr><td style="height:35px;">Email: </td><td><input type="text" name="email" placeholder=" Your email address." autocomplete="off" style="width:200px;border-radius:5px;" required/></td>
						<td> &nbsp </td></tr>

						<tr><td style="height:35px;">Subject: </td><td><input type="text" name="n_id" placeholder=" Your message subject." style="width:200px;border-radius:5px;" autocomplete="off" required/></td><td &nbsp </td></tr>


						<tr>
						<td valign="top">Comment: &nbsp&nbsp </td>
						<td> 
						<textarea name="comment" title="Write your comment." style="height:50px;width:200px;border-radius:5px;" placeholder="Your message..." required></textarea>
						</td>
						<td valign="bottom"> &nbsp&nbsp 
						<input type="submit" name="submit" value="Submit" title="Click to post a comment." style="width:60px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;" />
						</td>
						</tr>
					</table>
				</form>
			</div> 

			
<?php include("include/footer.php"); ?>
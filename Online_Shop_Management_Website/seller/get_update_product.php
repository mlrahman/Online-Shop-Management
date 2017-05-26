<?php
include("session_check.php"); 
if(isset($_GET['seller_id']))
	{
		$seller_id=$_GET['seller_id'];
		include("../include/connection.php");
		
		$sq="select * from seller_information where seller_id='$seller_id' ";
		$res=mysql_query($sq);
		$data2=mysql_fetch_array($res);
		
		echo '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 10px 652px;" onclick="close_my_orders()"><h1><u>Update Your Product</u></h1>';

?>
	
	<style>
	                                                    
	

		#logina {
			margin: 50px auto;
			width: 400px;
		}

		#logina h2 {
			background-color: #f95252;
			-webkit-border-radius: 20px 20px 0 0;
			-moz-border-radius: 20px 20px 0 0;
			border-radius: 20px 20px 0 0;
			color: #fff;
			font-size: 28px;
			padding: 20px 26px;
		}

		#logina h2 span[class*="fontawesome-"] {
			margin-right: 14px;
		}

		#logina fieldset {
			background-color: #fff;
			-webkit-border-radius: 0 0 20px 20px;
			-moz-border-radius: 0 0 20px 20px;
			border-radius: 0 0 20px 20px;
			padding: 20px 26px;
		}

		#logina fieldset p {
			color: #777;
			margin-bottom: 14px;
		}

		#logina fieldset p:last-child {
			margin-bottom: 0;
		}

		#logina fieldset input {
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
		}

		#logina fieldset input[type="email"], #login fieldset input[type="password"] {
			background-color: #eee;
			color: #777;
			padding: 4px 10px;
			width: 328px;
		}

		#logina fieldset input[type="submit"] {
			background-color: #33cc77;
			color: #fff;
			display: block;
			margin: 0 auto;
			padding: 4px 0;
			width: 100px;
		}

		#logina fieldset input[type="submit"]:hover {
			background-color: #28ad63;
		}
	</style>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
	
	<div id="logina">

			

			<fieldset>
				
				
				
				
				
		
				
				<form action="index.php" method="post" ENCTYPE="MULTIPART/FORM-DATA">
				
				<p><label>Select Product for update</label></p>
				<select id="prev_product_id" onchange="show_details()" style="width:300px;background:purple;color:white;font-weight:bold;" required>
				<option value="">Select...</option>
				<?php
					$ass="select * from product where seller_id='$seller_id' and status='active' order by name asc";
					$arrr=mysql_query($ass);
					while($data=mysql_fetch_array($arrr))
					{
						$product_id=$data['product_id'];
						
						$query2="select * from product_picture where product_id='$data[product_id]' ";
						$result2=mysql_query($query2);
						$arr=mysql_fetch_array($result2);
				?>
					<option value="<?php echo $data['product_id']; ?>" >
							<?php echo $data['name']; ?> 
					</option>
				<?php } ?>
				</select>
				<?php
					$ass="select * from product where seller_id='$seller_id' and status='active' order by name asc";
					$arrr=mysql_query($ass);
					while($data=mysql_fetch_array($arrr))
					{
						$product_id=$data['product_id'];
						$ss="select * from product_picture where product_id='$product_id' ";
						$rr=mysql_query($ss);
						$data22=mysql_fetch_array($rr);
				?>
				
				<p id="f0<?php echo $product_id; ?>" style="display:none;"><label>Product Image</label></p>
				<img src="../images/products/<?php if(mysql_num_rows($rr)!=0){ echo $data22['image_name']; } else { echo 'null.jpg';  }?>" height="120" width="140" id="show_product<?php echo $product_id; ?>" alt="Product Preview ..."  style="display:none;border-radius:10px;background:#FFFACD;border:1px solid black;margin:0 auto;">				
	
				<p id="f5<?php echo $product_id; ?>" style="display:none;"><label>Change Product Picture</label></p>
				<p><input type="file" id="ph<?php echo $product_id; ?>" name='photo[0]' onchange="previewFile()" style="width:300px;display:none;margin:0 auto;"></p>
				
				
				
				<p id="f1<?php echo $product_id; ?>" style="display:none;"><label>Change Product Title</label></p>
				<p><input type="text" name="name" id="name<?php echo $product_id; ?>" style="width:300px;display:none;margin: 0 auto;" value="<?php echo $data['name']; ?>" required></p>
				
				
				<p id="f2<?php echo $product_id; ?>" style="display:none;"><label>Change Product Category</label></p>
				<p>
					<select name="category_id" id="category_id<?php echo $product_id; ?>" style="display:none;width:300px;margin: 0 auto;" required>
						<?php
						
							$ss="select * from category where category_id='$data[category_id]' order by name asc ";
							$rr=mysql_query($ss);
							$aa=mysql_fetch_array($rr);
						?>
							<option value="<?php echo $aa['category_id']; ?>"><?php echo $aa['name']; ?></option>
							
						<?php
							session_start();
							$_SESSION['update_product']='yes';
							session_write_close();
						
							$ss="select * from category where category_id!='$data[category_id]' order by name asc ";
							$rr=mysql_query($ss);
							while($aa=mysql_fetch_array($rr))
							{
						?>
							<option value="<?php echo $aa['category_id']; ?>"><?php echo $aa['name']; ?></option>
						
						<?php
							}
						?>
					</select>
				</p>
				
				<p id="f3<?php echo $product_id; ?>" style="display:none;"><label>Change Product Price</label></p>
				<p><input type="number" name="price" id="price<?php echo $product_id; ?>" style="width:300px;display:none;margin: 0 auto;" value="<?php echo $data['price']; ?>" title="Only amount as a number format."  placeholder="  Enter your product price." required></p>
				
				<p id="f4<?php echo $product_id; ?>" style="display:none;"><label>Change Product Quantity</label></p>
				<p><input type="number" name="quantity"  id="quantity<?php echo $product_id; ?>" style="width:300px;display:none;margin: 0 auto;" value="<?php echo $data['quantity']; ?>" placeholder="  Enter your product quantity." required></p>
				
				<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
				
				
				
				
				
				<p id="f6<?php echo $product_id; ?>" style="display:none;"><label>Save Change Reason</label></p>
				<p><input type="text" name="reason"  id="reason<?php echo $product_id; ?>" style="width:300px;display:none;margin: 0 auto;" placeholder="  Enter reason behind the change." required></p>
				
				
				<?php } ?>
				
				<p><input type="submit" name="update_product" value="Submit Change" style="float:left;margin:0px 0px 0px 70px;"></p>
				<p><input type="submit" name="inactive_product" value="Delete Product" style="background:brown;float:left;margin:0px 0px 0px 10px;"></p>
			</form>
			</fieldset>
				
	</div> 
	
	
<?php	
		
		
	}
else
	{
		header("location: index.php");
	}
?>
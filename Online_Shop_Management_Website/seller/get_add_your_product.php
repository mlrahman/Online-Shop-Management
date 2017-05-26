<?php
include("session_check.php"); 
if(isset($_GET['seller_id']))
	{
		$seller_id=$_GET['seller_id'];
		include("../include/connection.php");
		
		$sq="select * from seller_information where seller_id='$seller_id' ";
		$res=mysql_query($sq);
		$data=mysql_fetch_array($res);
		
		echo '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 10px 652px;" onclick="close_my_orders()"><h1><u>Add Your Product</u></h1>';

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
				
				
				
				<img src="" height="120" width="140" id="show_product" alt="Product Preview ..."  style="display:none;border-radius:10px;background:#FFFACD;border:1px solid black;margin:0 auto;">				
	
				<p style="display:none;color:red;font-size:12px;" id="pp_msg"><label>Fill up perfectly!!!</label></p>
				<form action="index.php" method="post" ENCTYPE="MULTIPART/FORM-DATA">
				<p><label>Product Title</label></p>
				<p><input type="text" name="name" style="width:300px;" placeholder="  Enter your product title."  required></p>
				
				
				<p><label>Product Category</label></p>
				<p>
					<select name="category_id" style="width:300px;" required>
						<option value="">Select..</option>
						<?php
							session_start();
							$_SESSION['add_product']='yes';
							session_write_close();
						
							$ss="select * from category order by name asc ";
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
				
				<p><label>Product Price</label></p>
				<p><input type="number" name="price" style="width:300px;" title="Only amount as a number format."  placeholder="  Enter your product price." required></p>
				
				<p><label>Product Quantity</label></p>
				<p><input type="number" name="quantity" style="width:300px;"  placeholder="  Enter your product quantity." required></p>
				
				<p><label>Product Picture</label></p>
				<p><input type="file"  name='photo[0]' onchange="previewFile()" style="width:300px;" required></p>
				
				
				<p><input type="submit" name="add_product" value="Submit Product"></p>
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
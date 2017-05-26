<?php
include("session_check.php"); 
if(isset($_GET['seller_id']))
	{
		$seller_id=$_GET['seller_id'];
		include("../include/connection.php");
		
		$sq="select * from seller_information where seller_id='$seller_id' ";
		$res=mysql_query($sq);
		$data2=mysql_fetch_array($res);
		
		echo '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 10px 652px;" onclick="close_my_orders()"><h1><u>Product Review Result</u></h1>';
		
		$arr="select * from product where seller_id='$seller_id' order by product_id desc ";
		$res=mysql_query($arr);
		while($data=mysql_fetch_array($res))
		{
			if($data['status']=='waiting')
				$ppp='<font color="violet">Waiting for Review</font>';
			else if($data['status']=='active')
				$ppp='<font color="green">Review Successful</font>';
			else if($data['status']=='inactive')
				$ppp='<font color="red">Review Unsuccessful</font>';
			else if($data['status']=='deleted')
				$ppp='<font color="red">Deleted</font>';
			
			$c_q="select * from category where category_id='$data[category_id]' ";
				$c_r=mysql_query($c_q);
				$c_a=mysql_fetch_array($c_r);
			$pp_q="select * from product_picture where product_id='$data[product_id]' ";
				$pp_r=mysql_query($pp_q);
?>
			<div id="product_cart_view2" style="margin: 0 auto;margin-bottom:5px;">
					
					<div style="float:left;height:120px;width:140px;">
						<?php
							if(mysql_num_rows($pp_r)>0)
							{
								$pp_a=mysql_fetch_array($pp_r);
								$image=$pp_a['image_name'];
							}
							else
								$image="null.jpg";
						?>
						<img src="../images/products/<?php echo $image; ?>" height="120" width="140" style="border-radius:5px;" title="Product Image">
					</div>
					<div style="float:left;height:110px;width:240px;padding:5px;text-align:left;background: #fef9e7;margin:0px 0px 0px 5px;">
						<h2 style="margin:10px 0px 0px 0px;">Name: <font color="brown"><?php echo ' &nbsp'.$data['name']; ?></font></h2>
						<h3 style="margin:5px 0px 0px 0px;">Category: <font color="purple"><?php echo ' &nbsp'.$c_a['name']; ?></font></h3>
						<h3 style="margin:5px 0px 0px 0px;">Submit Date: <font color="#470042"><?php echo ' &nbsp'.$data['adding_date']; ?></font></h3>
						<h3 style="margin:5px 0px 0px 0px;">status: <?php echo ' &nbsp'.$ppp; ?></h3>
						 
					</div>
					<div style="float:left;height:110px;width:90px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 5px;">
						<h2 style="margin:35px 0px 0px 0px;">Quantity</h2>
						<input type="text" id="quantity" value="<?php echo $data['quantity']; ?>"  style="margin:5px 0px 0px 0px;border-radius:5px;width:60px;text-align:center;" disabled>
						
					</div>
					<div style="float:left;height:110px;width:90px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 5px;">
						<h2 style="margin:30px 0px 0px 0px;">Price</h2>
						<h3 style="margin:15px 0px 0px 0px;"><font color="blue"><?php echo number_format($data['price'], 2, '.', '').'</font>/='; ?></h3>
					</div>
				</div>
	
<?php	
		}
		
		
		
		echo '</br></br>';
		
	}
else
	{
		header("location: index.php");
	}
?>
<?php
include("session_check.php"); 
if(isset($_GET['seller_id']))
	{
		$seller_id=$_GET['seller_id'];
		include("../include/connection.php");
		
		$sq="select * from seller_information where seller_id='$seller_id' ";
		$res=mysql_query($sq);
		$s_a=mysql_fetch_array($res);
		
		echo '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 10px 652px;" onclick="close_my_orders()"><h1><u>My Order Details</u></h1>';
		$order_no=0;
		$sql="select * from transaction order by transaction_id desc ";
		$res=mysql_query($sql);
		while($data=mysql_fetch_array($res))
		{
			$total_amount=0;
			$s_cart="select * from cart_information where transaction_id='$data[transaction_id]' and seller_id='$seller_id' order by cart_id desc ";
			$r_cart=mysql_query($s_cart);
			if(mysql_num_rows($r_cart)>0)
			{
				$order_no++;
					echo '<h2 style="text-align:left;margin:0px 0px 5px 30px;">Order No: <font color="blue">#'.$order_no.'</font></h2><div style="border:2px solid purple;width:615px;padding:5px;margin:0 auto; margin-bottom:50px;background:#472400;">';
				
			}
			while($r_arr=mysql_fetch_array($r_cart))
			{
			
				$p_q="select * from product where product_id='$r_arr[product_id]' ";
				$p_r=mysql_query($p_q);
				$p_a=mysql_fetch_array($p_r);
				
				$pp_q="select * from product_picture where product_id='$r_arr[product_id]' ";
				$pp_r=mysql_query($pp_q);
				//$pp_a=mysql_fetch_array($pp_r);
				
				$c_q="select * from category where category_id='$p_a[category_id]' ";
				$c_r=mysql_query($c_q);
				$c_a=mysql_fetch_array($c_r);
				
				
			
?>
				
	
				<div id="product_cart_view2">
					
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
						<h2 style="margin:10px 0px 0px 0px;">Name &nbsp : <font color="brown"><?php echo ' &nbsp'.$p_a['name']; ?></font></h2>
						<h3 style="margin:5px 0px 0px 0px;">Category&nbsp: <font color="purple"><?php echo ' &nbsp'.$c_a['name']; ?></font></h3>
						<h3 style="margin:5px 0px 0px 0px;">Price &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo ' &nbsp'.$p_a['price'].'</font> Taka'; ?></h3>
						 
					</div>
					<div style="float:left;height:110px;width:90px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 5px;">
						<h2 style="margin:5px 0px 0px 0px;">Quantity</h2>
						<input type="text" id="quantity" value="<?php echo $r_arr['quantity']; ?>"  style="margin:5px 0px 0px 0px;border-radius:5px;width:60px;text-align:center;" disabled>
						
					</div>
					<div style="float:left;height:110px;width:90px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 5px;">
						<h2 style="margin:10px 0px 0px 0px;">Total</h2>
						<h3 style="margin:15px 0px 0px 0px;"><font color="blue"><?php $am=$r_arr['quantity']*1.0; $am=$am*$p_a['price']; $total_amount+=$am; echo number_format($am, 2, '.', '').'</font>/='; ?></h3>
					</div>
				</div>
	
	
<?php	
			}
			if(mysql_num_rows($r_cart)>0)
			{
				if($data['status']=='waiting_for_receive_money')
				{
					$status='<font color="blue">Processing</font>';
				}
				else if($data['status']=='canceled')
				{
					$status='<font color="red">Canceled</font>';
				
				}
				else if($data['status']=='delivered')
				{
					$status='<font color="green">Delivered</font>';
				}
				$ds="select * from discount_chart where discount_id='$data[discount_id]' ";
				$dsr=mysql_query($ds);
				if(mysql_num_rows($dsr)>0)
				{
					$dsra=mysql_fetch_array($dsr);
					$per=$dsra['discount_percentage'];
				}
				else
					$per=0;
?>
			<div id="product_cart_view2" style="margin-top:5px;margin-bottom:0px; background:white;">
				<div style="float:left;height:110px;width:295px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 0px;">
					<h2 style="margin:30px 0px 0px 5px;text-align:left;">Order Date: <font color="purple"><?php echo $data['adding_date']; ?></font></h2>
					<h2 style="margin:10px 0px 0px 5px;text-align:left;">Order status: <?php echo $status; ?></h2>
					
				</div>
				<div style="float:left;height:110px;width:285px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 5px;">
					<h3 style="margin:27px 0px 0px 5px;text-align:left;">Sub-Total &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo number_format($total_amount, 2, '.', ''); ?></font>/= </h3>
					<h3 style="margin:2px 0px 0px 5px;text-align:left;">Discount &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo $per;  ?></font>% </h3>
					<h3 style="margin:2px 0px 0px 5px;text-align:left;">Total Amount&nbsp : <font color="blue"><?php  $total_amount-=(($total_amount/100.0)*$per);    echo number_format($total_amount, 2, '.', ''); ?></font>/= </h3>
					
				</div>
			</div>
		</div>

<?php		}
		}
		
		if($order_no==0)
		{
			echo '<h1 style="color:red;text-align:center;font-size:20px;margin-top:10px;">Oops no orders available!!!</h1>';
		}
		
	}
else
	{
		header("location: index.php");
	}
?>
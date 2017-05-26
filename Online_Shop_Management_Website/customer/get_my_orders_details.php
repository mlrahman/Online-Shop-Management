<?php
include("session_check.php"); 
if(isset($_GET['customer_id']))
	{
		$customer_id=$_GET['customer_id'];
		include("../include/connection.php");
		$order_no=0;
		echo '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 10px 652px;" onclick="close_my_orders()"><h1><u>My Order Details</u></h1>';
		
		if(isset($_REQUEST['view_order']))
		{
		
			$order_no=$_REQUEST['order_no'];
			echo '<h2 style="text-align:left;margin:0px 0px 5px 30px;">Order No: <font color="blue">#'.$order_no.'</font></h2><div style="border:2px solid purple;width:615px;padding:5px;margin:0 auto; margin-bottom:50px;background:#472400;">';
		$total_amount=0.0;
		$qry="select * from cart_information where customer_id='$customer_id' and transaction_id='$_REQUEST[transaction_id]' order by cart_id asc ";
		$res=mysql_query($qry);
		
		if(mysql_num_rows($res)>0)
		{
		
			while($data=mysql_fetch_array($res))
			{
			
				$p_q="select * from product where product_id='$data[product_id]' ";
				$p_r=mysql_query($p_q);
				$p_a=mysql_fetch_array($p_r);
				
				$pp_q="select * from product_picture where product_id='$data[product_id]' ";
				$pp_r=mysql_query($pp_q);
				//$pp_a=mysql_fetch_array($pp_r);
				
				$c_q="select * from category where category_id='$p_a[category_id]' ";
				$c_r=mysql_query($c_q);
				$c_a=mysql_fetch_array($c_r);
				
				$s_q="select * from seller_information where seller_id='$p_a[seller_id]' ";
				$s_r=mysql_query($s_q);
				$s_a=mysql_fetch_array($s_r);
				
			
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
						<h3 style="margin:5px 0px 0px 0px;">Seller &nbsp&nbsp&nbsp&nbsp&nbsp : <font color="purple"><?php echo ' &nbsp'.$s_a['name']; ?></font></h3>
						<h3 style="margin:5px 0px 0px 0px;">Price &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo ' &nbsp'.$p_a['price'].'</font> Taka'; ?></h3>
						 
					</div>
					<div style="float:left;height:110px;width:90px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 5px;">
						<h2 style="margin:5px 0px 0px 0px;">Quantity</h2>
						<input type="text" id="quantity" value="<?php echo $data['quantity']; ?>"  style="margin:5px 0px 0px 0px;border-radius:5px;width:60px;text-align:center;" disabled>
						
					</div>
					<div style="float:left;height:110px;width:90px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 5px;">
						<h2 style="margin:10px 0px 0px 0px;">Total</h2>
						<h3 style="margin:15px 0px 0px 0px;"><font color="blue"><?php $am=$data['quantity']*1.0; $am=$am*$p_a['price']; $total_amount+=$am; echo number_format($am, 2, '.', '').'</font>/='; ?></h3>
					</div>
				</div>

				


<?php
			}
		}
		
		



		$se=0;
		$sq="select * from transaction where customer_id='$customer_id' order by transaction_id desc ";
		$re=mysql_query($sq);
		while($data=mysql_fetch_array($re))
		{
			$flagi=1;
			$date=$data['adding_date'];
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
			
			
			$discount_id=$data['discount_id'];
			if($discount_id==0)
			{
				$per=0;
			}
			else
			{
				$ds="select * from discount_chart where discount_id='$discount_id' ";
				$dsr=mysql_query($ds);
				$dsra=mysql_fetch_array($dsr);
				$per=$dsra['discount_percentage'];
			
			}
			$se++;
			if($se==$order_no)
			{
				$total_amount=0;
				$transaction_id=$data['transaction_id'];
				$su="select * from cart_information where transaction_id='$transaction_id' ";
				$sur=mysql_query($su);
				while($sua=mysql_fetch_array($sur))
				{
					$product_id=$sua['product_id'];
					$spu="select * from product where product_id='$product_id' ";
					$spur=mysql_query($spu);
					$spua=mysql_fetch_array($spur);
					$total_amount+=($sua['quantity']*$spua['price']);
				
				}
			
		
?>
		<div id="product_cart_view2" style="margin-top:5px;margin-bottom:0px; background:white;">
			<div style="float:left;height:110px;width:295px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 0px;">
				<h2 style="margin:20px 0px 0px 5px;text-align:left;">Order Date: <font color="purple"><?php echo $date; ?></font></h2>
				<h2 style="margin:10px 0px 0px 5px;text-align:left;">Order status: <?php echo $status; ?></h2>
				
			</div>
			<div style="float:left;height:110px;width:285px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 5px;">
				<h3 style="margin:0px 0px 0px 5px;text-align:left;">Sub-Total &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo number_format($total_amount, 2, '.', ''); ?></font>/= </h3>
				<h3 style="margin:2px 0px 0px 5px;text-align:left;">Courier &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo 150.00; $total_amount+=150.00;  ?></font>/= </h3>
				<h3 style="margin:2px 0px 0px 5px;text-align:left;">Discount &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo $per;  ?></font>% </h3>
				<h3 style="margin:2px 0px 0px 5px;text-align:left;">Total Amount&nbsp : <font color="blue"><?php  $total_amount-=(($total_amount/100.0)*$per);    echo number_format($total_amount, 2, '.', ''); ?></font>/= </h3>
				
			</div>
		</div>
		</div>

<?php
		
			}
		}





		}
		
		
		$flagi=0;
		$se=0;
		$sq="select * from transaction where customer_id='$customer_id' and status='waiting_for_receive_money' or status='delivered' or status='canceled' order by transaction_id desc ";
		$re=mysql_query($sq);
		while($data=mysql_fetch_array($re))
		{
			$flagi=1;
			$date=$data['adding_date'];
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
			
			
			$discount_id=$data['discount_id'];
			if($discount_id==0)
			{
				$per=0;
			}
			else
			{
				$ds="select * from discount_chart where discount_id='$discount_id' ";
				$dsr=mysql_query($ds);
				$dsra=mysql_fetch_array($dsr);
				$per=$dsra['discount_percentage'];
			
			}
			$se++;
			if($se!=$order_no)
			{
				$total_amount=0;
				$transaction_id=$data['transaction_id'];
				$su="select * from cart_information where transaction_id='$transaction_id' ";
				$sur=mysql_query($su);
				while($sua=mysql_fetch_array($sur))
				{
					$product_id=$sua['product_id'];
					$spu="select * from product where product_id='$product_id' ";
					$spur=mysql_query($spu);
					$spua=mysql_fetch_array($spur);
					$total_amount+=($sua['quantity']*$spua['price']);
				
				}
			
		
?>
		<div id="product_cart_view" style="margin-top:10px;margin-bottom:5px;background: #fbeee6 ;">
			<div style="float:left;height:110px;width:295px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 0px;">
				<h2 style="margin:10px 0px 0px 5px;text-align:left;">Order No: <font color="blue"><?php echo '#'.$se; ?></font></h2>
				<h3 style="margin:10px 0px 0px 5px;text-align:left;">Order Date: <font color="purple"><?php echo $date; ?></font></h3>
				<h3 style="margin:10px 0px 0px 5px;text-align:left;">Order status: <?php echo $status; ?></h3>
				
			</div>
			<div style="float:left;height:110px;width:285px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 5px;">
				<h3 style="margin:0px 0px 0px 5px;text-align:left;">Sub-Total &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo number_format($total_amount, 2, '.', ''); ?></font>/= </h3>
				<h3 style="margin:2px 0px 0px 5px;text-align:left;">Courier &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo 150.00; $total_amount+=150.00;  ?></font>/= </h3>
				<h3 style="margin:2px 0px 0px 5px;text-align:left;">Discount &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo $per;  ?></font>% </h3>
				<h3 style="margin:2px 0px 0px 5px;text-align:left;">Total Amount&nbsp : <font color="blue"><?php  $total_amount-=(($total_amount/100.0)*$per);    echo number_format($total_amount, 2, '.', ''); ?></font>/= </h3>
				<input type="submit" onclick="get_order_details(<?php echo $transaction_id; ?>,<?php echo $customer_id; ?>,<?php echo $se; ?>)"  value="View" title="Click to view order details...." style="height:24px;margin:5px 0px 0px 150px;font-size:14px;font-weight:bold;width:120px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;"/>
		
			</div>
		</div>


<?php
		
			}
		}
	
		if($flagi==0)
		{
			echo '<h2 style="color:red;text-align:center;font-size:30px;margin-top:100px;">Oops no order placed yet!!!</h2>';

		
		}
		
	}
else
	{
		header("location: index.php");
	}
?>
<?php
include("session_check.php"); 
if(isset($_GET['customer_id']))
	{
		$customer_id=$_GET['customer_id'];
		include("../include/connection.php");
		$flagi=0;
		
		
		$per=0;
		$fr_qry="select * from cart_information where  customer_id='$customer_id' and status='initial' and discount_id!='0' ";
		$fr_res=mysql_query($fr_qry);
		//$afr=mysql_fetch_array($fr_res);
		if(mysql_num_rows($fr_res)==0)
		{
			$per=0;
		}
		else
		{
			$afr=mysql_fetch_array($fr_res);
			$sql="select * from discount_chart where discount_id='$afr[discount_id]' ";
			$res=mysql_query($sql);
			$arr=mysql_fetch_array($res);
			$per=$arr['discount_percentage'];
			$discount_id=$arr['discount_id'];
			$ss="update cart_information set discount_id='$discount_id' where customer_id='$customer_id' and status='initial'  ";
						mysql_query($ss);
		}
		
		echo '<img src="../images/system/close.ico" title="Close." style="height:30px;width:30px;margin: 5px 0px 10px 652px;" onclick="close_my_cart()"><h1><u>My Cart Details</u></h1>';
		
		
		
		if(isset($_GET['checkout']))
		{
			$ch1_s="select * from verified_customer where customer_id='$customer_id' ";
			$ch1_r=mysql_query($ch1_s);
			if(mysql_num_rows($ch1_r)>0)
				$payment_method="cod";
			else
				$payment_method="bkash";
			
			$discount_id=0;

			$fr_qry="select * from cart_information where  customer_id='$customer_id' and status='initial' and discount_id!='0' ";
			$fr_res=mysql_query($fr_qry);
			if(mysql_num_rows($fr_res)>0)
			{
			
				$afr=mysql_fetch_array($fr_res);
				$sql="select * from discount_chart where discount_id='$afr[discount_id]' ";
				$res=mysql_query($sql);
				$arr=mysql_fetch_array($res);
				//$per=$arr['discount_percentage'];
				$discount_id=$arr['discount_id'];
				
			
			}
			else
				$discount_id=0;
			
			if($payment_method=="cod")
			{
				$ch1_a=mysql_fetch_array($ch1_r);
				$admin_id=$ch1_a['admin_id'];
				$adding_date=date("d M Y");
				$sqlll="insert into transaction(customer_id, admin_id, transaction_method, bkash_trx_id, discount_id, status, adding_date) values ('$customer_id', '$admin_id', '$payment_method', 'not_used', '$discount_id', 'waiting_for_receive_money', '$adding_date') ";
				mysql_query($sqlll);
				
				$sq="select * from transaction where customer_id='$customer_id' order by transaction_id desc  ";
				$re=mysql_query($sq);
				$arr=mysql_fetch_array($re); 
				$transaction_id=$arr['transaction_id'] ;
				
				$sq="update cart_information set transaction_id='$transaction_id', status='processing' where customer_id='$customer_id' and status='initial' ";
				mysql_query($sq);
				$flagi=1;
				
				
				$sq="select * from cart_information where transaction_id='$transaction_id' ";
				$re=mysql_query($sq);
				while($ar=mysql_fetch_array($re))
				{
					$product_id=$ar['product_id'];
					$quantity=$ar['quantity'];
					
					$p_s="select * from product where product_id='$product_id' ";
					$p_r=mysql_query($p_s);
					$p_a=mysql_fetch_array($p_r);
					
					$quantity=$p_a['quantity']-$quantity;
					
					$ss="update product set quantity='$quantity' where product_id='$product_id' ";
					mysql_query($ss);
				
				}
				
				
				echo '<h2 style="color:green;margin:100px 0px 0px 0px;"> Order successfully placed with **<font color="blue">Cash On Delivery Method</font>** </h2>';
			}
			else
			{
				$flagi=1;
				//bkash method ********************
				
				
				/*******************************/
				/*******************************/
				/*******************************/
				/*******************************/
				/*******************************/
				/*******************************/
				/*******************************/
				/*******************************/
				
				
				
				
				/********************************/
			
			}
		
		
		
		}
		
		
		
		else if(isset($_GET['coupon_code'] ) && isset($_GET['discount'] ))
		{
		
			if($per==0)
			{
				$coupon_code=$_GET['coupon_code'];
				$sql="select * from discount_chart where coupon_code='$coupon_code' and status='active' ";
				$res=mysql_query($sql);
				if(mysql_num_rows($res)>0)
				{
					$arr=mysql_fetch_array($res);
					$discount_id=$arr['discount_id'];
					$per=$arr['discount_percentage'];
					
					
					
						$ss="update cart_information set discount_id='$discount_id' where customer_id='$customer_id' and status='initial'  ";
						mysql_query($ss);
					
					
				
					echo '<h3 style="color:green;"> Coupon code discount successfully applied. </h3>';
					
					
					
				}
				else
				{
					echo '<h3 style="color:red;">*** Coupon code not matched or out of date ***</h3>';
				}
			}
			else
			{
				echo '<h3 style="color:red;">*** One of discount coupon already appplied ***</h3>';
			
			}
		
		
		}
		
		else if(isset($_GET['product_plus']))
		{
			$cart_id=$_GET['cart_id'];
			$fi_qry="select * from cart_information where cart_id='$cart_id' ";
			$fi_res=mysql_query($fi_qry);
			
			
			
			if(mysql_num_rows($fi_res)>0)
			{
				
				$fi_arr=mysql_fetch_array($fi_res);
				
				$p_q="select * from product where product_id='$fi_arr[product_id]' ";
				$p_r=mysql_query($p_q);
				$p_a=mysql_fetch_array($p_r);
				
				
				$quantity=$fi_arr['quantity'];
				$quantity+=1;
				if($quantity>$p_a['quantity'])
				{
					echo '<h3 style="color:red;">*** Stock not sufficient ***</h3>';
				}
				else
				{
					$cart_id=$fi_arr['cart_id'];
					$sq="update cart_information set
						quantity='$quantity'
						where cart_id='$cart_id'";
					mysql_query($sq);
				}
				
				
			}
		
		}
		
		
		else if(isset($_GET['product_minus']))
		{
			$cart_id=$_GET['cart_id'];
			$fi_qry="select * from cart_information where cart_id='$cart_id' ";
			$fi_res=mysql_query($fi_qry);
			
			
			
			if(mysql_num_rows($fi_res)>0)
			{
				$fi_arr=mysql_fetch_array($fi_res);
				$quantity=$fi_arr['quantity'];
				$quantity-=1;
				if($quantity==0)
				{
					$sql="delete from cart_information where cart_id='$cart_id' ";
					mysql_query($sql);
				}
				else
				{
					$sq="update cart_information set
						quantity='$quantity'
						where cart_id='$cart_id'";
					mysql_query($sq);
				
				}
				
			}
		
		
		
		}
		
		else if(isset($_GET['cart_id']))
		{
			$cart_id=$_GET['cart_id'];
			$sql="delete from cart_information where cart_id='$cart_id' ";
			mysql_query($sql);
			$f_qry="select * from cart_information where  customer_id='$customer_id' and status='initial' ";
			$f_res=mysql_query($f_qry);
			$cart_tot=0;
			while($f_arr=mysql_fetch_array($f_res))
			{
				$cart_tot+=$f_arr['quantity'];
			}
		}
		
		$total_amount=0.0;
		$qry="select * from cart_information where customer_id='$customer_id' and status='initial' order by cart_id asc ";
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
				<div id="product_cart_view">
					
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
						<input type="submit" onclick="product_minus(<?php echo $data['cart_id']; ?>)"  value="-" title="Click to decrease product quantity...." style="height:24px;margin:5px 0px 0px 0px;font-size:14px;font-weight:bold;width:40px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;"/>
						<input type="text" id="quantity" value="<?php echo $data['quantity']; ?>"  style="margin:5px 0px 0px 0px;border-radius:5px;width:60px;text-align:center;" disabled>
						<input type="submit" onclick="product_plus(<?php echo $data['cart_id']; ?>)"  value="+" title="Click to increase product quantity...." style="height:24px;margin:5px 0px 0px 0px;font-size:14px;font-weight:bold;width:40px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;"/>
						
					</div>
					<div style="float:left;height:110px;width:90px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 5px;">
						<h2 style="margin:10px 0px 0px 0px;">Total</h2>
						<h3 style="margin:15px 0px 0px 0px;"><font color="blue"><?php $am=$data['quantity']*1.0; $am=$am*$p_a['price']; $total_amount+=$am; echo number_format($am, 2, '.', '').'</font>/='; ?></h3>
						<input type="submit" onclick="product_remove(<?php echo $data['cart_id']; ?>)"  value="Remove" title="Click to remove product...." style="height:24px;margin:10px 0px 0px 0px;font-size:14px;font-weight:bold;width:70px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;"/>
					</div>
				</div>

				


<?php
			}
			
?>
		<h4 id="coupon_msg" color="red" style="margin:10px 0px -20px 45px;text-align:left;color:red;display:none;">Please Fill up perfectly!!</h4>
		<div id="product_cart_view" style="margin-top:30px;margin-bottom:50px;background: #fbeee6 ;">
			<div style="float:left;height:110px;width:295px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 0px;">
				<h2 style="margin:10px 0px 0px 5px;text-align:left;">Enter your coupon here</h2>
				<input type="text" id="coupon_code"   style="margin:10px 0px 0px 0px;border:1px solid black;border-radius:5px;width:280px;height:27px;padding:0px 0px 0px 5px;" >
				<input type="submit" onclick="get_discount()"  value="Apply Coupon" title="Click to get discount...." style="height:24px;margin:10px 0px 0px 170px;font-size:14px;font-weight:bold;width:120px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;"/>
			</div>
			<div style="float:left;height:110px;width:285px;padding:5px;text-align:center;background: #fef9e7;margin:0px 0px 0px 5px;">
				<h3 style="margin:0px 0px 0px 5px;text-align:left;">Sub-Total &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo number_format($total_amount, 2, '.', ''); ?></font>/= </h3>
				<h3 style="margin:2px 0px 0px 5px;text-align:left;">Courier &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo 150.00; $total_amount+=150.00;  ?></font>/= </h3>
				<h3 style="margin:2px 0px 0px 5px;text-align:left;">Discount &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <font color="blue"><?php echo $per;  ?></font>% </h3>
				<h3 style="margin:2px 0px 0px 5px;text-align:left;">Total Amount&nbsp : <font color="blue"><?php  $total_amount-=(($total_amount/100.0)*$per);    echo number_format($total_amount, 2, '.', ''); ?></font>/= </h3>
				<input type="submit" onclick="checkout()"  value="Checkout" title="Click to get checkout...." style="height:24px;margin:5px 0px 0px 150px;font-size:14px;font-weight:bold;width:120px;border-radius:5px;background:#ffab23;color:#333333;font-weight:bold;"/>
		
			</div>
		</div>
	
<?php
			
			
		}
		else if($flagi==0)
		{
			echo '<h2 style="color:red;text-align:center;font-size:30px;margin-top:100px;">Oops no products available for checkout!!!</h2>';

		
		}
		
		
	}
else
	{
		header("location: index.php");
	}
?>
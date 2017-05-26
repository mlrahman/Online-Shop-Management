<?php
include("session_check.php"); 
if(isset($_GET['product_id']))
	{
	
		include("../include/connection.php");
		
		$product_id=$_GET['product_id'];
		$qur="select * from product where product_id='$product_id' ";
		$res=mysql_query($qur);
		$ar=mysql_fetch_array($res);
		$seller_id=$ar['seller_id'];
		session_start();
		$customer_id=$_SESSION['session_id'];
		session_write_close();
		$status='initial';
		$adding_date=date("d M Y"); /////////////////////
		
		$fi_qry="select * from cart_information where product_id='$product_id' and seller_id='$seller_id' and customer_id='$customer_id' and status='$status' ";
		$fi_res=mysql_query($fi_qry);
		
		if(mysql_num_rows($fi_res)>0)
		{
			$fi_arr=mysql_fetch_array($fi_res);
			$p_q="select * from product where product_id='$product_id' ";
			$p_r=mysql_query($p_q);
			$p_a=mysql_fetch_array($p_r);
			$quantity=$fi_arr['quantity'];
			$quantity+=1;
			if($quantity<=$p_a['quantity'])
			{
				$cart_id=$fi_arr['cart_id'];
				$sq="update cart_information set
					quantity='$quantity'
					where cart_id='$cart_id'";
				mysql_query($sq);
			}
		}
		else
		{
			$p_q="select * from product where product_id='$product_id' ";
			$p_r=mysql_query($p_q);
			$p_a=mysql_fetch_array($p_r);
			$quantity=1;
			if($quantity<=$p_a['quantity'])
			{
				$transaction_id='not yet';
				$sq="insert into cart_information(product_id,seller_id,customer_id,adding_date,quantity,status,transaction_id,discount_id) 
				values ('$product_id','$seller_id','$customer_id','$adding_date','$quantity','$status','$transaction_id','0') ";
				mysql_query($sq);
			}
			
		}
		$f_qry="select * from cart_information where  customer_id='$customer_id' and status='initial' ";
		$f_res=mysql_query($f_qry);
		$tot=0;
		while($f_arr=mysql_fetch_array($f_res))
		{
			$tot+=$f_arr['quantity'];
		}
		echo $tot;
	}
else
	{
		header("location: index.php");
	}
?>
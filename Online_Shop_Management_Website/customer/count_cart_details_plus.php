<?php
	include("session_check.php"); 
	if(isset($_GET['customer_id']) && isset($_GET['cart_id']))
	{
		include("../include/connection.php");
		$cart_id=$_GET['cart_id'];
		$customer_id=$_GET['customer_id'];

		$f_qry="select * from cart_information where  customer_id='$customer_id' and status='initial' and cart_id!='$cart_id' ";
		$f_res=mysql_query($f_qry);
		$tot=0;
		while($f_arr=mysql_fetch_array($f_res))
		{
			$tot+=$f_arr['quantity'];
		}
		$fi_qry="select * from cart_information where cart_id='$cart_id' ";
		$fi_res=mysql_query($fi_qry);
		$fi_arr=mysql_fetch_array($fi_res);
		
		$p_q="select * from product where product_id='$fi_arr[product_id]' ";
		$p_r=mysql_query($p_q);
		$p_a=mysql_fetch_array($p_r);
		
		$quantity=$fi_arr['quantity'];
		//$quantity+=1;
		
		if($quantity<=$p_a['quantity'])
			$tot+=$quantity;
		if($tot==0)
			echo 'My Cart';
		else
			echo 'My Cart ('.$tot.')';

	}
	else
	{
		header("location: index.php");
	}
?>
	
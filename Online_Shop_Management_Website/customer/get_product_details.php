<?php
include("session_check.php"); 
if(isset($_GET['product_id']))
	{
	
	include("../include/connection.php");
	
	$product_id=$_GET['product_id'];
	
	
	echo '<img src="../images/system/close.ico" title="Close product preview." style="height:20px;width:20px;margin: 0px 0px 0px 380px;" onclick="close_view()">';
	echo '<p id="message" style="display:none;color:white;font-weight:bold;text-align:center;font-size:15px;margin:0 auto;background:green;width:300px;"> Product Successfully Added to the cart. </p>';
	
	$query2="select * from product_picture where product_id='$product_id' ";
	$result2=mysql_query($query2);
	$data2=mysql_fetch_array($result2);
	$query="select * from product where product_id='$product_id' ";
	$result=mysql_query($query);
	$data=mysql_fetch_array($result);
	$query3="select * from category where category_id='$data[category_id]' ";
	$result3=mysql_query($query3);
	$data3=mysql_fetch_array($result3);
?>
	<img src="../images/products/<?php if(mysql_num_rows($result2)!=0){ echo $data2['image_name']; } else { echo 'null.jpg';  }?>" title="<?php echo $data['name']; ?>" style="margin: 30px 0px 0px 80px;height:150px;width:240px;border-radius:5px;">
	<h3 style="color:brown;margin-top:10px;margin-bottom:0px;text-align:center;font-size:25px;"> <?php echo $data['name']; ?> </h3>
	<h4 style="color:black;margin:10px 0px 0px 0px;text-align:center;font-size:20px;"> Category: <?php echo $data3['name']; ?></h4>
	<h4 style="color:black;margin:10px 0px 0px 0px;text-align:center;font-size:20px;"> Total: <?php echo $data['quantity']; ?> pcs </h4>
	<h4 style="color:blue;margin:10px 0px 0px 0px;text-align:center;font-size:15px;"> Price: <?php echo $data['price']; ?> Taka. </h4>								
	<a href="#" onclick="add_to_cart(<?php echo $product_id; ?>)" class="myButton">Buy Now</a>	
	
	
<?php
	}
else
	{
		header("location: index.php");
	}
?>
